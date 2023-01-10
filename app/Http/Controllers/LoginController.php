<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\LogSesion;

class LoginController extends Controller
{
    public function loginDocente(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $req->only('email', 'password');
        
        if(Auth::guard('admin')->attempt($credentials)){
            $req->session()->regenerate();
            return redirect()->intended(route('docentes.panel'));
        } else {
            throw ValidationException::withMessages([
                'credential' => __('auth.failed')
            ]);
        }
    }
    
    public function logoutDocente()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('home');
    }

    public function loginAlumno(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $req->only('email', 'password');

        if(Auth::attempt($credentials)){
            $id_log = \Str::random(10);
            
            $log = new LogSesion;
            $log->id = $id_log;
            $log->id_alumno = Auth::user()->id;
            $log->entrada = now();
            $log->save();

            \Session::put('log', $id_log);

            $req->session()->regenerate();
            return redirect()->route('alumnos.panel');
        } else {
            throw ValidationException::withMessages([
                'credential' => __('auth.failed')
            ]);
        }
    }

    public function logoutAlumno()
    {
        $log = LogSesion::find(\Session::get('log'));
        $log->salida = now();
        $log->save();

        Auth::logout();
        return redirect()->route('home');
    }
}
