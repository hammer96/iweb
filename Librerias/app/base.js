var _base_url = window.location;

function guardar(campo){
	$.ajax({
		type:"POST",
		data:$('#form').serialize(),
		url:_base_url+'/guardar',
		success: function(data){

			var info = data.split("|");
			switch(info[1]) {
				case "i":
					alertify.success("Se Guardo Correctamente");
				break;
				case "m":
					alertify.success("Se Modifico Correctamente");
				break;
				case "ei":
					alertify.error("Error al insertar");
				break;
				case "em":
					alertify.error("Error al modificar");
				break;
			}
			$("#id").val("");
			$("#form").trigger("reset");
			$("#data_body").empty();
			$("#data_body").html(info[0]);
			$("#page-sidebar").hide();

		}
	});
}

$(document).on("click","#eliminar",function(e) {
	e.preventDefault();
	var id = $(this).attr("rec_id");
	alertify.confirm("¿Seguro que Desea Eliminar Este Registro?", function (e) {
		if (e) {
			$.ajax({
				type:"POST",
				data:"id="+id,
				url:_base_url+'/eliminar',
				success: function(data){
					var info = data.split("|");
					if (info[1]=="1") {
						alertify.success("Se Elimino Correctamente");
					}else{
						alertify.error("Error al eliminar");
					}

					$("#data_body").empty();
					$("#data_body").html(info[0]);
				}
			});
		} else {
			alertify.error("Eliminacion Cancelada");
		}
	});
})



$(".cancelar").on("click",function(e) {
	e.preventDefault();
	$("#page-sidebar").hide();
})

$(".nuevo").on("click",function(e) {
	e.preventDefault();
	$("#form").trigger("reset");
	$("#page-sidebar").css("right","0px");
	$("#page-sidebar").show();
})
