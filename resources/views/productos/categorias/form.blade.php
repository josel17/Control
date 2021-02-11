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
					@isset($categoria->id)
						<form method="POST" action="{{route('almacen.categorias.update',$categoria)}}">
						@method('PUT')
					@else
						<form method="POST" action="{{route('almacen.categorias.store')}}">
					@endif
						@csrf
						<div class="row col-lg-12 col-sm-12 col-xs-12 ">
	              			<!--NOMBRES-->
	              			<div class="row col-md-6 col-sm-6 col-lg-6 " >
			                    <label>Nombre</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
									<input type="text" name="nombre" placeholder="Nombre de la categoria" value="{{old('nombre',$categoria->nombre)}}" class="form-control has-feedback-left  {{ $errors->has('nombre') ? 'is-invalid' : '' }}">
			                      <span class="fa fa-tags  form-control-feedback left blue" aria-hidden="true"></span>
			                      @error('nombre')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                      @enderror
			                    </div>
							</div>
							<!-- ESTADO-->
							<div class="row col-md-7 col-sm-7 col-lg-7 " >
			                    <label>Estado</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 has-feedback form-group">
			                    	<div name="id_estado" class=" has-feedback-left form-control {{ $errors->has('id_estado') ? 'is-invalid' : '' }}">
											<label class="form-check form-check-inline">
												<p>
					                            <input class="flat form-check-input" type="radio" name="id_estado" value="1" {{ old('id_estado',$categoria->id_estado)=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
					                                <label id="label"> ON</label>
					                            </p>

					                        </label>
					                        <label class="form-check form-check-inline">
												<p>
					                            <input class="flat form-check-input" type="radio" name="id_estado" value="2" {{ old('id_estado')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
					                                <label id="label"> OFF</label>
					                            </p>

					                        </label>
			                    	</div>
			                      <span class="fa fa-id-card  form-control-feedback left blue" aria-hidden="true"></span>
			                      @error('id_estado')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                      @enderror
			                    </div>
							</div>
						</div>
						<div class="row col-lg-12 col-sm-12 col-xs-12 ">
							<input type="text" name="user_register_id" value="{{Auth()->user()->id}} " class="d-none">
	              			<!--NOMBRES-->
	              			<div class="row col-md-12 col-sm-12 col-lg-12" >
			                    <label>Descripcion</label>
			                    <div class="col-md-12 col-sm-12 col-lg-12 form-group">
									<textarea name="descripcion" placeholder="Descripcion de la categoria"  class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}"></textarea>

			                      @error('descripcion')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                      @enderror
			                    </div>
							</div>
						</div>
						<div class="row col-lg-12 col-sm-12 col-xs-12 ">

	              			<!--BTN-->
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