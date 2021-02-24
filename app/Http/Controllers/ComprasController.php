/**Controlador ComprasController administra la vista compras**/

<?php

namespace App\Http\Controllers;

use App\Producto;
use App\DetalleOc;
use App\Proveedor;
use Carbon\Carbon;
use App\OrdenCompra;
use App\DatosEmpresa;
use Carbon\Traits\today;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\collect;
use Illuminate\Support\Facades\DB;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\SaveOrdenRequest;
use Illuminate\Database\beginTransaction;

class ComprasController extends Controller
{

//Verificar el middleware para confirmar elninicio de sesiones
    function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Funcion index con la cual realizamos una consultande las compras y la enviamos a la vista Compras.index
     *
     * @return Object Compras junto a la pvista
     */
    public function index()
    {
        $compras = OrdenCompra::with(['estado','cliente','proveedor','user'])->paginate(10);

        return view('compras.index',[
            'compras' => $compras,
            ]);
    }

   /**
   * Funcion para cargar la vista compras.form en la cual se dijitara el pedido.
   * @param  OrdenCompra $Orden
   * @return Retornamos la vista con los objetos Proveedores, Productos,
   */
    public function form(OrdenCompra $orden)
    {
      try {
         $this->authorize('create',$orden);
          $proveedores = Proveedor::get()->all();
          $productos = Producto::all();
          return view('compras.form',
            [
              'proveedores' => $proveedores,
              'productos' => $productos,
              'all_productos' => 0,
            ]);

      } catch (Exception $e) {
        return back()->with('error','Se ha presentado un error al cargar el formulario');
      }
    }

    /**
     * Funcion para cargar los productos de un proveedor especifico, si no se especifica retorna todos los productos.
     *@param Request $request
     * @return Retorna un Object a la vista con la consulta reañizada.
     */
    public function select_proveedor(Request $request)
    {
        try
        {
          $proveedores = Proveedor::all();
          $proveedor = Proveedor::where('id', $request->proveedor)->first();
          if(isset($request->list_productos))
          {
            $productos = Producto::where('id_proveedor',$request->proveedor)->get();
            $all_productos = 0;
          }
          else
          {
            $productos = Producto::all();
            $all_productos = 1;
          }

            return view('compras.form',[
                'proveedores' => $proveedores,
                'proveedor' => $proveedor,
                'productos' => $productos,
                'all_productos' => $all_productos,
            ]);

        } catch (Exception $ex) {
            return back()->with('error','Se ha presentado un error',$ex->message());
        }
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
     * Carga una vista con los datos de una orden seleccionada para editar los datos del pedido.
     *
     * @param  int  $id
     * @param OrdenCompra $orden
     * @return retorna los datos de la consulta para ser mostrados en la vista.
     */
    public function edit(OrdenCompra $order,$id)
    {
      try {
        $this->authorize('update',$order);
        $orden =  OrdenCompra::where('id',$id)->with(['cliente','proveedor','estado','detalleoc','detalle'])->get();

        if(count($orden)===0)
        {
          return redirect(route('compras.orden.index'))->with('warning','No se encontraron datos');
        }
        return view('compras.pedido',[
            'fecha' => $orden[0]->created_at,
            'update_at' => $orden[0]->updated_at,
            'numero' => $orden[0]->numero,
            'proveedor' => $orden[0]->proveedor,
            'cliente' => $orden[0]->cliente,
            'productos' => $orden[0]->detalleoc,
            'detalle' => $orden[0]->detalle,
        ]);
      } catch (Exception $e) {
          return back()->with('error','Se ha presentado un error',$ex->message());
      }
    }

    /**
     * Función para actualizar la información la tabla suministrada por el formulario por el request.
     * Datos: están dividos en 2 secciones cabecera y cuerpo de la orden. Por lo que se almacenan en 2 tablas diferentes.
     *
     * @param Request $request
     * @return
     */
    public function update(Request $request)
    {
      try {
        DB::beginTransaction();
        foreach ($request->cantidad as $key )
        {
         if(is_numeric($key))
         {
         }else
         {
           return redirect()->route('compras.orden.index')->with('error','Debes ingresar valores numericos ');
         }
        }

        $detalle =
        [
          'numero_orden' => $request->input('numero_orden'),
          'codigo_producto' => $request->input('codigo'),
          'cantidad' => $request->input('cantidad'),
          'valor_unitario' => $request->input('precio'),
          'valor_impuesto' => $request->input('iva'),
          'neto' => $request->input('neto'),
        ];

        $value = array_values($detalle);
        $keys = array_keys($detalle);
        $valor =0;

        for($i=0; $i < count($value[0]) ; $i++) {
          $valor = $valor + $value[2][$i] * $value[3][$i];
        }

        $orden =
        [
          'numero' => $request->input('orden'),
          'id_empresa' => $request->input('id_empresa'),
          'id_proveedor' => $request->input('id_proveedor'),
          'valor_compra' => $request->input('total'),
          'cant_total' => $request->input('cant_total'),
          'id_user' => Auth()->user()->id,
          'id_estado' => 4,
          'observaciones' => '',
          'created_at' =>Carbon::now(),
        ];
        //actualizamos los datos de cabecera de la orden
        $oc = OrdenCompra::where('numero',$orden['numero'])->update(['valor_compra'=>$orden['valor_compra'],'cant_total' => $orden['cant_total']]);

        for($i=0; $i < count($value[0]) ; $i++)
        {
          for ($a=0; $a < count($keys); $a++)
          {
            $doc =
            [
              'numero_orden' =>  $value[0][$i],
              'codigo_producto' => $value[1][$i],
              'cantidad' => $value[2][$i],
              'valor_unitario' => $value[3][$i],
              'valor_impuesto' => $value[4][$i],
              'valor_total' => $value[5][$i],
            ];
          }
           //actualizamos los datos del cuerpo de la orden
           $detalle = DetalleOc::where('numero_orden',$doc['numero_orden'])->where('codigo_producto',$doc['codigo_producto'])->update(['cantidad' => $doc['cantidad'], 'valor_impuesto'=> $doc['valor_impuesto']]);
        }
        DB::commit();
        return redirect()->route('compras.orden.index')->with('success','La orden de compra se ha grabado con exito');



      } catch (Exception $ex)
      {
        DB::rollback();
        return back()->with('error','Se ha presentado un error'.$ex->getMessage());
      }
    }

    /**
     * Eliminar una orden de compra específica.
     *
     * @param  OrdenCompra  $orden
     * @return Respuesta del servidor según sea el estado de la transacción
     */
    public function destroy(OrdenCompra $orden)
    {
      $id =  $orden->id;
      OrdenCompra::where('id',$id)->update(['id_estado' => 3]);
      return back()->with('success','Se anulado exitosamente la orden de compra');
    }

    /**
    * Buscar productos de un proveedor especifico.
    *
    * @param  OrdenCompra  $orden
    * @return Respuesta del servidor según sea el estado de la transacción
    */
    public function buscarproveedor(Request $request )
    {
      $productos =
      Producto::where([['id_estado',1],['id_proveedor',$request->proveedor]])
      ->with(['proveedor','categoria'])
      ->paginate(10);

      $proveedor = Proveedor::all();
      return view('compras.form',['proveedores' =>$proveedor,'productos' => $productos,]);
    }

  /**
  * Generar datos para crear una orden nueva
  *
  * @param  Request $request
  * @return retorna la vista pedido con los objetos correspondientes a la nueva orden.
  */
    public function orden(Request $request)
    {
      $orden = OrdenCompra::get()->last();
      if(is_null($orden))
        {
          $orden = 5000;
        }
        else
        {
          $orden = $orden->numero + 1;
        }
        $proveedor = Proveedor::where('id',$request->proveedorSelect)->get();
        $cliente = DatosEmpresa::where('id',1)->get();
        $productosOrder = Producto::whereIn('codigo',$request->selected)->with(['ume','presentacion'])->get();
        //return $productosOrder;
        return view('compras.pedido',[
          'proveedor' => $proveedor[0],
          'fecha' => Carbon::now(),
          'numero' => $orden,
          'cliente' => $cliente[0],
          'productos' =>$productosOrder,
        ]);
    }

    /**
     * procesar la orden generada en la vista pedido para guardar una nueva orden.
     *
     * @param  OrdenCompra  $orden
     * @return Respuesta del servidor según sea el estado de la transacción
     */
    public function procesar(Request $request)
    {
      try {
        DB::beginTransaction();
       //Cargar el array detalle con los datos de formulario a través de request
        $detalle =
        [
          'numero_orden' => $request->input('numero_orden'),
          'codigo_producto' => $request->input('codigo'),
          'cantidad' => $request->input('cantidad'),
          'valor_unitario' => $request->input('precio'),
          'valor_impuesto' => $request->input('iva'),
          'valor_total' => $request->input('neto'),
          'id_estado' => 1,
        ];

        $value = array_values($detalle);
        $keys = array_keys($detalle);
        $valor =0;

        for($i=0; $i < count($value[0]) ; $i++)
        {
          $valor = $valor + $value[2][$i] * $value[3][$i];
        }

        //Cargar el array orden con los datos de la cabecera de la orden
        $orden =
        [
          'numero' => $request->input('orden'),
          'id_empresa' => $request->input('id_empresa'),
          'id_proveedor' => $request->input('id_proveedor'),
          'valor_compra' => $request->input('total'),
          'cant_total' => $request->input('cant_total'),
          'cant_recibida' => 0,
          'id_user' => Auth()->user()->id,
          'id_estado' => 4,
          'observaciones' => '',
          'created_at' =>Carbon::now(),
        ];

        //Guardar los datos de la orden en la base de datos.
        OrdenCompra::create($orden);

        for($i=0; $i < count($value[0]) ; $i++)
        {
          for ($a=0; $a < count($keys); $a++)
          {
            $doc =
            [
              'numero_orden' =>  $value[0][$i],
              'codigo_producto' => $value[1][$i],
              'cantidad' => $value[2][$i],
              'valor_unitario' => $value[3][$i],
              'valor_impuesto' => $value[4][$i],
              'valor_total' => $value[5][$i],
              'id_estado' => 1,
              'cant_recibida' => 0,
            ];
          }

          $detalle = DetalleOc::create($doc);
        }
        DB::commit();

        return redirect()->route('compras.orden.index')->with('success','La orden de compra se ha grabado con exito');
      } catch (Exception $ex)
      {
        DB::rollback();
        return back()->with('error','Se ha presentado un error'.$ex->getMessage());
      }
    }
}
