$(function(){
	$("#modreproduccion").addClass("active open");
	$("#reqreganalisis").addClass("active");

})

function validar(campo)
{

	if(campo.rga_animal.value==""){
		$('#rga_animal').focus(); return 0;
	}
	if(campo.rga_tipo_analisis.value==""){
		$('#rga_tipo_analisis').focus();return 0;
	}
	if(campo.rga_resultado_analisis.value==""){
		$('#rga_resultado_analisis').focus();return 0;
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
			$("#id").val(datos.rga_id);
			$('select[name=rga_animal] > option[value="'+datos.rga_animal+'"]').attr('selected', 'selected');
			$('select[name=rga_resultado_analisis] > option[value="'+datos.rga_resultado_analisis+'"]').attr('selected', 'selected');
			$('select[name=rga_tipo_analisis] > option[value="'+datos.rga_tipo_analisis+'"]').attr('selected', 'selected');
		}
	});
})