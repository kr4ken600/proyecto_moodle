<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PanelAlumnoController;

use App\Http\Controllers\LoginController;

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
})->name('home')
  ->middleware('guest');

//Login Alumno
Route::get('/alumnos', function () {
    return view('alumnos.login');
})->name('alumnos');

Route::post('/alumnos/login', [LoginController::class, 'loginAlumno'])->name('alumno.login');
Route::post('/alumnos/panel/logout', [LoginController::class, 'logoutAlumno'])->name('alumno.logout');

//Login Administrador
Route::get('/docentes', function () {
    return view('docentes.login');
})->name('docentes');

Route::post('/docentes/login', [LoginController::class, 'loginDocente'])->name('docentes.login');
Route::post('/docentes/panel/logout', [LoginController::class, 'logoutDocente'])->name('docentes.logout');

//! Panel Docentes
//> Cursos
Route::get('/docentes/panel/cursos', [CursoController::class, 'index'])
    ->name('docentes.panel')
    ->middleware('auth.docente');
//> Controller Cursos
Route::get('/docentes/panel/cursos/crear', [CursoController::class, 'indexCreate'])
    ->name('docentes.panel.cursos');
Route::post('/docentes/panel/cursos/crear/curso', [CursoController::class, 'store'])
    ->name('docentes.panel.cursos.crear');

Route::get('/docentes/panel/cursos/editar/{id}', [CursoController::class, 'show'])
    ->name('docentes.panel.cursos.editar');
Route::patch('/docentes/panel/cursos/editar/curso/{id}', [CursoController::class, 'update'])
    ->name('docentes.panel.cursos.editarc');
Route::delete('/docentes/panel/cursos/curso/{id}', [CursoController::class, 'destroy'])
    ->name('docentes.panel.cursos.eliminar');
//> Controller Practicas
Route::post('/docentes/panel/cursos/editar/practica', [PracticaController::class, 'store'])
    ->name('docentes.panel.practica.crear');
Route::delete('/docentes/panel/cursos/editar/practica/{id}', [PracticaController::class, 'destroy'])
    ->name('docentes.panel.practica.eliminar');

//> Controller Docentes
Route::get('/docentes/panel/docentes', [DocenteController::class, 'index'])
    ->name('docentes.panel.docentes');
Route::post('/docentes/panel/docentes/crear', [DocenteController::class, 'store'])
    ->name('docentes.panel.docentes.crear');
Route::delete('/docentes/panel/docentes/docente/{id}', [DocenteController::class, 'destroy'])
    ->name('docentes.panel.docentes.eliminar');

//> Controller Alumnos
Route::get('/docentes/panel/alumnos', [AlumnoController::class, 'index'])
    ->name('docentes.panel.alumnos');
Route::post('/docentes/panel/alumnos/crear', [AlumnoController::class, 'store'])
    ->name('docentes.panel.alumnos.crear');
Route::delete('/docentes/panel/alumnos/alumno/{id}', [AlumnoController::class, 'destroy'])
    ->name('docentes.panel.alumnos.eliminar');

//! Panel Alumnos
//> Index
Route::get('/alumnos/panel', [PanelAlumnoController::class, 'index'])
    ->name('alumnos.panel')
    ->middleware('auth.alumno');
Route::get('/alumnos/panel/curso/{id}', [PanelAlumnoController::class, 'showCurso'])
    ->name('alumnos.panel.curso')
    ->middleware('auth.alumno');
Route::get('/alumnos/panel/curso/{id}/practica/{pr}', [PanelAlumnoController::class, 'showPractica'])
    ->name('alumnos.panel.curso.practica')
    ->middleware('auth.alumno');
Route::get('/alumnos/panel/curso/storage/{archivo}', [PanelAlumnoController::class, 'getArchivo'])
    ->name('alumnos.panel.archivo')
    ->middleware('auth.alumno');
Route::post('/alumnos/panel/curso/practica/entrega', [PanelAlumnoController::class, 'uploadEntrega'])
    ->name('alumnos.panel.curso.practica.entrega')
    ->middleware('auth.alumno');
Route::delete('/alumnos/panel/curso/practica/entrega/{id}/{doc}', [PanelAlumnoController::class, 'destroy'])
    ->name('alumnos.panel.curso.practica.entrega.anulada')
    ->middleware('auth.alumno');
Route::post('/alumnos/panel/suscribe', [PanelAlumnoController::class, 'suscripcion'])
    ->name('alumnos.panel.suscribirse')
    ->middleware('auth.alumno');
