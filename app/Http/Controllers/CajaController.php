<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Http\Requests\BuscarBalanceRequest;
use App\OrdenCompra;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CajaController extends Controller
{

    /**
     *Description: Funcion para llamar la vista Caja.index
     *@Param:
     * @return:Vista Caja
    */
    public function index()
    {
    	return view('caja.index');
    }

    /**
     *Description: Funcion para buscar los datos de las ventas.
     *@Param: Request contiene el rango de fechas a consultar.
     * @return: Consolidado de ventas y compras en el rango de fechas seleccionado.
    */
    public function buscar(BuscarBalanceRequest $request)
    {
    	$request->validated();
    	$init = Carbon::parse($request->init)->format('Y-m-d H:i:s');
    	$end = Carbon::parse($request->end)->format('Y-m-d 23:59:59');

    	$ventas = Factura::whereRaw('created_at between '."'$init'" .' and '."'$end'".'')->get();
    	$suma_ventas=0;
    	for ($i=0; $i < count($ventas); $i++) {
  			$suma_ventas = intval($suma_ventas) + intval($ventas[$i]->total);
    	}

    	$compras = OrdenCompra::whereRaw('created_at between '."'$init'" .' and '."'$end'".'')->get();
    	$suma_compras=0;
    	for ($i=0; $i < count($compras); $i++) {
  			$suma_compras = intval($suma_compras) + intval($compras[$i]->valor_compra);
    	}

    	return view('caja.index',[
    		'f_inicial' => Carbon::parse($init)->format('Y-m-d'),
    		'f_final' => Carbon::parse($end)->format('Y-m-d'),
    		'total_compras'=> $suma_compras,
    		'total_ventas'=> $suma_ventas,
    		'facturas' => $ventas,
    		'compras' => $compras
    	]);
    }

}
