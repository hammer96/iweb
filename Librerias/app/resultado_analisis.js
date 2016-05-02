$(function(){
	$("#modreproduccion").addClass("active open");
	$("#reqreganalisis").addClass("active");

})

function validar(campo)
{

	if(campo.res_descripcion.value==""){
		$('#res_descripcion').focus(); return 0;
	}
	if(campo.res_abreviatura.value==""){
		$('#res_abreviatura').focus();return 0;
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
			$("#id").val(datos.res_id);
			$("#res_descripcion").val(datos.res_descripcion);
			$("#res_abreviatura").val(datos.res_abreviatura);

		}
	});
})