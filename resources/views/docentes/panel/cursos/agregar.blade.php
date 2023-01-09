@extends('docentes.panel.panel')

@section('panel')

<h1 class="text-center border-buttom bdt-principal pb-3">Agregar Nuevo Curso</h1>
<div class="row justify-content-center">
  <div class="col-sm-12 col-md-10 col-lg-10 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center mb-5">
    <form action="{{route('docentes.panel.cursos.crear')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="nombre" class="form-label">Nombre del curso</label>
          <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" autofocus>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="imparte" class="form-label">Docente que lo Imparte</label>
          <select class="form-select" name="imparte" id="imparte">
            @foreach ($docentes as $docente)
              <option value="{{$docente->id}}">{{ucfirst($docente->nombre)}} {{ucfirst($docente->apellido)}}</option>
            @endforeach
          </select>
        </div>
        @error('nombre')
        <div class="col-sm-12 col-md-12 col-lg-12">
          <h6 class="message-error mt-2 mb-3">
              {{$message}}
          </h6>
        </div>
        @enderror
        @error('imparte')
        <div class="col-sm-12 col-md-12 col-lg-12">
          <h6 class="message-error mt-2 mb-3">
              {{$message}}
          </h6>
        </div>
        @enderror
        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
          <label for="duracion" class="form-label">Duracion del Curso (semanas)</label>
          <input type="number" class="form-control" name="duracion" id="duracion" min="1" max="4" value="1">
        </div>
        @error('duracion')
        <div class="col-sm-12 col-md-12 col-lg-12">
          <h6 class="message-error mt-2 mb-3">
              {{$message}}
          </h6>
        </div>
        @enderror
        <div class="col-12">
          <button type="submit" class="form-control btn btn-primary">Crear</button>
          {{-- <input type="submit" class="form-control btn btn-primary" name="crear" value="Crear"> --}}
        </div>
      </div>
    </form>
  </div>
</div>
  
@endsection