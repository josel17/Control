@extends('layout')

@section('title','Aplicacion')

@section('content')
<div class="">
    <div class="card">
        <div class="card-header">Datos de aplicación</div>
        <div class="card-body">
        	<div class="row col-sm-12 col-md-12 col-lg-6">
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
        				@isset($datos->id)
						<form method="POST" action="{{route('app.datosempresa.update',$datos)}}">
						@method('PUT')
					@else
						<form method="POST" action="{{route('app.datosempresa.store')}}">
					@endif
						@csrf

	        				<div class="row">
	        					<div class="col-lg-12 col-md-12 col-sm-12 ">
			        				<!--NIT-->
			              			<div class="col-md-6 col-sm-12  col-lg-6">
					                    <label>NIT:</label>
										<input type="text" name="nit" placeholder="Numero de identificacion tributario" value="{{old('nit',$datos->nit)}}" class="form-control {{ $errors->has('nit') ? 'is-invalid' : '' }}">
										<div class="invalid-feedback">
							          		@error('nit')
							          			{{$message}}
							          		@enderror
							        	</div>
									</div>
									<!--NOMBRE-->
			              			<div class="col-md-6 col-sm-12  col-lg-6" >
					                    <label>Nombre empresa</label>
										<input type="text" name="nombre" placeholder="Nombre de la empresa" value="{{old('nombre',$datos->nombre)}}" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}">
										<div class="invalid-feedback">
							          		@error('nombre')
							          			{{$message}}
							          		@enderror
							        	</div>
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 ">
									<!--TELEFONO-->
			              			<div class="col-md-6 col-sm-12 col-lg-6" >
					                    <label>Telefono</label>
										<input type="text" name="telefono" placeholder="Telefono" value="{{old('telefono',$datos->telefono)}}" class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}">
										<div class="invalid-feedback">
							          		@error('telefono')
							          			{{$message}}
							          		@enderror
							        	</div>
									</div>
									<!--DIRECCION-->
			              			<div class="col-md-6 col-sm-12 col-lg-6" >
					                    <label>Direccion</label>
										<input type="text" name="direccion" placeholder="Direccion" value="{{old('direccion',$datos->direccion)}}" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}">
										<div class="invalid-feedback">
							          		@error('direccion')
							          			{{$message}}
							          		@enderror
							        	</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 ">
									<!--EMAIL-->
			              			<div class="col-md-6 col-sm-12 col-lg-6" >
					                    <label>Emil</label>
										<input type="text" name="email" placeholder="Email" value="{{old('email',$datos->email)}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
										<div class="invalid-feedback">
							          		@error('email')
							          			{{$message}}
							          		@enderror
							        	</div>
									</div>
								</div>
	        				</div>
	        				<div class="row ">
	        					<div class="col-lg-12 col-md-12 col-sm-12  text-right p-4">
	        						@isset($datos->id)
	        							<button class="btn btn btn-success">
			              					<span class="fa fa-pencil dark"></span>
			              					{{__('Update')}}
			              				</button>
	        						@else
	        							<button class="btn btn btn-success">
			              					<span class="fa fa-save dark"></span>
			              					{{__('Save')}}
			              				</button>
	        						@endif
	        					</div>
	        				</div>
	        			</form>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
	<script>
		@if($errors->any())
			toastr.error('Se han presentado errores en el formulario');
		@endif
	</script>
@endpush