@extends('layout')

@section('title','Aplicacion')

@section('content')
<div class="">
    <div class="card">
        <div class="card-header">Datos de aplicación</div>
        <div class="card-body">
        	<div class="row col-sm-12 col-md-12 col-lg-6">
        		<div class="x_panel">
        			<div class="x_title">Datos de la empresa</div>
        			<div class="x_content">
        				<div class="row">
        					<div class="col-lg-12 col-md-12 col-sm-12 ">
		        				<!--NIT-->
		              			<div class="col-md-6 col-sm-12  col-lg-6">
				                    <label>NIT:</label>
									<input type="text" name="nit" placeholder="Numero de identificacion tributario" value="{{old('nit')}}" class="form-control {{ $errors->has('nit') ? 'is-invalid' : '' }}">
								</div>
								<!--NOMBRE-->
		              			<div class="col-md-6 col-sm-12  col-lg-6" >
				                    <label>Nombre empresa</label>
									<input type="text" name="nombre" placeholder="Nombre de la empresa" value="{{old('nombre')}}" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 ">
								<!--TELEFONO-->
		              			<div class="col-md-6 col-sm-12 col-lg-6" >
				                    <label>Telefono</label>
									<input type="text" name="telefono" placeholder="Telefono" value="{{old('telefono')}}" class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}">
								</div>
								<!--DIRECCION-->
		              			<div class="col-md-6 col-sm-12 col-lg-6" >
				                    <label>Direccion</label>
									<input type="text" name="direccion" placeholder="Direccion" value="{{old('direccion')}}" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 ">
								<!--EMAIL-->
		              			<div class="col-md-6 col-sm-12 col-lg-6" >
				                    <label>Emil</label>
									<input type="text" name="email" placeholder="Email" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
								</div>
							</div>
        				</div>
        				<div class="row">
        					<div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center p-4">
        						<input type="text" name="grabar" class="btn btn-success btn-sm col-md-2 col-sm-2 col-lg-2" value="Grabar">
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>

@endsection