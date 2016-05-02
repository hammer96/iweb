$(function(){
	$("#modreproduccion").addClass("active open");
	$("#reqsecado").addClass("active");

})

function validar(campo)
{

	if(campo.rec_animal.value==""){
		$('#rec_animal').focus(); return 0;
	}
	if(campo.rec_causa_rechazo.value==""){
		$('#rec_causa_rechazo').focus();return 0;
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
			$("#id").val(datos.rec_id);
			$('select[name=rec_animal] > option[value="'+datos.rec_animal+'"]').attr('selected', 'selected');
			$('select[name=rec_causa_rechazo] > option[value="'+datos.rec_causa_rechazo+'"]').attr('selected', 'selected');
		}
	});
})