<!DOCTYPE html>
	<head>
		<title>Factura {{$factura->numero}}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap -->
	  	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css')}} ">
	  	   <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	    <!-- Font Awesome -->
</head>
<body>
      <!-- title row -->
      <div class="row col-lg-12 col-md-12 col-sm-12">
        <div class="">
          <h1>
              <i class="fa fa-globe"></i> Factura No.<small class="pull-right">{{$factura->numero}}</small>
          </h1>
        </div>
      </div>
      <div class="row col-lg-12 col-md-12 col-sm-12">
      	<table class="border">
      		<thead>
      			<tr>
      				<td colspan="2">Empresa</td>
      				<td colspan="2">Cliente</td>
      				<td colspan="2">Factura</td>
      			</tr>
      		</thead>
      		<tbody>
      			<tr><td>Nombre</td><td>Datos de la empresa</td><td>Nombre</td><td>Datos del cliente</td></tr>
      			<tr><td>Nombre</td><td>Datos de la empresa</td><td>Nombre</td><td>Datos del cliente</td></tr>
      			<tr><td>Nombre</td><td>Datos de la empresa</td><td>Nombre</td><td>Datos del cliente</td></tr>
      			<tr><td>Nombre</td><td>Datos de la empresa</td><td>Nombre</td><td>Datos del cliente</td></tr>
      			<tr><td>Nombre</td><td>Datos de la empresa</td><td>Nombre</td><td>Datos del cliente</td></tr>
      		</tbody>
      	</table>
      </div>
</body>

</html>