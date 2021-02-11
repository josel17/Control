@extends('layout')

@section('title','Crear orden de compra')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>{{$title}}<small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form method="POST" action="{{route('inventario.cargardatos')}}">
              @csrf
              <div class="row col-lg-12 col-sm-12 col-md-12">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <label class="col-lg-12 col-md-12 col-sm-12">
                    Fecha de inventario
                  </label>
                    <fieldset class="col-lg-12 col-sm-12 col-md-12">
                      <div class="control-group">
                        <div class="controls">
                          <div class="col-md-11 col-lg-6 xdisplay_inputx form-group row has-feedback" >
                            <input type="text" name="fecha_movimiento" class="form-control has-feedback-left {{ $errors->has('fecha_movimiento') ? 'is-invalid' : '' }}"  id="single_cal1" placeholder="Fecha Inventario"  value="{{old('fecha_movimiento',date($fecha_movimiento))}}" >
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                          </div>
                          <button class="btn btn-link blue"><div class="fa fa-search"></div></button>
                        </div>
                      </div>
                    </fieldset>
                </div>
              </div>
            </form>
          <div class="p-3"></div>
          <a href="{{route('inventario.guardar')}}" class="btn btn-app">
            <i class="fa fa-save"></i> Cerrar inventario
          </a>

          <table id="datatable-checkbox" class="table table-hover jambo_table bulk_action table-responsive bulk_action" style="width:100%">
            <thead>
              <tr>
                <th style="width: 3%">Codigo</th>
                <th style="width: 22%">Nombre</th>
                <th style="width: 6%">Cant. Actual</th>
                <th style="width: 6%">Cant. fisica</th>
                <th style="width: 6%">Diferencia</th>
                <th style="width: 6%">Difernencia Neta</th>
              </tr>
            </thead>
            <tbody>
              @if(is_null($inventario))
                <tr>
                  <td colspan="6"></td>
                </tr>
              @else
               <tr>
                @foreach($inventario as $item)
                  <tr>
                    <th style="width: 3%">{{$item->codigo_material}}</th>
                    <th style="width: 22%"><a href="#">{{$item->producto->nombre}}</a></th>
                    <th style="width: 6%">{{$item->cantidad_actual}}</th>
                    <th style="width: 6%" class="justify-content-center">{{$item->diferencias['cantidad_fisica']}}</th>
                    <th style="width: 6%">{{$item->diferencias['cantidad_fisica'] - $item->cantidad_actual}}</th>
                    <th style="width: 6%"></th>
                  </tr>
                @endforeach
               </tr>
             @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('styles')
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/moment/min/moment.min.js"></script>
    <script src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
@endpush
