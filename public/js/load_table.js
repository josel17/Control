
$(document).ready(function(){
		$('#proveedor').on('change',loadproductos);
});


$(function(){
	$('#proveedor').on('load',loadproductos);
});


function loadproductos()
{
	alert('saludo');
	var id = $(this).val();
	if(!id)
		$("#table_productos").html('Tabla productos');
	//peticion ajax al servidor
	$.get('/buscarproveedor/'+id,function(data){

		var html_select = '<tr><th style="width: 1%">No</th><th style="width: 1%">Codigo</th><th style="width: 10%">Nombre</th><th style="width: 10%">Categoria</th><th style="width: 10%">Precio</th><th style="width: 10%">Laboratorio</th><th style="width: 10%"></th></tr>';
		for(var i=0; i<data.length; ++i)
		html_select+='<tr><th style="width: 1%"><th><th style="width: 1%">'+data[i].codigo+'</th><th style="width: 10%">'+data[i].nombre+'</th><th style="width: 10%">'+data[i].id_categoria+'</th><th style="width: 10%">'+data[i].precio_compra+'</th><th style="width: 10%">'+data[i].id_proveedor+'</th><th style="width: 10%"></th></tr>';

		$("#table_productos").html(html_select);

	});

}