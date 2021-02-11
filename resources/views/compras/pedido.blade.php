@extends('layout')

@section('title','Crear orden de compra')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Modulo Orden de Compra<small>{{ isset($detalle) ? "Modificar datos del pedido" : "Registrar datos del pedido" }}</small></h2>
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
          @if(isset($detalle))
            <form method="POST" action="{{route('compras.orden.update')}}">
              @method('PUT')
          @else
            <form method="POST" action="{{route('compras.orden.procesar')}}">
          @endif
            @csrf
            <div id="datos" class="d d-none">
              <input type="text" class="d d-none" name="orden" value="{{$numero}} ">
              <input type="text" class="d d-none" name="id_empresa" value="{{$cliente->id}}">
              <input type="text" class="" name="id_proveedor" value="{{$proveedor->id}}">
            </div>
            <div class="row col-lg-12 col-md-12 col-sm-12 " >
              <div class="col-lg-6 col-md-6 col-sm-6 ">
                <h4>
                    <i class="fa fa-file-invoice-dollar"></i> Orden de compra: #{{$numero}}
                </h4>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 ">
                <h4>
                  <i class="fa fa-calendar"></i> {!! isset($update_at) ? 'Creado: ' : 'Fecha: '!!} {{ $fecha}}
                  {!! isset($update_at) ? ' <i class="fa fa-calendar"></i> Ultima actualizacion:' . $update_at : ''!!}
                </h4>
              </div>
              <div class="row col-lg-12 col-md-12 col-sm-12 "><hr><br></div>
            </div>
            <!-- info row -->
            <div class="row invoice-info col-lg-12 col-md-12 col-sm-12">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <table class="" border="0">
                  <tr><th colspan="2" class="card-title"><h5 >Proveedor</h5></th></tr>
                  <tr><th>Nombre: </th><td>{{$proveedor->nombre}}</td></tr>
                  <tr><th>Nit: </th><td>{{$proveedor->nit}}</td></tr>
                  <tr><th>Direccion: </th><td>{{$proveedor->direccion}}</td></tr>
                  <tr><th>Telfono: </th><td>{{$proveedor->telefono}}</td></tr>
                  <tr><th>Email: </th><td></td></tr>
                </table>
              </div>
              <!-- /.col -->
              <div class="col-lg-6 col-md-6 col-sm-6">
                <table class="" border="0">
                  <tr><td colspan="2"><h5>Cliente</h5></td></tr>
                  <tr><th>Nombre: </th><td>{{$cliente->nombre}}</td></tr>
                  <tr><th>Nit: </th><td>{{$cliente->nit}} - {{$cliente->digito_verificacion}}</td></tr>
                  <tr><th>Direccion: </th><td>{{$cliente->direccion}}</td></tr>
                  <tr><th>Telfono: </th><td>{{$cliente->telefono}}</td></tr>
                  <tr><th>Email: </th><td>{{$cliente->email}}</td></tr>
                </table>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col d d-none">
                <b>Invoice #007612</b>
                <br>
                <br>
                <b>Order ID:</b> 4F3S8J
                <br>
                <b>Payment Due:</b> 2/22/2014
                <br>
                <b>Account:</b> 968-34567
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Table row -->
            <div class="row col-lg-12 col-md-12 col-sm-12">
              <div class="table">
                <br><br><br>
                <table class="table table-hover jambo_table bulk_action table-responsive ">
                  <thead>
                    <tr>
                      <th style="width: 2%">Codigo</th>
                      <th style="width: 10%">Nombre producto</th>
                      <th style="width: 6%">Reg. Sanitario</th>
                      <th style="width: 2%">Presentacion</th>
                      <th style="width: 1%">Cantidad</th>
                      <th style="width: 6%">Precio Unit</th>
                      <th style="width: 6%">Iva (%)</th>
                      <th style="width: 6%">Subtotal</th>
                      <th style="width: 6%">Neto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <div class="d d-none">{{$item = 0}} </div>
                    @foreach($productos as $producto)
                    <div class="d d-none">{{$item = $item +1}}</div>
                    <input type="text" class="d d-none" name="numero_orden[]" value="{{$numero}} ">
                    <input type="text" class="d d-none" name="valor_total[]" value="{{$proveedor->id}}">
                    <tr>
                      <td><input type="text" name="codigo[]" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="{{$producto->codigo}}"  readonly> </td>
                      <td><input type="text" name="nombre[]" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="{{$producto->nombre}}"  readonly> </td>
                      <td><input type="text" name="registro[]" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="{{$producto->reg_sanitario}}"  readonly> </td>
                      <td><input type="text" name="descripcion[]" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="{{$producto->presentacion->descripcion}}"  readonly> </td>
                      <th><input type="number" id="cantidad_{{$item}}" name="cantidad[]" class="col-lg-12  col-md-12  col-sm-12 numb form-control btn-outline-secondary " required
                         onkeyup="calcularMult('{{$item}}')" value="{{isset($detalle) ? $detalle[$item-1]->cantidad : ''}}" required> </th>
                      <td><input type="text" id="precio_{{$item}}" name="precio[]" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext"
                        value="{{number_format($producto->precio_compra, 2, '.', '')}}" readonly ></td>
                      <td>
                        <input type="number" name="impuesto[]" class="d d-none" value="{{number_format($producto->impuesto->tasa, 2, '.', '')/100}}" id="impuesto_{{$item}}">
                        <input type="text" id="iva_{{$item}}" name="iva[]" class="col-lg-12 col-md-12 col-sm-12 form-control-plaintext"
                        value="{{isset($detalle) ? number_format((($detalle[$item-1]->valor_unitario)*$producto->impuesto->tasa/100)*$detalle[$item-1]->cantidad,2,'.','') : 0.00}}" readonly ></td>
                      <th><input type="text" name="ume[]" id="subtotal_{{$item}}" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="{{isset($detalle) ? number_format(($detalle[$item-1]->valor_unitario)*$detalle[$item-1]->cantidad,0,'.','') : 0}}" readonly > </th>
                      <th><input type="text" name="neto[]" id="neto_{{$item}}" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext " value="{{isset($detalle) ? number_format((($detalle[$item-1]->valor_unitario)*$detalle[$item-1]->cantidad)+(($detalle[$item-1]->valor_unitario)*$producto->impuesto->tasa/100)*$detalle[$item-1]->cantidad,0,'.','') : 0.00}}"  readonly> </th>
                    </tr>
                    @endforeach
                    <tr>
                      <th colspan="4" style="text-align: right; vertical-align: middle;">TOTAL:
                      </th>
                      <td><input type="number" name="cant_total" id="cant_total" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="5" style="background-color: white;" readonly></td>
                      <td colspan="4" ></td>
                    </tr>
                  </tbody>
                </table>
                 <br><br><br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row col-lg-12 col-md-12 col-sm-12">
              <!-- accepted payments column -->
              <div class="col-md-6">
                <p class="lead">Observacion:</p>
                <textarea class="col-lg-12 well no-shadow" rows="4"></textarea>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <p class="lead">Datos de pago</p>
                <div class="table-responsive">
                  <table class="table border">
                    <tbody>
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$<subtotal>0.00</subtotal></td>
                      </tr>
                      <tr>
                        <th>IVA (19%)</th>
                        <td>$<iva>0.00</iva></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$<total>0.00</total>
                          <input type="number" id="total" name="total" class="form-control-plaintext d-none" value="{{number_format(0,0,'.','') }} "></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print col-lg-12 col-md-12 col-sm-12">
              <div class=" ">

                <button class="btn btn-success "><i class="fa fa-save"></i> Guardar</button>
                </form>
                 <button class="btn btn-default" onclick="print();"><i class="fa fa-print"></i> Print</button>
                 <a href="javascript:window.print();">Print page</a>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">

    function print()
    {
      window.print();
    }

    window.onload=calcularMult();

    function calcularMult(idx){

      $("#subtotal_" + idx).val($("#cantidad_" + idx).val() * $("#precio_" + idx).val());
      $("#iva_" + idx).val($("#subtotal_" + idx).val() * $("#impuesto_" + idx).val());
      var neto = parseInt($("#subtotal_" + idx).val()) + parseInt($("#iva_" + idx).val());
      $("#neto_" + idx).val(neto.toFixed(2));



      var sum = 0;
      var iva = 0;
      var cant_total =0;

       $("input[id^='cantidad_']").each(function() {
        cant_total += Number($(this).val());
       });

      $("input[id^='subtotal_']").each(function() {
        sum += Number($(this).val());

       });
      $("input[id^='iva_']").each(function() {
        iva += Number($(this).val());

       });
          $("#cant_total").val(cant_total);
          $("subtotal").text(sum.toFixed(2));
          $("iva").text(iva.toFixed(2));
          total = sum+iva;
          $("total").text(total.toFixed(2));
          $("#total").val(total.toFixed(2));

      }
  </script>
@endpush
