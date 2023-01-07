<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practica;

class PracticaController extends Controller
{
    public function store(Request $req)
    {
        $req -> validate([
            'nombreP' => 'required',
            'instrucciones' => 'required'
        ]);

        $practica = new Practica;

        $practica->id_curso = $req->curso;
        $practica->nombre = $req->nombreP;
        $practica->instrucciones = $req->instrucciones;

        $practica->save();

        return redirect()->route('docentes.panel.cursos.editar', [$req->curso])->with('message', 'Practica agregada correctamente');
    }

    public function destroy($id)
    {
        $practica = Practica::find($id);
        $id_curso = $practica->id_curso;
        $practica->delete();

        return redirect()->route('docentes.panel.cursos.editar', [$id_curso])->with('message', 'Practica eliminada correctamente.');
    }
}
