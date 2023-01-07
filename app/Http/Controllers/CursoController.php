<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Practica;

class CursoController extends Controller
{

    public function index(){
        $cursos = Curso::all();

        return view('docentes.panel.cursos.mostrar', ['cursos' => $cursos]);
    }

    public function indexCreate()
    {
        $docentes = Docente::all();

        return view('docentes.panel.cursos.agregar', ['docentes' => $docentes]);
    }

    public function store(Request $req)
    {
        $req->validate([
            'nombre' => 'required',
            'imparte' => 'required',
            'duracion' => 'required'
        ]);

        $curso = new Curso;

        $curso->id_docente = $req->imparte;
        $curso->nombre = $req->nombre;
        $curso->duracion = $req->duracion;

        $curso->save();

        return redirect()->route('docentes.panel')->with('message', 'Curso creado correctamente.');
    }

    public function show($id)
    {
        $curso = Curso::find($id);
        $docentes = Docente::all();
        $practicas = Practica::where("id_curso", $id)->get();

        return view('docentes.panel.cursos.editar', ['curso' => $curso, 'docentes' => $docentes, 'practicas' => $practicas]);
    }

    public function update(Request $req, $id)
    {
        $curso = Curso::find($id);
        $curso->id_docente = $req->imparte;
        $curso->nombre = $req->nombre;
        $curso->duracion = $req->duracion;

        $curso->save();
        return redirect()->route('docentes.panel.cursos.editar', [$id])->with('message', 'Curso actualizado correctamente');
    }

    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();

        return redirect()->route('docentes.panel')->with('message', 'Curso eliminado correctamente.');
    }
}
