@extends('layout')

@section('title','Usuarios')

@section('content')

<div class="page-title ">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	  	<div>
	    	<h4 class="">{{ $persona->nombre." ". $persona->apellidos}}</h3>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<form action="{{route('persona.update',$persona)}}" method="POST" name="frmEditar">
	@csrf
	@method('PATCH')
	<div class="row">
	  	<div class="col-md-12 col-sm-12 ">
		    <div class="x_panel">
				<div class="x_title center">
		        	<h2>Datos personales</h2>
		        	<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			          	</li>
						<li>
							<a class="close-link"><i class="fa fa-close"></i></a>
						</li>
		        	</ul>
		        	<div class="clearfix"></div>
		      	</div>
		      	<div class="x_content">
					<div class="col-md-3 col-sm-3  profile_left">
						<div class="profile_img">
							<div id="crop-avatar">
								<!-- Current avatar -->
								<img class="img-responsive avatar-view" src="../images/img.jpg" alt="Avatar" title="Change the avatar">
							</div>
						</div>
		  				<h2><b>{{$persona->nombre ." ". $persona->apellidos}}</b></h2>
						<ul class="list-unstyled user_data">
		            		<li><i class="fa fa-map-marker user-profile-icon"></i>
		            			{{$persona->direccion }} - {{$persona->ciudad->nombre}}
		            		</li>
			            	<li>
			              		<i class="fa fa-envelope user-profile-icon"></i> {{$persona->email}}
			            	</li>
			            	<li class="m-top-xs">
			              		<i class="fa fa-phone user-profile-icon"></i> {{$persona->telefono}}
			            	</li>
		          		</ul>
		          		<br />
		        	</div>
			        <div class="col-md-9 col-sm-9 ">
						<div class="profile_title">
				        	<div class="x_content">
					            <div class="row">
					            	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
					                	<div class="car">
					                  <div class="card-body">
					                        <label >Tipo de documento</label>
					                        <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
					                            <div name="id_tipodocumento" class="flat form-control has-feedback-left {{ $errors->has('id_tipodocumento') ? 'is-invalid' : '' }}">
					                              <label class="form-check form-check-inline">
					                                <input class="flat form-check-input" type="radio" name="id_tipodocumento" value="4" {{ old('id_tipodocumento')=="4" ? 'checked='.'"'.'checked'.'"' : '' }}
							                          		{{ $persona->id_tipodocumento=="4" ? 'checked='.'"'.'checked'.'"' : '' }} >
					                                    CC
					                              </label>
					                              <label class="form-check form-check-inline ">
					                                <input class="flat form-check-input" type="radio" name="id_tipodocumento" value="5" {{ old('id_tipodocumento')=="5" ? 'checked='.'"'.'checked'.'"' : '' }}
							                          		{{ $persona->id_tipodocumento=="5" ? 'checked='.'"'.'checked'.'"' : '' }}>
					                                  TI
					                              </label>
					                              <label class="form-check form-check-inline ">
					                                <input class="flat form-check-input" type="radio" name="id_tipodocumento" value="10" {{ old('id_tipodocumento')=="10" ? 'checked='.'"'.'checked'.'"' : '' }}
															{{ $persona->id_tipodocumento=="10" ? 'checked='.'"'.'checked'.'"' : '' }}>
					                                  PA
					                              </label>
					                            </div>
					                            <span class="fa fa-address-card  form-control-feedback left blue" aria-hidden="true"></span>
					                            @error('id_tipodocumento')
					                              <span class="invalid-feedback" role="alert">
					                                  <strong>{{ $message }}</strong>
					                              </span>
					                            @enderror
					                        </div>

					                      <div class="mb-3">
					                        <label>Numero de documento</label>
					                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
					                          <input type="number" name="documento" placeholder="No. de Documento" value="{{ old('documento',$persona->documento )}}" class="flat form-control has-feedback-left {{ $errors->has('documento') ? 'is-invalid' : '' }}">
					                          <span class="fa fa-sort-numeric-up-alt  form-control-feedback left blue" aria-hidden="true"></span>
					                          @error('documento')
					                            <span class="invalid-feedback" role="alert">
					                                <strong>{{ $message }}</strong>
					                            </span>
					                          @enderror
					                        </div>
					                      </div>
					                      <div class="mb-3">
					                        <label>Nombres</label>
					                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
					                          <input type="text" name="nombre" placeholder="Nombre completo" value="{{ old('nombre', $persona->nombre) }}" class="form-control has-feedback-left  {{ $errors->has('nombre') ? 'is-invalid' : '' }}">
					                          <span class="fa fa-font  form-control-feedback left blue" aria-hidden="true"></span>
					                          @error('nombre')
					                            <span class="invalid-feedback" role="alert">
					                                <strong>{{ $message }}</strong>
					                            </span>
					                          @enderror
					                        </div>
					                      </div>
					                      <div class="mb-3">
					                        <label>Apellidos</label>
					                        <div class="col-md-12 col-sm-12 has-feedback form-group">
					                          <input type="text" name="apellidos" placeholder="Apellidos" value="{{ old('apellidos',$persona->apellidos) }}" class="form-control has-feedback-left  {{ $errors->has('apellidos') ? 'is-invalid' : '' }}">
					                            <span class="fa fa-font form-control-feedback left" aria-hidden="true"></span>
					                            @error('apellidos')
					                              <span class="invalid-feedback" role="alert">
					                                  <strong>{{ $message }}</strong>
					                              </span>
					                            @enderror
					                        </div>
					                      </div>
					                      <div class="mb-3">
					                        <label>Genero</label>
					                        <div class="col-md-12 col-sm-12 has-feedback form-group">
					                          <div name="id_genero" class=" has-feedback-left form-control {{ $errors->has('id_genero') ? 'is-invalid' : '' }}">
					                              <label class="form-check form-check-inline">
					                                <p>
					                                  <input class="flat form-check-input" type="radio" name="id_genero" value="6"
														{{  $persona->id_genero=="6" ? 'checked='.'"'.'checked'.'"' : '' }}
														{{	old('id_genero')=="6" ? 'checked='.'"'.'checked'.'"' : '' }}>
					                                  M
					                                </p>
					                              </label>

					                              <label class="form-check form-check-inline">
					                                <p>
					                                  <input class="flat form-check-input" type="radio" name="id_genero" value="7"
					                                  	{{  $persona->id_genero=="7" ? 'checked='.'"'.'checked'.'"' : ''}}
														{{  old('id_genero')=="7" ? 'checked='.'"'.'checked'.'"' : '' }}>
					                                  F
					                                </p>
					                              </label>
					                            <span class="fa fa-venus-mars  form-control-feedback left blue" aria-hidden="true"></span>
					                            @error('id_genero')
					                              <span class="invalid-feedback">
					                                <strong>{{ $message }} </strong>
					                              </span>
					                            @enderror
					                          </div>
					                        </div>
					                      </div>

					                  </div>
					                	</div>
					              	</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
					                  <div class="card-body">
					                      <div class="mb-3">
					                        <label >Correo electronico</label>
					                        <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
					                          <input type="text" id="email" name="email" value="{{ old('email', $persona->email) }}" placeholder="Correo electronico" class="form-control has-feedback-left  {{ $errors->has('email') ? 'is-invalid' : '' }}">
					                          <span class="fas fa-envelope form-control-feedback left" aria-hidden="true"></span>
					                            @error('email')
					                              <span class="invalid-feedback" role="alert">
					                                  <strong>{{ $message }}</strong>
					                              </span>
					                            @enderror
					                        </div>
					                      </div>
					                      <div class="mb-3">
					                        <label >Telefono de contacto</label>
					                        <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
					                          <input type="text" name="telefono" placeholder="Telefono - Celular" value="{{ old('telefono',$persona->telefono) }}" class="form-control has-feedback-left {{ $errors->has('telefono') ? 'is-invalid' : '' }}">
					                          <span class="fas fa-phone form-control-feedback left" aria-hidden="true"></span>
					                            @error('telefono')
					                              <span class="invalid-feedback">
					                                <strong>{{ $message}} </strong>
					                              </span>
					                            @enderror
					                        </div>
					                      </div>
					                      <div class="mb-3">
					                        <label >Direccion de residencia</label>
					                        <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
					                          <input type="text"  name="direccion" placeholder="Direccion" value="{{ old('direccion', $persona->direccion) }}" class="form-control has-feedback-left {{ $errors->has('direccion') ? 'is-invalid' : '' }}">
					                          <span class="fas fa-map-marker form-control-feedback left" aria-hidden="true"></span>
					                            @error('direccion')
					                            <span class="invalid-feedback">
					                              <strong>{{ $message}} </strong>
					                            </span>
					                          @enderror
					                        </div>
					                      </div>
					                      <div class="mb-3">
					                        <label >Departamento</label>
					                        <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
					                          <select class="form-control has-feedback-left {{ $errors->has('id_departamento') ? 'is-invalid' : '' }}" name="id_departamento" id="id_departamento">
					                             <option value="">Seleccione un departamento</option>
				  									@foreach($deptos as $depto)
				  										<option value="{{ old('id_departamento', $depto->id)}}"
				  											@if($persona->id_departamento==$depto->id)
				  												selected="selected"
				  											@endif>
				  											{{$depto->id." - ".$depto->nombre}}</option>
				  									@endforeach
					                          </select>
					                          <span class="fas fa-map-marker form-control-feedback left" aria-hidden="true"></span>
					                          @error('id_departamento')
					                            <span class="invalid-feedback">
					                              <strong>{{ $message }} </strong>
					                            </span>
					                          @enderror
					                        </div>
					                    </div>
										<div class="mb-3">
					                        <label >Ciudad</label>
					                        <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
					                        	<select class="form-control has-feedback-left {{ $errors->has('id_ciudad') ? 'is-invalid' : '' }}" name="id_ciudad" id="id_ciudad">
												<option value="">Seleccione una ciudad</option>
													@foreach($ciduad as $item)
														<option value="{{old('id_ciudad', $item->id)}}" @if($persona->id_ciudad==$item->id)  selected="selected" @endif>{{$item->codigo." - ".$item->nombre}} </option>
													@endforeach
												</select>
					                          <span class="fas fa-map-marker form-control-feedback left" aria-hidden="true"></span>
					                          @error('id_ciudad')
					                            <span class="invalid-feedback">
					                              <strong>{{ $message }} </strong>
					                            </span>
					                          @enderror
					                        </div>
					                      	</div>
					                  	</div>
									</div>
					            </div>
					            <div class="row">
					            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						            	<div class="">
							                <label class="form-label">Observacion</label>
						               		<textarea name="observacion" rows="5" class="form-control"
						               			placeholder="Ingrese alguna nota o descripcion de {{$persona->nombre}}">{{old('observacion',$persona->observacion)}}
						               		</textarea>
							            </div>
						                <div class="d-none">
						                	<input type="text" name="tipo" value="1">
						                </div>
						            </div>
					           	</div>
					        </div>
					    </div>
					    <div class="row">
			            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            		<button name="btnGrabar" class="btn btn-success">
			            			<i class="fa fa-save"></i> Guardar
			            		</button>
			            	</div>
			            </div>
				   	</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection