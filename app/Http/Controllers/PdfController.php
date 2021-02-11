<?php

namespace App\Http\Controllers;

use App\Factura;
use App\OrdenCompra;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{

	public function generar($numero)
	{

		$factura = Factura::where('numero',$numero)->with(['cliente','detalle'])->first();
		return $factura;
		$pdf = PDF::loadView('reportes.factura',
				[
					'factura' => $factura,
				]
			);
		return $pdf->stream();
		//return $pdf->download('invoice.pdf');
	    /*return view('ventas.index',
	        [
	            'facturas' => $facturas,
	        ]);*/
	}
}
