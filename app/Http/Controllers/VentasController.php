<?php

namespace App\Http\Controllers;

use App\DatosEmpresa;
use App\Departamento;
use App\Factura;
use App\Http\Requests\BuscarClienteRequest;
use App\Persona;
use App\Producto;
use App\Repositories\FacturaRepositorio;
use App\Repositories\ProductoRepositorio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VentasController extends Controller
{
//declaración de atributos encapsulados.
    private $cliente = null;
    private $_productoRepo;
    private $_facturaRepo;

/** Asignar el objeto inyectado al atributo encapsulado. */
    public function __CONSTRUCT(ProductoRepositorio $productoRepo, FacturaRepositorio $facturaRepo)
    {
        $this->cliente = new Persona();
        $this->_productoRepo = $productoRepo;
        $this->_facturaRepo = $facturaRepo;
    }

    /**
     * metodo para llamar la vista principal de las facturas.
     *
     * @return Vista index.
     */
    public function index()
    {
        $facturas = Factura::with(['cliente'])->get();
        return view('ventas.index',
            [
                'facturas' => $facturas,
            ]);
    }


 /**
     * Metodo para llamar la vista de facturación
     *
     * @return Vista de facturación con el object de los datos de facturación.
     */
    public function facturar()
    {
      $factura = new Factura;
      $this->authorize('create', $factura);
      $empresa = DatosEmpresa::get()->first();
      if(!isset($empresa)) {
        return back()->with('info','Primero debes actualizar los datos de tu empresa');

      }
      else
      {
        $factura = Factura::get()->last();
        if(is_null($factura))
        {
          $numero_factura = 0001;
        }
        else
        {
          $numero_factura = $factura->numero + 1;
        }
        $deptos = Departamento::get();
        return view('ventas.facturar',
        [
          'producto' => Producto::all(),
          'tipoform' => 'cliente',
          'titleModal' => 'Crear nuevo Cliente',
          'deptos' => $deptos,
          'empresa' => $empresa,
          'numero_factura' => $numero_factura,
          'fecha_factura' => Carbon::now(),
        ]);
      }
    }

 /**
     * Metodo para buscar el cliente a facturar
     *
     * @param Int $doc
     * @return Objet cliente.
     */
    public function buscarCliente($doc)
    {

        return $this->cliente->buscarCliente($doc);

    }

 /**
     * metodo para buscar productos a facturar.
     *
     * @param string $producto.
     * @return Object producto
     */
    public function buscarProducto($producto)
    {
        $result =  $this->_productoRepo->buscarxnombre($producto);
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
     * Metodo que guardará la la factura en la base de datos.
     *
     * @param  Request $request
     * @return Respuesta del servidor según el estado de la transacción
     */
    public function store(Request $request)
    {
      //pasar la información de la cabecera de la factura en el request a un Object
        $data = (object)
        [
            'numero' => $request->input('numero'),
            'cliente_documento' => $request->input('cliente'),
            'iva' => $request->input('iva'),
            'subtotal' => $request->input('subtotal'),
            'total' => $request->input('total'),
            'detalle' => [],
        ];
        //pasar el detalle de la factura al Object $factura

        $factura = $request->input('detalle');

        //Pasar el detalle de la factura a una posición cada fila de la factura.
         for ($i=0; $i < count($factura); $i++) {
                 $data->detalle[] =
                    [
                    'factura_numero' => $data->numero,
                    'producto_codigo' => $factura[$i][1],
                    'cantidad' => $factura[$i][3],
                    'precio_unitario' => $factura[$i][4],
                    'iva' => $factura[$i][6],
                    'total' => $factura[$i][7]
                 ];
            }

           //Grabar la factura en la base de datos.
            return $this->_facturaRepo->grabarfactura($data);
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
