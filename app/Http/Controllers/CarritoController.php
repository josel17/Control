<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Repositories\ProductoRepositorio;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    private $_productoRepo;


    public function __CONSTRUCT(ProductoRepositorio $productoRepo)
    {
          $this->_productoRepo = $productoRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with(['categoria','imagenes','laboratorio'])->paginate(1);
        return view('carrito.vitrina',
            ['productos' => $productos]
        );

    }

    public function buscar(Request $request)
    {
        $parametrosbusqueda = $_POST['parametrosBusqueda'];
        $result =  $this->_productoRepo->buscarxnombre($parametrosbusqueda);
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
