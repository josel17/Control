@extends('layout')

@section('content')

 <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center">
              <h1 class="error-number">500</h1>
              @role('Admin')
                <p>Mensaje: {{$exception->getMessage() }} </p>
              @endrole
              <p>Rastreamos estos errores automáticamente, pero si el problema persiste, no dude en contactarnos. Mientras tanto, intente refrescar la pagina. <a href="#">Report this?</a>
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