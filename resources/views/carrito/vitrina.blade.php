@extends('layout')

@section('title','Carrito de compras')

@section('content')
{{setlocale(LC_MONETARY, 'it_IT')}}
<div class="x_panel">
	Carrito(0)
</div>
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
											<div><img src="./images/picture.jpg" width="100%" height="40%"></div>
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
											<input class="d-none col-9" type="text" name="id" id="id" value="{{$producto->id}}">
											<input class="d-none col-9" type="text" name="nombre" id="nombre" value="{{$producto->nombre}}">
											<input class="d-none col-9" type="text" name="precio" id="precio" value="{{$producto->precio_venta}}">
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
                        $("#resultado").html("Procesando, espere por favor...");
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
			  		for(var i=0; i<datos.length; ++i)

			  		html_content += '<div class="col-md-4 col-sm-6  col-lg-2 col-12"><div class="pricing"><div class="x_content" id="contenido"><div class=""><div class="pricing_features"><ul class="list-unstyled text-left"><a href=""><img src="./images/picture.jpg" width="100%" height="100%"></a></ul></div></div><div class="pricing_footer ui-ribbon-container"><div class="ui-ribbon-wrapper d-none"><div class="ui-ribbon">30% Off</div></div><div class="text-left"><label class="" role="">'+datos[i].nombre+'</label></div><div class="message_wrapper text-left"><label><i class="fa fa-dollar"></i> '+new Intl.NumberFormat("en-IN").format(datos[i].precio_venta)+'</label><br><label><i class="fa fa-shop"></i> '+datos[i].laboratorio.nombre+'</label><br><form action="{{route('carrito.vitrina.add')}}" method="POST" name="item-car">@csrf<input class=" col-9" type="text" name="id" id="id" value="'+datos[i].id+'"><input class=" col-9" type="text" name="nombre" id="nombre" value="'+datos[i].nombre+'"><input class=" col-9" type="text" name="precio" id="precio" value="'+datos[i].precio_venta+'"><input class=" col-9" type="number" name="cantidad" id="cantidad" value="1"><button class="btn btn-success btn-sm" name="btn_add" value="add"><i class="fa fa-shopping-cart"></i></button><button class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button></form></div></div></div></div></div>';
			  	}
			  		$('#contenido').html(html_content);
			  });
			  console.log();
			}
	</script>
@endpush