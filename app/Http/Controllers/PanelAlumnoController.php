<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Inscripcion;

class PanelAlumnoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();

        return view('alumnos.principal.index', ['cursos' => $cursos]);
    }

    public function suscripcion(Request $req)
    {
        $susc = new Inscripcion;
        $susc->id_curso = $req->idC;
        $susc->id_alumno = $req->idA;

        $susc->save();

        return redirect()->route('alumnos.panel')->with('message', 'Te inscribiste a un nuevo curso.');
    }
}
