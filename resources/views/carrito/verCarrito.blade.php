@extends('layout')

@section('title','Ver carrito')

@section('content')
	<div id="wizard" class="form_wizard wizard_horizontal">
		<ul class="wizard_steps anchor">
			<li>
				<a href="#step-1" class="selected" isdone="1" rel="1">
				<span class="step_no">1</span>
				<span class="step_descr">
					Pedido<br>
					<small>Lista de elementos</small>
				</span>
			</a>
			</li>
			<li>
				<a href="#step-2" class="disabled" isdone="0" rel="2">
					<span class="step_no">2</span>
					<span class="step_descr">
						Step 2<br>
						<small>Step 2 description</small>
					</span>
			 	</a>
			</li>
			<li>
				<a href="#step-3" class="disabled" isdone="0" rel="3">
					<span class="step_no">3</span>
					<span class="step_descr">
						Step 3<br>
						<small>Step 3 description</small>
					</span>
				</a>
			</li>
			<li>
				<a href="#step-4" class="disabled" isdone="0" rel="4">
					<span class="step_no">4</span>
					<span class="step_descr">
						Step 4<br>
						<small>Step 4 description</small>
					</span>
				</a>
			</li>
		</ul>
		<div class="stepContainer" style="height: 287px;">
			<div id="step-1" class="content" style="display: block;">
				<div class="row">
					<div class="x_panel col-lg-6 col-sm-12 col-md-6 offset-1">
						<form class="" method="POST" action="">
							<table class="table table-bordered	col-sm-12 col-lg-12 col-md-12">
								<thead class="dark">
									<tr>
										<th style="width: 1%">#</th>
										<th style="width: 30%">Nombe</th>
										<th style="width: 10%">Cantidad</th>
										<th style="width: 10%">Precio</th>
									</tr>
								</thead>
								<tbody>
								 @if(session()->exists('carrito'))
									@foreach(session('carrito') as $carrito)
									<tr>
										<th scope="row">1</th>
										<th>{{$carrito['nombre']}}</th>
										<th>
											<input type="number" name="" class="form-control" value="{{$carrito['cantidad']}}">
										</th>
										<td>{{$carrito['precio']}}</td>
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

					<div class="x_panel col-lg-3 col-sm-12 col-md-3">
					</div>
				</div>

</div><div id="step-2" class="content" style="display: none;">
<h2 class="StepTitle">Step 2 Content</h2>
<p>
do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
</div><div id="step-3" class="content" style="display: none;">
<h2 class="StepTitle">Step 3 Content</h2>
<p>
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
</div><div id="step-4" class="content" style="display: none;">
<h2 class="StepTitle">Step 4 Content</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
</div></div><div class="actionBar"><div class="msgBox"><div class="content"></div><a href="#" class="close">X</a></div><div class="loader">Loading</div><a href="#" class="buttonFinish buttonDisabled btn btn-default">Finish</a><a href="#" class="buttonNext btn btn-success">Next</a><a href="#" class="buttonPrevious buttonDisabled btn btn-primary">Previous</a></div></div>
@endsection

@push('styles')

		<style>

	</style>
@endpush
@push('scripts')

</script>
@endpush