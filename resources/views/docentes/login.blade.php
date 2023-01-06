@extends('app')

@section('cont')
    <div class="container my-5">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mb-5">
          <h1 class="text-center">Portal Docentes</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6 py-3 px-5 border border-secondary rounded bd-principal g-2 text-center">
          <h3>Acceder al Panel</h3>
          <form action="{{route('alumnos.login')}}" method="post" class="my-5">
            @csrf
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <label for="correo" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="correo" id="correo" value="{{old('correo')}}" autofocus>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12 mb-5">
                <label for="passwd" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="passwd" id="passwd" >
              </div>
              <div class="col-12">
                <input type="submit" class="form-control btn btn-primary" value="Entrar">
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection