@extends('layout')

@section('title','Ver carrito')

@section('content')
	<div id="wizard" class="form_wizard wizard_horizontal">
        <ul class="wizard_steps">
			<li>
				<a href="#step-1" class="selected"  rel="1">
				<span class="step_no">1</span>
				<span class="step_descr">
					Pedido<br>
					<small>Lista de elementos</small>
				</span>
			</a>
			</li>
			<li>
				<a href="#step-2" class="disabled" rel="2">
					<span class="step_no">2</span>
					<span class="step_descr">
						Medio de pago<br>
						<small>Step 2 description</small>
					</span>
			 	</a>
			</li>
			<li>
				<a href="#step-3" class="disabled" isdone="0" rel="3">
					<span class="step_no">3</span>
					<span class="step_descr">
						Resumen de pedido<br>
						<small>Step 3 description</small>
					</span>
				</a>
			</li>
			<li>
				<a href="#step-4" class="disabled" isdone="0" rel="4">
					<span class="step_no">4</span>
					<span class="step_descr">
						Facturacion<br>
						<small>Step 4 description</small>
					</span>
				</a>
			</li>
		</ul>
		<div class="stepContainer" style="height: 287px;">
			<div id="step-1" class="content" style="display: block;">
				<div class="row">
					<div class="x_panel col-lg-10 col-sm-12 col-md-6 offset-1">
						<form class="" method="POST" action="">
							<table class="table table-bordered	col-sm-12 col-lg-12 col-md-12">
								<thead class="dark">
									<tr>
										<th style="width: 1%">#</th>
										<th style="width: 30%">Nombe</th>
										<th style="width: 10%">Cantidad</th>
										<th style="width: 10%">Precio</th>
										<th style="width: 10%">Sub Total</th>
									</tr>
								</thead>
								<tbody>
								@if(session()->exists('carrito'))
									@foreach(session('carrito') as $carrito)
									<tr>
										<th scope="row">1</th>
										<th>{{$carrito['nombre']}}</th>
										<th>
											<input type="number" name="cantidad_{{$carrito['id']}}" id="cantidad_{{$carrito['id']}}" class="form-control" value="{{$carrito['cantidad']}}" onkeyup="calcular_precio({{$carrito['id']}});">
										</th>
										<td><input type="text" name="precio_{{$carrito['id']}}" id="precio_{{$carrito['id']}}" value="{{$carrito['precio']}}" class="form-control"></td>
										<td></div><input type="text" name="subtotal_{{$carrito['id']}}" id="subtotal_{{$carrito['id']}}" value="{{number_format($carrito['precio']*$carrito['cantidad'],2, '.', '.')}}" class="form-control"></td>
									</tr>

									@endforeach
								@else
								<tr>
									<th colspan="4">No hay productos en el carrito</th>
								</tr>
								@endif
								</tbody>
								</table>
						</form>
					</div>
				</div>

			</div>
			<div id="step-2" class="content" style="display: none;">
				<h2 class="StepTitle">Step 2 Content</h2>

			</div>
			<div id="step-3" class="content" style="display: none;">
				<h2 class="StepTitle">Step 3 Content</h2>

			</div>
			<div id="step-4" class="content" style="display: none;">
				<h2 class="StepTitle">Step 4 Content</h2>

			</div>
		</div>
	</div>
@endsection

@push('styles')
<link href="../build/css/custom.min.css" rel="stylesheet">
		<style>

	</style>
@endpush
@push('scripts')
    <!-- jQuery Smart Wizard -->
    <script src="../vendor/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

<script>

	$("#precio_2").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});
		window.onload=calcular_precio();

	function calcular_precio(idx)
	{
		$("#subtotal_" + idx).val($("#cantidad_" + idx).val() * $("#precio_" + idx).val());


	}
</script>
@endpush