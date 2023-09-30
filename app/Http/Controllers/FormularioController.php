<?php
namespace App\Http\Controllers;

// include $_SERVER["DOCUMENT_ROOT"]."\db_connection.php";

use Illuminate\Http\Request;
use App\Models\Formulario;
use App\Models\InformacionSolicitud;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class FormularioController extends Controller
{
    public function guardarDatos(Request $request)
    {
        $tipoSolicitante = $request->input('tipoSolicitante');
        if($tipoSolicitante != "Anonimo"){
            $request->validate([
                'tipoSolicitante' => ['required'],
                'tipoSolicitud' => ['required'],
                'tipoIdentificacion' => ['required'],
                'numeroIdentificacion' => ['required'],
                'nombres' => ['required'],
                'celular' => ['required'],
                'correo' => ['required'],
                'descripcion' => ['required']
            ]);

        }else{
            $request->validate([
                'tipoSolicitud' => ['required'],
                'descripcion' => ['required']
            ]);
        }


        $formulario = new Formulario;
        $formulario->tipoSolicitante = $request->input('tipoSolicitante');
        $formulario->tipoSolicitud = $request->input('tipoSolicitud');
        $formulario->tipoIdentificacion = $request->input('tipoIdentificacion');
        $formulario->numeroIdentificacion = $request->input('numeroIdentificacion');
        $formulario->nombres = $request->input('nombres');
        $formulario->celular = $request->input('celular');
        $formulario->correo = $request->input('correo');
        $formulario->direccion = $request->input('direccion');
        $formulario->descripcion = $request->input('descripcion');
        $formulario->save();
        $informacionSolicitud = new InformacionSolicitud;
        $informacionSolicitud->radicado = $formulario->id;
        $informacionSolicitud->save();
        // return back(); // Redirige a la misma página
        // header("Status: 301 Moved Permanently");
        header("Location: http://127.0.0.1:8000");
        // header("Location: https://www.uniautonoma.edu.co");
        exit;
    }

    function buscarRadicado($radicadoIdentificacion) {

        $informacion = DB::table('formulario')
                        ->join('informacion_solicitud', 'formulario.id', '=', 'informacion_solicitud.radicado')
                        ->select('informacion_solicitud.radicado', 'formulario.created_at', 'informacion_solicitud.respuesta',
                        'informacion_solicitud.updated_at', 'informacion_solicitud.estado', 'formulario.tipoSolicitud')
                        ->where('informacion_solicitud.radicado', $radicadoIdentificacion)
                        ->orWhere('formulario.numeroIdentificacion',$radicadoIdentificacion)
                        ->get();
        $hola = response()->json($informacion);
        dd($hola);
        return $informacion;
    }

    public function mostrarInformacion(Request $request)
    {
        $radicadoIdentificacion = trim($request->input('radicadoIdentificacion'));

        $informacion = $this->buscarRadicado($radicadoIdentificacion);

        if($informacion->isEmpty()){

            return view('index');

            }else{
                if ($informacion->count() == 1) {
                return view('resultado-busqueda', compact('informacion'));
                }else{
                return view('lista-solicitudes', compact('informacion'));
                }
            }
        }

    }
