$(function(){
	$("#modanimales").addClass("active open");
	$("#reqanimal").addClass("active");
})

function guardar(campo){
	if(campo.descripcion.value==""){
		$('#descripcion').focus(); return 0;
	}
	if(campo.abreviatura.value==""){
		$('#abreviatura').focus();return 0;
	}
	$.ajax({
		type:"POST",
		data:$('#form_raza').serialize(),
		url:URL+'Raza/guardar',
		success: function(data){
			if (data=="SuccessI") {
				$("#iconomensaje").html("<i class='fa fa-check-circle-o' style='font-size:70px;color:lightseagreen;'></i>");
				$("#textomensaje").html("Se Registró Correctamente ...");
			}else{
				if (data=="ErrorI") {
					$("#iconomensaje").html("<i class='fa fa-times-circle-o' style='font-size:70px;color:red;'></i>");
					$("#textomensaje").html("No Se Registró Correctamente ...");
				}else{
					if (data=="SuccessM") {
						$("#iconomensaje").html("<i class='fa fa-check-circle-o' style='font-size:70px;color:lightseagreen;'></i>");
						$("#textomensaje").html("Se Modificó Correctamente ...");
					}else{
						$("#iconomensaje").html("<i class='fa fa-times-circle-o' style='font-size:70px;color:red;'></i>");
						$("#textomensaje").html("No Se Modificó Correctamente ...");
					}
				}
			}
			$('#Alert').modal({ show:true, backdrop:'static'});
		}
	});
}

function modificar(raz_id){
	$.ajax({
		type:"POST",
		data:"raz_id="+raz_id,
		url:URL+'Raza/modificar',
		success: function(data){
			var datos = eval(data);
			$("#id").val(datos[0]['raz_id']);
			$("#descripcion").val(datos[0]['raz_descripcion']);
			$("#abreviatura").val(datos[0]['raz_abreviatura']);
		}
	});
}

function eliminar(raz_id){
	$.ajax({
		type:"POST",
		data:"raz_id="+raz_id,
		url:URL+'Raza/eliminar',
		success: function(data){
			if (data=="SuccessI") {
				$("#iconomensaje").html("<i class='fa fa-check-circle-o' style='font-size:70px;color:lightseagreen;'></i>");
				$("#textomensaje").html("Se Eliminó Correctamente ...");
			}else{
				$("#iconomensaje").html("<i class='fa fa-times-circle-o' style='font-size:70px;color:red;'></i>");
				$("#textomensaje").html("No Se Eliminó Correctamente ...");
			}
			$('#Alert').modal({ show:true, backdrop:'static'});
		}
	});
}

function actualizar() {
	location.href=URL+'Raza';
}

function nuevocancel(){
	$("#tiporegistro").trigger("reset");
}

