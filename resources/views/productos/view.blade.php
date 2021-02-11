@extends('layout')
@section('title','Crear producto')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="">
		    <div class="page-title">
		      <div class="	">
		        <h3>{{$producto->nombre}} </h3>

		      </div>
		    </div>
	    	<div class="clearfix"></div>
	    	<div class="row">
	      		<div class="col-md-12 col-sm-12 ">
	        		<div class="x_panel">
		                <div class="x_title">
		                    <h2>Vista detallada de {{$producto->nombre}} </h2>
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
		                    <div class="col-md-7 col-sm-7 ">
		                    	@if(is_null($producto->imagenes))
		                    		<img src="./images/image.svg" >
		                    	@else
				                    <div class="product-image">
				                    	@if($producto->imagenes->count() >= 1)

											<img src="{{$producto->imagenes->first()->url}}" alt="...">
										@else
											{{$producto->imagenes->count()}}
										@endif
				                    </div>
			                    @endif
			                    <div class="product_gallery">
			                        @foreach($producto->imagenes as $imagenes)
				                        <a>
				                          <img src="{{$imagenes->url}}" alt="...">
				                        </a>
			                        @endforeach

			                    </div>
		                    </div>
		                    <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

		                      <h3 class="prod_title">{{$producto->nombre." - ".$producto->proveedor->nombre}} </h3>

		                      <p>{{$producto->descripcion}} </p>
		                      <br>

		                      <div class="">
		                        <h2>Presentacion disponible</h2>
		                        <ul class="list-inline prod_color display-layout">
		                          <li>
		                            <p>Jarabe</p>
		                          </li>
		                          <li>
		                            <p>Capsulas</p>
		                          </li>
		                        </ul>
		                      </div>
		                      <br>

		                      <div class="">
		                        <small>Medida</small>
		                        <ul class="list-inline prod_size display-layout">
		                          <li>
		                            <button type="button" class="btn btn-default btn-xs"><pre>{{$producto->medida}}</pre></button>
		                          </li>
		                          <li>
		                            <button type="button" class="btn btn-default btn-xs">Medium</button>
		                          </li>
		                          <li>
		                            <button type="button" class="btn btn-default btn-xs">Large</button>
		                          </li>
		                          <li>
		                            <button type="button" class="btn btn-default btn-xs">Xtra-Large</button>
		                          </li>
		                        </ul>
		                      </div>
		                      <br>

		                      <div class="">
		                        <div class="product_price">
		                          <h1 class="price">$10.000</h1>
		                          <span class="price-tax">IVA: 19%</span>
		                          <br>
		                        </div>
		                      </div>

		                      <div class="d-none">
		                        <button type="button" class="btn btn-default btn-lg">Add to Cart</button>
		                        <button type="button" class="btn btn-default btn-lg">Add to Wishlist</button>
		                      </div>

		                      <div class="product_social d-none">
		                        <ul class="list-inline display-layout">
		                          <li><a href="#"><i class="fa fa-facebook-square"></i></a>
		                          </li>
		                          <li><a href="#"><i class="fa fa-twitter-square"></i></a>
		                          </li>
		                          <li><a href="#"><i class="fa fa-envelope-square"></i></a>
		                          </li>
		                          <li><a href="#"><i class="fa fa-rss-square"></i></a>
		                          </li>
		                        </ul>
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
    <!-- Dropzone.js -->
    <link href="../vendor/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
@endpush

@push('scripts')
	<!-- Dropzone.js -->
	<script src="../vendor/dropzone/dist/min/dropzone.min.js"></script>
	<script src="../vendor/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
	<script type="text/javascript">

		var dropzone = new Dropzone('.dropzone',
		{
			url: '/productos/{{$producto->id}}/imagen',
			paramName: 'imagen',
			acceptedFiles: 'image/*',
			maxFilesize: 2,
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token()}}'
			},

			dictDefaultMessage:'<small>Subir las imagenes que representen el producto, recuerde que solo puedes subir imagenes que no superen 2048 Kb o 2MB de peso, en formatos jpeg, png, gif, svg</small>',
			dictInvalidFileType: 'No puedes subir este tipo de archivos'
		});

		dropzone.on('error', function(file, res){
			var msg = res.errors.imagen[0];
			$('.dz-error-message:last > span').text(msg);
		});

		Dropzone.autoDiscover = false;
	</script>
@endpush

	<div class="d-none">
		@isset($producto->id)
			<form class="dropzone"></form>
			<form class="dropzone"></form>
		@else
			<div class="img"></div>
		@endif
	</div>