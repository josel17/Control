<?php

namespace App\Repositories;
use App\Producto;


class ProductoRepositorio
{
	private $model;

	public function __construct()
	{
		$this->model = new Producto();
	}

	public function buscarxnombre($query)
	{
		return $this->model->where('nombre','like', "%$query%")->with(['impuesto','presentacion'])->get();
	}

}
