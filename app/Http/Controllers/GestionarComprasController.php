<?php

namespace App\Http\Controllers;

use App\DetalleOc;
use App\Http\Requests\BuscarOrdenRequest;
use App\MovimientosProducto;
use App\OrdenCompra;
use App\TipoMovimientos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GestionarComprasController extends Controller
{

//llamar la vista movimientos para ingresar la orden
    public function ingresar()
    {
    	return view('compras.movimientos');
    }

     /**
     * Función para buscar las ordenes de compra a ingresar
     *
     * @param  BuscarOrdenRequest  $request
     * @return regresa el objeto a la vista con la consulta realizada a la base de datos según la orden a buscar.
     */
    public function buscar(BuscarOrdenRequest $request)
    {
    	try
    	{
    	  $validated = $request->validated();
    		$orden =  OrdenCompra::where('numero',$request->numero_orden)->where('id_estado','<>','3')->with(['cliente','proveedor','estado','detalleoc','detalle'])->get();
    		$tipo_mov = TipoMovimientos::get();

    		if(count($orden)===0)
    		{
    		  return back()->with('warning','La orden de compra no existe o se encuentra anulada');
    		}
    		elseif($orden[0]->cant_total === $orden[0]->cant_recibida)
    		{
    		  return back()->with('warning','La orden no tiene posiciones seleccionables');

    		}
    		$fecha = Carbon::now();
    		$fecha = $fecha->format('Y-m-d');

    		return view('compras.movimientos',
    		['orden' => $request->numero_orden,
    		 'tipo_mov' => $tipo_mov,
    	 	 'fecha' => $fecha,
    		 'update' => $orden[0]->updated_at,
    		 'numero' => $orden[0]->numero,
    		 'proveedor' => $orden[0]->proveedor,
    	 	 'cliente' => $orden[0]->cliente,
    		 'productos' => $orden[0]->detalleoc,
    		 'detalle' => $orden[0]->detalle,
    		]);
    	} catch (Exception $e)
    	{
    		return back()->with('error','Se ha presentado un error: '.$e.message());
    	}
    }

    /**
    * Grabar los datos de la orden que se van a ingresar al inventario.
    * @param  Request $request
    * @return string Respuesta del servidor según estado de la transacción.
    */

    public function grabar(Request $request)
    {
    	DB::beginTransaction();
    	try {
//Cargargamos el array $movimiento con los datos del request,
//cada posición contiene los datos de las filas de la orden.
    		if(isset($request->selected))
    		{
    			$movimiento = [
    				'codigo_material' => $request->codigo,
    				'cantidad' => $request->cantidad,
    				'movimiento' => $request->tipo_mov,
    				'fecha_movimiento' => $request->fecha,
    				'fecha_vto' => $request->fecha_vto,
    				'presentacion' => $request->presentacion,
    				'proveedor' => $request->proveedor,
    				'orden' => $request->orden,
    				'user' => $request->usuario
    			];
    			//return $movimiento['cantidad'];
//sacamos los $values y las $keys del array movimiento en array diferentes.
				$value = array_values($movimiento);
				$keys = array_keys($movimiento);
				$cantidad = 0;
				$cant_total = 0;
				$cantidad_orden = 0;

// cargamos el array posicion con los $keys y los $value, una posición del array por cada fila de la orden que vamos a guardar.

				 for($i=0; $i < count($value[0]) ; $i++)
         {
            for ($a=0; $a < count($keys); $a++)
            {
              $posicion =
              [
                'codigo_material' => $value[0][$i],
  			    		'cantidad' => $value[1][$i],
  			    		'movimiento' => $value[2][$i],
  			    		'fecha_movimiento' => $value[3],
  			    		'fecha_vto' => $value[4][$i],
  			    		'presentacion' => $value[5][$i],
  			    		'proveedor' => $value[6][$i],
  			    		'orden' => $value[7],
  			    		'user' => $value[8],
  			    	];
            }

//cuando se tenga el array con las posiciones grabamos en la tabla MovimientosProducto una fila por cada posición del array
          	MovimientosProducto::create($posicion);

//consultamos la cantidad de productos que contiene la orden
            $cantposicion = DetalleOc::where('codigo_producto',$posicion['codigo_material'])->where('numero_orden',$posicion['orden'])->get();
//verificamos las cantidades a ingresar y le sumamos a la cantidad que ya se han recibido esto en el casino de que sean ingresos parciales.
            $cantidad_orden = $cantidad_orden + $posicion['cantidad'];
            $cat_total = $cantposicion[0]->cant_recibida + $posicion['cantidad'];

//actualizamos las cantidades recibidas de cada material en la orden con eso sabremos que queda pendiente por recibir.
            DetalleOc::where('codigo_producto',$posicion['codigo_material'])->where('numero_orden',$posicion['orden'])->update(['cant_recibida' => $posicion['cantidad']]);

		    }
//consultamos y comparamos las cantidades recibidas.

          $orden = OrdenCompra::where('numero',$posicion['orden'])->get();
          $total_recibido = $orden[0]->cant_recibida + $cantidad_orden;

//segun lo recibido se asignará un estado a la orden, si se recibió completamente o si queda algo pendiente
          if($total_recibido === $orden[0]->cant_total)
          {
          	$estado = 6;
          }
          else
          {
          	$estado = 5;
          }
//actualizar el estado de la orden.
           $rqs = OrdenCompra::where('numero',$posicion['orden'])->update(['cant_recibida'=>$total_recibido,'id_estado'=>$estado]);

           DB::commit();

           return redirect()->route('compra.orden.ingresar')->with('success','El ingreso se ha realizado con exito');
    		}
    		else
    		{
    			return back()->with('info','No se ha realizado ningun ingreso');
    		}

    	} catch (Exception $e) {

    	}

    }
}