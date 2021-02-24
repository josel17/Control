<?php

namespace App\Http\Controllers;

use App\Diferencia;
use App\MovimientosProducto;
use App\Periodo;
use App\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InventarioController extends Controller
{

//Función para mostrar la vista Stock
	public function stock()
	{
		return view('inventario.stock',[]);
	}

	//Función para mostrar la vista para visualizar las diferencias.
	//@return Vista con la fecha actual del sistema
	public function diferencias()
	{
		try
		{
			$inventario = array();
			return view('inventario.diferencias',
				[
					'title' => 'Modulo control de diferenicas de inventario',
					'inventario' => $inventario,
					'fecha_movimiento' =>  Carbon::now()->format('m/d/yy'),
				]);
		} catch (Exception $e) {

		}
	}

	/**
	 * Función para cargas datos de los movimientos del inventario según la fecha seleccionada y poder visualizar las diferencias.
	 * @param  Request $request
	 * @return retorna a la vista diferencias con los datos del movimiento de cada material.
	 */
	public function cargardatos(Request $request)
	{
		try {
			$fecha_movimiento = Carbon::parse($request->fecha_movimiento)->format('yy-m-d');

			//se selecciona el período activo
			$periodo_actual = Periodo::select('id_estado','periodo','fecha_inicio','fecha_cierre','codigo')
			->join('estado','estado.id','=','id_estado')
			->where('id_estado',1)
			->first();
						/*Carbon::parse($request->fecha_movimiento)->format('m.yy')*/
			 if(is_null($periodo_actual))
			{
				$inventario = null;
			}
			else
			{
//se selecciona los movimientos para el rango de fechas seleccionado en el periodo activo
				 $inventario = MovimientosProducto::select('movimientos_producto.codigo_material',DB::raw('SUM(movimientos_producto.cantidad) + SUM(diferencias.cantidad) AS cantidad_actual'))
                ->join('diferencias','diferencias.codigo_material','=','movimientos_producto.codigo_material')
                ->groupBy('movimientos_producto.codigo_material')
                ->with('producto')
                ->whereBetween('movimientos_producto.fecha_movimiento',[$periodo_actual->fecha_inicio,$fecha_movimiento])
                ->get();

			}

//retorno a la vista de la petición.

			   	return view('inventario.diferencias',
				[
					'title' => 'Modulo control de diferenicas de inventario',
					'inventario' => $inventario,
					'fecha_movimiento' =>  Carbon::parse($request->fecha_movimiento)->format('m/d/yy'),
				]);

		} catch (Exception $e) {
			return back()->with('error','Ha ocurrido un error');
		}
	}

	/**
	* Función para ajustar el inventario real luego de comparar con el inventario teórico
	*
	* @return respuesta del servidor según estado de la transacción
  */

	public function guardar()
	{
		try
		{
			//actualizar diferencias
			$diferencias = Diferencia::all();

			if(count($diferencias)>=1)
			{
				for ($i=0; $i < count($diferencias); $i++) {
					$diferencias[$i]->cantidad = $diferencias[$i]->cantidad_fisica;
					$diferencias[$i]->save();
				}

			}

			//actualizar periodo
			$inventario = array();
			return view('inventario.diferencias',
				[
					'title' => 'Modulo control de diferenicas de inventario',
					'inventario' => $inventario,
					'fecha_movimiento' =>  Carbon::now()->format('m/d/yy'),
				])->with('error','error');

		} catch (Exception $e) {

			return back()->with('error','Se ha presentado un error');

		}
	}
}
