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
		@foreach($productos as $producto)
			<div class="col-md-4 col-sm-6  col-lg-2 col-12">
				<div class="pricing">

					<div class="x_content" id="contenido">
						<div class="">
							<div class="pricing_features">
								<ul class="list-unstyled text-left">
									<a href=""><img src="./images/picture.jpg" width="100%" height="100%"></a>
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
								<label><i class="fa fa-dollar"></i> {{number_format($producto->precio_venta,2)}}</label><br>
								<label><i class="fa fa-shop"></i> {{$producto->laboratorio->nombre}}</label><br>
								<button class="btn btn-success btn-sm"><i class="fa fa-shopping-cart"></i></button>
								<button class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
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
			  }).done(function(respuesta){
			    alert(respuesta);
			  });
			  console.log();
			}
	</script>



@endpush