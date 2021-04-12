@extends('layout')

@section('title','Carrito de compras')

@section('content')

<div class="x_panel">
	<form class="form-group" name="frm-buscar" method="POST" accept-charset="utf-8" >
		@csrf
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-1 col-4 label-align" for="first-name">Buscar producto</label>
			<div class="col-md-6 col-sm-6 ">
					<input type="text" id="parametrosbusqueda" class="form-control" autocomplete="off" placeholder="Digite terminos a consultar" onkeyup="buscar();">
			</div>
		</div>
	</form>
</div>

<div class="x_panel">
	<div class="x_content">
		<div class="" id="datos"></div>
		<div class="row" id="contenido">
				@foreach($productos as $producto)
					<div class="col-md-4 col-sm-6  col-lg-2 col-12">
						<div class="pricing">
							<div class="x_content" id="contenido">
								<div class="">
									<div class="pricing_features">
										<ul class="list-unstyled text-left">
											<div>
												@if($producto->imagenes->count() >= 1)<img src="{{$producto->imagenes->last()->url}}" width="50%" height="40%">@else<span class="fa fa-image fa-7x"></span> @endif
											</div>
										</ul>
									</div>
								</div>
								<div class="pricing_footer ui-ribbon-container">
									<div class="ui-ribbon-wrapper d-none">
										<div class="ui-ribbon">
											30% Off
										</div>
									</div>
									<div class="text-left">
										<label class="" role="">{{$producto->nombre}} </label>
									</div>
									<div class="message_wrapper text-left">
										<label><i class="fa fa-dollar"></i> {{number_format($producto->precio_venta,0,'.','') }}</label><br>
										<label><i class="fa fa-shop"></i> {{$producto->laboratorio->nombre}}</label><br>
										<form method="POST" name="item-car" action="{{route('carrito.vitrina.add')}}">
											@csrf
											<input class="d-none col-9" type="text" name="codigo" id="codigo" value="{{$producto->codigo}}">
											<input class="d-none col-9" type="text" name="nombre" id="nombre" value="{{$producto->nombre}}">
											<input class="d-none col-9" type="text" name="precio" id="precio" value="{{$producto->precio_venta}}">
											<input class="d-none col-9" type="text" name="impuesto" id="impuesto" value="{{$producto->impuesto->tasa}}">
											<input class="d-none col-9" type="number" name="cantidad" id="cantidad" value="1">
											<button class="btn btn-success btn-sm" name="btn_add" value="add"><i class="fa fa-shopping-cart"></i></button>
											<button class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
		</div>
	</div>

	<div class="row">
		<div class="text-right">
			{{$productos->links()}}
		</div>
	</div>
</div>


@endsection

@push('scripts')
	<script type="text/javascript">
		function buscar()
			{
				datos = $('#parametrosbusqueda').val();
			  $.ajax({
			  		data: {parametrosBusqueda:datos},
			      	url: '{{route('carrito.vitrina.buscar')}}',
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
			  	var index =0;
			  	document.getElementById("contenido").innerHTML="";
				  	if(datos.length<=0)
				  	{
				  		var html_content= 'No se encontraron datos';
				  	}else
				  	{
				  		/*+datos[i].imagenes[datos[i].imagenes.length-1].url+*/

			  		for(var i=0; i<datos.length; ++i)

			  		html_content += '<div class="col-md-4 col-sm-6  col-lg-2 col-12"><div class="pricing"><div class="x_content" id="contenido"><div class=""><div class="pricing_features"><ul class="list-unstyled text-left"><div><span class="fa fa-image fa-7x"></span></div></ul></div></div><div class="pricing_footer ui-ribbon-container"><div class="ui-ribbon-wrapper d-none"><div class="ui-ribbon">30% Off</div></div><div class="text-left"><label class="" role="">'+datos[i].nombre+'</label></div><div class="message_wrapper text-left"><label><i class="fa fa-dollar"></i>'+datos[i].precio_venta+'</label><br><label><i class="fa fa-shop"></i> '+datos[i].laboratorio.nombre+'</label><br><form method="POST" name="item-car" action="{{route('carrito.vitrina.add')}}">@csrf<input class="d-none col-9" type="text" name="codigo" id="codigo" value="'+datos[i].codigo+'"><input class="d-none col-9" type="text" name="nombre" id="nombre" value="'+datos[i].nombre+'"><input class="d-none col-9" type="text" name="precio" id="precio" value="'+datos[i].precio_venta+'"><input class="d-none col-9" type="text" name="impuesto" id="impuesto" value="'+datos[i].impuesto.tasa+'"><input class="d-none col-9" type="number" name="cantidad" id="cantidad" value="1"><button class="btn btn-success btn-sm" name="btn_add" value="add"><i class="fa fa-shopping-cart"></i></button><button class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button></form></div></div></div></div></div>';
			  	}
			  		$('#contenido').html(html_content);
			  });

			}
	</script>
@endpush