<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\LogSesion;
use DateTime;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        $horas = array();

        foreach ($alumnos as $alumno) {
            foreach ($alumno->log as $log) {

                //? Calcular Horas

                $entrada = $log->entrada;
                $salida = $log->salida;
                
                $h_inicio = new \Carbon\Carbon($entrada);
                $h_final = new \Carbon\Carbon($salida);
                
                
                $totales = $h_inicio->diffInMinutes($h_final);
                array_push($horas, $totales);
            }
        }

        $horas = array_sum($horas);
        $horas = ($horas > 60) ? intdiv($horas, 60) . " Horas" : $horas . " Minutos";

        return view('docentes.panel.alumnos.mostrar', ['alumnos' => $alumnos, 'horas' => $horas]);
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
