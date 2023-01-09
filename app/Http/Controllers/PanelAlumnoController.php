<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Inscripcion;
use App\Models\Entrega;
use App\Models\Practica;
use Auth;

class PanelAlumnoController extends Controller
{
    public function index()
    {

        $id_user = Auth::user()->id;
        $id_cursos = array();

        $cursos = Curso::all();
        $inscripciones = Inscripcion::where('id_alumno', $id_user)->get();

        foreach ($inscripciones as $insc) {
            array_push($id_cursos, $insc->id_curso);
        }

        return view('alumnos.principal.index', ['cursos' => $cursos, 'inscripciones' => $inscripciones, 'idCursos' => $id_cursos]);
    }

    public function suscripcion(Request $req)
    {
        $susc = new Inscripcion;
        $susc->id_curso = $req->idC;
        $susc->id_alumno = $req->idA;

        $susc->save();

        return redirect()->route('alumnos.panel')->with('message', 'Te inscribiste a un nuevo curso.');
    }

    public function showCurso($id)
    {
        $id_user = Auth::user()->id;

        $inscripcion = Inscripcion::find($id);
        $practicas = null;

        if(count($inscripcion->curso->practica) > 0){
            $practicas = $inscripcion->curso->practica;
        }

        return view('alumnos.principal.curso', ['curso' => $inscripcion, 'practicas' => $practicas]);
    }

    public function showPractica($id, $pr)
    {
        $practica = Practica::find($pr);

        $id_user = Auth::user()->id;

        $entrega = Entrega::where([['id_practica', $pr], ['id_alumno', $id_user]])->get();

        return view('alumnos.principal.practica', ['practica' => $practica, 'curso' => $id, 'entrega' => $entrega]);
    }

    public function uploadEntrega(Request $req)
    {
        $req->validate([
            'nombre'=>'required',
            'practica'=>'required',
            'doc'=>'required'
        ]);

        $id_user = Auth::user()->id;

        $doc = $req->file('doc');
        $nombre = $req->nombre . '-' . date('y-m-d-h-i-s') .'.pdf';

        \Storage::disk('public')->put($nombre,  \File::get($doc));

        $entrega = new Entrega;
        $entrega->id_alumno = $id_user;
        $entrega->id_practica = $req->practica;
        $entrega->documento = $nombre;
        $entrega->save();

        return back()->with('message', 'Practica entregada exitosamente.');
    }

    public function getArchivo($archivo)
    {
        $public_path = public_path();
        $url = $public_path.'/storage/'.$archivo;
        
        if (\Storage::disk('public')->exists($archivo))
        {
            return response()->download($url);
        }
        
        abort(404);
    }

    public function destroy($id, $doc)
    {
        if (\Storage::disk('public')->exists($doc)){
            \Storage::disk('public')->delete($doc);
        }

        $entrega = Entrega::find($id);
        $entrega->delete();
        
        return back()->with('messageD', 'Practica anulada.');
    }
}
