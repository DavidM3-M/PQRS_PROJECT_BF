<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SessionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function register(Request $request) {

        $request->validate([
            'emailRegistro' => 'required|unique:users,email',
            'passwordRegistro' => 'string|min:8']);
        $user = new User();
        $user->name = $request->nameRegistro;
        $user->email = trim($request->emailRegistro);
        $user->password = Hash::make($request->passwordRegistro);
        $user->save();
        // Auth::login($user);
        return redirect(route('login'));

    }


    public function login(Request $request) {
        $data = $request->only(['user', 'password']);

        $request->validate([
            'user' => 'required|email',
            'password' => 'required|string'
        ]);

        $credentials = ['email' => $data['user'], 'password' => $data['password']];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Log successful login
            Log::info('Login successful', [
                'email' => $data['user'],
                'ip' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'time' => now()->toDateTimeString(),
            ]);

            // If the request expects JSON (AJAX / API), return JSON.
            if ($request->wantsJson() || $request->isJson()) {
                return response()->json(['status' => 'ok', 'redirect' => route('lista-solicitudes')]);
            }

            return redirect(route('lista-solicitudes'));
        }

        // Log failed attempt
        Log::warning('Login failed', [
            'email' => $request->input('user'),
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'time' => now()->toDateTimeString(),
        ]);

        if ($request->wantsJson() || $request->isJson()) {
            return response()->json(['status' => 'error', 'message' => 'Credenciales inválidas'], 401);
        }

        return redirect()->route('login')->with('error', 'Contraseña incorrecta.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }

    function validarCorreo() {
        $email = $_POST['email'];
        $resultado = DB::table('users')
                    ->select(DB::raw('COUNT(*) as existe'))
                    ->where('email', '=', $email)
                    ->get();

    return response(json_encode($resultado),200)->header('Content-type','text/plain');
    }

    public function cambiarPassword(Request $request) {

        $request->validate([
            'correoRegistrado' => 'required|email|exists:users,email',
            'passRegistrada' => 'string|min:8']);

        DB::table('users')
            ->where('email', '=', $request->correoRegistrado)
            ->update([
                'password' => Hash::make($request->passRegistrada),
                'updated_at' => Carbon::now(),
            ]);

        return redirect()->route('gestionar-usuario')->with('success', 'Se ha actualizado la contraseña.');
    }
}
