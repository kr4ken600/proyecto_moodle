@extends('docentes.panel.panel')

@section('panel')

<h1 class="text-center border-buttom bdb-principal pb-3">Mis cursos</h1>
<div class="row">
  <div class="col-sm-12 col-md-3 .col-lg-3 border p-5">
    <a class="text-decoration-none" href="{{route('docentes.panel.agregar')}}">Agregar Curso</a>
  </div>
</div>
  
@endsection