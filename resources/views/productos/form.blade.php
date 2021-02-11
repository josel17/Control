@extends('layout')
@section('title','Crear producto')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="">
		    <div class="page-title">
		      <div class="	">
		        <h3>Modulo productos</h3>
		      </div>
		    </div>
	    	<div class="clearfix"></div>
	    	<div class="row">
	      		<div class="col-md-12 col-sm-12 ">
	        		<div class="x_panel">
	          			<div class="x_title">
		            		<h2>{{$titulo}}</h2>
		            		<ul class="nav navbar-right panel_toolbox">
			              		<li>
			              			<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			              		</li>
			              		<li class="dropdown">
			                		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			                			<i class="fa fa-wrench"></i>
			                		</a>
			                		<ul class="dropdown-menu" role="menu">
				                  		<li>
				                  			<a href="#">Settings 1</a>
				                  		</li>
				                  		<li>
				                  			<a href="#">Settings 2</a>
				                  		</li>
			                		</ul>
			              		</li>
			              		<li>
			              			<a class="close-link"><i class="fa fa-close"></i></a>
			              		</li>
			            	</ul>
		            		<div class="clearfix">
		            		</div>
	          			</div>
	          			<div class="x_content">

	            				@isset($producto->id)
	            					<form method="POST" action="{{route('almacen.producto.update',$producto)}}" name="frmProducto">
	            						@method('PATCH')
	            				@else
	            					<form method="POST" action="{{route('almacen.producto.store')}} ">
			            				@endisset
		            					@csrf
		            					<!--FILA 1 //IMAGENES - DROPZONE-->
		            					<div class="row col-lg-12 col-sm-12 col-xs-12  justify-content-center"   >
		            						<!--GALLERY-->
		            						<div class="row col-md-8 col-sm-4 col-lg-8 " >
		            							@if(is_null($producto->imagenes))
						                    		<img src="./images/image.svg" >
						                    	@else
						                    		  <div class="product_gallery">
								                        @foreach($producto->imagenes as $imagenes)
									                        <a>
									                          <img src="{{$imagenes->url}}" alt="...">
									                        </a>
								                        @endforeach

								                    </div>
							                    @endif
		            						</div>
		            						<!--DROPZONE-->
											<div class="row col-md-4 col-sm-4 col-lg-4 " >
								                <label>Cargar imagenes</label><br>
												@isset($producto->id)
								                	<div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
								                		<a href="#"   data-toggle="modal" data-target=".bs-example-modal-lg"><div class="fa fa-image fa-5x"></div></a>
								                	</div>
												@else
													<div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
														<pre>Registra los datos, para cargar imagenes</pre>
													</div>
												@endif
												</div>
						            	</div>
						            	<!--FILA 2 CODIGO/NOMBRE/REFERENCIA/ESTADO-->
					              		<div class="row col-lg-12 col-sm-12 col-xs-12  justify-content-center">
					              			<!--CODIGO-->
					              			<div class="row col-md-3 col-sm-3 col-lg-3 " >
							                    <label>Codigo</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
													<input type="number" name="codigo" placeholder="Codigo del producto" value="{{$producto->id >0 ? $producto->codigo :  $codigo}}" class="form-control has-feedback-left  {{ $errors->has('codigo') ? 'is-invalid' : '' }}" readonly>
							                      <span class="fa fa-id-card  form-control-feedback left blue" aria-hidden="true"></span>

							                    </div>
											</div>
											<!--NOMBRE -->
											<div class="row col-md-3 col-sm-3 col-lg-3 ">
							                    <label>Nombre</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                      <input type="text" name="nombre" placeholder="Nombre del producto" value="{{ old('nombre',$producto->nombre) }}" class="form-control has-feedback-left  {{ $errors->has('nombre') ? 'is-invalid' : '' }}">
							                      <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>
							                    </div>
											</div>
											<!--REFERENCIA -->
						              		<div class="row col-md-3 col-sm-3 col-lg-3 " >
							                    <label>Referencia</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                      <input type="text" name="referencia" placeholder="Referencia del producto" value="{{ old('referencia',$producto->referencia) }}" class="form-control has-feedback-left  {{ $errors->has('referencia') ? 'is-invalid' : '' }}">
							                      <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>
							                    </div>
								            </div>
								            <!--CATEGORIA -->
								            <div class="row col-md-3 col-sm-3 col-lg-3 " >
							                	<label>Categoria </label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	<select name="id_categoria" class="form-control has-feedback-left custom-select {{ $errors->has('id_categoria') ? 'is-invalid' : '' }}">
							                    		<option value="">Seleccione...</option>
							                    		@foreach($categorias as $categoria)
							                    			<option value="{{$categoria->id}}" {{$producto->id_categoria==$categoria->id || $categoria->id==old('id_categoria') ? 'selected' : ''}}>
							                    				{{$categoria->nombre}}
							                    			</option>
							                    		@endforeach
							                    	</select>
							                      <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>

							                    </div>
											</div>
						            	</div>
						            	<!--FILA 3 PROVEEDOR/REGISTRO SANITARIO/CODIGO EAN/VACIO-->
						            	<div class="row col-lg-12 col-sm-12 col-xs-12  justify-content-center"   >
						            		<!-- PROVEEDOR-->
						            		<div class="row col-md-3 col-sm-3 col-lg-3 " >
							                	<label>Proveedor</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	<select name="id_proveedor" value="" class="form-control has-feedback-left custom-select {{ $errors->has('id_proveedor') ? 'is-invalid' : '' }}">
							                    		<option value="{{old('id_categoria')}}">Seleccione...</option>
							                    		@foreach($proveedores as $proveedor)
							                    			<option value="{{$proveedor->id}}" {{$producto->id_proveedor==$proveedor->id || $proveedor->id==old('id_proveedor') ? 'selected' : ''}} >{{$proveedor->nombre}} </option>
							                    		@endforeach
							                    	</select>
							                     <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>

							                    </div>
											</div>

											<!-- laboratorio-->
											<div class="row col-md-3 col-sm-3 col-lg-3 " >
							                	<label>Laboratorio</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	<select name="id_laboratorio" value="" class="form-control has-feedback-left custom-select {{ $errors->has('id_laboratorio') ? 'is-invalid' : '' }}" >
							                    		<option value="{{old('id_categoria')}}">Seleccione...</option>
							                    		@foreach($laboratorios as $laboratorio)
							                    			<option value="{{$laboratorio->id}}" {{$producto->id_laboratorio==$laboratorio->id || $laboratorio->id==old('id_laboratorio') ? 'selected' : ''}} >{{$laboratorio->nombre}} </option>
							                    		@endforeach
							                    	</select>
							                      <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>

							                    </div>
											</div>
											<!-- REGISTRO SANITARIO-->
											<div class="row col-md-3 col-sm-3 col-lg-3 ">
							                    <label>Registro sanitario</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	 <input type="" name="reg_sanitario" placeholder="Registro sanitario" value="{{ old('reg_sanitario',$producto->reg_sanitario) }}" class="form-control has-feedback-left  {{ $errors->has('reg_sanitario') ? 'is-invalid' : '' }}">
							                      	<span class="fa fa-id-card  form-control-feedback left blue" aria-hidden="true"></span>
							                    </div>
											</div>
								            <!-- CODIGO EAN-->
								            <div class="row col-md-3 col-sm-3 col-lg-3 ">
							                    <label>Codigo EAN</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	 <input type="number" name="ean" placeholder="Codigo de barras" value="{{ old('ean',$producto->ean) }}" class="form-control has-feedback-left  {{ $errors->has('ean') ? 'is-invalid' : '' }}">
							                      	<span class="fa fa-barcode  form-control-feedback left blue" aria-hidden="true"></span>
							                    </div>
											</div>
											<!-- VACIO-->

						            	</div>
						            	<!--FILA 4 PRESENTACION/CONTENIDO/PRESENTACION VENTA/MEDIDA VENTA-->
						            	<div class="row col-lg-12 col-sm-12 col-xs-12  justify-content-center"   >
						            		<!-- PRESENTACION-->
						            		<div class="row col-md-3 col-sm-3 col-lg-3 ">
						            			<label>Presentacion</label>
						            			<div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
						            				<select name="id_presentacion" value="" class="form-control has-feedback-left custom-select {{ $errors->has('id_presentacion') ? 'is-invalid' : '' }}">
						            					<option value="{{old('id_categoria')}}">Seleccione...</option>
							                    		@foreach($presentaciones as $presentacion)
							                    			<option value="{{$presentacion->id}}" {{$producto->id_presentacion==$presentacion->id || $presentacion->id==old('id_presentacion') ? 'selected' : ''}} >{{$presentacion->descripcion}} </option>
							                    		@endforeach
							                    	</select>
							                      	<span class="fa fa-box  form-control-feedback left blue" aria-hidden="true"></span>

							                    </div>
						            		</div>
											<!--CONTENIDO -->
											<div class="row col-md-3 col-sm-3 col-lg-3 " >
						              			<label>Cantidad Emp. primario</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                     	<input type="number" name="contenido" placeholder="Cantidad por caja" value="{{old('contenido',$producto->contenido)}}" class="form-control has-feedback-left  {{ $errors->has('contenido') ? 'is-invalid' : '' }}">
							                      	<span class="fa fa-box  form-control-feedback left blue" aria-hidden="true"></span>
							                    </div>
								            </div>
											<!-- MEDIDA VENTA-->
											<div class="row col-md-3 col-sm-3 col-lg-3 ">
							                    <label>Unidad de medida</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	 <select name="id_ume" value="" class="form-control has-feedback-left custom-select {{ $errors->has('id_ume') ? 'is-invalid' : '' }}">
							                    	 	<option value="">Seleccione...</option>
							                    		@foreach($umes as $ume)
							                    			<option value="{{$ume->id}}"{{$producto->id_ume==$ume->id || $ume->id==old('id_ume') ? 'selected' : ''}} >{{$ume->nombre}}</option>
							                    		@endforeach
							                    	</select>
							                      	<span class="fa fa-box  form-control-feedback left blue" aria-hidden="true"></span>
							                    </div>
											</div>
											<!-- VACIO -->
											<div class="row col-md-3 col-sm-3 col-lg-3 ">

						            		</div>
						            	</div>
						            	<!--FILA 5 PRECIO COMPRA/REGLA IMPUESTO/PRECIO VENTA/VACIO-->
						            	<div class="row col-lg-12 col-sm-12 col-xs-12  justify-content-center" >
						            		<!-- PRECIO COMPRA-->
						            		<div class="row col-md-3 col-sm-3 col-lg-3 ">
							                    <label>Precio de compra</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	 <input type="number" name="precio_compra" placeholder="Precio de compra" value="{{ old('precio_compra',$producto->precio_compra) }}" class="form-control has-feedback-left  {{ $errors->has('precio_compra') ? 'is-invalid' : '' }}" onkeyup="PasarValor();">
							                      	<span class="fa fa-usd  form-control-feedback left blue" aria-hidden="true"></span>
							                    </div>
											</div>
											<!-- REGLA IMPUESTO-->
											<div class="row col-md-3 col-sm-3 col-lg-3 ">
							                    <label>Regla de impuesto</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	<select class="form-control has-feedback-left custom-select {{ $errors->has('id_regla_impuesto') ? 'is-invalid' : '' }}" name="id_regla_impuesto">
							                    		<option value="">Seleccione...</option>
							                    		@foreach($impuestos as $impuesto)
							                    			<option value="{{$impuesto->id}}" {{$impuesto->id==$producto->id_regla_impuesto || $impuesto->id==old('id_regla_impuesto') ? 'selected' : ''}} >{{$impuesto->nombre}}</option>
							                    		@endforeach
							                    	</select>
							                      	<span class="fa fa-donate  form-control-feedback left blue" aria-hidden="true"></span>

							                    </div>
											</div>
											<!-- PRECIO VENTA-->
											<div class="row col-md-3 col-sm-3 col-lg-3 ">
							                    <label>Precio de venta</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	 <input type="number" name="precio_venta" placeholder="Precio de venta" value="{{ old('precio_venta',$producto->precio_venta) }}" class="form-control has-feedback-left  {{ $errors->has('precio_venta') ? 'is-invalid' : '' }}">
							                      	<span class="fa fa-usd  form-control-feedback left blue" aria-hidden="true"></span>

							                    </div>
											</div>
											<!-- VACIO -->
											<div class="row col-md-3 col-sm-3 col-lg-3 " >
							                    <label>Estado</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	<div name="id_estado" class=" {{ $errors->has('id_estado') ? 'is-invalid' : '' }}"> ON: <div class="iradio_flat-green" style="position: relative;">
															<input type="radio" class="flat" required="" data-parsley-multiple="gender" style="position: absolute; opacity: 0;" name="id_estado" value="1" {{ old('id_estado',$producto->id_estado)=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
														</div> OFF: <div class="iradio_flat-green" style="position: relative;">
															<input type="radio" class="flat"  required="" data-parsley-multiple="gender" style="position: absolute; opacity: 0;" name="id_estado" value="2" {{ old('id_estado',$producto->id_estado)=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>
														</div>
							                    	</div>
							                    </div>
											</div>
										</div>

						            	<!--FILA 6 -- DESCRIPCION-->
						            	<div class="row col-lg-12 col-sm-12 col-xs-12  justify-content-center"  >
					              			<div class="row col-md-12 col-sm-12 col-lg-12" >
					              				 <label>Descripcion</label>
							                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
							                    	<textarea name="descripcion" class="form-control" rows="3" placeholder="Descripcion del producto">{{old('descripcion',$producto->descripcion)}}</textarea>
							                    </div>
											 </div>
						            	</div>
						            	<!--FILA 7 BOTONES-->
									    <div class="row col-lg-12 col-sm-12 col-xs-12"  >
									    	<button class="btn btn-success btn-md">
									    		@isset($producto->id)
									    			<li class="fa fa-pencil"></li>
									    			Actualizar
									    		@else
										    		<li class="fa fa-save"></li>
										    		Guardar
										    	@endif
										    </button>
										</div>
							    	</form>

				        </div>
	        		</div>
	      		</div>
	    	</div>
  		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Cargar imagenes</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
         	<div class="">
				@isset($producto->id)
					<form class="dropzone"></form>
				@endif
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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
		@if($errors->any())
			toastr.error('Se han presentado errores en el formulario');
		@endif

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

			function cambiar(thecheckbox, thelabel) {
				var checkboxvar = document.getElementById('id_estado');
				var labelvar = document.getElementById('label');
				if (!checkboxvar.checked) {
					labelvar.innerHTML = "ACTIVO";
					}
					else {
					labelvar.innerHTML = "INACTIVO";
					}
				}


function PasarValor()
{
 		$("#precio_compra").keyup(function () {
            var value = $(this).val();
            $("#precio_venta").val(value);
        });
	/*document.getElementById("precio_venta").val() = document.getElementById("precio_compra").val();*/
}
</script>
@endpush
