@extends('docentes.panel.panel')

@section('panel')

<h1 class="text-center border-buttom bdb-principal pb-3 mb-5">Docentes</h1>
<div class="row justify-content-center">
  <div class="col-sm-12 col-md-12 .col-lg-12 mb-3">
    <div class="d-grid -gap1">
      <button class="text-decoration-none btn btn-success" id="addDocente">Agregar Docente</button>
    </div>
  </div>
  <div id="formDocente" class="ghost col-sm-12 col-md-10 .col-lg-10 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center mb-5">
    <form action="{{route('docentes.panel.docentes.crear')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="nombre" class="form-label">Nombre del Docente</label>
          <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" autofocus>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="apellido" class="form-label">Apellido del Docente</label>
          <input type="text" class="form-control" name="apellido" value="{{old('apellido')}}">
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="correo" class="form-label">Correo del Docente</label>
          <input type="email" class="form-control" name="correo" value="{{old('correo')}}">
        </div>
        <div class="col-sm-12 col-md-5 col-lg-6 mb-3">
          <label for="passwd" class="form-label">Contraseña del Docente</label>
          <input type="password" class="form-control" name="passwd" value="{{old('passwd')}}">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
          <button type="submit" class="form-control btn btn-success">Agregar</button>
        </div>
      </div>
    </form>
  </div>
  <h1 class="text-center border-buttom bdb-principal pb-3 mb-5">Lista Docentes</h1>
  @if (session('message'))
    <div class="col-12">
      <div class="alert alert-primary" role="alert">
        {{session('message')}}
      </div>
    </div>
  @endif
  @if (session('messageD'))
    <div class="col-12">
      <div class="alert alert-danger" role="alert">
        {{session('messageD')}}
      </div>
    </div>
  @endif
  <div class="col-sm-12 col-md-12 col-lg-12 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center mb-5">
    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo Electronico</th>
          <th>Cursos</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
    @if (!empty($docentes))
          @foreach ($docentes as $docente)
          <tr>
            <td>{{ucfirst($docente->nombre)}} {{ucfirst($docente->apellido)}}</td>
            <td>{{$docente->email}}</td>
            <td>
              <a href="#" class="text-decoration-none btn-table" data-btn="{{$docente->id}}">{{count($docente->curso)}}</a>
            </td>
            <td>
              <form action="{{route('docentes.panel.docentes.eliminar', [$docente->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
            </td>
          </tr>
          <tr class="ghost-table" id="tr{{$docente->id}}">
            <td colspan="4">
            @foreach ($docente->curso as $curso)
              {{$curso->nombre}} -
            @endforeach
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
  <script src="{{asset('js/docentes.js')}}"></script>
@endsection