@extends('layout')

@section('title','Ingresar compras')

@section('content')
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>{{$titulo}}</h2>
					<ul class="nav navbar-right panel_toolbox">
				  		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				  		</li>
				  		<li class="dropdown">
				    		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				    			<i class="fa fa-wrench"></i>
				    		</a>
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
					<form class="form-group" method="POST" action="{{route('compra.orden.buscar')}}">
						 @csrf
						<div class="row col-lg-12 col-sm-12 col-md-12">
			            	<div class="col-lg-3 col-md-3 col-sm-4">
		                 		<p class="col-lg-12 col-md-12 col-sm-12">
									Tipo actividad
								</p>
						   		<fieldset class="col-lg-12 col-sm-12 col-md-12">
										<select class="form-control has-feedback-left {{ $errors->has('actividad') ? 'is-invalid' : '' }}" name="actividad" id="actividad">
											<option value="1" {{ old('actividad') ? 'select' : '' }}>Factura</option>
										</select>
				                        <span class="fa fa-clipboard-check form-control-feedback left d d-none-sm" aria-hidden="true"></span>
	                        	</fieldset>
	                 		</div>
			            	<div class="col-lg-3 col-sm-3 col-sm-4">
		                 		<p class="col-lg-12 col-md-12 col-sm-12">
									Fecha contable
								</p>
							   	<fieldset class="col-lg-12 col-sm-12 col-md-12">
									<input type="date" name="fecha_contable" class="form-control has-feedback-left {{ $errors->has('fecha_contable') ? 'is-invalid' : '' }}" placeholder="Fecha contable"  value="{{old('fecha_contable')}}">
									<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
		                        </fieldset>
	 	                 	</div>
			            	<div class="col-lg-3 col-sm-3 col-sm-4">
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
									Referencia
								</p>
								<fieldset class="col-lg-12 col-sm-12 col-md-12">
									<input type="text" name="referencia" class="form-control has-feedback-left {{ $errors->has('referencia') ? 'is-invalid' : '' }}" placeholder="Numero de factura"  value="{{old('referencia')}}">
									<span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
								</fieldset>
			            	</div>
			            </div>
		            	<div class="p p-5"></div>
		            	<hr>
		            	<div class="row col-lg-12 col-sm-12 col-md-12">
			            	<div class="col-lg-3 col-sm-3 col-sm-4" >
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
									Importe
								</p>
						   		<fieldset class="col-lg-12 col-sm-12 col-md-12">
									<input class="form-control has-feedback-left {{ $errors->has('importe') ? 'is-invalid' : '' }}" name="importe" id="importe" type="text" value="{{old('importe')}}">
									<span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
	                        	</fieldset>
			            	</div>
			            	<div class="col-lg-3 col-md-3 col-sm-4" >
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
									Cal. Impuesto
								</p>
								<fieldset class="col-lg-2 col-md-2 col-sm-2 col-xs-8">
									<div class=" form-group row ">
										<ul class="to_do">
											<li>
												<p>
													<input id="chk_impuesto" type="checkbox" class="icheckbox_flat-green" {{old('chk_impuesto') ? 'checked' : ''}}>
												</p>
											</li>
										</ul>
									</div>
	                        	</fieldset>
	                        	<div class="col-lg-10 col-md-10 col-sm-10 d d-none" id="impuesto">
		                        	<input type="text" name="impuesto" class="form-control has-feedback-left {{ $errors->has('impuesto') ? 'is-invalid' : '' }}" placeholder="Valor Impuesto"  value="{{old('impuesto')}}">
		                        	<span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
 	                 			</div>
			            	</div>
			            	<div class="col-md-3 col-lg-3 col-sm-4" >
			                   	<p class="col-lg-12 col-md-12 col-sm-12">Condiciones de pago</p>
			                    <fieldset class="col-lg-12 col-sm-12 col-md-12">
									<div class="form-group col-lg-6 col-sm-6 col-md-6" >
										<ul class="to_do">
											<li>
												<p>
													<input type="radio" class="flat" style="position: absolute; opacity: 0;" name="condi_pago" value="1" {{old('condi_pago') ? 'checked' : ''}}>
													Contado
												</p>
											</li>
										</ul>
									</div>
									<div class="form-group col-lg-6 col-sm-6 col-md-6" >
										<ul class="to_do">
											<li>
												<p>
													<input type="radio" class="flat" style="position: absolute; opacity: 0;" name="condi_pago" value="2" {{old('condi_pago') ? 'checked' : ''}}>
													Credito
												</p>
											</li>
										</ul>
									</div>
			                    </fieldset>
							</div>
						</div>
							<div class="col-lg-4 col-sm-4 col-sm-4" >
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
									Datos del pedido
								</p>
						   		<fieldset class="col-lg-9 col-sm-9 col-md-9">
									<input class="form-control {{ $errors->has('importe') ? 'is-invalid' : '' }}" name="no_pedido" id="no_pedido" value="{{old('no_pedido')}}">
	                        	</fieldset>
	                        	<button class="btn btn-link"><li class="fa fa-search"></li></button>
			            	</div>
						<div class="p p-5"></div>

		            	<div class=" col-lg-12 col-sm-12 col-xs-12 p p-5">
		            		<div class="col-lg-12 col-md-12 col-sm-12" >
	                 			<p class="col-lg-12 col-md-12 col-sm-12">
	                 				<div class="row col-lg-12 col-sm-12 col-md-12">
					                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> Codigo </b></div>
					                    <div class=" col-lg-3 col-md-3 col-sm-3"><b> Descripcion </b></div>
					                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> Cant. </b></div>
					                    <div class=" col-lg-2 col-md-2 col-sm-2"><b> Precio Uni </b></div>
					                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> Subtotal </b></div>
					                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> Iva </b></div>
					                    <div class=" col-lg-1 col-md-1 col-sm-1"><b> Total </b></div>
					                  </div>
									<div id="contenido" class="contenido table table-hover">

									</div>
								</p>
 	                 		</div>
		            	</div>

						<div class="p p-5"></div>
		            	<hr>
		            	<div class="col-lg-5 col-sm-5 col-xs-5">
		            		<div class="col-lg-12 col-md-12 col-sm-12" >
						   		<fieldset class="col-lg-10 col-sm-10 col-md-10">
									<div class="control-group">
										<div class="controls">
											<div class="xdisplay_inputx form-group row has-feedback col-sm-6 col-lg-6 col-md-6" >
												<button class="btn btn-success btn-md"><li class="fa fa-save"></li> Guardar</button>
											</div>
											<div class="xdisplay_inputx form-group row has-feedback col-sm-6 col-lg-6 col-md-6" >
												<a href="" class="btn btn-danger btn-md"><li class="fa fa-times"></li> Cancelar</a>
											</div>
										</div>
									</div>
	                        	</fieldset>
 	                 		</div>
		            	</div>
		           	</form>

				</div>
			</div>
		</div>
	</div>
