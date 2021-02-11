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

    private $cliente = null;
    private $_productoRepo;
    private $_facturaRepo;


    public function __CONSTRUCT(ProductoRepositorio $productoRepo, FacturaRepositorio $facturaRepo)
    {
        $this->cliente = new Persona();
        $this->_productoRepo = $productoRepo;
        $this->_facturaRepo = $facturaRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::with(['cliente'])->get();
        return view('ventas.index',
            [
                'facturas' => $facturas,
            ]);
    }


    public function facturar()
    {
            $factura = new Factura;
            $this->authorize('create', $factura);
            $empresa = DatosEmpresa::where('id',1)->first();
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


    public function buscarCliente($doc)
    {

        return $this->cliente->buscarCliente($doc);

    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = (object)
        [
            'numero' => $request->input('numero'),
            'cliente_documento' => $request->input('cliente'),
            'iva' => $request->input('iva'),
            'subtotal' => $request->input('subtotal'),
            'total' => $request->input('total'),
            'detalle' => [],
        ];

        $factura = $request->input('detalle');

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
