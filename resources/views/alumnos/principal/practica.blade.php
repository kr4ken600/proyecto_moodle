@extends('alumnos.app')

@section('cont')
  <div class="container py-5">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 bdb-principal mb-5">
        <div class="row justify-content-around">
          <div class="col-sm-8 col-md-8 col-lg-8">
            <h1>Pactica: {{ucfirst($practica->nombre)}}</h1>
          </div>
          <div class="col-sm-4 col-md-4 col-lg-4 text-end">
            <a href="{{route('alumnos.panel.curso', [$curso])}}" class="text-decoration-none btn btn-success">Volver</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 mb-5">
        <h4>Instrucciones</h4>
        <hr>
        <pre>{{$practica->instrucciones}}</pre>
      </div>
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
      <div class="col-sm-12 col-md-12 col-lg-12 mb-5">
        <h4>Estado de la Practica</h4>
        <hr>
        <table class="table">
          <tbody>
            <tr>
              <td>Estado de la entrega</td>
              <td>
                @if (count($entrega) > 0)
                  Entregado
                @else
                  Sin entregar
                @endif
              </td>
            </tr>
            <tr>
              <td>Fecha de entrega</td>
              <td>
                @if (count($entrega) > 0)
                  {{$entrega[0]->created_at}}
                @else
                  Sin entregar
                @endif
              </td>
            </tr>
            <tr>
              <td>Ultima modificacion</td>
              <td>
                @if (count($entrega) > 0)
                  {{$entrega[0]->created_at}}
                @else
                  Sin entregar
                @endif
              </td>
            </tr>
            <tr>
              <td>Archivo entregado</td>
              <td>
                @if (count($entrega) > 0)
                  <a href="{{route('alumnos.panel.archivo', [$entrega[0]->documento])}}" class="text-decoration-none">{{$entrega[0]->documento}}</a>
                @else
                  Sin entregar
                @endif
              </td>
            </tr>
          </tbody>
        </table>
        <form action="{{(count($entrega) > 0 ? route('alumnos.panel.curso.practica.entrega.anulada', [$entrega[0]->id, $entrega[0]->documento]) : route('alumnos.panel.curso.practica.entrega'))}}" class="mb-3" method="post" enctype="multipart/form-data">
          @if (count($entrega) > 0)
          @method('DELETE')
          @endif
          @csrf
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <label class="form-label" for="nombre">Nombre del documento</label>
              <input class="form-control" type="text" id="nombre" name="nombre">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
              <label class="form-label" for="doc">Documento</label>
              <input class="form-control" type="file" id="doc" name="doc" accept="application/pdf">
            </div>
            <div class="col-6 text-center">
            @error('nombre')
                <h6 class="message-error mt-4">
                  {{$message}}
              </h6>
              @enderror
            </div>
            <div class="col-6 text-center">
              @error('doc')
                  <h6 class="message-error mt-4">
                    {{$message}}
                </h6>
                @enderror
              </div>
            <div class="col-sm-12 col-md-12 col-lg-12 my-5">
              <input type="hidden" name="practica" value="{{$practica->id}}">
              @if (count($entrega) > 0)
                <input class="form-control btn btn-danger" type="submit" value="Anular Entrega">
              @else
                <input class="form-control btn btn-primary" type="submit" value="Subir Entrega">
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection