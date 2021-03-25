@extends('layout')

@section('title','Ver carrito')

@section('content')
<div class="row">
	<div class="x_panel">
		<div class="x_title">
			<h2>Factura No: {{$numero_carrito}}</h2>
			<input type="number" name="numero_factura" id="numero_factura" value="{{$numero_carrito}}" class="d-none">
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="fa fa-wrench"></i>
					</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">Settings</a>
						<a class="dropdown-item" href="#">Settings 2</a>
					</div>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="container-fluid" id="grad1">
			    <div class="row justify-content-center mt-0">
			        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
			            <div class="card col-lg-12 col-md-12 col-sm-12 col-12">
			                <div class="row">
			                    <div class="col-md-12 mx-0">
			                        <form id="msform">
			                        	@csrf
			                            <!-- progressbar -->
			                            <ul id="progressbar">
			                                <li class="active" id="account"><strong>Pedido</strong></li>
			                                <li id="personal"><strong>Resumen de pedido</strong></li>
			                                <li id="payment"><strong>Medio de pago</strong></li>
			                                <li id="confirm"><strong>Facturacion</strong></li>
			                            </ul> <!-- fieldsets -->
			                            <fieldset>
			                               	<div>
												<table class=" table table-bordered	col-sm-11 al col-lg-11 al col-md-11 ">
													<thead class="dark">
														<tr>
															<th style="width: 1%">Codigo</th>
															<th style="width: 30%">Nombre</th>
															<th style="width: 12%">Cantidad</th>
															<th style="width: 12%">Precio ($)</th>
															<th style="width: 12%">Impuesto ($)</th>
															<th style="width: 12%">Sub Total ($)</th>
															<th style="width: 12%">Total ($)</th>
															<th style="width: 5%"></th>
														</tr>
													</thead>
													<tbody>

														@if(session()->exists('carrito') && count(session('carrito'))>0)
														<div class="d-none">{{$item=0}}</div>
															@foreach(session('carrito') as $carrito)
																<tr>
																	<div class="d-none">{{$item=$item+1}}<input type="text" name="impuest_{{$item}}" id="impuest_{{$item}}" value="{{$carrito['impuesto']}}"></div>
																	<th scope="row">{{$carrito['codigo']}}</th>
																	<th><input type="text" name="">{{$carrito['nombre']}}</th>
																	<th><input type="number" name="cantidad_{{$item}}" id="cantidad_{{$item}}" class="form-control" value="{{$carrito['cantidad']}}" onkeyup="calcular_precio({{$item}});"></th>
																	<td><input type="text" name="precio_{{$item}}" id="precio_{{$item}}" value="{{$carrito['precio']}}" class="form-control" @if(Auth()->user()->hasPermissionTo('Edit Prices')) @else  readonly @endif></td>
																	<td><input type="text" name="impuesto_{{$item}}" id="impuesto_{{$item}}" value="{{(($carrito['precio']*$carrito['cantidad'])*$carrito['impuesto'])/100}}" class="form-control form-control-plaintext" readonly="true"></td>
																	<td><input type="text" name="subtotal_{{$item}}" id="subtotal_{{$item}}" value="{{$carrito['precio']*$carrito['cantidad']}}" class="form-control"></td>
																	<td><input type="text" name="total_{{$item}}" id="total_{{$item}}" value="{{$carrito['precio']*$carrito['cantidad']+(($carrito['precio']*$carrito['cantidad'])*$carrito['impuesto'])/100}}" class="form-control"></td>
																	<td><a href="{{route('carrito.remove',$item)}}" role="button"  name="btn_add" value="remove" class="btn btn-link"><span class="fa fa-trash red"></span></a></td>
																</tr>
															@endforeach
																<tr>
																	<th colspan="2">Total Pedido</th>
																	<th><div id="totalcantidad"></div></th>
																	<th><div id=""></div></th>
																	<th><div id="totalimpuesto"></div></th>
																	<th><div id="subtotalfactura"></div></th>
																	<th><div id="totalfactura"></div></th>
																</tr>
														@else
															<tr>
																<td colspan="7">El carrito esta vacio, <a href="{{route('carrito.vitrina.index')}}" class="btn btn-link" style="text-decoration: none;">Regresar para seguir comprando</a></td>
															</tr>
														@endif
													</tbody>
												</table>
			                                </div>
			                                <button type="button" name="next" class="next btn btn-success @if(session()->exists('carrito') && count(session('carrito'))>0)  @else d-none @endif}">Resumen <span class="fa fa-arrow-right"></span></button>
			                            </fieldset>
			                            <fieldset>
			                                <div class="form-card">
			                                	<div class="row">
			                                		<table class="table">
														<thead>
															<tr>
																<th>Codigo</th>
																<th>Producto</th>
																<th>Cantidad</th>
																<th>Precio ($)</th>
																<th>Iva ($)</th>
																<th>Subtotal ($)</th>
																<th>Total ($)</th>
															</tr>
														</thead>
														<tbody>
															@if(session()->exists('carrito'))
																<div class="d-none">{{$item=1}}</div>
															@foreach(session('carrito') as $carrito)
															<tr>
																<th scope="row">{{$item}}</th>
																<td><div id="lblnombre">{{$carrito['nombre']}}</div></td>
																<td><div id="lblcantidad_{{$item}}">{{$carrito['cantidad']}}</div></td>
																<td><div id="lblprecio_{{$item}}">$ {{number_format($carrito['precio'],2,'.','.')}}</div></td>
																<td><div id="lblimpuesto_{{$item}}">$ {{number_format((($carrito['precio']*$carrito['cantidad'])*$carrito['impuesto'])/100,2,'.','.')}}</div></td>
																<td><div id="lblsubtotal_{{$item}}">$ {{number_format($carrito['precio']*$carrito['cantidad'],2,'.','.')}}</div></td>
																<td><div id="lbltotal_{{$item}}">$ {{number_format($carrito['precio']*$carrito['cantidad']+(($carrito['precio']*$carrito['cantidad'])*$carrito['impuesto'])/100,2,'.','.')}}</div></td>
															</tr>
															<div class="d-none">{{$item=$item+1}}</div>
															@endforeach
															<tr>
																<th colspan="2">Total Pedido</th>
																<th><div id="resumentotalcantidad"></div></th>
																<th><div id=""></div></th>
																<th><div id="resumentotalimpuesto"></div></th>
																<th><div id="resumensubtotalfactura"></div></th>
																<th><div id="resumentotalfactura"></div></th>
															</tr>
															@endif
														</tbody>
														</table>
			                                	</div>

			                                </div>
			                                <button type="button" name="previous" class="previous action-button-previous @if(session()->exists('carrito') && count(session('carrito'))>0)  @else d-none @endif}"  value="Previous"><span class="fa fa-arrow-left"></span> Pedido</button>
			                                <button type="button" name="next" class="next btn btn-success @if(session()->exists('carrito') && count(session('carrito'))>0)  @else d-none @endif}">Pago <span class="fa fa-arrow-right"></span></button>
			                            </fieldset>
			                            <fieldset>
			                                <div class="form-card">
			                                    <h2 class="fs-title">Información de pago</h2>
			                                    <table class="table table-bordered">
			                                    	<thead>
			                                    		<tr>
			                                    			<td>
			                                    				<label>Valor factura:</label>
			                                    				<div id="currency_col"></div>
			                                    				<input type="text" name="val_factura" id="val_factura" size="5" class="" style="font-family: Arial; font-size: 30pt;" readonly="true">
			                                    			</td>
			                                    			<td>
			                                    				<label>Efectivo:</label>
			                                    				$ <input type="text" id="val_recibido" id="val_recibido" size="1" style="font-family: Arial; font-size: 30pt;" onkeyup="calcular_cambio();" >
			                                    			</td>
			                                    			<td>
			                                    				<label>Cambio:</label>
			                                    				$ <input type="text" id="val_cambio" size="1" style="font-family: Arial; font-size: 30pt;" readonly="true">
			                                    			</td>
			                                    		</tr>
			                                    	</thead>
			                                    </table>
			                                </div> <button type="button" name="previous" class="previous action-button-previous @if(session()->exists('carrito') && count(session('carrito'))>0)  @else d-none @endif}"  value="Previous"><span class="fa fa-arrow-left"></span> Resumen</button>
			                                @if(session()->exists('carrito') && count(session('carrito'))>0)
			                                <button type="button" class=" next btn btn-success" name="btn_facturar" value="facturar" onclick="facturar({{json_encode(session('carrito'))}});">Facturar <span class="fa fa-arrow-right"></span></button>
			                               	@endif
			                            </fieldset>
			                            <fieldset>
			                                <div class="form-card" id="contenido">

			                                </div>
			                            </fieldset>
			                        </form>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('styles')
<link href="../build/css/custom.min.css" rel="stylesheet">
	<style>
					* {
					    margin: 0;
					    padding: 0
					}

					html {
					    height: 100%
					}

					#grad1 {
					    background-color: : #ffffff;
					}

					#msform {
					    text-align: center;
					    position: relative;
					    margin-top: 20px
					}

					#msform fieldset .form-card {
					    background: white;
					    border: 0 none;
					    border-radius: 0px;
					    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
					    padding: 20px 40px 30px 40px;
					    box-sizing: border-box;
					    width: 94%;
					    margin: 0 3% 20px 3%;
					    position: relative
					}

					#msform fieldset {
					    background: white;
					    border: 0 none;
					    border-radius: 0.5rem;
					    box-sizing: border-box;
					    width: 100%;
					    margin: 0;
					    padding-bottom: 20px;
					    position: relative
					}

					#msform fieldset:not(:first-of-type) {
					    display: none
					}

					#msform fieldset .form-card {
					    text-align: left;
					    color: #9E9E9E
					}

					#msform input,
					#msform textarea {
					    padding: 0px 8px 4px 8px;
					    border: none;
					    border-bottom: 1px solid #ccc;
					    border-radius: 0px;
					    margin-bottom: 25px;
					    margin-top: 2px;
					    width: 100%;
					    box-sizing: border-box;
					    font-family: montserrat;
					    color: #2C3E50;
					    font-size: 16px;
					    letter-spacing: 1px
					}

					#msform input:focus,
					#msform textarea:focus {
					    -moz-box-shadow: none !important;
					    -webkit-box-shadow: none !important;
					    box-shadow: none !important;
					    border: none;
					    font-weight: bold;
					    border-bottom: 2px solid #2A3F54;
					    outline-width: 0
					}

					#msform .action-button {
					    width: 100px;
					    background: #2A3F54;
					    font-weight: bold;
					    color: white;
					    border: 0 none;
					    border-radius: 0px;
					    cursor: pointer;
					    padding: 10px 5px;
					    margin: 10px 5px
					}

					#msform .action-button:hover,
					#msform .action-button:focus {
					    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
					}

					#msform .action-button-previous {
					    width: 100px;
					    background: #616161;
					    font-weight: bold;
					    color: white;
					    border: 0 none;
					    border-radius: 0px;
					    cursor: pointer;
					    padding: 10px 5px;
					    margin: 10px 5px
					}

					#msform .action-button-previous:hover,
					#msform .action-button-previous:focus {
					    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
					}

					select.list-dt {
					    border: none;
					    outline: 0;
					    border-bottom: 1px solid #ccc;
					    padding: 2px 5px 3px 5px;
					    margin: 2px
					}

					select.list-dt:focus {
					    border-bottom: 2px solid #2A3F54
					}

					.card {
					    z-index: 0;
					    border: none;
					    border-radius: 0.5rem;
					    position: relative
					}

					.fs-title {
					    font-size: 25px;
					    color: #2C3E50;
					    margin-bottom: 10px;
					    font-weight: bold;
					    text-align: left
					}

					#progressbar {
					    margin-bottom: 30px;
					    overflow: hidden;
					    color: lightgrey
					}

					#progressbar .active {
					    color: #000000
					}

					#progressbar li {
					    list-style-type: none;
					    font-size: 12px;
					    width: 25%;
					    float: left;
					    position: relative
					}

					#progressbar #account:before {
					    font-family: FontAwesome;
					    content: "\f023"
					}

					#progressbar #personal:before {
					    font-family: FontAwesome;
					    content: "\f007"
					}

					#progressbar #payment:before {
					    font-family: FontAwesome;
					    content: "\f09d"
					}

					#progressbar #confirm:before {
					    font-family: FontAwesome;
					    content: "\f00c"
					}

					#progressbar li:before {
					    width: 50px;
					    height: 50px;
					    line-height: 45px;
					    display: block;
					    font-size: 18px;
					    color: #ffffff;
					    background: lightgray;
					    border-radius: 50%;
					    margin: 0 auto 10px auto;
					    padding: 2px
					}

					#progressbar li:after {
					    content: '';
					    width: 100%;
					    height: 2px;
					    background: lightgray;
					    position: absolute;
					    left: 0;
					    top: 25px;
					    z-index: -1
					}

					#progressbar li.active:before,
					#progressbar li.active:after {
					    background: #2A3F54
					}

					.radio-group {
					    position: relative;
					    margin-bottom: 25px
					}

					.radio {
					    display: inline-block;
					    width: 204;
					    height: 104;
					    border-radius: 0;
					    background: #2A3F54;
					    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
					    box-sizing: border-box;
					    cursor: pointer;
					    margin: 8px 2px
					}

					.radio:hover {
					    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
					}

					.radio.selected {
					    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
					}

					.fit-image {
					    width: 100%;
					    object-fit: cover
				}

				#input{
				  /* Importante definir un width y un height para que no se vaya haciendo más pequeño al disminuir el tamaño */
				  width: 100%;
				  height: 50px;
				}
	</style>



@endpush
@push('scripts')
    <!-- jQuery Smart Wizard -->



<script>
		var factura= new Array();

		var subtotal = 0;
		var total =0;
		var subtotalimpuesto = 0;
		var totalcantidad = 0;
		var totalimpuesto = 0;
		var totalfactura = 0;
		var subtotalfactura =0;

		const options2 = { style: 'currency', currency: 'USD' };
		const numberFormat2 = new Intl.NumberFormat('en-US', options2);


	function formatCurrency (locales, currency, fractionDigits, number) {
	  var formatted = new Intl.NumberFormat(locales, {
	    style: 'currency',
	    currency: currency,
	    minimumFractionDigits: fractionDigits
	  }).format(number);
	  return formatted;
	}

	window.onload=calcular_precio();

	function calcular_precio(idx)
	{

		var subtotal = 0;
		var total =0;
		var subtotalimpuesto = 0;
		var totalcantidad = 0;
		var totalimpuesto = 0;
		var totalfactura = 0;
		var subtotalfactura =0;

		var cantidad = $("#cantidad_" + idx).val();
		var precio = $("#precio_" + idx).val();
		var impuesto = $("#impuest_" + idx).val();


		subtotal = cantidad*precio;

		subtotalimpuesto = (subtotal * impuesto)/100;

		total = subtotalimpuesto+subtotal;
		$("#lblcantidad_" + idx).text(cantidad);


		$("#impuesto_" + idx).val(subtotalimpuesto);
		$("#lblimpuesto_" + idx).text(subtotalimpuesto);


		$("#subtotal_" + idx).val(total);
		$("#lblsubtotal_" + idx).text(total);

		$("#total_" + idx).val(total);
		$("#lbltotal_" + idx).text(total);


		$("input[id^='cantidad_']").each(function() {
        	totalcantidad += Number($(this).val());
       	});

        $("input[id^='impuesto_']").each(function() {
        	totalimpuesto += Number($(this).val());
       	});

        $("input[id^='subtotal_']").each(function() {
        	subtotalfactura += Number($(this).val());
       	});

       $("input[id^='total_']").each(function() {
        	totalfactura += Number($(this).val());
       	});

       $("#totalcantidad").text(totalcantidad);
       $("#totalimpuesto").text(numberFormat2.format(totalimpuesto));
       $("#subtotalfactura").text(numberFormat2.format(subtotalfactura));
       $("#totalfactura").text(numberFormat2.format(totalfactura));

        $("#resumentotalcantidad").text(totalcantidad);
       	$("#resumentotalimpuesto").text(numberFormat2.format(totalimpuesto));
       	$("#resumensubtotalfactura").text(numberFormat2.format(subtotalfactura));
       	$("#resumentotalfactura").text(numberFormat2.format(totalfactura));


       	$("#val_factura").val(formatCurrency("es-CO", "COP", 2, totalfactura));

	}

	function calcular_cambio()
	{
		$("#val_recibido").on({
	    "focus": function (event) {
	        $(event.target).select();
	    },
	    "keyup": function (event) {
	        $(event.target).val(function (index, value ) {
	            return value.replace(/\D/g, "")
	                        .replace(/([0-9])([0-9]{0})$/, '$1')
	                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
	        });

		    }
		});


		var monto = $("#val_recibido").val();
		var valorfactura = $("#val_factura").val();
		var montorecibido = monto.replace(/[$.]/g,'');


		$("#val_cambio").val(formatCurrency("es-CO", "COP", 2,montorecibido-totalfactura));
	}

	function facturar(parametro)
	{
		var monto = $("#val_recibido").val();

		if(monto===null)
		{
			alert("No se ingreso un valor recibido, por lo que se grabara el valor total de la factura como aceptado.");
		}

			var factura = new Array();
			var count = <?php if(session()->exists('carrito') && count(session('carrito'))>0){echo count(session('carrito'));}?>;
			var posicion;
			var item =0;

			var subtotal = 0;
			var subtotalitem = 0;
			var subtotalimpuesto = 0;
			var total=0;

			var totalimpuesto=0;
			var totalfactura=0;

			 $("input[id^='impuesto_']").each(function() {
	        	totalimpuesto += Number($(this).val());
	       	});

			$("input[id^='subtotal_']").each(function() {
	        	subtotal += Number($(this).val());
	       	});
	       $("input[id^='total_']").each(function() {
	        	totalfactura += Number($(this).val());
	       	});

			<?php

			if(session()->exists('carrito') && count(session('carrito'))>0)
			{
				foreach (session('carrito') as $key => $value) {
					?>

					subtotalitem = {{$value['cantidad']}}*{{$value['precio']}};
					subtotalimpuesto = {{(($value['precio']*$value['cantidad'])*$value['impuesto'])/100}}
					total = subtotalitem+subtotalimpuesto;

					factura.push([item,"{{$value['codigo']}}","{{$value['nombre']}}","{{$value['cantidad']}}","{{$value['precio']}}",subtotalitem,subtotalimpuesto,total]);
					item = item+1;
					<?php
				}
			}

			?>

			$.ajax({
				data:{numero:parseFloat("{{$numero_carrito}}"),cliente:1,iva:totalimpuesto,subtotal:subtotal,total:totalfactura,detalle:factura},
				url:baseUrl()+'ventas/grabar',
				type: 'POST',
				dataType: 'json',
				beforeSend: function () {
	                        $("#contenido").html("<div class='text-center'><div class='spinner-border green' role='status'><span class='sr-only'>Loading...</span></div></div>");
					    },
				      	headers: {
						'X-CSRF-TOKEN': '{{ csrf_token()}}'
						}
				  }).done(function(datos){
				  	var html_content ='';
				  	document.getElementById("contenido").innerHTML="";

				  	if(datos.length<=0)
				  	{
				  		var html_content= 'No se encontraron datos';
				  	}else
				  	{
				  		html_content ="<h2 class='fs-title text-center'>Factura Grabada Correctamente!</h2><br><br><div class='row justify-content-center'><div class='col-2 justify-content-center'><span class='fa fa-check-circle fa-9x green justify-content-center'></span></div></div><br><br><div class='row justify-content-center'><div class='col-12 text-center'><h5><a href='{{route('carrito.vitrina.index')}}' class='btn btn-link'>Seguir comprando!</a></h5></div></div>";


				  	}
				  		$('#contenido').html(html_content);
			}).fail( function( jqXHR, textStatus, errorThrown ) {

			  if (jqXHR.status === 0) {

			      $("#contenido").html("<h2 class='fs-title text-center'>Ha ocurrido un error con la conexion, contacte al administrador!</h2><br><br><div class='row justify-content-center'><div class='col-2 justify-content-center'><span class='fa fa-network-wired fa-9x red justify-content-center'></span></div></div><br><br><div class='row justify-content-center'><div class='col-12 text-center'><h5></h5></div></div>");

			  } else if (jqXHR.status == 404) {

			    $("#contenido").html("<h2 class='fs-title text-center'>Pagina no encontrada!</h2><br><br><div class='row justify-content-center'><div class='col-2 justify-content-center'><span class='fa fa-eye-slash fa-9x red justify-content-center'></span></div></div><br><br><div class='row justify-content-center'><div class='col-12 text-center'><h5></h5></div></div>");

			  } else if (jqXHR.status == 500) {

			    $("#contenido").html("<h2 class='fs-title text-center'>Ha ocurrido un error en el servidor!</h2><br><br><div class='row justify-content-center'><div class='col-2 justify-content-center'><span class='fa fa-times-circle fa-9x red justify-content-center'></span></div></div><br><br><div class='row justify-content-center'><div class='col-12 text-center'><h5></h5></div></div>");

			  } else if (textStatus === 'parsererror') {

			    $("#contenido").html("<h2 class='fs-title text-center'>Resuesta incorrecta!</h2><br><br><div class='row justify-content-center'><div class='col-2 justify-content-center'><span class='fa fa-times-circle fa-9x red justify-content-center'></span></div></div><br><br><div class='row justify-content-center'><div class='col-12 text-center'><h5></h5></div></div>");

			  } else if (textStatus === 'timeout') {

			    $("#contenido").html("<h2 class='fs-title text-center'>La respuesta ha tardado mas de lo esperado!</h2><br><br><div class='row justify-content-center'><div class='col-2 justify-content-center'><span class='fa fa-hourglass-end fa-9x red justify-content-center'></span></div></div><br><br><div class='row justify-content-center'><div class='col-12 text-center'><h5></h5></div></div>");

			  } else if (textStatus === 'abort') {

			    $("#contenido").html("<h2 class='fs-title text-center'>Respuesta rechasada!</h2><br><br><div class='row justify-content-center'><div class='col-2 justify-content-center'><span class='fa fa-times-circle fa-9x red justify-content-center'></span></div></div><br><br><div class='row justify-content-center'><div class='col-12 text-center'><h5></h5></div></div>");

			  } else {
			  	$("#contenido").html("<h2 class='fs-title text-center'>Contacte al administrador: <br>"+jqXHR.responseText+"</div>");


			  }

			});

	}


	$(document).ready(function(){

		  $.ajaxSetup({
	          headers: {
	              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	      });

		var current_fs, next_fs, previous_fs; //fieldsets
		var opacity;

		$(".next").click(function(){

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		//Add Class Active
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
		step: function(now) {
		// for making fielset appear animation
		opacity = 1 - now;

		current_fs.css({
		'display': 'none',
		'position': 'relative'
		});
		next_fs.css({'opacity': opacity});
		},
		duration: 600
		});
		});

		$(".previous").click(function(){

		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		//Remove class active
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		//show the previous fieldset
		previous_fs.show();

		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
		step: function(now) {
		// for making fielset appear animation
		opacity = 1 - now;

		current_fs.css({
		'display': 'none',
		'position': 'relative'
		});
		previous_fs.css({'opacity': opacity});
		},
		duration: 600
		});
		});

		$('.radio-group .radio').click(function(){
		$(this).parent().find('.radio').removeClass('selected');
		$(this).addClass('selected');
		});

		$(".submit").click(function(){
		return false;
		})
	});
</script>
@endpush