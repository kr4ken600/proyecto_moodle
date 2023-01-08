@extends('docentes.panel.panel')

@section('panel')

<h1 class="text-center border-buttom bdb-principal pb-3 mb-5">Alumnos</h1>
<div class="row justify-content-center">
  <div class="col-sm-12 col-md-12 .col-lg-12 mb-3">
    <div class="d-grid -gap1">
      <button class="text-decoration-none btn btn-success" id="addAlumno">Agregar Alumno</button>
    </div>
  </div>
  <div id="formAlumno" class="ghost col-sm-12 col-md-10 .col-lg-10 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center mb-5">
    <form action="{{route('docentes.panel.alumnos.crear')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="nombre" class="form-label">Nombre del Alumno</label>
          <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" autofocus>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="apellido" class="form-label">Apellido del Alumno</label>
          <input type="text" class="form-control" name="apellido" value="{{old('apellido')}}">
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="correo" class="form-label">Correo del Alumno</label>
          <input type="email" class="form-control" name="correo" value="{{old('correo')}}">
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="passwd" class="form-label">Contraseña del Alumno</label>
          <input type="password" class="form-control" name="passwd" value="{{old('passwd')}}">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
          <button type="submit" class="form-control btn btn-success">Agregar</button>
        </div>
      </div>
    </form>
  </div>
  <h1 class="text-center border-buttom bdb-principal pb-3 mb-5">Lista Alumnos</h1>
  <div class="col-sm-12 col-md-12 col-lg-12 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center mb-5">
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo Electronico</th>
          <th>Cursos Inscritos</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
      @if (!empty($alumnos))
            @foreach ($alumnos as $alumno)
            <tr>
              <td>{{ucfirst($alumno->nombre)}} {{ucfirst($alumno->apellido)}}</td>
              <td>{{$alumno->correo}}</td>
              <td>
                <a href="#" class="text-decoration-none btn-table" data-btn="{{$alumno->id}}">0</a>
              </td>
              <td>
                <form action="{{route('docentes.panel.alumnos.eliminar', [$alumno->id])}}" method="post">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
              </td>
            </tr>
            <tr class="ghost-table" id="tr{{$alumno->id}}">
              <td colspan="4">
                Hola
              {{-- @foreach ($alumno->curso as $curso)
                {{$curso->nombre}} -
              @endforeach --}}
              </td>
            </tr>
            @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
  
@endsection

@section('js')
  <script src="{{asset('js/alumno.js')}}"></script>
@endsection