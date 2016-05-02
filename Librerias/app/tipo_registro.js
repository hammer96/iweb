$(function(){
	$("#modanimales").addClass("active open");
	$("#reqtiporeg").addClass("active");

})

function validar(campo)
{

	if(campo.tiporeg_descripcion.value==""){
		$('#tiporeg_descripcion').focus(); return 0;
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
			$("#id").val(datos.tiporeg_id);
			$("#tiporeg_descripcion").val(datos.tiporeg_descripcion);


		}
	});
})