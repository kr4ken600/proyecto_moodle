@extends('docentes.app')

@section('cont')

<div class="container">
  <div class="row my-5">
    <div class="col-sm-12 col-md-12 col-lg-2 border-top border-primary bdt-principal">
      <p class="fs-4">Navegación</p>
      <ul>
        <li class="mb-2"><a class="nav-link-cs text-decoration-none fs-5" href="{{route('docentes.panel')}}">Mis Cursos</a></li>
        <li class="mb-2"><a class="nav-link-cs text-decoration-none fs-5" href="{{route('docentes.panel.docentes')}}">Administrar Docentes</a></li>
        <li class="mb-2"><a class="nav-link-cs text-decoration-none fs-5" href="{{route('docentes.panel.alumnos')}}">Administrar Alumnos</a></li>
      </ul>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
      @yield('panel')
    </div>
  </div>
</div>
@yield('js')
@endsection
