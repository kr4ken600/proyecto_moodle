<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/docentes/panel/cursos', function () {
    return view('docentes.panel.cursos.mostrar');
})->name('docentes.panel');

Route::get('/docentes/panel/cursos/crear', function () {
    return view('docentes.panel.cursos.agregar');
})->name('docentes.panel.agregar');

Route::get('/docentes/panel/docentes', function () {
    return view('docentes.panel.docentes.mostrar');
})->name('docentes.panel.docentes');

Route::get('/docentes/panel/alumnos', function () {
    return view('docentes.panel.alumnos.mostrar');
})->name('docentes.panel.alumnos');