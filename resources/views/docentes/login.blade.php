@extends('app')

@section('cont')
    <div class="container my-5">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mb-5">
          <h1 class="text-center">Portal Docentes</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6 py-3 px-5 border border-secondary rounded bdt-principal g-2 text-center">
          <h3>Acceder al Panel</h3>
          @error('credential')
            <h6 class="message-error mt-4">
                {{$message}}
            </h6>
          @enderror
          <form action="{{route('docentes.login')}}" method="post" class="my-5">
            @csrf
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" autofocus>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12">
            @error('email')
            <h6 class="message-error mt-2 mb-3">
                {{$message}}
            </h6>
            @enderror
          </div>
              <div class="col-sm-12 col-md-12 col-lg-12 mb-5">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" >
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12">
            @error('password')
            <h6 class="message-error my-2">
                {{$message}}
            </h6>
            @enderror
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