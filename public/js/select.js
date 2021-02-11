window.onload = cargar_ciudad();
$(function(){
	$('#id_departamento').on('change',onSelectDepto);
});


$(function(){
	$('#id_departamento').on('load',onSelectDepto);
});

function cargar_ciudad()
{
	if($('#id_departamento').val()<>0)
	{
		onSelectDepto();
	}

}

function onSelectDepto()
{
	var id = $(this).val();
	if(!id)
		$("#id_ciudad").html('<option value="">Seleccione ciudad</option>');
	//peticion ajax al servidor
	$.get('/ciudades/'+id,function(data){

		var html_select = '<option value="">Seleccione ciudad</option>';
		for(var i=0; i<data.length; ++i)
		html_select += '<option value="'+data[i].id+'">'+data[i].codigo+" - " +data[i].nombre+'</option>';
		$("#id_ciudad").html(html_select);

	});

}