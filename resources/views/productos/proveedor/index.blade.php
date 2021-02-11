@extends('layout')

@section('title','Compras')

@section('content')
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
					<p class="text text-right">
						<a href="{{route('almacen.proveedor.create')}} " class="btn btn-success  btn-round" data-target=".bs-example-modal-lg">
							<span class="fa fa-plus"></span>
						</a>
					</p>

					<!-- start project list -->

					<table class="table table-striped jambo_table bulk_action table-responsive">
			  			<thead>
			    			<tr>
			    				<th style="width: 1%">No</th>
								<th style="width: 2%">Nit</th>
								<th style="width: 10%">Nombre</th>
								<th style="width: 10%">Direccion</th>
								<th style="width: 10%">Telefono</th>
								<th style="width: 10%">Acciones</th>
			    			</tr>
			  			</thead>
			  			<tbody>
			  				<div class="d-none">{{$no = 0}}</div>
			  				@foreach($proveedor as $item)
				  				<form method="POST" action="{{route('almacen.proveedor.delete',$item)}}">
									@csrf
									@method('DELETE')
						  				<tr>
											<td style="width: 1%">{{$no=$no+1}}</td>
											<td style="width: 2%">{{$item->nit}} </td>
											<td style="width: 10%">{{$item->nombre}} </td>
											<td style="width: 10%">{{$item->direccion}} </td>
											<td style="width: 10%">{{$item->telefono}} </td>
											<td style="width: 10%">
												<a href="{{route('almacen.proveedor.edit',$item)}}" class="fa fa-pencil green"></a>
												<button onclick="return confirm('¿Estás seguro de querer eliminar este proveedor?')" class="btn btn-link fa fa-trash red">

												</button>
											</td>
										</tr>
								</form>
							@endforeach

	 		  			</tbody>
					</table>

					{{-- {{$productos->links()}} --}}
					<!-- end project list -->
				</div>
			</div>
		</div>
	</div>
@endsection