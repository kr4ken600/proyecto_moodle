<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();

        return view('docentes.panel.alumnos.mostrar', ['alumnos' => $alumnos]);
    }

    public function store(Request $req)
    {

        $req->validate([
        'correo' => 'required',
        'nombre' => 'required',
        'apellido' => 'required',
        'passwd' => 'required'
        ]);

        $docente = new Alumno;
        $docente->correo = $req->correo;
        $docente->nombre = $req->nombre;
        $docente->apellido = $req->apellido;
        $docente->passwd = Hash::make($req->passwd);

        $docente->save();

        return redirect()->route('docentes.panel.alumnos')->with('message', 'Alumno agregado correctamente.');
    }
}
