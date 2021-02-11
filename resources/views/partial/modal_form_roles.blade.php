<form action="{{route('persona.store')}} " method="post" id="crear_persona">
  @csrf
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Crear nuevo rol</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_panel">
          <div class="x_title">
            <span>Nuevo Rol</span>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="car">
                  <div class="card-body">
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
                  </div>
                </div>
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
