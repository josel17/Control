<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//RUTAS PARA LOGIN-
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');

//RUTAS PARA PERSONAS
Route::group([
	'middleware' => 'auth'],
	function(){
		Route::get('persona','PersonaController@index')->name('persona.index');
		Route::post('persona', 'PersonaController@store')->name('persona.store');
		Route::get('persona/{persona}','PersonaController@show')->name('persona.show');
		Route::patch('persona/{persona}','PersonaController@update')->name('persona.update');
});

//RUTAS PARA CLIENTES
Route::group([
	'middleware' => 'auth'],
	function(){
		Route::get('cliente','ClienteController@index')->name('cliente.index');
		Route::post('cliente', 'ClienteController@store')->name('cliente.store');
		Route::get('cliente/{cliente}','ClienteController@show')->name('cliente.show');
		Route::patch('cliente/{cliente}','ClienteController@update')->name('cliente.update');
});


//RUTAS PARA LOS USUARIOS
Route::group([
	'middleware' => 'auth'],
	function(){
	 	Route::get('usuario/{persona}','UsuariosController@index')->name('persona.user.show');
	 	Route::patch('usuario/{usuario}','UsuariosController@update')->name('persona.user.update');
	 	Route::post('usuario','UsuariosController@store')->name('persona.user.store');

	 	Route::middleware('role:Admin')
	 	->put('usuario/{usuario}','UsuariosController@updatepermission')
	 	->name('persona.user.update.permissions');

	 	Route::middleware('role:Admin')
			 	->put('usuarios/{usuario}','UsuariosController@updaterole')
			 	->name('persona.user.update.role');

	});

//RUTAS PARA LOS ROLES
	Route::group([
	'middleware' => 'auth'],
		function(){
			Route::middleware('role:Admin')
			->get('roles','RolesController@index')->name('persona.usuarios.roles.index');

			Route::middleware('role:Admin')
			->get('roles/crear','RolesController@create')->name('persona.usuarios.roles.create');

			Route::middleware('role:Admin')
			->post('roles','RolesController@store')->name('persona.usuarios.roles.store');

			Route::middleware('role:Admin')
			->get('roles/{role}','RolesController@show')->name('persona.usuarios.roles.show');

			Route::middleware('role:Admin')
			->patch('roles/{role}','RolesController@update')->name('persona.usuarios.roles.update');

			Route::middleware('role:Admin')
			->delete('roles/{role}','RolesController@destroy')->name('persona.usuarios.roles.destroy');

		});

		Route::get('permisos','PermisosController@index')->name('persona.usuarios.permisos');

//RUTAS PARA PRODUCTOS
	Route::group([
		'middleware' => 'auth'
			],
		function(){
			Route::post('productos/{producto}/imagen','ImagesController@store')->name('almacen.producto.imagen');
			Route::get('productos','ProductoController@index')->name('almacen.producto.index');
			Route::get('productos/crear','ProductoController@create')->name('almacen.producto.create');
			Route::patch('productos/{producto}','ProductoController@update')->name('almacen.producto.update');
			Route::post('productos','ProductoController@store')->name('almacen.producto.store');
			Route::get('productos/{producto}','ProductoController@show')->name('almacen.producto.show');
			Route::get('verproducto/{producto}','ProductoController@view')->name('almacen.producto.view');
			Route::delete('producto/{producto}','ProductoController@destroy')->name('almacen.producto.destroy');

		});

//RUTAS PARA PROVEEDORES
	Route::group([
		'middleware' => 'auth'],
		function(){
			Route::post('proveedor','ProveedorController@store')->name('almacen.proveedor.store');
			Route::get('proveedor','ProveedorController@index')->name('almacen.proveedor.index');
			Route::get('proveedor/create','ProveedorController@create')->name('almacen.proveedor.create');
			Route::get('proveedor/{proveedor}','ProveedorController@edit')->name('almacen.proveedor.edit');
			Route::delete('proveedor/{proveedor}','ProveedorController@destroy')->name('almacen.proveedor.delete');
			Route::put('proveedor/{proveedor}','ProveedorController@update')->name('almacen.proveedor.update');

		});


//RUTAS PARA CATEGORIAS
	Route::group([
		'middleware' => 'auth'],
		function()
		{
			Route::get('categorias','CategoriasController@index')->name('almacen.categorias.index');
			Route::get('categorias/create','CategoriasController@create')->name('almacen.categorias.create');
			Route::get('categorias/{categoria}','CategoriasController@edit')->name('almacen.categorias.edit');
			Route::put('categorias/{categoria}','CategoriasController@update')->name('almacen.categorias.update');
			Route::delete('categorias/{categoria}','CategoriasController@destroy')->name('almacen.categorias.delete');
			Route::post('categorias','CategoriasController@store')->name('almacen.categorias.store');


		});

	//RUTAS PARA LABORATORIOS
	Route::group([
		'middleware' => 'auth'],
		function()
		{
			Route::get('laboratorios','LaboratorioController@index')->name('almacen.laboratorio.index');
			Route::get('laboratorios/crear','LaboratorioController@create')->name('almacen.laboratorio.create');
			Route::post('laboratorios/store','LaboratorioController@store')->name('almacen.laboratorio.store');
			Route::get('laboratorios/{laboratorio}','LaboratorioController@edit')->name('almacen.laboratorio.edit');
			Route::put('laboratorios/{laboratorio}','LaboratorioController@update')->name('almacen.laboratorio.update');
			Route::delete('laboratorios/{laboratorio}','LaboratorioController@destroy')->name('almacen.laboratorio.delete');
		});

