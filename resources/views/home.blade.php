@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row" style="display: inline-block;">
            <div class="tile_count d-none">
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total clientes</span>
                    <div class="count">{{$clientes}}</div>
                    {{-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> --}}
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-clock-o"></i> Total Productos</span>
                    <div class="count">{{$productos}}</div>
                    {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> --}}
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total facturas</span>
                    <div class="count green">{{$facturas}}</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i>Total Ordenes</span>
                    <div class="count">{{$ordenes}}</div>
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Ordenes pendientes</span>
                    <div class="count">{{$ordenPendiente}}</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                    <div class="count">7,325</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                </div>
            </div>
        <div class="col-md-10 text text-center" style="justify-content: center;">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body text text-right"  style="justify-content: center;">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-5 card text text-center" style="justify-content: center;">
                        <a href="{{route('carrito.vitrina.index')}}" class="fa fa-shopping-cart fa-7x green"></a><br>
                        <label>Ventas</label>
                    </div>
                    <div class="col-lg-1 col-1 col-sm-1 col-md-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-5 card text text-center" style="justify-content: center;">
                        <a href="{{route('ventas.index')}}" class="fa fa-file-invoice-dollar fa-7x green"></a><br>
                        <label>Facturas</label>
                    </div>
                    <div class="col-lg-1 col-1 col-sm-1 col-md-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-5 card text text-center" style="justify-content: center;">
                        <a href="{{route('almacen.producto.index')}}" class="fa fa-box fa-7x green"></a><br>
                        <label>Productos</label>
                    </div>
                    <div class="col-lg-1 col-1 col-sm-1 col-md-1"></div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-5 card text text-center" style="justify-content: center;">
                        <a href="{{route('persona.index')}}" class="fa fa-user fa-7x green"></a><br>
                        <label>Usuarios</label>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
