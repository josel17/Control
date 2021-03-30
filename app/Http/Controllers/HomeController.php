<?php

namespace App\Http\Controllers;

use App\Factura;
use App\OrdenCompra;
use App\Persona;
use App\Producto;
use Illuminate\Http\Request;
Use SEO;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        SEO::setTitle('Página SEO');
        SEO::setDescription('Ejemplo de descripción de la página');
        SEO::opengraph()->setUrl('http://nigmacode.com');
        SEO::setCanonical('https://nigmacode.com');
        SEO::opengraph()->addProperty('type', 'articles');
        SEO::twitter()->setSite('@Nigmacode');
        $this->middleware('auth');
    }

    /**
     * Mostrar la vista Home en el dashboard
     *
     * @return Vista principal.
     */
    public function index()
    {


        if(session()->exists('carrito'))
        {
            $carrito = count(session('carrito'));
        }

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
