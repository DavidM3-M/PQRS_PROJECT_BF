<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;



class ListaSolicitudesController extends Controller
{
    public function mostrarTodas() {
        $solicitudes = DB::table('formulario')
                    ->join('informacion_solicitud', 'formulario.id', '=', 'informacion_solicitud.radicado')
                    ->select('informacion_solicitud.radicado', 'formulario.created_at', 'informacion_solicitud.respuesta', 'formulario.descripcion',
                            'informacion_solicitud.updated_at', 'informacion_solicitud.estado', 'formulario.tipoSolicitud', 'formulario.correo', 'informacion_solicitud.fechaVencimiento')
                    ->orderByDesc('radicado')
                    ->paginate(15);

        return view('lista-solicitudes', compact('solicitudes'));
    }

    public function responderSolicitud(Request $request) {

        $correo = $request->input('correoReceptor');
        $texto = $request->input('asunto');
        $parts = explode("#", $texto);
        $radicado = str_replace([' ', '.'], '', $parts[1]);
        $respuesta = "";

        $request->validate([
            'correoReceptor' => ['required'],
            'asunto' => ['required'],
            'inputRespuesta' => ['required']
        ]);


        if (Str::contains($correo, "@")) {

            $contenidoCorreo = $request->input('inputRespuesta');

            if ($request->hasFile('archivoRespuesta')) {
                $archivo = $request->file('archivoRespuesta');
                $rutaAdjunto = 'archivos_adjuntos_enviados/' . "radicado_".$radicado . "_".$archivo->getClientOriginalName();
                Storage::disk('local')->put($rutaAdjunto, file_get_contents($archivo));

                Mail::html($contenidoCorreo, function ($message) use ($request, $contenidoCorreo, $rutaAdjunto) {
                    $message->to($request->input('correoReceptor'));
                    $message->subject($request->input('asunto'));
                    $message->html($contenidoCorreo);
                    $message->attach(storage_path('app/' . $rutaAdjunto));
                });

            }else {

                Mail::html($contenidoCorreo, function ($message) use ($request, $contenidoCorreo) {
                    $message->to($request->input('correoReceptor'));
                    $message->subject($request->input('asunto'));
                    $message->html($contenidoCorreo);
                });
            }
        }else {
            if ($request->hasFile('archivoRespuesta')) {
                $archivo = $request->file('archivoRespuesta');
                $rutaAdjunto = 'archivos_adjuntos_enviados/' . "radicado_".$radicado . "_".$archivo->getClientOriginalName();
                Storage::disk('local')->put($rutaAdjunto, file_get_contents($archivo));
            }
            $respuesta = "Guardada";
        }

        DB::table('informacion_solicitud')
            ->where('radicado', '=', $radicado)
            ->update([
                    'estado' => 'Respondida',
                    'respuesta' => $request->input('inputRespuesta'),
                    'updated_at' => Carbon::now(),
                ]);

        return response()->json(['respuesta'=>$respuesta]);
    }

    public function mostrarSolicitud(Request $request) {

        $radicado =  $request->input('radicado');

        $descripcionSolicitud = DB::table('formulario')
                            ->join('informacion_solicitud', 'formulario.id', '=', 'informacion_solicitud.radicado')
                            ->select('formulario.tipoSolicitante', 'formulario.created_at', 'informacion_solicitud.respuesta', 'formulario.descripcion',
                                    'informacion_solicitud.updated_at', 'informacion_solicitud.estado', 'formulario.tipoSolicitud', 'formulario.correo',
                                    'formulario.tipoIdentificacion', 'formulario.numeroIdentificacion', 'formulario.celular', 'formulario.nombres', 'informacion_solicitud.radicado')
                            ->where('formulario.id', $radicado)
                            ->first();


        return response(json_encode($descripcionSolicitud),200)->header('Content-type','text/plain');

    }

    public function mostrarDescripcionSolicitud(Request $request) {
        $radicado =  $request->input('radicado');

        $datos = DB::table('formulario')
                            ->join('informacion_solicitud', 'formulario.id', '=', 'informacion_solicitud.radicado')
                            ->select('informacion_solicitud.radicado', 'formulario.tipoSolicitante', 'formulario.tipoSolicitud','formulario.created_at',
                            'formulario.nombres','formulario.tipoIdentificacion', 'formulario.numeroIdentificacion', 'formulario.celular','formulario.correo','formulario.rutaAdjunto',
                            'formulario.respuestaFisica', 'formulario.descripcion', 'informacion_solicitud.fechaVencimiento', 'informacion_solicitud.area', 'informacion_solicitud.fechaAsignacion')
                            ->where('formulario.id', $radicado)
                            ->first();

        return view('descripcion-solicitud', compact('datos'));
    }


