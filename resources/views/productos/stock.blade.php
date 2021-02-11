@extends('layout')

@section('title','Crear orden de compra')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Productos<small></small></h2>
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
          <p class="text text-right">
          <a href="{{route('almacen.producto.create')}} " class="btn btn-success  btn-round" data-target=".bs-example-modal-lg">
              <span class="fa fa-plus"></span>
            </a>
          </p>
          <table id="datatable-checkbox" class="table table-hover jambo_table bulk_action table-responsive bulk_action" style="width:100%">
            <thead>
              <tr>
                <th style="width: 1%">Codigo</th>
                <th style="width: 2%">Imagen</th>
                <th style="width: 15%">Nombre</th>
                <th style="width: 7%">Precio Compra</th>
                <th style="width: 7%">Precio Venta</th>
                <th style="width: 7%">Proveedor</th>
                <th style="width: 6%">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($productos as $producto)
                <form class="form-group" method="POST" action="{{route('almacen.producto.destroy',$producto)}}">
                  @csrf
                  @method('DELETE')
                  <tr>
                    <td>{{$producto->codigo}}</td>
                        <td>@if($producto->imagenes->count() >= 1)<img src="{{$producto->imagenes->first()->url}}" class="avatar">@else<img src="./images/image.svg" class="avatar">@endif</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->precio_compra}}</td>
                    <td>{{$producto->precio_venta}}</td>
                    <td >{{$producto->proveedor->nombre}}</td>
                    <td class="d d-none">
                      @if($producto->id_estado === 1)
                        <a href="#" class="btn  btn-link fa fa-check green" style="text-decoration: none;"></a>
                      @else
                        <a href="#" class="btn  btn-link fa fa-times red" style="text-decoration: none;"></a>
                      @endif
                    </td>
                    <td>
                      <div class="d-none d-sm-block">
                        <a href="{{route('almacen.producto.view',$producto)}} ">
                              <span class="fa fa-eye green fa-1x"></span>
                          </a>
                          <a href="{{route('almacen.producto.show',$producto)}} ">
                              <span class="fa fa-pencil green fa-1x"></span>
                          </a>
                          <button class="btn btn-sm btn-link" onclick="return confirm('¿Estás seguro de querer eliminar este producto?')">
                            <span class="fa fa-trash red fa-1x"></span>
                          </button>
                      </div>
                      <div class="d-md-none">
                          <div class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  <i class="fa fa-wrench"></i>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item green" href="{{route('almacen.producto.view',$producto)}}">
                                      <span class="fa fa-eye green"></span> Ver
                                  </a>
                                  <a  class="dropdown-item green" href="{{route('almacen.producto.show',$producto)}} ">
                                      <span class="fa fa-pencil green"></span> Actualizar
                                  </a>
                                   <button class="btn btn-sm btn-link dropdown-item " onclick="return confirm('¿Estás seguro de querer eliminar este producto?')">
                                <span class="fa fa-trash red fa-2x"></span>
                              </button>
                              </div>
                          </div>
                      </div>
                    </td>
                  </tr>
                </form>
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