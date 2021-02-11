<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-12">
		<p><li class="fa fa-user-tag"></li> Roles</p>
		@foreach($permissions as $permission)
			@if($permission->model == 'Roles')
  				<div class="checkbox">
					<label>
						<div class="icheckbox_flat-green red" >
							<input name="permissions[]" type="checkbox" class="flat"
							 value="{{ $permission->id }}"
							 	@isset($user)
							 		{{$user->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@else
							 		{{$role->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@endif

						</div> {{$permission->name}}

                	</label>
              	</div>
             @endif
			@endforeach
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12">
		<p><li class="fa fa-users"></li> Usuarios</p>
		@foreach($permissions as $permission)
			@if($permission->model == 'Usuarios')
  				<div class="checkbox">
					<label>
						<div class="icheckbox_flat-green" >
							<input name="permissions[]" type="checkbox" class="flat"
							 value="{{ $permission->id }}"
							 	@isset($user)
							 		{{$user->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@else
							 		{{$role->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@endif
						</div> {{$permission->name}}

                	</label>
              	</div>
             @endif
			@endforeach
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12">
		<p><li class="fa fa-box"></li> Productos</p>
		@foreach($permissions as $permission)
			@if($permission->model == 'Productos')
  				<div class="checkbox">
					<label>
						<div class="icheckbox_flat-green red" >
							<input name="permissions[]" type="checkbox" class="flat"
							 value="{{ $permission->id }}"
							 	@isset($user)
							 		{{$user->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@else
							 		{{$role->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@endif
						</div> {{$permission->name}}

                	</label>
              	</div>
             @endif
			@endforeach
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-12">
		<p><li class="fa fa-file-alt"></li> Ordenes</p>
		@foreach($permissions as $permission)
			@if($permission->model == 'Ordenes')
  				<div class="checkbox">
					<label>
						<div class="icheckbox_flat-green red" >
							<input name="permissions[]" type="checkbox" class="flat"
							 value="{{ $permission->id }}"
							 	@isset($user)
							 		{{$user->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@else
							 		{{$role->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@endif
						</div> {{$permission->name}}

                	</label>
              	</div>
             @endif
			@endforeach
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12">
		<p><li class="fa fa-file-invoice-dollar"></li> Facturas</p>
		@foreach($permissions as $permission)
				@if($permission->model == 'Facturas')
	  				<div class="checkbox">
						<label>
							<div class="icheckbox_flat-green red" >
								<input name="permissions[]" type="checkbox" class="flat"
								 value="{{ $permission->id }}"
								 	@isset($user)
								 		{{$user->permissions->contains($permission->id) ? 'checked' : ''}}>
								 	@else
								 		{{$role->permissions->contains($permission->id) ? 'checked' : ''}}>
								 	@endif
							</div> {{$permission->name}}

	                	</label>
	              	</div>
	             @endif
				@endforeach
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12">
		<p><li class="fa fa-product-hunt"></li> Proveedores</p>
		@foreach($permissions as $permission)
			@if($permission->model == 'Proveedores')
  				<div class="checkbox">
					<label>
						<div class="icheckbox_flat-green red" >
							<input name="permissions[]" type="checkbox" class="flat"
							 value="{{ $permission->id }}"
							 	@isset($user)
							 		{{$user->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@else
							 		{{$role->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@endif
						</div> {{$permission->name}}

                	</label>
              	</div>
             @endif
			@endforeach
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-12">
		<p><li class="fa fa-file-alt"></li> Categorias</p>
		@foreach($permissions as $permission)
			@if($permission->model == 'Categorias')
  				<div class="checkbox">
					<label>
						<div class="icheckbox_flat-green red" >
							<input name="permissions[]" type="checkbox" class="flat"
							 value="{{ $permission->id }}"
							 	@isset($user)
							 		{{$user->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@else
							 		{{$role->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@endif
						</div> {{$permission->name}}

                	</label>
              	</div>
             @endif
			@endforeach
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12">
		<p><li class="fa fa-file-alt"></li> Laboratorios</p>
		@foreach($permissions as $permission)
			@if($permission->model == 'Laboratorios')
  				<div class="checkbox">
					<label>
						<div class="icheckbox_flat-green red" >
							<input name="permissions[]" type="checkbox" class="flat"
							 value="{{ $permission->id }}"
							 	@isset($user)
							 		{{$user->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@else
							 		{{$role->permissions->contains($permission->id) ? 'checked' : ''}}>
							 	@endif
						</div> {{$permission->name}}

                	</label>
              	</div>
             @endif
			@endforeach
	</div>

</div>
