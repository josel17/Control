<?php

namespace App\Http\Controllers;


use App\Producto;
use App\Repositories\ProductoRepositorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CarritoController extends Controller
{

    private $_productoRepo;

// Encapsulacion de la variable productoRepo

    public function __CONSTRUCT(ProductoRepositorio $productoRepo)
    {
         session_start();
        $this->_productoRepo = $productoRepo;
    }


    /**
     * Funcion para cargar la vista vitrina.
     *
     * @return object Productos para mostrarlos en la vista Vitrina.
     */
    public function index()
    {
        $productos = Producto::with(['categoria','imagenes','laboratorio'])->paginate(2);
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
     * Funcion para agregar items al carrito de compras.
     *
     * @param $request Request
     * @return
     */
    public function add(Request $request)
    {

        if(isset($_POST['btn_add']))
        {
            $carrito = session('carrito');
            switch ($_POST['btn_add']) {
                case 'add':

                    if(!isset($_SESSION['carrito']))
                    {
                        $item = array
                        (
                            'id' => Crypt::DecryptString($request->id),
                            'nombre' => Crypt::DecryptString($request->nombre),
                            'precio' => Crypt::DecryptString($request->precio),
                            'cantidad' => $request->cantidad,

                        );


                        $_SESSION['carrito'][0] = $item;

                    }
                    else
                    {
                        $cantidadCarrito =count($_SESSION['carrito']);
                       foreach ($_SESSION['carrito'] as $key => $value) {

                           if($value["id"]==Crypt::DecryptString($request->id))
                           {
                                $nueva_cantidad = $value['cantidad'] + $request->cantidad;
                                return $nueva_cantidad;
                                $item = array
                                ('' =>, );
                           }
                           else
                           {
                                $item = array
                                (
                                    'id' => Crypt::DecryptString($request->id),
                                    'nombre' => Crypt::DecryptString($request->nombre),
                                    'precio' => Crypt::DecryptString($request->precio),
                                    'cantidad' => $request->cantidad,

                                );
                           }

                       }

                        session()->push('carrito', $item);

                        return back();

                    }
                    return back();
                    break;

            }
        }else
        {
            return false;
        }
    }

    /**
     * Funcion para llamar la vista ver carrito
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        try {
            return view('carrito.verCarrito');
        } catch (Exception $ex)
        {
            return back()->with('error','Ha ocurrido un error al cargar el carrito');
        }
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
