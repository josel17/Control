@extends('layout')

@section('title','Crear orden de compra')

@section('content')
<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Crear nueva orden de compra</h2>
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
				<form method="get" action="{{route('compras.orden.select_proveedor')}} ">
					@csrf
					<div class="row col-lg-12 col-md-12 col-ms-12">
						<div class="col-md-3 col-sm-3 col-lg-3">
		                    <label>Seleccionar proveedor</label>
		                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
								 <select class="form-control has-feedback-left {{ $errors->has('proveedor') ? 'is-invalid' : '' }}" name="proveedor" id="proveedor">
								 	@foreach($proveedores as $item)
  										<option value="{{$item->id}}"
  											@if($proveedor->id === $item->id)
  												selected="selected"
  											@endif>
  											{{$item->nombre}}</option>
  									@endforeach
                              </select>
		                      <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>
		                      @error('referencia')
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                      @enderror
		                    </div>
			            </div>
			            <div class="col-md-3 col-sm-3 col-lg-3">
							<label >.</label>
		                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
									<button class="btn btn-link" style="text-decoration: none;">
										<span class="fa fa-search"></span> Buscar
									</button>
		                    </div>
			            </div>
					</div>
					<div class="row col-lg-12 col-md-12 col-ms-12">
						<div class="col-md-3 col-sm-3 col-lg-3">
							<div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
								<input class="icheckbox_flat-green Checked" type="checkbox" name="list_productos" value="1" @if($all_productos === 1)  @else  checked @endif> <label>Productos especificos del proveedor</label>
							</div>
						</div>
					</div>
				</form>
				<form action="{{route('compras.orden.pedido')}}" method="POST">
					@csrf
						@if(count($productos)<=0)
						@else
							<table id="datatable-checkbox" class="table table-striped jambo_table bulk_action table-responsive bulk_action" style="width:100%">
			                    <thead>
			                       <tr>
			                       		<th style="width: 1%"></th>
			                       		<th style="width: 1%">Item</th>
										<th style="width: 1%">Codigo</th>
										<th style="width: 10%">Nombre</th>
										<th style="width: 10%">Categoria</th>
										<th style="width: 10%">Precio</th>
										<th style="width: 10%">Laboratorio</th>
						    		</tr>
			                    </thead>
			                    <tbody><div class="d-none">{{$no=0}}</div>
									<input class="d d-none" type="number" name="proveedorSelect" value="{{$productos->count()>0 ? $productos[0]->id_proveedor : ''}}">

			                   		@foreach($productos as $producto)
						    			<tr>
						    				<td>
						    					<input class="icheckbox_flat-green CheckedAK" type="checkbox" name="selected[]" value="{{$producto->codigo}}" >
						    				</td>
						    				<td>{{$no = $no +1}}</td>
						      				<td>{{$producto->codigo}}</td>
											<td>
												{{$producto->nombre}}
											</td>
											<td >
												{{ $producto->categoria->nombre}}
											</td>
											<td>
												${{number_format($producto->precio_compra,2) }}
											</td>
											<td >
												{{$producto->proveedor->nombre}}
											</td>
						    			</tr>
						    		@endforeach
			                    </tbody>
			                </table><br>
		            	@endif
	                <p></p>
	                <div class="row col-lg-12 col-md-12 col-sm-12">
	                	<button class="btn btn-success" id="continuar">
	                		Continuar <span class="fa fa-long-arrow-alt-right"></span>
	                	</button>
	                </div>
	            </form>
			</div>
		</div>
	</div>
</div>
@endsection
@push('styles')
	{{-- <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"> --}}

@endpush
@push('scripts')

<script src="../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

	$(document).click(function() { //Creamos la Funcion del Click
  	var checked = $(".CheckedAK:checked").length; //Creamos una Variable y Obtenemos el Numero de Checkbox que esten Seleccionados
  	if(checked===0)
	{
		document.getElementById('continuar').style.display = "none";

	}
	else
	{
		document.getElementById('continuar').style.display = "";
	}
		$("p").text("Se han Seleccionado " + checked + " producto(s)"); //Asignamos a la Etiqueta <p> el texto de cuantos Checkbox ahi Seleccionados(Combinando la Variable)
	})
	.trigger("click"); //Simulamos el Evento Click(Desde el Principio, para que muestre cuantos ahi Seleccionados)

</script>
@endpush