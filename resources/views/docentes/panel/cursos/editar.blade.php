@extends('docentes.panel.panel')

@section('panel')

<!-- EDITAR CURSO -->

<h1 class="text-center border-buttom bdb-principal pb-3 mb-5">Editar Curso</h1>
<div class="row justify-content-center mb-5">
  @if (session('message'))
    <div class="col-12">
      <div class="alert alert-primary" role="alert">
        {{session('message')}}
      </div>
    </div>
  @endif
  <div class="col-sm-12 col-md-10 col-lg-10 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center mb-5">
    <form action="{{route('docentes.panel.cursos.editarc', ['id' => $curso->id])}}" method="post">
      @method('PATCH')
      @csrf
      <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="nombre" class="form-label">Nombre del curso</label>
          <input type="text" class="form-control" name="nombre" id="nombre" value="{{$curso->nombre}}" autofocus>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="imparte" class="form-label">Docente que lo Imparte</label>
          <select class="form-select" name="imparte" id="imparte">
            @foreach ($docentes as $docente)
              <option value="{{$docente->id}}"@if ($curso->id_docente == $docente->id) selected @endif>{{ucfirst($docente->nombre)}} {{ucfirst($docente->apellido)}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
          <label for="duracion" class="form-label">Duracion del Curso (semanas)</label>
          <input type="number" class="form-control" name="duracion" id="duracion" min="1" max="4" value="{{$curso->duracion}}">
        </div>
        <div class="col-12">
          <button type="submit" class="form-control btn btn-primary">Editar</button>
        </div>
      </div>
    </form>
  </div>

  <!-- AGREGAR PRACTICAS -->

  <h1 class="text-center border-buttom bdb-principal pb-3 mb-5">Agregar Practicas</h1>
  @if (session('messageP'))
    <div class="col-12">
      <div class="alert alert-primary" role="alert">
        {{session('messageP')}}
      </div>
    </div>
  @endif
  <div class="col-sm-12 col-md-10 col-lg-10 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center mb-5">
    <h3 class="mb-3">Agregar Practica</h3>
    <form action="{{route('docentes.panel.practica.crear')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
          <label for="nombreP" class="form-label">Nombre de la Practica</label>
          <input type="text" class="form-control" name="nombreP" id="nombreP" value="{{old('nombreP')}}" autofocus>
          <input type="hidden" name="curso" value="{{$curso->id}}">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
          <label for="instrucciones" class="form-label">Instrucciones de la Practica</label>
          <textarea class="form-control" rows="10" cols="10" name="instrucciones" id="instrucciones" value="{{old('instrucciones')}}"></textarea>
        </div>
        <div class="col-12">
          <button type="submit" class="form-control btn btn-primary">Agregar</button>
        </div>
      </div>
    </form>
  </div>

  <!-- LISTADO DE PRACTICAS -->

  <h1 class="text-center border-buttom bdb-principal pb-3 mb-5">Lista de Practicas</h1>
  @if (session('messageDP'))
    <div class="col-12">
      <div class="alert alert-danger" role="alert">
        {{session('messageDP')}}
      </div>
    </div>
  @endif
  <div class="col-sm-12 col-md-12 col-lg-12 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center mb-5">
    @if (!empty($practicas))
      <table class="table">
        <thead>
          <tr>
            <th>Practica</th>
            <th>Instrucciones (Cantidad)</th>
            
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($practicas as $practica)
          <tr>
            <td>{{$practica->nombre}}</td>
            <td>
              <a href="#" class="text-decoration-none btn-table" data-btn="{{$practica->id}}">{{count(explode('.', $practica->instrucciones))-1}}</a>
            </td>
            <td>
              <form action="{{route('docentes.panel.practica.eliminar', [$practica->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
            </td>
          </tr>
          <tr class="ghost-table" id="tr{{$practica->id}}">
            <td colspan="3">
              {{$practica->instrucciones}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection

@section('js')
  <script src="{{asset('js/cursos.js')}}"></script>
@endsection