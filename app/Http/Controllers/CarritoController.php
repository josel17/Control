<?php

namespace App\Http\Controllers;


use App\Factura;
use App\Producto;
use App\Repositories\ProductoRepositorio;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CarritoController extends Controller
{

    private $_productoRepo;
    private $_id=1;

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
        $productos = Producto::with(['categoria','imagenes','laboratorio','impuesto'])->paginate(20);
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

        $key = 1;
       if(isset($_POST['btn_add']))
        {
            switch ($_POST['btn_add']) {
                case 'add':

                    $item
                    = array(
                        'codigo'=> $request->codigo,
                        'nombre'=> $request->nombre,
                        'precio'=> $request->precio,
                        'impuesto' => $request->impuesto,
                        'cantidad'=> $request->cantidad,
                    );


                    if(session()->exists('carrito'))
                    {
                        $carrito = session('carrito');
                        $posicion=0;
                        $nuevacantidad=0;

                        foreach ($carrito as $key => $value) {
                            $posicion=$posicion+1;
                            if($value['codigo']==$item['codigo'])
                            {
                                $nuevacantidad=$value['cantidad']+1;
                                $item['cantidad']=$nuevacantidad;

                                session()->forget('carrito.'.$posicion);
                            }
                        }

                    }

                    Session()->put('carrito.'.$item['codigo'],$item);

                    return back()->with('info','Producto agregado al carrito.');
                break;
                case 'remove':

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
             $factura = Factura::get()->last();
                if(is_null($factura))
                {
                  $numero_factura = 0001;
                }
                else
                {
                  $numero_factura = $factura->numero + 1;
                }
            return view('carrito.verCarrito',
                [
                    'numero_carrito' => $numero_factura,
                ]);
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
    public function facturar($id)
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
    public function remove($id)
    {
        try {

                session()->forget("carrito.".$id);
                return back()->with('success','Producto eliminado del carrito.');
           } catch (Exception $e) {

           }
    }
}
