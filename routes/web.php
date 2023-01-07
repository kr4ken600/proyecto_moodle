<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PracticaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Index
Route::get('/', function () {
    return view('index');
})->name('home');

//Login Alumno
Route::get('/alumnos', function () {
    return view('alumnos.login');
})->name('alumnos');

//Login Administrador
Route::get('/docentes', function () {
    return view('docentes.login');
})->name('docentes');

//Panel
//Cursos
Route::get('/docentes/panel/cursos', [CursoController::class, 'index'])->name('docentes.panel');
//Controller Cursos
Route::get('/docentes/panel/cursos/crear', [CursoController::class, 'indexCreate'])->name('docentes.panel.cursos');
Route::post('/docentes/panel/cursos/crear/curso', [CursoController::class, 'store'])->name('docentes.panel.cursos.crear');

Route::get('/docentes/panel/cursos/editar/{id}', [CursoController::class, 'show'])->name('docentes.panel.cursos.editar');
Route::patch('/docentes/panel/cursos/editar/curso/{id}', [CursoController::class, 'update'])->name('docentes.panel.cursos.editarc');
Route::delete('/docentes/panel/cursos/curso/{id}', [CursoController::class, 'destroy'])->name('docentes.panel.cursos.eliminar');
//Controller Practicas
Route::post('/docentes/panel/cursos/editar/practica', [PracticaController::class, 'store'])->name('docentes.panel.practica.crear');
Route::delete('/docentes/panel/cursos/editar/practica/{id}', [PracticaController::class, 'destroy'])->name('docentes.panel.practica.eliminar');

//Docentes
Route::get('/docentes/panel/docentes', function () {
    return view('docentes.panel.docentes.mostrar');
})->name('docentes.panel.docentes');

//Alumnos
Route::get('/docentes/panel/alumnos', function () {
    return view('docentes.panel.alumnos.mostrar');
})->name('docentes.panel.alumnos');