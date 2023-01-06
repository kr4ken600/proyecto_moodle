@extends('docentes.panel.panel')

@section('panel')

<h1 class="text-center border-buttom bdt-principal pb-3">Agregar Nuevo Curso</h1>
<div class="row justify-content-center">
  <div class="col-sm-12 col-md-10 col-lg-10 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center">
    <form action="" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="nombre" class="form-label">Nombre del curso</label>
          <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" autofocus>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="imparte" class="form-label">Docente que lo Imparte</label>
          <input type="text" class="form-control" name="imparte" id="imparte" value="{{old('imparte')}}">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
          <label for="duracion" class="form-label">Duracion del Curso (semanas)</label>
          <input type="number" class="form-control" name="duracion" id="duracion" min="1" max="4" value="1">
        </div>
        <div class="col-sm-6 col-md-8 col-lg-8 mb-3">
          <label for="cantidad" class="form-label">Numero de Practicas</label>
          <input type="number" class="form-control" min="1" max="20" name="cantidad" id="cantidad" value="1">
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 mb-3">
          <label for="cant" class="form-label">Agregar Practica</label>
          <input type="button" class="form-control btn btn-success" name="cant" id="cant" value="+">
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="row" id="cont_temarios"></div>
        </div>
        <div class="col-12">
          <input type="submit" class="form-control btn btn-primary" name="crear" value="Crear">
        </div>
      </div>
    </form>
  </div>
</div>
  
@endsection

@section('js')
  <script src="{{asset('js/cursos.js')}}"></script>
@endsection