<?php

namespace App\Http\Controllers;

use App\Images;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{

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