@endsection
@push('styles')
    <!-- bootstrap-daterangepicker -->
    <link href="../vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="../vendor/iCheck/skins/flat/green.css" rel="stylesheet">
@endpush
@push('scripts')
	<script src="../vendor/iCheck/icheck.min.js"></script>
	<script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  	<script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/moment/min/moment.min.js"></script>
    <script src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="../vendor/easy/jquery.easy-autocomplete.min.js" type="text/javascript"></script>


    <script>
    	 $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    	 var item =0;
    	 __clienteAutocomplete();
    	 function __clienteAutocomplete()
          {
             var options = {
              url: function (phrase) {
                  return baseUrl()+'buscarpedido/'+phrase;
                },
               getValue: "orden",

                template: {
                    type: "orden",
                    fields: {
                        description: "nombre"
                    }
                },

                list: {
                    match: {
                        enabled: false
                    },
                    onKeyEnterEvent: function() {
                        var e = $("#no_pedido").getSelectedItemData();

                    },
                    onClickEvent: function() {
                       var e = $("#no_pedido").getSelectedItemData();
                       $('.contenido').empty();
                       var item = 1;

						for (const prop in e)
						{
							div = '<div class="row col-lg-12 col-sm-12 col-md-12" id="item_'+item+'">';
							div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+e.codigo_material+'" class="form-control-plaintext" readonly></div>';
							div+= '<div class="col-lg-3 col-md-3 col-sm-3"> <input type="text" name="" value="'+e.nombre+'" class="form-control-plaintext" readonly></div>';
							div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+e.cantidad+'" class="form-control-plaintext" readonly></div>';
							div+= '<div class="col-lg-2 col-md-2 col-sm-2"> <input type="text" name="" value="'+e.precio_compra+'" class="form-control-plaintext" readonly></div>';
							div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+parseFloat(e.cantidad,1) * parseFloat(e.precio_compra,1)+'" class="form-control-plaintext" readonly></div>';
							div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+e.cantidad+'" class="form-control-plaintext" readonly></div>';
							div+= '<div class="col-lg-1 col-md-1 col-sm-1"> <input type="text" name="" value="'+e.cantidad+'" class="form-control-plaintext" readonly></div>';
							div+= '</div>';
				             $('.contenido').append(div);

						}


                    },
                    showAnimation: {
                          type: "slide", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        },

                        hideAnimation: {
                          type: "slide", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                        }
                },
                autoSelect: true,

                theme: "plate-dark"
             };
             $("#no_pedido").easyAutocomplete(options);
          }



    	$('#chk_impuesto').on('click',function(){
		    if($(this).is(':checked')){
		        // Hacer algo si el checkbox ha sido seleccionado
		         $('#impuesto').removeClass("d d-none").addClass("d");
		    } else {
		        // Hacer algo si el checkbox ha sido deseleccionado
		        $('#impuesto').removeClass("d").addClass("d d-none");
		    }
		});

    	@if($errors->any())
			@foreach($errors->all() as $error)
              	toastr.error('{{$error}}')
			@endforeach
		@endif

    </script>
@endpush