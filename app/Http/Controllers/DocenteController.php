<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Docente;

class DocenteController extends Controller
{


  public function index(){
    $docentes = Docente::all();
    
    return view('docentes.panel.docentes.mostrar', ['docentes' => $docentes]);
  }

  public function store(Request $req)
  {

    $req->validate([
      'correo' => 'required',
      'nombre' => 'required',
      'apellido' => 'required',
      'passwd' => 'required'
    ]);

    $docente = new Docente;
    $docente->correo = $req->correo;
    $docente->nombre = $req->nombre;
    $docente->apellido = $req->apellido;
    $docente->passwd = Hash::make($req->passwd);

    $docente->save();

    return redirect()->route('docentes.panel.docentes')->with('message', 'Docente agregado correctamente.');
  }

  public function destroy($id)
    {
        $docente = Docente::find($id);
        $docente->delete();

        return redirect()->route('docentes.panel.docentes')->with('message', 'Docente eliminado correctamente.');
    }
}
