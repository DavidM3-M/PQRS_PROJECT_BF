<?php

namespace App\Services\Implementations;

use App\Services\SesionService;
use Illuminate\Support\Facades\Auth;

class SesionServiceImpl implements SesionService
{
    /**
     * Método para validar al usuario que intenta loguearse.
     *
     * @param array: usuario - contraseña.
     * @return bool: false/true.
     * @author Anyi G.
     */
    public function autentificarUsuario(array $credenciales)
    {
        return Auth::attempt($credenciales);
    }
}
