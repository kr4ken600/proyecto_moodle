@extends('docentes.panel.panel')

@section('panel')

<h1 class="text-center border-buttom bdb-principal pb-3 mb-5">Mis cursos</h1>
<div class="row align-items-center">
  <div class="col-sm-12 col-md-4 .col-lg-4 mb-3">
    <div class="card text-center" style="width: auto;">
      <div class="card-body">
        <a class="text-decoration-none" href="{{route('docentes.panel.cursos')}}">Agregar Curso</a>
      </div>
    </div>
  </div>
  @foreach ($cursos as $curso)
    <div class="col-sm-12 col-md-4 .col-lg-4 mb-3">
      <div class="card text-center" style="width: auto">
        <div class="card-body">
          <h5 class="card-title">{{$curso->nombre}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Por: {{ucfirst($curso->docente->nombre)}} {{ucfirst($curso->docente->apellido)}}</h6>
          <p class="card-text">Semanas que dura: {{$curso->duracion}}.</p>
          
          <div class="d-grid grap-1 mb-3">
            <a href="{{route('docentes.panel.cursos.editar', [$curso->id])}}" class="btn btn-success">Editar</a>
          </div>

          <form action="{{route('docentes.panel.cursos.eliminar', [$curso->id])}}" method="post">
            @method('DELETE')
            @csrf
            <div class="d-grid grap-1">
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
</div>
  
@endsection