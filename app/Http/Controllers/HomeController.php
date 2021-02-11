<?php

namespace App\Http\Controllers;

use App\Factura;
use App\OrdenCompra;
use App\Persona;
use App\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientes = Persona::all();
        $productos = Producto::all();
        $facturas = Factura::all();
        $ordenes = OrdenCompra::all();
        $ordenPendiente = OrdenCompra::where('id_estado','6')->get();



        return view('home',[
            'clientes' => count($clientes),
            'productos' => count($productos),
            'facturas' => count($facturas),
            'ordenes' => count($ordenes),
            'ordenPendiente' => count($ordenPendiente)


        ]);
    }
}
