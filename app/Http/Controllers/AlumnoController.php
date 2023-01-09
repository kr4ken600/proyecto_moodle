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

        $alumno = new Alumno;
        $alumno->email = $req->correo;
        $alumno->nombre = $req->nombre;
        $alumno->apellido = $req->apellido;
        $alumno->password = Hash::make($req->passwd);
        $alumno->id_role = 3;

        $alumno->save();

        return redirect()->route('docentes.panel.alumnos')->with('message', 'Alumno agregado correctamente.');
    }

    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();

        return redirect()->route('docentes.panel.alumnos')->with('messageD', 'Alumno eliminado correctamente.');
    }
}
