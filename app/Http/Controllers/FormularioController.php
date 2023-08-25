<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario; // Reemplaza "TuModelo" con el nombre de tu modelo

class FormularioController extends Controller
{

    public function guardarDatos(Request $request)
    {
        dd($request->all());
        // Validar los datos del formulario si es necesario
        $request->validate([
            'campo1' => 'required',
            'campo2' => 'required',
            // ...otras reglas de validación
        ]);

        // Crear una nueva instancia del modelo y asignar los valores
        $modelo = new Formulario;
        dd($modelo);
        $modelo->campo1 = $request->input('nombre');
        $modelo->campo2 = $request->input('apellido');
        // ...asignar otros campos

        // Guardar en la base de datos
        $modelo->save();

        return redirect()->route('guardar.datos')->with('success', 'Datos guardados correctamente.');
    }
}
