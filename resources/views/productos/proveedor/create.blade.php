@extends('layout')

@section('title','Compras')

@section('content')
<div class="col-lg-6">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>{{$title}}</h2>
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
					@isset($proveedor->nit)
						<form method="POST" action="{{route('almacen.proveedor.update',$proveedor)}}">
						@method('PUT')
					@else
						<form method="POST" action="{{route('almacen.proveedor.store')}}">
					@endif
						@csrf
						<div class="row col-lg-12 col-sm-12 col-xs-12 ">
							<!-- NIT-->
							<div class="row col-md-6 col-sm-6 col-lg-6 " >
			                    <label>NIT</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
									<input type="number" name="nit" placeholder="NIT del proveedor" value="{{old('nit',$proveedor->nit)}}" class="form-control has-feedback-left  {{ $errors->has('nit') ? 'is-invalid' : '' }}" {{$proveedor->nit ? 'readonly' : ''}}>
			                      <span class="fa fa-id-card  form-control-feedback left blue" aria-hidden="true"></span>
			                      @error('nit')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                      @enderror
			                    </div>
							</div>
	              			<!--CODIGO-->
	              			<div class="row col-md-6 col-sm-6 col-lg-6 " >
			                    <label>Nombre</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
									<input type="text" name="nombre" placeholder="Nombre del proveedor" value="{{old('nombre',$proveedor->nombre)}}" class="form-control has-feedback-left  {{ $errors->has('nombre') ? 'is-invalid' : '' }}">
			                      <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>
			                      @error('nombre')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                      @enderror
			                    </div>
							</div>

						</div>
						<div class="row col-lg-12 col-sm-12 col-xs-12 ">
	              			<!--DIRECCION-->
	              			<div class="row col-md-6 col-sm-6 col-lg-6 " >
			                    <label>Direccion</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
									<input type="text" name="direccion" placeholder="Direccion del proveedor" value="{{old('direccion',$proveedor->direccion)}}" class="form-control has-feedback-left  {{ $errors->has('direccion') ? 'is-invalid' : '' }}">
			                      <span class="fa fa-map  form-control-feedback left blue" aria-hidden="true"></span>
			                      @error('direccion')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                      @enderror
			                    </div>
							</div>
							<!-- TELEFONO-->
							<div class="row col-md-6 col-sm-6 col-lg-6 " >
			                    <label>Telefono</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
									<input type="number" name="telefono" placeholder="Telefono del proveedor" value="{{old('telefono',$proveedor->telefono)}}" class="form-control has-feedback-left  {{ $errors->has('telefono') ? 'is-invalid' : '' }}">
			                      <span class="fa fa-phone  form-control-feedback left blue" aria-hidden="true"></span>
			                      @error('telefono')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                      @enderror
			                    </div>
							</div>
						</div>
						<br>

						<div class="row col-lg-12 col-sm-12 col-xs-12 p-3">
	              			<!--DIRECCION-->
	              			<div class="radio " >
								<label>
									<div class="icheckbox_flat-green " >
										<input name="tipo_proveedor" type="radio" class="flat"
										 value="1" {{$proveedor->tipo_proveedor === 1 ? 'checked' : ''}} >
									</div>
			                	</label>
			              	</div>
			              	<div class="radio " >
								<label>
									<div class="icheckbox_flat-green " >
										<input name="tipo_proveedor" type="radio" class="flat"
										 value="0" {{$proveedor->tipo_proveedor === 0 ? 'checked' : ''}} >
									</div>
			                	</label>
			              	</div>
						</div>
						<div class="row col-lg-12 col-sm-12 col-xs-12 p-3">
	              			<!--DIRECCION-->
	              			<div class="row col-md-6 col-sm-6 col-lg-6 " >
	              				<button class="btn btn btn-success">
	              					<span class="fa fa-save"></span>
	              					Guardar
	              				</button>
	              			</div>
	              		</div>
					</form>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection