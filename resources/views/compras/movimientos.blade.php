@extends('layout')

@section('title','Ingresar compras')

@section('content')
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Ordenes de compra</h2>
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
    					<div class="row col-lg-12 col-sm-12 col-xs-12">
    						<div class="row col-md-4 col-sm-4 col-lg-4"  >
			                	<label>Numero de orden</label>
			                    <div class="col-md-9 col-sm-9 col-lg-9 has-feedback form-group">
			                    	<input type="number" name="numero_orden" class="form-control has-feedback-left {{ $errors->has('numero_orden') ? 'is-invalid' : '' }}" value="{{old('numero_orden',isset($orden)  ? $orden : '')}}">

			                      <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>
			                      @error('numero_orden')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                      @enderror
			                    </div>
			                    <button name="btn" class="btn btn-link"><li class="fa fa-search"></li></button>
							</div>
		            	</div>
		           	</form>

					@isset($productos)
						<form method="POST" action="{{route('compra.orden.grabar')}} ">
							@csrf
		           			<script>	var cant = {{count($productos)}}; </script>
			           		<div class="row col-lg-12 col-sm-12 col-xs-12 ">
		    						<div class="row col-md-3 col-sm-3 col-lg-3"  >
		    							<input type="number" name="orden" value="{{$orden}}" class="d d-none">
					                	<label>Fecha documento</label>
					                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
					                    	<input type="date" name="fecha" step="1" min="2020-01-01" max="2030-12-31" value="{{old('fecha',$fecha)}}" class="form-control has-feedback-left {{ $errors->has('fecha') ? 'is-invalid' : '' }}">


					                      <span class="fa fa-calendar  form-control-feedback left blue" aria-hidden="true"></span>
					                      @error('fecha')
					                        <span class="invalid-feedback" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                      @enderror
					                    </div>
									</div>
									<div class="col-md-4 col-sm-4 col-lg-4">
					                    <label>Movimiento</label>
					                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
											<select id="tipo_mov" name="tipo_mov" class="form-control has-feedback-left  {{ $errors->has('tipo_mov') ? 'is-invalid' : '' }}"  onchange="movimiento();">
												@foreach($tipo_mov as $mov)
													<option name="tipo" value="{{old('tipo_mov',$mov->tipo_movimiento)}}"> {{$mov->movimiento}}</option>
												@endforeach
											</select>
					                      <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>
					                      @error('tipo_mov')
					                        <span class="invalid-feedback" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                      @enderror
					                    </div>
						            </div>
									<div class="row col-md-4 col-sm-4 col-lg-4"  >
					                	<label>Usuario</label>
					                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
					                    	<input type="text" name="usuario" class="form-control form-control-plaintext {{ $errors->has('usuario') ? 'is-invalid' : '' }}" value="{{old('usuario',Auth()->user()->persona->nombre. " ". Auth()->user()->persona->apellidos)}}" >


					                      @error('usuario')
					                        <span class="invalid-feedback" role="alert">
					                            <strong>{{ $message }}</strong>
					                        </span>
					                      @enderror
					                    </div>
									</div>
				            </div>
			            	<div class="row col-lg-12 col-sm-12 col-xs-12 p-3"></div>

						   	<table class="table table-hover jambo_table bulk_action table-responsive ">
					  			<thead>
					    			<tr>
										<th style="width: 5%">Codigo</th>
										<th style="width: 15%">Nombre producto</th>
										<th style="width: 5%">Proveedor</th>
										<th style="width: 5%">Presentacion</th>
										<th style="width: 5%">Select</th>
										<th style="width: 5%">Cantidad</th>
										<th style="width: 10%">Lote</th>
										<th style="width: 5%">Fecha Vencimiento</th>
										<th style="width: 8%">Mov</th>
				                    </tr>
	              				</thead>
	                  			<tbody>
				                    <div class="d d-none">{{$item = 0}} </div>
				                    @foreach($productos as $producto)
				                    <div class="d d-none">{{$item = $item +1}}</div>
					                    <tr>
				                      <td>
				                      	<input type="text" id="codigo_{{$item}}" name="codigo[]" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="{{$producto->codigo}}" style="background-color: white;" readonly>
				                      </td>
				                      <td><input type="text" id="nombre_{{$item}}" name="nombre[]" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="{{$producto->nombre}}" style="background-color: white;" readonly> </td>
				                      <td><input type="text" id="proveedor_{{$item}}" name="proveedor[]" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="{{$proveedor->nombre}}" style="background-color: white;" readonly> </td>
				                      <td><input type="text" id="presentacion_{{$item}}" name="presentacion[]" class="col-lg-12  col-md-12  col-sm-12 form-control-plaintext" value="{{$producto->presentacion->descripcion}}" style="background-color: white;" readonly> </td>
				                      <td class="align-middle">
				                      		<input class="icheckbox_flat-green CheckedAK green" type="checkbox" id="chk_{{$item}}" name="selected[]" value="{{$producto->codigo}}" onchange="check({{$item}});"  {{$detalle[$item-1]->cantidad === $detalle[$item-1]->cant_recibida ? 'checked disabled="true" ' : ''}} >
				                      </td>
				                      <th><input type="number" id="cantidad_{{$item}}" name="cantidad[]" class="col-lg-12  col-md-12  col-sm-12 form-control" required value="{{isset($detalle) ? $detalle[$item-1]->cantidad - $detalle[$item-1]->cant_recibida : ''}}" required style="background-color: white;" min="0" max="{{$detalle[$item-1]->cantidad - $detalle[$item-1]->cant_recibida}}"> </th>
				                      <td><input type="text" id="lote_{{$item}}" name="lote[]" class="col-lg-12  col-md-12  col-sm-12 form-control" value="" style="background-color: white;" required></td>
				                      <td><input type="date" id="fecha_vto_{{$item}}" name="fecha_vto[]" class="col-lg-12  col-md-12  col-sm-12 form-control" value="" style="background-color: white;" required></td>
					                      <th><input id="mov_{{$item}}" type="text" name="tipo_mov[]" class="col-lg-12  col-md-12  col-sm-12 form-control form-control-plaintext" value="" readonly style="background-color: white;" required></th>
					                    </tr>
				                    @endforeach
				                </tbody>
							</table>

							<div class="row p-4">
					        	 <button class="btn btn-success"><li class="fa fa-save"></li> Ingresar</button>
					        </div>
				        </form>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection


@push('scripts')
	<script type="text/javascript">

	window.onload = movimiento();

	function movimiento()
	{

		var movimiento = $("#tipo_mov").val();

		for (var i = 1; i <= cant; i++) {
			check(i);
			$("#mov_"+i).val(movimiento);
		}
	}

	function check(idx)
	{
	    if ($("#chk_"+idx).is(':checked') && $("#cantidad_"+idx).val()>0){
	        $("#codigo_"+idx).prop( "disabled", false );
	        $("#nombre_"+idx).prop("disabled",false);
	        $("#proveedor_"+idx).prop("disabled",false);
	        $("#presentacion_"+idx).prop("disabled",false);
	        $("#cantidad_"+idx).prop("disabled",false);
	        $("#lote_"+idx).prop("disabled",false);
	        $("#fecha_vto_"+idx).prop("disabled",false);
	        $("#mov_"+idx).prop("disabled",false);
	    } else {
	        $("#codigo_"+idx).prop( "disabled", true );
	        $("#nombre_"+idx).prop("disabled",true);
	        $("#proveedor_"+idx).prop("disabled",true);
	        $("#presentacion_"+idx).prop("disabled",true);
	        $("#cantidad_"+idx).prop("disabled",true);
	        $("#lote_"+idx).prop("disabled",true);
	        $("#fecha_vto_"+idx).prop("disabled",true);
	        $("#mov_"+idx).prop("disabled",true);
	    }
	}
	</script>
@endpush