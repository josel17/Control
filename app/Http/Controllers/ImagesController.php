/**Controlador para guardar los datos de las imágenes. 
**/

<?php

namespace App\Http\Controllers;

use App\Images;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
/**
     * Función para guardar datos de ubicación de las imágenes de los productos. 
     *
     * @param  Producto $producto. 
     * @return guardamos la Url de la imagen y el id del producto asociado a la imagen. 
     */
	public function store(Producto $producto)
	{

		$this->validate(request(),[
			'imagen' => 'image|max:2048' //jpeg. png, bmp, gif o svg
		]);

		$imagen = request()->file('imagen')->store('public/productos');

		Images::create([
			'producto_id' => $producto->id,
			'url' => Storage::url($imagen),
		]);
	}
}
