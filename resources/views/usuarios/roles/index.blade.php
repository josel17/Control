@extends('layout')

@section('title','Roles')

@section('content')

<div class="row">
	<div class="x_panel">
		<div class="x_title">
			<h2>Roles</h2>
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
            		<a href="{{route('persona.usuarios.roles.create')}} " class="btn btn-round btn-success">
            			<span class="fa fa-plus fa-1x"></span>
            		</a>
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
                            <th class="column-title" style="display: table-cell;">Identificador</th>
                            <th class="column-title" style="display: table-cell;">Nombre</th>
                            <th class="column-title" style="display: table-cell;">Guard</th>
                            <th class="column-title" style="display: table-cell;">Acciones </th>

                          </tr>
                        </thead>

                        <tbody>
                        	@foreach($roles as $role)
                        	<tr class="even pointer">
	                            <td class="a-center">{{$role->id}} </td>
                                <td class="">{{$role->name }}</td>
                                <td class="">{{$role->display_name }}</td>
	                            <td class="">{{$role->guard_name}}</td>
                                 <form class="form-group" method="POST" action="{{route('persona.usuarios.roles.destroy',$role)}}">
                                    @csrf
                                    @method('DELETE')
                                    <td class="">
                                        <div class="d-none d-sm-block" >
                                             <a class="fa fa-pencil green fa-1x" href="{{route('persona.usuarios.roles.show',$role)}} " >
                                            </a>

                                                <button href="#" class="fa fa-trash red fa-1x btn btn-link "
                                                 onclick="return confirm('¿Estás seguro de querer eliminar este Role?')">
                                                </button>
                                        </div>
                                        <div class="d-md-none">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    <i class="fa fa-wrench"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item fa fa-pencil fa-1x"
                                                        href="{{route('persona.usuarios.roles.show',$role)}}"> Actualizar
                                                    </a>
                                                <button href="#" class="fa fa-trash red fa-1x btn btn-link "
                                                 onclick="return confirm('¿Estás seguro de querer eliminar este Role?')"> Eliminar
                                                </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </form>
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
                						{{ $roles->links() }}
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
@endsection