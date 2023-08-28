<?php
namespace App\Http\Controllers;

// include $_SERVER["DOCUMENT_ROOT"]."\db_connection.php";

use Illuminate\Http\Request;
use App\Models\Formulario; // Reemplaza "TuModelo" con el nombre de tu modelo
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FormularioController extends Controller
{

    public function guardarDatos(Request $request)
    {
        $formulario = DB::table('formulario')->get();

        // Validar los datos del formulario si es necesario
        $request->validate([
            'tipoSolicitante' => ['required'],
            'tipoSolicitud' => ['required'],
            'nombres' => ['required'],
            'apellidos' => ['required'],
            'celular' => ['required'],
            'correo' => ['required'],
            'descripcion' => ['required']
        ]);

        // Crear una nueva instancia del modelo y asignar los valores
        $modelo = new Formulario;
        $modelo->tipoSolicitante = $request->input('tipoSolicitante');
        $modelo->tipoSolicitud = $request->input('tipoSolicitud');
        $modelo->nombres = $request->input('nombres');
        $modelo->apellidos = $request->input('apellidos');
        $modelo->celular = $request->input('celular');
        $modelo->correo = $request->input('correo');
        $modelo->direccion = $request->input('direccion');
        $modelo->descripcion = $request->input('descripcio');
        $modelo->save();
        // return back(); // Redirige a la misma página
        header("Status: 301 Moved Permanently");
        header("Location: https://www.uniautonoma.edu.co");
        exit;
    }
}
