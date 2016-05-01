$(function(){
	$("#modeventos").addClass("active open");
	$("#reqtipoparto").addClass("active");

})

function validar(campo)
{

	if(campo.tpa_descripcion.value==""){
		$('#tpa_descripcion').focus(); return 0;
	}
	if(campo.tpa_abreviatura.value==""){
		$('#tpa_abreviatura').focus();return 0;
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
			$("#id").val(datos.tpa_id);
			$("#tpa_descripcion").val(datos.tpa_descripcion);
			$("#tpa_abreviatura").val(datos.tpa_abreviatura);

		}
	});
})