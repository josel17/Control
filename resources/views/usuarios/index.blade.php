@extends('layout')
@section('title','Crear Usuario')


@section('content')
<div class="row ">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
	        	<h2>Datos de usuario <small>Credenciales de autenticacion</small></h2>
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
	        	@isset($usuario->username)
		        	<form action="{{route('persona.user.update',$usuario)}}" method="POST" name="frm_update">
		        		@method('PATCH')
		        @else
		        	<form action="{{route('persona.user.store')}}" method="POST" name="frm_save">
		        @endif
		        @csrf
		        	<div class="row">
						<div class="col-md-6 col-sm-6  form-group has-feedback">
							 <div class="mb-3">
		                        <label>Nombre de usuario</label>
		                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
		                          <input type="text" name="username" placeholder="Nombre de usuario" value="{{old('username',$usuario->username)}}" class="flat form-control has-feedback-left {{ $errors->has('username') ? 'is-invalid' : '' }}" >
		                          <span class="fa fa-user  form-control-feedback left blue" aria-hidden="true"></span>
		                          @error('username')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                          @enderror
		                        </div>
		                      </div>
			          	</div>

		          		<div class="col-md-6 col-sm-6  form-group has-feedback">
							<div class="mb-3">
		                        <label>Responsable de la cuenta</label>
		                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
		                        	<input type="text" name="id_persona" class="d-none" value="{{old('id_persona',$persona->id)}}">
		                          	<input type="text" name="responsable" placeholder="Responsable" value="{{old('responsable',$persona->id."-".$persona->nombre." ".$persona->apellidos)}}" class="flat form-control has-feedback-left {{ $errors->has('id_persona') ? 'is-invalid' : '' }}" disabled="true">
		                          	<span class="fa fa-font form-control-feedback left blue" aria-hidden="true"></span>
		                          	@error('id_persona')
		                            	<span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                          	@enderror
		                        </div>
							</div>
		          		</div>
		          	</div>
		          	<div class="row">
			          	<div class="col-md-6 col-sm-6  form-group has-feedback">
							<div class="mb-3">
		                        <label>Contraseña</label>
		                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
		                          	<input type="password" name="password" placeholder="Contraseña" value="{{old('password')}}" class="flat form-control has-feedback-left {{ $errors->has('password') ? 'is-invalid' : '' }}">
		                          	<span class="fa fa-key form-control-feedback left blue" aria-hidden="true"></span>
		                          	@error('password')
		                            	<span class="invalid-feedbackkey" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                          	@enderror
		                        </div>
							</div>
			          	</div>
			          	<div class="col-md-6 col-sm-6  form-group has-feedback">
							<div class="mb-3">
		                        <label>Repita la contraseña</label>
		                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
		                          	<input type="password" name="password_confirmation" placeholder="Repita la contraseña" value="{{old('password-comfirm')}}" class="flat form-control has-feedback-left {{ $errors->has('password-comfirm') ? 'is-invalid' : '' }}">
		                          	<span class="fa fa-key form-control-feedback left blue" aria-hidden="true"></span>
		                          	@error('password-comfirm')
		                            	<span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                          	@enderror
		                        </div>
							</div>
			          	</div>
		          	</div>
		          	@isset($usuario->username)
		          	<div class="row p-3">
		          		<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
		          			<span class="red">* Dejar en blanco si no desea cambiar la contraseña</span>
		          		</div>
		          	</div>
		          	@endisset
		          	<div class="row">
			          	<div class="col-lg-12 col-md-12 col-sm-12 col-12">
			          		<div class="mb3">
			                    <label>Estado</label>
			                    <div class="col-md-12 col-sm-12 col-xs-12 col-12 form-group">
			                      <div name="estado" class=" form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}">
			                          <label class="form-check form-check-inline">
			                            <p>
			                              <input class="flat form-check-input" type="radio" name="estado" value="6">
			                              Activo
			                            </p>
			                          </label>
			                          <label class="form-check form-check-inline">
			                            <p>
			                              <input class="flat form-check-input" type="radio" name="estado" value="7">
			                              Inactivo
			                            </p>
			                          </label>
			                      </div>
			                       @error('estado')
			                          <span class="invalid-feedback">
			                            <strong>{{ $message }} </strong>
			                          </span>
			                        @enderror
			                    </div>
		                    </div>
		                </div>
		            </div>
		          	<div class="row">
			          	<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12  form-group" >
							<div class="mb-3">
		                        <label>Observacion</label>
		                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
		                          	<textarea name="observacion" placeholder="Observacion" value="saludo" class="form-control">{{old('observacion',$usuario->observacion)}}</textarea>
		                        </div>
							</div>
			          	</div>
		          	</div>

	          		<div class="row text-left">
		          		@role('Admin')
			          		<button type="submit" name="btnGuardar" value="Guardar" class="btn btn-success">
				          		@isset($usuario->username)
				          				<li class="fa fa-pen-alt"></li>
				          			Actualizar
				          		@else
				          				<li class="fa fa-save"></li>
				          			Guardar
				          		@endif
			          		</button>

		          			@isset($usuario->username)
			          			<button type="submit" name="btnEliminar" value="Eliminar" class="btn btn-danger">
			          				<li class="fa fa-trash-alt"></li>
			          				Eliminar
			          			</button>
			          		@endif
		          		@endrole
	          		</div>
		        </form>
		    </div>
	    </div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	    <div class="x_panel">
	      	<div class="x_title">
	        	<h2>Roles</h2>
	        	<ul class="nav navbar-right panel_toolbox">
	          		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	          		</li>
	          		<li><a class="close-link"><i class="fa fa-close"></i></a>
	          		</li>
	        	</ul>
	        	<div class="clearfix"></div>
	      	</div>
	      	<div class="x_content">
	      		<div class="col-md-12 col-sm-12 col-lg-6 d-none">

					<div class="radio">
						<label class="">
							<div class="iradio_flat-green" style="position: relative;">
								<input type="radio" class="flat" checked="" name="iCheck">
							</div> Invitado
						</label>
					</div>
				</div>
				@if($usuario->username)
					<div class="col-md-12 col-sm-12 col-lg-12">
						@role('Admin')
							<form action="{{route('persona.user.update.role', $usuario)}}" method="POST">
								@csrf
								@method('PUT')
								@foreach($roles as $role)
				      				<div class="checkbox">
										<label>
											<div class="icheckbox_flat-green red" >
												<input name="roles[]" type="checkbox" class="flat" value="{{ $role->id }}" {{$usuario->roles->contains($role->id) ? 'checked' : ''}}>
											</div> {{$role->name}}

				                    	</label>
				                  	</div>
				      			@endforeach
				      			<br>
		                		<button type="submit" class="btn btn-success">
		                			<li class="fa fa-pen-alt"></li>
		                			Actualizar Rol
		                		</button>
			      			</form>
			      		@else
			      			<div>
			      				<ul class="list-group">
			      					@forelse($usuario->roles as $role)
			      						<li class="list-group-item">{{$role->name}}</li>
			      					@empty
			      						<li class="list-group-item">No se han asignado roles</li>
			      					@endforelse
			      				</ul>
			      			</div>
			      		@endrole
                	</div>
                @endif

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
				@if($usuario->username)
					<div class="col-md-12 col-sm-12 col-lg-12">
						@role('Admin')
							<form action="{{route('persona.user.update.permissions', $usuario)}}" method="POST">
								@csrf
								@method('PUT')
								@include('partial.permisos');
					      			<br><br><br>
		                		<button type="submit" class="btn btn-success">
									<li class="fa fa-pen-alt"></li>
		                			Actualizar Permisos
		                		</button>
			      			</form>
			      		@else
			      			<div>
			      				<ul class="list-group">

			      					@forelse($usuario->permissions as $permissions)
			      						<li class="list-group-item">{{$permissions->name}}</li>

			      					@empty

			      						<li class="list-group-item">No tiene permisos adicionales</li>
			      					@endforelse
			      				</ul>
			      			</div>
			      		@endrole
                	</div>
                @endif

	      	</div>
	    </div>
  	</div>
</div>
@endsection()