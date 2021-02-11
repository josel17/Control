@extends('layout')

@section('title','Usuarios')

@section('content')

<div class="row">
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
						<a class="dropdown-item" href="#">Settings</a>
						<a class="dropdown-item" href="#">Settings 2</a>
					</div>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="row">
                <div class="col-12 col-ms-12 col-md-12 col-lg-12 col-xl-12 text-right">
                        <button type="button" class="btn btn-round btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <span class="fa fa-plus fa-1x"></span>
                        </button>
                </div>
			</div>
			<div class="row">
				<div class="card-box table-responsive">
                	<div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                		<div class="row">

                		</div>
                		<div class="row">
                			<div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              ID
                            </th>
                            <th class="column-title" style="display: table-cell;">Documento</th>
                            <th class="column-title" style="display: table-cell;">Nombres</th>
                            <th class="column-title" style="display: table-cell;">Email</th>
                            <th class="column-title" style="display: table-cell;">Telefono</th>
                            <th class="d-none d-lg-block">Direccion</th>
                            <th class="column-title" style="display: table-cell;">Acciones </th>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        	@foreach($personas as $persona)
                        	<tr class="even pointer">
	                            <td class="a-center">{{$persona->id}} </td>
                                <td class="">{{$persona->documento }}</td>
	                            <td class="">{{$persona->nombre}} {{$persona->apellidos}}</td>
	                            <td class="">{{$persona->email }}</td>
	                            <td class="">{{$persona->telefono }}</td>
	                            <td class="d-none d-lg-block">{{$persona->direccion }}</td>
	                            <td class="">
	                            	<div class="d-none d-sm-block">
                                        <a href="{{route('persona.show',$persona)}} ">
                                            <span class="fa fa-pencil fa-1x"></span>
                                        </a>
                                        @isset($persona->user->username)
                                            <a href="{{route('persona.user.show',$persona)}} ">
                                                <span class="fa fa-user green fa-1x"></span>
                                            </a>
                                        @else
                                            <a href="{{route('persona.user.show',$persona)}} ">
                                                <span class="fa fa-user black fa-1x"></span>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="d-md-none">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item fa fa-pencil fa-1x"
                                                    href="{{route('persona.show',$persona)}} "> Actualizar
                                                </a>
                                                @isset($persona->user->username)
                                                    <a class="dropdown-item fa fa-user green fa-1x"
                                                        href="{{route('persona.user.show',$persona)}} "> Usuario
                                                    </a>
                                                @else
                                                    <a class="dropdown-item fa fa-user black fa-1x"
                                                        href="{{route('persona.user.show',$persona)}} "> Usuario
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
	                            </td>
	                          </tr>
                        	@endforeach
                         </tbody>
                      </table>

                    </div>
                		</div>
                		<div class="row">
                			<div class="col-sm-5">
                				<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">

                				</div>
                			</div>
                			<div class="col-sm-7">
                				<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                					<ul class="pagination">
                						{{ $personas->links() }}
                					</ul>
                				</div>
                			</div>
                		</div>
                	</div>
              	</div>
			</div>
		</div>
	</div>
</div>
@include('partial.modal_form')
@endsection

