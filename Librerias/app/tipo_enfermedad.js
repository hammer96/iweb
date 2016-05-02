$(function(){
	$("#modenfermedades").addClass("active open");
	$("#reqtipoenfermedad").addClass("active");

})

function validar(campo)
{

	if(campo.tpe_descripcion.value==""){
		$('#tpe_descripcion').focus(); return 0;
	}
	if(campo.tpe_abreviatura.value==""){
		$('#tpe_abreviatura').focus();return 0;
	}

	guardar();
}


$(document).on("click","#modificar",function(e) {
	e.preventDefault();
	var id = $(this).attr("rec_id");
	$("#page-sidebar").css("right","0px");
	$("#page-sidebar").show();

	$.ajax({
		type:"POST",
		data:"id="+id,
		url:_base_url+'/modificar',
		success: function(data){
			var datos = JSON.parse(data);
			$("#id").val(datos.tpe_id);
			$("#tpe_descripcion").val(datos.tpe_descripcion);
			$("#tpe_abreviatura").val(datos.tpe_abreviatura);
		}
	});
})