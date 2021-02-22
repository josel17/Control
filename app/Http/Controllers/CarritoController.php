/**
*Controlador CarritoController para la vista Carrito de compras.
* 
**/

<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Repositories\ProductoRepositorio;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    private $_productoRepo;

// Encapsulacion de la variable productoRepo
 
    public function __CONSTRUCT(ProductoRepositorio $productoRepo)
    {
          $this->_productoRepo = $productoRepo;
    }
    

    /**
     * Funcion para cargar la vista vitrina.
     *
     * @return object Productos para mostrarlos en la vista Vitrina.
     */
    public function index()
    {
        $productos = Producto::with(['categoria','imagenes','laboratorio'])->paginate(1);
        return view('carrito.vitrina',
            ['productos' => $productos]
        );

    }
    
    /**
    *Description: Funcion para buscar los productos que se solicitan desde la vista
    *@Param: $request->parametroBusqueda String
     * @return: consulta desde el repositorio busqueda por nombre.  
     */
    public function buscar(Request $request)
    {
        $parametrosBusqueda = $_POST['parametrosBusqueda'];
        $result =  $this->_productoRepo->buscarxnombre($parametrosBusqueda);
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
