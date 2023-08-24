<?php

namespace App\Http\Controllers;

use App\Services\SesionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{
    protected $sesionService;

    public function __construct(SesionService $sesionService) {
        $this->sesionService = $sesionService;
    }

    /**
     * Metodo para redirigir a la vista de inicio de sesion.
     *
     */
    public function inicioSesion()
    {
        dd(auth()->guard()->check());
        return view('inicioSesion');
    }
}
