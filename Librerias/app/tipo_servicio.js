$(function(){
	$("#modeventos").addClass("active open");
	$("#reqtiposervicio").addClass("active");

})

function validar(campo)
{

	if(campo.tps_descripcion.value==""){
		$('#tps_descripcion').focus(); return 0;
	}


	if(campo.tps_abreviatura.value==""){
		$('#tps_abreviatura').focus(); return 0;
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
			$("#id").val(datos.tps_id);
			$("#tps_descripcion").val(datos.tps_descripcion);
			$("#tps_abreviatura").val(datos.tps_abreviatura);


		}
	});
})