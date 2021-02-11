@extends('layout')

@section('content')
<div class="col-md-12">
  <div class="col-middle">
    <div class="text-center text-center">
      <h1 class="error-number">404</h1>
      @role('Admin')
        <p>Mensaje: {{$exception->getMessage() }} </p>
      @endrole
      <h2>Lo sentimos pero no pudimos encontrar esta pagina</h2>
      <p>Esta pagina que busca no existe <a href="#">Report this?</a>
      </p>
      <div class="mid_center">
        <h3>Search</h3>
        <form>
          <div class="  form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                  </span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection