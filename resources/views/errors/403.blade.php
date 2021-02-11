@extends('layout')


@section('content')
<div class="col-md-12">
  <div class="col-middle">
    <div class="text-center text-center">
      <h1 class="error-number">403</h1>
      <h2>Acceso denegado</h2>
      <p class="alert alert-info">Mensaje:  {{ __($exception->getMessage()) }} </p>
      <p>Se requiere permisos adicionales para realizar esta accion<br>
        Si cree que es un error contacte al administrador del sitio
      </p>
    </div>
  </div>
</div>
@endsection