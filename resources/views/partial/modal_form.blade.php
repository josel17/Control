  @if($tipoform === 'cliente')
    <form action="{{route('cliente.store','#create')}} " method="post" id="crear_persona">
      <div class="d-none"><input type="text" name="tipo" value="2"></div>
  @else
    <form action="{{route('persona.store','#create')}} " method="post" id="crear_persona">
      <div class="d-none"><input type="text" name="tipo" value="1"></div>
  @endif
  @csrf
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_persona">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">{{$titleModal}}</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="x_panel">
              <div class="x_title">
                <span>Datos personales</span>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="car">
                      <div class="card-body">
                            <label >Tipo de documento</label>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                                <div name="id_tipodocumento" class="flat form-control has-feedback-left {{ $errors->has('id_tipodocumento') ? 'is-invalid' : '' }}">
                                  <label class="form-check form-check-inline">
                                    <input class="flat form-check-input" type="radio" name="id_tipodocumento" value="4" {{ old('id_tipodocumento')=="4" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                        C
                                  </label>
                                  <label class="form-check form-check-inline ">
                                    <input class="flat form-check-input" type="radio" name="id_tipodocumento" value="5" {{ old('id_tipodocumento')=="5" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                      TI
                                  </label>
                                  <label class="form-check form-check-inline ">
                                    <input class="flat form-check-input" type="radio" name="id_tipodocumento" value="10" {{ old('id_tipodocumento')=="10" ? 'checked='.'"'.'checked'.'"' : '' }}>
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
                              <input type="number" name="documento" placeholder="No. de Documento" value="{{ old('documento') }}" class="flat form-control has-feedback-left {{ $errors->has('documento') ? 'is-invalid' : '' }}">
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
                              <input type="text" name="nombre" placeholder="Nombre completo" value="{{ old('nombre') }}" class="form-control has-feedback-left  {{ $errors->has('nombre') ? 'is-invalid' : '' }}">
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
                              <input type="text" name="apellidos" placeholder="Apellidos" value="{{ old('apellidos') }}" class="form-control has-feedback-left  {{ $errors->has('apellidos') ? 'is-invalid' : '' }}">
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
                                      <input class="flat form-check-input " type="radio" name="id_genero" value="6"
                                      {{ old('id_genero')=="6" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                      M
                                    </p>
                                  </label>

                                  <label class="form-check form-check-inline">
                                    <p>
                                      <input class="flat form-check-input" type="radio" name="id_genero" value="7"
                                      {{ old('id_genero')=="7" ? 'checked='.'"'.'checked'.'"' : '' }}>
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
                              <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Correo electronico" class="form-control has-feedback-left  {{ $errors->has('email') ? 'is-invalid' : '' }}">
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
                              <input type="text" name="telefono" placeholder="Telefono - Celular" value="{{ old('telefono') }}" class="form-control has-feedback-left {{ $errors->has('telefono') ? 'is-invalid' : '' }}">
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
                              <input type="text"  name="direccion" placeholder="Direccion" value="{{ old('direccion') }}" class="form-control has-feedback-left {{ $errors->has('direccion') ? 'is-invalid' : '' }}">
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
                                  <option value="">Seleccione...</option>
                                    @foreach($deptos as $depto)
                                      <option value="{{$depto->id}}" @if($depto->id==old('id_departamento'))  selected="selected" @endif >{{$depto->id." - ".$depto->nombre}}</option>
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
                                  <option value="{{old('id_ciudad')}} ">Seleccione...</option>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="">
                    <label class="form-label">Observacion</label>
                    <textarea class="form-control" id="observacion" name="observacion" placeholder="Observaciones...">{{ old('observacion') }}</textarea>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">
              <span class="fa fa-save"></span>
              Guardar
            </button>
          </div>

        </div>
      </div>
    </div>
</form>
