<div class="modal fade bs-search-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_persona">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="x_panel">
              <div class="x_title">
                <span>Formulario para filtrar productos</span>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="card-body">
                        <table id="datatable-checkbox" class="table table-hover jambo_table bulk_action table-responsive bulk_action" style="width:100%">
                          <thead>
                            <tr>
                              <th style="width: 1%">Codigo</th>
                              <th style="width: 15%">Nombre</th>
                              <th style="width: 7%">Precio Venta</th>
                              <th style="width: 7%">Proveedor</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($producto as $producto)
                              <tr>
                                <td style="width: 1%">{{$producto->codigo}}</td>
                                <td style="width: 15%">{{$producto->nombre}}</td>
                                <td style="width: 7%">{{$producto->precio_venta}}</td>
                                <td style="width: 7%">{{$producto->descripcion}}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            {{-- <button type="submit" class="btn btn-success">
              <span class="fa fa-save"></span>
              Guardar
            </button> --}}
          </div>

        </div>
      </div>
    </div>
    @push('styles')
      <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <link href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

    @endpush
    @push('scripts')
        <script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    @endpush