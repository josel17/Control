@extends('layout')

@section('title','Compras')

@section('content')
<div class="col-lg-6">
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
					@isset($laboratorio->id)
						<form method="POST" action="{{route('almacen.laboratorio.update',$laboratorio)}}">
						@method('PUT')
					@else
						<form method="POST" action="{{route('almacen.laboratorio.store')}}">
					@endif
						@csrf
						<div class="row col-lg-12 col-sm-12 col-xs-12 ">

	              			<!--NOMBRE-->
	              			<div class="row col-md-6 col-sm-6 col-lg-6 " >
			                    <label>Nombre</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
									<input type="text" name="nombre" placeholder="Nombre del laboratorio" value="{{old('nombre',$laboratorio->nombre)}}" class="form-control has-feedback-left  {{ $errors->has('nombre') ? 'is-invalid' : '' }}">
			                      <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>
			                    </div>
							</div>
						</div>
						<div class="row col-lg-12 col-sm-12 col-xs-12 ">
	              			<!--DIRECCION-->
	              			<div class="row col-md-6 col-sm-6 col-lg-6 " >
			                    <label>Pagina Web</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
									<input type="web" name="web" placeholder="Direccion web del laboratorio" value="{{old('web',$laboratorio->web)}}" class="form-control has-feedback-left  {{ $errors->has('web') ? 'is-invalid' : '' }}">
			                      <span class="fa fa-globe-americas  form-control-feedback left blue" aria-hidden="true"></span>
			                    </div>
							</div>
							<!-- EMAIL-->
							<div class="row col-md-6 col-sm-6 col-lg-6 " >
			                    <label>E-mail</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
									<input type="email" name="email" placeholder="E-mail del laboratorio" value="{{old('email',$laboratorio->email)}}" class="form-control has-feedback-left  {{ $errors->has('email') ? 'is-invalid' : '' }}">
			                      <span class="fa fa-envelope  form-control-feedback left blue" aria-hidden="true"></span>
			                    </div>
							</div>
						</div>
						<div class="row col-lg-12 col-sm-12 col-xs-12 ">
							<label>Descripcion</label>
		                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
								<textarea  name="descripcion" placeholder="Descripcion del laboratorio" value="{{old('descripcion',$laboratorio->descripcion)}}" class="form-control" rows="5">{{old('descripcion',$laboratorio->descripcion)}}</textarea>
		                    </div>
						</div>
						<div class="row col-lg-12 col-sm-12 col-xs-12 ">
							<hr>
						</div>

						<div class="row col-lg-12 col-sm-12 col-xs-12">
	              			<!--BUTTON-->
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

@push('scripts')
	<script>
		@if($errors->any())
			toastr.error('Se han presentado errores en el formulario');
		@endif
	</script>
@endpush