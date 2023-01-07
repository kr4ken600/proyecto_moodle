@extends('app')

@section('cont')
<div class="bg-img py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-5">
                <h1 class="text-center text-white">Tu Ambiente Educativo</h1>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                <div class="d-grid gap-2">
                    <a class="btn btn-custom fs-4" href="{{route('alumnos')}}">Alumnos</a></div>
                </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mb-2">
                <div class="d-grid gap-2">
                    <a class="btn btn-custom fs-4" href="{{route('docentes')}}">Docentes</a></div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-grid gap-1">
                    <a class="btn btn-success" href="{{route('docentes.panel')}}">Panel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-5">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-custom">Bienvenida</h2>
            <hr>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <p class="fs-3">Esta página web tiene como finalidad ayudar a los estudiantes para aprender a utilizar las herramientas básicas de Photoshop por medio de un curso, para que pueda aplicar estos conocimientos en cualquier ámbito de su vida…</p>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            <img class="img-custom" src="{{asset('imgs/photoshop.png')}}" alt="logo-photoshop">
        </div>
    </div>
</div>
@endsection

