@extends('layout')

@section('title','Compras')

@section('content')
<div class="clearfix"></div>
  <div class="container body">
      <div class="main_container">
        <div class="" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12">
                <!-- form date pickers -->
                <div class="x_panel" style="">
					<div class="x_title">
                    	<h2>Balance<small> Balance general de caja</small></h2>
                    	<ul class="nav navbar-right panel_toolbox">
                      	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      	</li>
                      	<li class="dropdown">
                        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        	<ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        	</ul>
                      	</li>
                      	<li><a class="close-link"><i class="fa fa-close"></i></a>
                      	</li>
                    	</ul>
                    	<div class="clearfix"></div>
                  	</div>
                 	<div class="x_content">
	                 	<form method="POST" action="{{route('caja.balance.buscar')}}">
	                 		@csrf
	                 		<label>Seleccione el rango de fecha a consultar</label>
	                 		<div class="row col-lg-12 col-sm-12 col-md-12">
	                 			<div class="col-lg-3 col-md-6 col-sm-12">
	                 				<label class="col-lg-12 col-md-12 col-sm-12">
										Fecha Inicial
									</label>
							   		<fieldset class="col-lg-12 col-sm-12 col-md-12">
										<div class="control-group">
											<div class="controls">
												<div class="col-md-11 xdisplay_inputx form-group row has-feedback">
													<input type="text" name="init" class="form-control has-feedback-left {{ $errors->has('init') ? 'is-invalid' : '' }}"  id="single_cal1" placeholder="Fecha Inicial"  value="{{old('init')}}">
													<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
													<span id="inputSuccess2Status" class="sr-only">(success)</span>
												</div>
											</div>
										</div>
		                        	</fieldset>
 	                 			</div>
 	                 			<div class="col-lg-4 col-md-6 col-sm-12" >
	                 				<label class="col-lg-12 col-md-12 col-sm-12">
										Fecha Final
									</label>
							   		<fieldset class="col-lg-12 col-sm-12 col-md-12">
										<div class="row col-md-12 xdisplay_inputx form-group row has-feedback">
											<div class="row col-lg-12"><input type="text" name="end" id="single_cal2" placeholder="Fecha Final" class="form-control col-lg-8 has-feedback-left {{ $errors->has('end') ? 'is-invalid' : '' }}" value="{{old('end')}}"><button class="btn btn-link"><li class="fa fa-search"></li></button>
												<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
											</div>
										</div>
		                        	</fieldset>
 	                 			</div>
	                 		</div>
						</form>
                  	</div>
                </div>
                <!-- /form datepicker -->
                @isset($facturas)
	                <div class="col-md-6 col-sm-6  ">
		                <div class="x_panel">
							<div class="x_title">
		                    	<h2><i class="fa fa-align-left"></i> Ingresos <small>{{ $f_inicial}} - {{$f_final}}</small></h2>
		                    		<ul class="nav navbar-right panel_toolbox">
	                      				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                      				</li>
			                      		<li class="dropdown">
					                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
			                    <!-- start accordion -->
			                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
			                    	<div class="panel">
			                        	<a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			                          	<h4 class="panel-title">Ventas / $ {{number_format($total_ventas,2)}}</h4>

			                        	</a>
				                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				                          <div class="panel-body">
				                            <table  id="datatable" class="table table-hover jambo_table bulk_action ">
				                              <thead>
				                                <tr>
				                                  <th>No.</th>
				                                  <th>Factura</th>
				                                  <th>Valor</th>
				                                  <th>Fecha</th>
				                                </tr>
				                              </thead>
				                              <tbody>
				                              	<li class="d d-none">{{$item=0}}</li>
				                              	@foreach($facturas as $factura)
				                                <tr>
				                                  <th>{{$item = $item +1}}</th>
				                                  <td>{{$factura->numero}}</td>
				                                  <td>$ {{$factura->total}}</td>
				                                  <td>{{$factura->created_at}}</td>
				                                </tr>
				                                @endforeach
				                              </tbody>
				                            </table>
				                          </div>
				                        </div>
			                      	</div>
			                    </div>
			                    <!-- end of accordion -->
		                  	</div>
		                </div>
		            </div>
		        @endif
		        @isset($compras)
	                <div class="col-md-6 col-sm-6  ">
		                <div class="x_panel">
							<div class="x_title">
		                    	<h2><i class="fa fa-align-left"></i> Egresos <small>{{ $f_inicial}} - {{$f_final}}</small></h2>
		                    		<ul class="nav navbar-right panel_toolbox">
	                      				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                      				</li>
			                      		<li class="dropdown">
					                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
			                    <!-- start accordion -->
			                    <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
			                    	<div class="panel">
			                        	<a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
			                          	<h4 class="panel-title">Compras / $ {{number_format($total_compras,2)}}</h4>

			                        	</a>
				                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				                          <div class="panel-body">
				                            <table id="datatable-checkbox" class="table table-hover jambo_table bulk_action bulk_action">
				                              <thead>
				                                <tr>
				                                  <th>#</th>
				                                  <th>Pedido</th>
				                                  <th>Valor</th>
				                                  <th>Fecha</th>
				                                </tr>
				                              </thead>
				                              <tbody>
				                              	<li class="d d-none">{{$item=0}}</li>
				                              	@foreach($compras as $compra)
				                                <tr>
				                                  <th>{{$item = $item +1}}</th>
				                                  <td>{{$compra->numero}}</td>
				                                  <td>$ {{$compra->valor_comp}}</td>
				                                  <td>{{$compra->created_at}}</td>
				                                </tr>
				                                @endforeach
				                              </tbody>
				                            </table>
				                          </div>
				                        </div>
			                      	</div>
			                    </div>
			                    <!-- end of accordion -->
		                  	</div>
		                </div>
		            </div>
		        @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('styles')
    <!-- bootstrap-daterangepicker -->
    <link href="../vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

@endpush
@push('scripts')
	<script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  	<script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/moment/min/moment.min.js"></script>
    <script src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
    	@if($errors->any())
			@foreach($errors->all() as $error)
              	toastr.error('{{$error}}')
			@endforeach
		@endif

    </script>
@endpush


 {{-- <div class="row col-md-3 col-sm-12 col-lg-3 form-group">
	<input type="text" name="range" id="reportrange_right" class="form-control has-feedback-left  {{ $errors->has('range') ? 'is-invalid' : '' }}" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc" value="{{old('range')}}">
</div> --}}