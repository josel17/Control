
<!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
      <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Bienvenido,</span>
      <h2>{{ Auth::User()->persona->nombre }}
        <span class="caret">{{ Auth::User()->getRoleDisplayNames() }} </span>
      </h2>
    </div>
  </div>
<!-- /menu profile quick info -->
  <br />
<!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li >
          <a href="{{ route('home.index')}}" >
            <i class="fa fa-home {{ setActiveColor('home*')}}"></i>
              Inicio
          </a>
        </li>
        <li class="{{ setActiveRoute('persona*')}}">
            <a>
              <i class="fa fa-cogs {{ setActiveColor('persona*')}}"></i>Configuracion<span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu" style="{{ openmenu('persona*')}}">
              <li class="" >
                <a class="" href="{{route('persona.index')}}">Usuarios</a>
              </li>
              <li>
                <a class=""  href="{{route('persona.usuarios.roles.index')}}">Roles</a>
              </li>

            </ul>
        </li>
        <li class="{{ setActiveRoute('cliente*')}}">
            <a>
              <i class="fa fa-user-tie {{ setActiveColor('cliente*')}}"></i>Clientes<span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu" style="{{ openmenu('cliente*')}}">
              <li class="" >
                <a class="" href="{{route('cliente.index')}}">Clientes</a>
              </li>
            </ul>
        </li>
        <li class="{{ setActiveRoute('almacen*')}}">
          <a>
            <i class="fa fa-store {{ setActiveColor('almacen*')}}"></i>
              Catalogo
              <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu " style="{{ openmenu('almacen*')}}">
              <li class="{{ setActiveRoute('almacen.producto*')}}">
                <a class="" href="{{route('almacen.producto.index')}}  ">
                  Productos
                </a>
              </li>
              <li class="{{ setActiveRoute('almacen.proveedor*')}}">
                <a class="" href="{{route('almacen.proveedor.index')}}  ">
                  Proveedores
                </a>
              </li>
              <li class="{{ setActiveRoute('almacen.categorias*')}}">
                <a class="" href="{{route('almacen.categorias.index')}}">
                  Categorias
                </a>
              </li>
              <li class="{{ setActiveRoute('almacen.laboratorio*')}}">
                <a class="" href="{{route('almacen.laboratorio.index')}}">
                  Laboratorio
                </a>
              </li>
            </ul>
        </li>
        <li class="{{ setActiveRoute('compras*')}}">
          <a>
            <i class="fa fa-shopping-cart {{ setActiveColor('compras*')}}"></i>
              Compras
              <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu " style="{{ openmenu('compras*')}}">
              <li class="{{ setActiveRoute('compras*')}}">
                <a class="" href="{{route('compras.orden.index')}}  ">
                  Orden de compra
                </a>
              </li>
              <li class="{{ setActiveRoute('compra.ingresar*')}}">
                <a class="" href="{{route('compra.orden.ingresar')}}  ">
                  Ingresar Orden
                </a>
              </li>
              <li class="{{ setActiveRoute('compra.verificar*')}}">
                <a class="" href="{{route('compra.orden.verificar')}}  ">
                  Verificar factura
                </a>
              </li>
            </ul>
        </li>
        <li class="{{ setActiveRoute('ventas*')}}">
          <a>
            <i class="fa fa-file-invoice {{ setActiveColor('ventas*')}}"></i>
              Ventas
              <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu " style="{{ openmenu('ventas*')}}">
               <li class="{{ setActiveroute('ventas.facturar*')}}">
                <a class="" href="{{route('ventas.facturar')}}">
                 Facturar
                </a>
              </li>
              <li class="{{ setActiveroute('ventas.index*')}}">
                <a class="" href="{{route('ventas.index')}}">
                 Facturas
                </a>
              </li>
            </ul>
        </li>
        <li class="{{ setActiveRoute('inventario*')}}">
          <a>
            <i class="fa fa-boxes {{ setActiveColor('inventario*')}}"></i>
              inventario
              <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu " style="{{ openmenu('inventario*')}}">
             {{--  <li class="{{ setActiveroute('inventario.stock*')}}">
                <a class="" href="{{route('inventario.stock')}}">
                  Stock
                </a>
              </li> --}}
               <li class="{{ setActiveroute('inventario*')}}">
                <a class="" href="{{route('inventario.diferencias')}}  ">
                  Diferencias
                </a>
              </li>
            </ul>
        </li>
        <li class="{{ setActiveRoute('caja*')}}">
          <a>
            <i class="fa fa-cash-register {{ setActiveColor('caja*')}}"></i>
              Caja
              <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu " style="{{ openmenu('caja*')}}">
              <li class="{{ setActiveroute('caja')}}">
                <a class="" href="{{route('caja.balance')}}">
                  Balance
                </a>
              </li>
         {{--      <li class="">
                <a class="" href="">
                  Ingresos
                </a>
              </li>
              <li class="">
                <a class="" href="">
                  Gastos
                </a>
              </li> --}}
            </ul>
        </li>
      </ul>
    </div>
  </div>
<!-- /sidebar menu -->