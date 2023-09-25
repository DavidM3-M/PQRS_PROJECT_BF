<?php
namespace App\Http\Controllers;

// include $_SERVER["DOCUMENT_ROOT"]."\db_connection.php";

use Illuminate\Http\Request;
use App\Models\Formulario; // Reemplaza "TuModelo" con el nombre de tu modelo
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FormularioController extends Controller
{


    // public function validarDatos(Request $request){

    //     $tipoSolicitante = $request->input('tipoSolicitante');

    // }


    public function guardarDatos(Request $request)
    {
        $tipoSolicitante = $request->input('tipoSolicitante');
        if($tipoSolicitante != "Anonimo"){

            // Validar los datos del formulario si es necesario
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

        // Crear una nueva instancia del modelo y asignar los valores
        $modelo = new Formulario;
        $modelo->tipoSolicitante = $request->input('tipoSolicitante');
        $modelo->tipoSolicitud = $request->input('tipoSolicitud');
        $modelo->tipoIdentificacion = $request->input('tipoIdentificacion');
        $modelo->numeroIdentificacion = $request->input('numeroIdentificacion');
        $modelo->nombres = $request->input('nombres');
        $modelo->celular = $request->input('celular');
        $modelo->correo = $request->input('correo');
        $modelo->direccion = $request->input('direccion');
        $modelo->descripcion = $request->input('descripcion');
        $modelo->save();
        // return back(); // Redirige a la misma página
        // header("Status: 301 Moved Permanently");
        header("Location: http://127.0.0.1:8000");
        // header("Location: https://www.uniautonoma.edu.co");
        exit;
    }
}
