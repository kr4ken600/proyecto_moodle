<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
        Auth::logout();
        return redirect()->route('home');
    }
}
