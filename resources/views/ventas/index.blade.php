@extends('layout')
@section('title','Control - Facturas')

@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Factura <small>Facturacion para cliente</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li>
              <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
        <table id="datatable-checkbox" class="table table-hover jambo_table bulk_action table-responsive bulk_action" style="width:100%">
            <thead>
              <tr>
                <th style="width: 1%">Item</th>
                <th style="width: 5%">Numero</th>
                <th style="width: 25%">Cliente</th>
                <th style="width: 10%">Valor</th>
                <th style="width: 15%">Iva</th>
                <th style="width: 15%">subtotal</th>
                <th style="width: 15%"></th>
              </tr>
            </thead>
            <tbody>

              @foreach($facturas as $factura => $value)
                <tr>
                  <td></td>
                  <td>{{$value->numero}}</td>
                  <td>{{$value->cliente[0]->nombre." ".$value->cliente[0]->apellidos}}</td>
                  <td>$ {{number_format($value->total,2)}}</td>
                  <td>$ {{number_format($value->iva,2)}}</td>
                  <td>$ {{number_format($value->subtotal,2)}}</td>
                  <td><a href="{{route('pdf.generar',$value->numero)}}"><span class="far fa-file-pdf red fa-1x"></span></a></td>
                </tr>
              @endforeach
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

@endpush
@push('scripts')
    <script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
@endpush