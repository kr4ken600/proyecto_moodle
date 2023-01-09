@extends('alumnos.app')

@section('cont')
  <div class="container py-5">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 bdb-principal">
        <div class="row justify-content-around">
          <div class="col-sm-8 col-md-8 col-lg-8">
            <h1>{{$curso->curso->nombre}}</h1>
            <h3 class="text-mute pb-3">{{ucfirst($curso->curso->docente->nombre)}} {{ucfirst($curso->curso->docente->apellido)}}</h3>
          </div>
          <div class="col-sm-4 col-md-4 col-lg-4 text-end">
            <a href="{{route('alumnos.panel')}}" class="text-decoration-none btn btn-success">Volver</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h3 class="mt-5">Practicas</h3>
        <hr class="mb-3">
        @if (!empty($practicas))
        <table class="table">
          <tbody>
          @foreach ($practicas as $practica)      
            <tr>
              <td><a href="{{route('alumnos.panel.curso.practica', [$curso->id_curso, $practica->id])}}" class="fs-5 text-decoration-none">{{$practica->nombre}}</a></td>
              <td><a href="#" class="text-decoration-none btn-table" data-btn="{{$practica->id}}">+</a></td>
            </tr>
            <tr class="ghost-table" id="tr{{$practica->id}}">
              <td colspan="2">
                {{$practica->instrucciones}}
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        @else
          <p class="fs-5">Aun no hay practicas.</p>
        @endif
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{asset('js/alumno.curso.js')}}"></script>
@endsection