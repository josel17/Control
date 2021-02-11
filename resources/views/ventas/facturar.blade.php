@extends('layout')
@section('title','Crear orden de compra')

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
          <section class="content">
              <div class="col-lg-12">
                <!--CODIGO-->
                  @csrf
                  <div class="row col-md-6 col-sm-6 col-lg-6 " >
                    <label class="row col-md-12 col-sm-12 col-lg-12 ">No. Documento del cliente</label>
                    <div class="col-md-6 col-sm-6 col-lg-6  has-feedback form-group">
                      <input id="documento" placeholder="No. de documento" class="form-control {{ $errors->has('documento') ? 'is-invalid' : '' }}">
                      @error('documento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg">
                        <span class="fa fa-plus fa-1x"></span>
                    </button>
                  </div>
              </div>
          </section>
            <section id="factura_cuerpo">
              <!-- /.col -->
              <div class="row col-lg-12 col-md-12 col-sm-12 well well-sm">
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                  <table class="" border="0">
                    <tr><td colspan="2"><h5>Proveedor</h5></td></tr>
                    <tr><th>Nombre: </th><td>{{$empresa->nombre}}</td></tr>
                    <tr><th>Nit: </th><td>{{$empresa->nit}} - {{$empresa->digito_verificacion}}</td></tr>
                    <tr><th>Direccion: </th><td>{{$empresa->direccion}}</td></tr>
                    <tr><th>Telfono: </th><td>{{$empresa->telefono}}</td></tr>
                    <tr><th>Email: </th><td>{{$empresa->email}}</td></tr>
                  </table>
                </div>
                        <!-- /.col -->
                          <!-- /.col -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <table class="" border="0">
                    <tr><td colspan="2"><h5>Cliente</h5></td></tr>
                    <tr><th>Nombre: </th><td><nombre></nombre></td></tr>
                    <tr><th>Documento: </th><td><documento></documento></td></tr>
                    <tr><th>Direccion: </th><td><direccion></direccion></td></tr>
                    <tr><th>Telfono: </th><td><telefono></telefono></td></tr>
                    <tr><th>Email: </th><td><email></email></td></tr>
                  </table>
                </div>
                        <!-- /.col -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <table class="" border="0">
                    <tr><td colspan="2"><h5>Factura</h5></td></tr>
                    <tr><th>Numero: </th><td><numero_factura>{{$numero_factura}}</numero_factura></td></tr>
                    <tr><th>Fecha: </th><td>{{$fecha_factura}}</td></tr>
                    <tr><th>Medio de pago: </th><td>Efectivo</td></tr>
                    <tr><th>Fecha vencimiento: </th><td></td></tr>
                  </table>
                </div>
              </div>
                  <!-- /.col -->
              <div class="row col-lg-12 col-sm-12 col-md-12 well well-sm">
                <div class=" col-lg-4 col-md-4 col-sm-4"><input type="text" name="nombre" id="nombre" class="form-control typehead" placeholder="Nombre producto"></div>
                <div class=" col-lg-1 col-md-1 col-sm-1">
                  <div class="easy-autocomplete eac-plate-dark eac-description">
                    <div class="input-group">
                      <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target=".bs-search-modal-lg">
                          <span class="fa fa-plus fa-1x"></span>
                      </button>
                    </div>
                  </div>
                </div>
                <div class=" col-lg-2 col-md-2 col-sm-2">
                  <div class="easy-autocomplete eac-plate-dark eac-description">
                    <div class="input-group">
                      <span class="input-group-addon">#</span>
                      <input type="text" name="cantidad" id="cantidad" class="form-control typehead" placeholder="Cantidad" value="0" onkeyup="calvalor();">
                    </div>
                  </div>
                </div>
                <div class=" col-lg-2 col-md-2 col-sm-2">
                  <div class="easy-autocomplete eac-plate-dark eac-description">
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" id="valor_venta" class="form-control typehead" placeholder="Valor Unit" value="0" readonly>
                    </div>
                  </div>
                </div>
                <div class=" col-lg-2 col-md-2 col-sm-2">
                  <div class="easy-autocomplete eac-plate-dark eac-description">
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="text" id="total" class="form-control typehead" placeholder="Total" value="0" readonly>
                    </div>
                  </div>
                </div>
                <div class=" col-lg-1 col-md-1 col-sm-1">
                  <div class="easy-autocomplete eac-plate-dark eac-description">
                    <div class="input-group">
                      <button class="btn btn-link btn-sm" onclick="addproducto();"><span class="fa fa-plus green"></span></button>
                    </div>
                  </div>
                </div>
              </div>
              <section id="factura_detalle">
                <div class="row col-lg-12 col-sm-12 col-md-12 well well-sm contenido" id="contenido">
                  <div class="row col-lg-12 col-sm-12 col-md-12">
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Codigo" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-4 col-md-4 col-sm-4"><b> <input type="text" name="" value="Descripcion" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Cantidad" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-2 col-md-2 col-sm-1"><b> <input type="text" name="" value="Precio Uni" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Subtotal" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Iva" class="form-control-plaintext"></b></div>
                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> <input type="text" name="" value="Total" class="form-control-plaintext"></b></div>
                  </div>
                </div>

                <div class="row col-lg-12 col-md-12 col-sm-12 p-3">
                  <div class="col-md-8">
                    <p class="lead">Observacion:</p>
                    <textarea class="col-lg-12 well no-shadow" rows="4"></textarea>
                  </div>
                  <div class="col-md-4">
                          <p class="lead">Datos de pago</p>
                    <div class="table-responsive">
                        <table class="table col-lg-12 col-md-12 col-sm-12">
                          <tbody>
                            <tr>
                              <th style="width:35%">Subtotal:</th>
                              <td><subtotal></subtotal></td>
                            </tr>
                            <tr>
                              <th>Iva</th>
                              <td><iva></iva></td>
                            </tr>
                            <tr>
                              <th>Descuento:</th>
                              <td><descuento></descuento></td>
                            </tr>
                            <tr>
                              <th>Total:</th>
                              <td><total></total></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                  </div>
                        <!-- /.col -->
                </div>
                <div class="row no-print col-lg-12 col-md-12 col-sm-12 p-3">
                  <div class=" ">
                   {{--  <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> --}}
                    <button class="btn btn-success" onclick="save();"><i class="fa fa-credit-card"></i> Grabar</button>
                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                  </div>
                </div>
              </section>
          </section>

      </div>
    </div>
  </div>
</div>
@include('partial.modal_form')
@include('partial.modal_form_search')
@endsection

@push('scripts')
<script src="../vendor/easy/jquery.easy-autocomplete.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/factura.js">
</script>
@endpush
