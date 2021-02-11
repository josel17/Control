@extends('layout')

@section('title','Roles')

@section('content')

<div class="row ">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		@isset($role->name)
			<form action="{{route('persona.usuarios.roles.update',$role)}}" method="POST">
			@method('PATCH')
		@else
			<form action="{{route('persona.usuarios.roles.store')}}" method="POST">
		@endif
			@csrf
			<div class="x_panel">
				<div class="x_title">
		        	<h2>Role</h2>
		        	<ul class="nav navbar-right panel_toolbox">
		          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		          </li>
		          <li><a class="close-link"><i class="fa fa-close"></i></a>
		          </li>
		        	</ul>
		        	<div class="clearfix"></div>
		      	</div>
		      	<div class="x_content">
		        	<br>
			        	<div class="row">
							<div class="col-md-6 col-sm-6  form-group has-feedback">
								 <div class="mb-3">
			                        <label>Identificador</label>
			                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
			                          <input type="text" name="name" placeholder="Identificador" value="{{old('name',$role->name)}}" class="flat form-control has-feedback-left {{ $errors->has('name') ? 'is-invalid' : '' }}"
			                          @isset($role->name)  readonly @else @endif >
			                          <span class="fa fa-id-card-alt  form-control-feedback left blue" aria-hidden="true"></span>
			                          @error('name')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                          @enderror
			                        </div>
			                      </div>
				          	</div>
				          	<div class="col-md-6 col-sm-6  form-group has-feedback">
								 <div class="mb-3">
			                        <label>Nombre</label>
			                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
			                          <input type="text" name="display_name" placeholder="Nombre del Role" value="{{old('display_name',$role->display_name)}}" class="flat form-control has-feedback-left {{ $errors->has('display_name') ? 'is-invalid' : '' }}" >
			                          <span class="fa fa-user-tag  form-control-feedback left blue" aria-hidden="true"></span>
			                          @error('display_name')
			                            <span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                          @enderror
			                        </div>
			                      </div>
				          	</div>
			          		<div class="col-md-6 col-sm-6  form-group has-feedback">
								<div class="mb-3">
			                        <label>Guard</label>
			                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
			                          	<select class="flat form-control has-feedback-left {{ $errors->has('guard_name') ? 'is-invalid' : '' }}" name="guard_name">
			                          		@foreach(config('auth.guards') as $guardName => $guard))
			                          			<option {{old('guard_name',$role->guard_name) === $guardName ? 'selected' : ''}}  value="{{$guardName}} ">{{$guardName}}</option>
			                          		@endforeach
			                          	</select>
			                          	<span class="fa fa-tag form-control-feedback left blue" aria-hidden="true"></span>
			                          	@error('guard_name')
			                            	<span class="invalid-feedback" role="alert">
			                                <strong>{{ $message }}</strong>
			                            </span>
			                          	@enderror
			                        </div>
								</div>
			          		</div>
			          	</div>
			    </div>
		    </div>
		    <div class="x_panel">
		      	<div class="x_title">
		        	<h2>Permisos</h2>
		        	<ul class="nav navbar-right panel_toolbox">
		          		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		          		</li>
		          		<li><a class="close-link"><i class="fa fa-close"></i></a>
		          		</li>
		        	</ul>
		        	<div class="clearfix"></div>
		      	</div>
		      	<div class="x_content">
					@include('partial.permisos');
		      	</div>
		    </div>
		    <div class="x_panel">
		      	<div class="x_content">
					<div class="col-md-12 col-sm-12 col-lg-12">
						<div class="row text-left">
							<button type="submit" value="Guardar" class="btn btn-success">
								@isset($role->name)
									<li class="fa fa-pencil"></li>
									Actualizar
								@else
									<li class="fa fa-save"></li>
									Guardar
								@endif
							</button>
							@isset($role->name)
								<button type="submit" name="btnEliminar" value="Eliminar" class="btn btn-danger">
									<li class="fa fa-trash-alt"></li>
									Eliminar
								</button>
							@endif
						</div>
	            	</div>
		      	</div>
		    </div>
	    </form>
	</div>
</div>
@endsection