    public function asignarSolicitud(Request $request) {

        $area = $request->input('areaSeleccionada');
        $radicado = $request->input('radicadoModal');
        DB::table('informacion_solicitud')
            ->where('radicado', '=', $radicado)
            ->update([
                'estado' => 'Asignada',
                'area' => $area,
                'fechaAsignacion' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        return redirect()->route('lista-solicitudes')->with('success', 'Se ha realizado la asignación');
    }

    public function descargarSolicitud(Request $request) {
        $radicado =  $request->input('radicado');

        $datos = DB::table('formulario')
                            ->join('informacion_solicitud', 'formulario.id', '=', 'informacion_solicitud.radicado')
                            ->select('informacion_solicitud.radicado', 'formulario.tipoSolicitante', 'formulario.tipoSolicitud','formulario.created_at',
                            'formulario.nombres','formulario.tipoIdentificacion', 'formulario.numeroIdentificacion', 'formulario.celular','formulario.correo',
                            'formulario.respuestaFisica', 'formulario.descripcion', 'informacion_solicitud.fechaVencimiento')
                            ->where('formulario.id', $radicado)
                            ->first();
        $nombre = $datos->tipoSolicitud . "_" . $datos->radicado;

        $pdf = PDF::loadView('descargar-solicitud', compact('datos'));

        return $pdf->download($nombre.'.pdf');
    }

    public function descargarArchivosAdjuntos(Request $request) {
        $radicado =  $request->input('radicadoA');

        $ruta = DB::table('formulario')
                    ->select('rutaAdjunto')
                    ->where('id', $radicado)
                    ->first();
        $partes = explode("/", $ruta->rutaAdjunto);
        $nombre = $partes[1];
        $rutaAjunto = storage_path("app/{$ruta->rutaAdjunto}");
        return response()->download($rutaAjunto, $nombre);
    }

    function mostrarEstadisticas() {

        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];

        $tablaFormulario = DB::table('formulario')
                            ->selectRaw('
                                COUNT(*) AS totalRegistros,
                                COUNT(CASE WHEN tipoSolicitante = "Anonimo" THEN 1 END) AS solicitudesAnonimas,
                                COUNT(CASE WHEN tipoSolicitante = "Natural" THEN 1 END) AS solicitudesNatural,
                                COUNT(CASE WHEN tipoSolicitante = "Juridica" THEN 1 END) AS solicitudesJuridica,
                                COUNT(CASE WHEN tipoSolicitud = "Petición" THEN 1 END) AS peticiones,
                                COUNT(CASE WHEN tipoSolicitud = "Queja" THEN 1 END) AS quejas,
                                COUNT(CASE WHEN tipoSolicitud = "Reclamo" THEN 1 END) AS reclamos,
                                COUNT(CASE WHEN tipoSolicitud = "Sugerencia" THEN 1 END) AS sugerencias,
                                COUNT(CASE WHEN tipoSolicitud = "Felicitación" THEN 1 END) AS felicitaciones,
                                COUNT(CASE WHEN tipoUsuario = "Estudiante" THEN 1 END) AS estudiante,
                                COUNT(CASE WHEN tipoUsuario = "Acudiente" THEN 1 END) AS egresado,
                                COUNT(CASE WHEN tipoUsuario = "Egresado" THEN 1 END) AS acudiente,
                                COUNT(CASE WHEN tipoUsuario = "Administrativo" THEN 1 END) AS administrativo,
                                COUNT(CASE WHEN tipoUsuario = "Otro" THEN 1 END) AS otro')
                            ->whereRaw('SUBSTRING(created_at, 1, 10) >= ?', [$fechaInicio])
                            ->whereRaw('SUBSTRING(created_at, 1, 10) <= ?', [$fechaFin])
                            ->first();

        $tablaInformacion =  DB::table('informacion_solicitud')
                        ->selectRaw('COUNT(CASE WHEN estado = "Respondida" THEN 1 END) AS respondida,
                            COUNT(CASE WHEN estado = "Asignada" THEN 1 END) AS asignada')
                        ->whereRaw('SUBSTRING(updated_at, 1, 10) >= ?', [$fechaInicio])
                        ->whereRaw('SUBSTRING(updated_at, 1, 10) <= ?', [$fechaFin])
                        ->whereColumn('updated_at', '<>', 'created_at')
                        ->first();


        $tablaFormularioArray = (array)$tablaFormulario;
        $tablaInformacionArray = (array)$tablaInformacion;

        $resultados = (object)array_merge($tablaFormularioArray, $tablaInformacionArray);

        return response(json_encode($resultados),200)->header('Content-type','text/plain');
    }
}
