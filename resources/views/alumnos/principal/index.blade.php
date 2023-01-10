@extends('alumnos.app')

@section('cont')
  <div class="container py-5">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h1>Bienvenido</h1>
        <hr>
        <p class="fs-3" style="text-align: justify">
          Hola, este espacio es tu entorno de trabajo, podras inscribirte a los cursos que sean de tu interes, asi mismo podras consultar tus avances en cada uno de los modulos.<br>
          Recuerda que lo mas importante es lo que aprendas, ve a tu ritmo y disfruta de nuestro servicio.
        </p>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 mb-5">
        <h2 class="border-buttom bdb-principal pb-3 mb-5">Mis cursos</h2>
        <div class="row">
          @if (session('message'))
            <div class="col-12">
              <div class="alert alert-primary" role="alert">
                {{session('message')}}
              </div>
            </div>
          @endif
          @if ((count($inscripciones)) == 0)
            <p>Aun no tienes cursos.</p>
          @endif
          @foreach ($inscripciones as $insc)
          <div class="col-sm-12 col-md-4 .col-lg-4 mb-3">
            <div class="card text-center" style="width: auto">
              <div class="card-body">
                <h5 class="card-title">{{$insc->curso->nombre}}</h5>
                <h6 class="card-subtitle mb-3 text-muted">Por: {{ucfirst($insc->curso->docente->nombre)}} {{ucfirst($insc->curso->docente->apellido)}}</h6>
                <p class="card-text">Cantidad de practicas: {{count($insc->curso->practica)}}.</p>
                <p class="card-text">Semanas que dura: {{$insc->curso->duracion}}.</p>
                <div class="d-grid gap-1">
                  <a href="{{route('alumnos.panel.curso', [$insc->id])}}" class="text-decoration-none btn btn-success">Ver Curso</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h2 class="border-buttom bdb-principal pb-3 mb-5">Cursos Disponibles</h2>
        <div class="row justify-content-around">
          
          @if (count($cursos) == 0)
            <p>Aun no hay cursos disponibles.</p>
          @endif

          @foreach ($cursos as $curso)
            <div class="col-sm-12 col-md-4 .col-lg-4 mb-3">
              <div class="card text-center" style="width: auto">
                <div class="card-body">
                  <h5 class="card-title">{{$curso->nombre}}</h5>
                  <h6 class="card-subtitle mb-3 text-muted">Por: {{ucfirst($curso->docente->nombre)}} {{ucfirst($curso->docente->apellido)}}</h6>
                  <p class="card-text">Cantidad de practicas: {{count($curso->practica)}}.</p>
                  <p class="card-text">Semanas que dura: {{$curso->duracion}}.</p>

                  <form action="{{route('alumnos.panel.suscribirse')}}" method="post">
                    @csrf
                    <input type="hidden" name="idC" value="{{$curso->id}}">
                    <input type="hidden" name="idA" value="1">
                    <div class="d-grid grap-1">
                      <button type="submit" class="btn btn-danger">Suscribete</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        
        </div>
      </div>
    </div>
  </div>
@endsection