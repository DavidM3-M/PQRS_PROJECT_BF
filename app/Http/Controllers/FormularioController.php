<?php
namespace App\Http\Controllers;

// include $_SERVER["DOCUMENT_ROOT"]."\db_connection.php";

use Illuminate\Http\Request;
use App\Models\Formulario;
use App\Models\InformacionSolicitud;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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


    public function buscarRadicado(Request $request)
    {
        $radicado = trim($request->input('numeroRadicado'));

        $informacion = DB::table('formulario')
                        ->join('informacion_solicitud', 'formulario.id', '=', 'informacion_solicitud.radicado')
                        ->select('informacion_solicitud.radicado', 'formulario.created_at', 'informacion_solicitud.respuesta',
                        'informacion_solicitud.updated_at', 'informacion_solicitud.estado')
                        ->where('informacion_solicitud.radicado', $radicado)
                        ->get();

        if(empty($informacion[0])){
            return view('index');
        }else{
            return view('resultado-busqueda', compact('informacion'));
        }

    }

    // public function verUsuario($id_usuario)
    // {
    //     $usuario = $this->usuariosService->obtenerUsuario($id_usuario);
    //     $hojas = $this->usuariosService->hojasUsuario($id_usuario);
    //     $vista = 'PERFIL USUARIO';
    //     $entidades = $this->entidadesService->obtenerEntidades();

    //     return view('configuraciones.perfil',compact('usuario','hojas','vista','entidades'));
    // }


}
