<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use App\Models\InformacionSolicitud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class FormularioController extends Controller
{


    public function guardarDatos(Request $request)
    {
        try {
        	$tipoSolicitante = $request->input('tipoSolicitante');
        $correo = trim($request->input('correo'));
        $fecha = Carbon::now();
        $fechaVencimiento = FormularioController::calcularFechaVencimiento($fecha);
        $rutaAdjunto = NULL;

        if($tipoSolicitante != "Anonimo"){
            $request->validate([
                'tipoSolicitante' => ['required'],
                'tipoSolicitud' => ['required'],
                'tipoUsuario' => ['required'],
                'tipoIdentificacion' => ['required'],
                'numeroIdentificacion' => ['required'],
                'nombres' => ['required'],
                'celular' => ['required'],
                'correo' => 'required|email',
                'descripcion' => ['required']
            ]);

        }else{
            $request->validate([
                'tipoSolicitud' => ['required'],
                'tipoUsuario' => ['required'],
                'descripcion' => ['required']
            ]);
        }

        if ($request->hasFile('archivoInput')) {
            $last =  DB::table('formulario')
                        ->select('id')
                        ->orderByDesc('id')
                        ->first();

            $identificador = ($last && isset($last->id)) ? ($last->id + 1) : 1;
            $archivo = $request->file('archivoInput');
            $rutaAdjunto = 'archivos_adjuntos_recibidos/' . "radicado_" . $identificador. "_". $archivo->getClientOriginalName();
            Storage::disk('local')->put($rutaAdjunto, file_get_contents($archivo));
        }

        $formulario = new Formulario;
        $formulario->tipoSolicitante = $tipoSolicitante;
        $formulario->tipoSolicitud = $request->input('tipoSolicitud');
        $formulario->tipoIdentificacion = $request->input('tipoIdentificacion');
        $formulario->numeroIdentificacion = $request->input('numeroIdentificacion');
        $formulario->nombres = $request->input('nombres');
        $formulario->celular = $request->input('celular');
        $formulario->correo = $correo;
        $formulario->tipoUsuario = $request->input('tipoUsuario');
        $formulario->respuestaFisica = $request->input('respuestaFisica');
        $formulario->descripcion = $request->input('descripcion');
        $formulario->rutaAdjunto = $rutaAdjunto;
        $formulario->save();

        $informacionSolicitud = new InformacionSolicitud;
        $informacionSolicitud->radicado = $formulario->id;
        $informacionSolicitud->fechaVencimiento = $fechaVencimiento;
        $informacionSolicitud->save();
        $radicado = $formulario->id;

        // Escribir resultado en consola (si existe) además del log
        $msgSuccess = 'PQR guardado correctamente. Radicado: ' . $radicado;
        if (defined('STDOUT')) {
            fwrite(STDOUT, $msgSuccess . PHP_EOL);
        } else {
            error_log($msgSuccess);
        }

        // if ($tipoSolicitante != "Anonimo") {
        //     $datos = ['radicado' => $radicado];

        //     $contenidoCorreo = view('contenido-correo')->with($datos)->render();

        //     Mail::html($contenidoCorreo, function ($message) use ($correo) {
        //         $message->to($correo);
        //         $message->subject("Solicitud creada")
        //         ->attach('images/logoAut1.png', ['as' => 'logo.png']);
        //     });
        // }
        return response()->json(['radicado'=>$radicado]);

        } catch (\Exception $e) {
            Log::error('Error al guardar PQR: '.$e->getMessage(), ['exception' => $e]);
            $consoleMsg = 'Error al guardar PQR: ' . $e->getMessage();
            if (defined('STDERR')) {
                fwrite(STDERR, $consoleMsg . PHP_EOL);
            } else {
                error_log($consoleMsg);
            }
            return response()->json(['error' => 'Error interno al guardar la solicitud.'], 500);
        }

    }

    function enviarCorreo() {

        $tipoSolicitante = $_POST['tipoSolicitante'];

        if ($tipoSolicitante != "Anonimo") {

            $id =  DB::table('formulario')
                        ->select('id')
                        ->orderByDesc('id')
                        ->first();

            $radicado = $id->id;
            $correo =  $_POST['email'];
            $datos = ['radicado' => $radicado];

            $contenidoCorreo = view('contenido-correo')->with($datos)->render();

            Mail::html($contenidoCorreo, function ($message) use ($correo) {
                $message->to($correo);
                $message->subject("Solicitud creada")
                ->attach('images/logoAut1.png', ['as' => 'logo.png']);
            });
        }
    }

    function mostrarInformacion() {

        $radicado =  $_POST['radicado'];
        $informacion = DB::table('formulario')
                            ->join('informacion_solicitud', 'formulario.id', '=', 'informacion_solicitud.radicado')
                            ->selectRaw('informacion_solicitud.radicado, DATE_FORMAT(formulario.created_at, "%d/%m/%Y") as created_at_formatted, informacion_solicitud.respuesta, formulario.descripcion, formulario.correo,
                            DATE_FORMAT(informacion_solicitud.updated_at, "%d/%m/%Y") as updated_at_formatted, informacion_solicitud.estado, formulario.tipoSolicitud,formulario.tipoSolicitante')
                            ->where('informacion_solicitud.radicado', $radicado)
                            ->get();

        return response(json_encode($informacion),200)->header('Content-type','text/plain');
    }


    public function listarRadicados()
    {
        $radicadoIdentificacion = $_POST['datoIngresado'];

        $informacion = DB::table('formulario')
                        ->join('informacion_solicitud', 'formulario.id', '=', 'informacion_solicitud.radicado')
                        ->selectRaw('informacion_solicitud.radicado, DATE_FORMAT(formulario.created_at, "%d/%m/%Y") as created_at_formatted, informacion_solicitud.respuesta, formulario.descripcion, formulario.correo,
                        DATE_FORMAT(informacion_solicitud.updated_at, "%d/%m/%Y") as updated_at_formatted, informacion_solicitud.estado, formulario.tipoSolicitud, formulario.tipoSolicitante')
                        ->where('informacion_solicitud.radicado', $radicadoIdentificacion)
                        ->orWhere('formulario.numeroIdentificacion', $radicadoIdentificacion)
                        ->get();

        return response(json_encode($informacion),200)->header('Content-type','text/plain');
    }

    public function calcularFechaVencimiento($fechaEnvio) {

        $diasHabiles = 15;

        $festivos = array(
            '2023-11-06',
            '2023-11-13',
            '2023-12-08',
            '2023-12-25',
        );

        while ($diasHabiles > 0) {
            $fechaEnvio->addDay();

            if ($fechaEnvio->isWeekday() && !in_array($fechaEnvio->format('Y-m-d'), $festivos)) {
                $diasHabiles--;
            }
        }

        return $fechaEnvio;
    }
}
