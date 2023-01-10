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

//! Index
Route::get('/', function () {
    return view('index');
})->name('home')
  ->middleware('guest');

//> Login Alumno
Route::get('/alumnos', function () {
    return view('alumnos.login');
})->name('alumnos')
  ->middleware('guest');

Route::post('/alumnos/login', [LoginController::class, 'loginAlumno'])
    ->name('alumno.login')
    ->middleware('guest');
Route::get('/alumnos/panel/logout', [LoginController::class, 'logoutAlumno'])
    ->name('alumno.logout')
    ->middleware('auth.alumno');

//> Login Administrador
Route::get('/docentes', function () {
    return view('docentes.login');
})->name('docentes')
  ->middleware('guest');

Route::post('/docentes/login', [LoginController::class, 'loginDocente'])
    ->name('docentes.login')
    ->middleware('guest');
Route::get('/docentes/panel/logout', [LoginController::class, 'logoutDocente'])
    ->name('docentes.logout')
    ->middleware('auth.docente');

//! Panel Docentes
//> Cursos
Route::get('/docentes/panel/cursos', [CursoController::class, 'index'])
    ->name('docentes.panel')
    ->middleware('auth.docente');
//> Controller Cursos
Route::get('/docentes/panel/cursos/crear', [CursoController::class, 'indexCreate'])
    ->name('docentes.panel.cursos')
    ->middleware('auth.docente');
Route::post('/docentes/panel/cursos/crear/curso', [CursoController::class, 'store'])
    ->name('docentes.panel.cursos.crear')
    ->middleware('auth.docente');

Route::get('/docentes/panel/cursos/editar/{id}', [CursoController::class, 'show'])
    ->name('docentes.panel.cursos.editar')
    ->middleware('auth.docente');
Route::patch('/docentes/panel/cursos/editar/curso/{id}', [CursoController::class, 'update'])
    ->name('docentes.panel.cursos.editarc')
    ->middleware('auth.docente');
Route::delete('/docentes/panel/cursos/curso/{id}', [CursoController::class, 'destroy'])
    ->name('docentes.panel.cursos.eliminar')
    ->middleware('auth.docente');
//> Controller Practicas
Route::post('/docentes/panel/cursos/editar/practica', [PracticaController::class, 'store'])
    ->name('docentes.panel.practica.crear')
    ->middleware('auth.docente');
Route::delete('/docentes/panel/cursos/editar/practica/{id}', [PracticaController::class, 'destroy'])
    ->name('docentes.panel.practica.eliminar')
    ->middleware('auth.docente');

//> Controller Docentes
Route::get('/docentes/panel/docentes', [DocenteController::class, 'index'])
    ->name('docentes.panel.docentes')
    ->middleware('auth.docente');
Route::post('/docentes/panel/docentes/crear', [DocenteController::class, 'store'])
    ->name('docentes.panel.docentes.crear')
    ->middleware('auth.docente');
Route::delete('/docentes/panel/docentes/docente/{id}', [DocenteController::class, 'destroy'])
    ->name('docentes.panel.docentes.eliminar')
    ->middleware('auth.docente');

//> Controller Alumnos
Route::get('/docentes/panel/alumnos', [AlumnoController::class, 'index'])
    ->name('docentes.panel.alumnos')
    ->middleware('auth.docente');
Route::post('/docentes/panel/alumnos/crear', [AlumnoController::class, 'store'])
    ->name('docentes.panel.alumnos.crear')
    ->middleware('auth.docente');
Route::delete('/docentes/panel/alumnos/alumno/{id}', [AlumnoController::class, 'destroy'])
    ->name('docentes.panel.alumnos.eliminar')
    ->middleware('auth.docente');

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