//RUTAS PARA COMPRAS
	Route::group([
		'middleware' => 'auth'],
		function(){
			Route::get('gastos/compras','ComprasController@index')->name('gastos.orden.index');
			Route::get('gastos/form','ComprasController@form')->name('gastos.orden.form');
			Route::get('gastos/crear','ComprasController@select_proveedor')->name('gastos.orden.select_proveedor');
			Route::post('gastos/pedido','ComprasController@orden')->name('gastos.orden.pedido');
			Route::post('gastos/procesar','ComprasController@procesar')->name('gastos.orden.procesar');
			Route::get('gastos/{orden}','ComprasController@edit')->name('gastos.orden.edit');
			Route::put('gastos','ComprasController@update')->name('gastos.orden.update');
			Route::patch('gastos/{orden}','ComprasController@destroy')->name('gastos.orden.destroy');
		});

//RUTAS PARA PAGOS
	Route::group([
		'middleware' => 'auth'],
		function(){
			Route::get('gastos/pagos','PagosController@store')->name('gastos.pagos.index');
		});

	//GESTIONAR ORDENES
	Route::group([
		'middleware' => 'auth'],
		function(){
			Route::get('gestionarorden','GestionarComprasController@ingresar')->name('compra.orden.ingresar');
			Route::post('gestionarorden','GestionarComprasController@buscar')->name('compra.orden.buscar');
			Route::post('gestionarorden/grabar','GestionarComprasController@grabar')->name('compra.orden.grabar');
			Route::get('gestionarorden/verificar','VerificarFacturaController@index')->name('compra.orden.verificar');
			Route::post('gestionarorden/buscar','VerificarFacturaController@buscarpedido')->name('compra.orden.buscarpedido');
		});

	//VENTAS
	Route::group([
		'middleware' => 'auth'],
		function(){
			Route::get('ventas','VentasController@index')->name('ventas.index');
			Route::get('ventas/facturar','VentasController@facturar')->name('ventas.facturar');
			Route::post('ventas/grabar','VentasController@store');
			Route::post('ventas/facturar','VentasController@store')->name('ventas.facturar.carrito');
		});

	//INVENARIO
	Route::group([
		'middleware' => 'auth'],
		function (){
			Route::get('diferencias','InventarioController@diferencias')->name('inventario.diferencias');
			Route::post('diferencias/datos','InventarioController@cargardatos')->name('inventario.cargardatos');
			Route::get('diferencias/guardar','InventarioController@guardar')->name('inventario.guardar');
		});


	Route::group([
		'middleware' => 'auth'],
		function(){
			Route::get('findclient/{doc}','VentasController@buscarCliente');
			Route::get('findproducto/{producto}','VentasController@buscarProducto');
		});


	Route::group([
		'middleware' => 'auth'],
		function(){
			Route::get('caja/balance','CajaController@index')->name('caja.balance');
			Route::post('caja/balance','CajaController@buscar')->name('caja.balance.buscar');
		});

	Route::group([
		'middleware' => 'auth'],
		function(){
			Route::get('datosEmpresa','AppDataController@index')->name('app.index');
			Route::post('datosEmpresa','AppDataController@store')->name('app.datosempresa.store');
			Route::put('datosEmpresa/{datos}','AppDataController@update')->name('app.datosempresa.update');
		});

	Route::group([
		'middleware' => 'auth'],
		function(){
			Route::get('carrito','CarritoController@index')->name('carrito.vitrina.index');
			Route::post('carrito/buscar','CarritoController@buscar')->name('carrito.vitrina.buscar');
			Route::post('carrito/add','CarritoController@add')->name('carrito.vitrina.add');
			Route::get('carrito/remove/{id}','CarritoController@remove')->name('carrito.remove');
			Route::get('carrito/view','CarritoController@view')->name('carrito.vitrina.view');

		});
	Route::get('ciudades/{id}','PersonaController@lciudad')->name('persona.ciudades');
	Route::get('buscarproveedor','ComprasController@buscarproveedor')->name('orden.buscarproveedor');
	Route::get('pdf/{id}','PdfController@generar')->name('pdf.generar');
	Route::get('buscarpedido/{nopedido}','FacturacionController@buscarpedido');
	Route::get('storage-link',function(){

			/*Artisan::call('storage:link');*/

            if (file_exists(public_path('storage'))) {
                return "The  link already exists.";
              } else {
            	app('files')->link(storage_path('app/public'), public_path('storage'));

                return "The link has been connected to.";
            }

	});

