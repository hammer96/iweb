$(function(){
    $("#modprincipal").addClass("active open");
    $("#servicio").hide();
    $("#aborto").hide();
    $("#muerte").hide();
    $("#venta").hide();
    $("#celo").hide();
    $("#parto").hide();
    $("#secado").hide();
})

var primerdia=""; ultimodia=""; dia=""; pocision=0;
$(".diaevento").click(function(){
    dia=$(this).text();
})

$('#calendario tr td').click(function(){
    $("#evento > option[value='evento']").attr('selected', 'selected');
    var mes = $('#calendario tr td').index(this)-1;
    while(mes>12){ 
        mes=mes-12-2;
        pocision=pocision+12+2;
    }
    if(mes<10){ 
        mes="0"+mes;
    }
    if (dia!="") {
        $("#fechaevento").val(dia+'-'+mes+'-2016'); 
        dia="";
    }
    var animal_id=$("tr td")[pocision].innerHTML.split(" / ");
    $("#ani_id").val(animal_id[0]); pocision=0;

	primerdia='01/'+mes+'/2016';
	ultimodia=DiasMes(mes, 2016)+'/'+mes+'/2016';
    $("#fechaevento" ).datepicker({ 
    	format: "dd-mm-yyyy",
    	startDate: primerdia,
    	endDate: ultimodia
    }); 
});

function DiasMes(month, year) {
  	return new Date(year || new Date().getFullYear(), month, 0).getDate();
}

$("#evento").on("change", function () {
    if($(this).val()==1){
        $("#parto").show();
    }else{
        $("#parto").hide();
    }

    if($(this).val()==2){
        $("#aborto").show();
    }else{
        $("#aborto").hide();
    }

    if($(this).val()==3){
        $("#celo").show();
    }else{
        $("#celo").hide();
    }  

    if($(this).val()==4){
        $("#servicio").show();
    }else{
        $("#servicio").hide();
    } 

    if($(this).val()==5){
        $("#muerte").show();
    }else{
        $("#muerte").hide();
    }

    if($(this).val()==6){
        $("#venta").show();
    }else{
        $("#venta").hide();
    }

    if($(this).val()==7){
        $("#secado").show();
    }else{
        $("#secado").hide();
    }
});

function nuevocancel(){
    $("#fechaevento").datepicker("remove");
    $("#evento").removeAttr("disabled");
    $("#evento").removeAttr("selected");   
    $("#form_evento").trigger("reset");
    $("#servicio").hide();
    $("#aborto").hide();
    $("#muerte").hide();
    $("#venta").hide();
    $("#celo").hide();
    $("#parto").hide();
    $("#secado").hide();
}

function guardar(campo){
    if(campo.evento.value=="evento"){
        $('#evento').focus(); return 0;
    }
    if(campo.evento.value==1){
        if(campo.rpparto.value==""){
            $('#rpparto').focus();return 0;
        }
        if(campo.tipoparto.value=="tipoparto"){
            $('#tipoparto').focus();return 0;
        }
        if(campo.estadocria.value=="estadocria"){
            $('#estadocria').focus();return 0;
        }
    }
    if(campo.evento.value==2){
        if(campo.causaaborto.value=="causaaborto"){
            $('#causaaborto').focus();return 0;
        }
    }
    if(campo.evento.value==3){
        if(campo.viaaplica.value=="viaaplica"){
            $('#viaaplica').focus();return 0;
        }
        if(campo.causanoinse.value=="causanoinse"){
            $('#causanoinse').focus();return 0;
        }
        if(campo.medgenital.value=="medgenital"){
            $('#medgenital').focus();return 0;
        }
    }
    if(campo.evento.value==4){
        if(campo.tiposervicio.value=="tiposervicio"){
            $('#tiposervicio').focus();return 0;
        }
        if(campo.reproductor.value=="reproductor"){
            $('#reproductor').focus();return 0;
        }
    }
    if(campo.evento.value==5){
        if(campo.espmuerte.value=="espmuerte"){
            $('#espmuerte').focus();return 0;
        }
    }
    if(campo.evento.value==6){
        if(campo.espventa.value=="espventa"){
            $('#espventa').focus();return 0;
        }
    }
    if(campo.evento.value==7){
        if(campo.medcuartosm.value=="medcuartosm"){
            $('#medcuartosm').focus();return 0;
        }
    }

    if(campo.fechaevento.value==""){
        $('#fechaevento').focus(); return 0;
    }
    $("#evento").removeAttr("disabled");
    $.ajax({
        type:"POST",
        data:$('#form_evento').serialize(),
        url:URL+'granja/guardar',
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

function modificar(refevento,evento,animalevento){
    $("#evento").attr("disabled","disabled");
    $.ajax({
        type:"POST",
        data:"refevento_id="+refevento+"& evento="+evento,
        url:URL+'granja/modificar',
        success: function(data){
            var datos = eval(data);
            $("#id").val(animalevento);
            $("#refevento").val(refevento);
            $("#evento > option[value='"+evento+"']").attr('selected', 'selected');
            //Si el evento es un parto
            if(evento==1){
                $("#parto").show();
                $("#rpparto").val(datos[0]['par_rp']);
                $("#tipoparto > option[value='"+datos[0]['par_tipo_parto']+"']").attr('selected', 'selected');
                $("#estadocria > option[value='"+datos[0]['par_estado_cria']+"']").attr('selected', 'selected');
            }
            //Si el evento es un aborto
            if(evento==2){
                $("#aborto").show();
                $("#causaaborto > option[value='"+datos[0]['abo_causaaborto']+"']").attr('selected', 'selected');
            }
            //Si el evento es un servicio
            if(evento==3){
                $("#celo").show();
                $("#viaaplica > option[value='"+datos[0]['cel_via_aplicacion']+"']").attr('selected', 'selected');
                $("#causanoinse > option[value='"+datos[0]['cel_medicina_genital']+"']").attr('selected', 'selected');
                $("#medgenital > option[value='"+datos[0]['cel_causa_no_inseminal']+"']").attr('selected', 'selected');
            }
            //Si el evento es un servicio
            if(evento==4){
                $("#servicio").show();
                $("#tiposervicio > option[value='"+datos[0]['ser_tipo_servicio']+"']").attr('selected', 'selected');
                $("#reproductor > option[value='"+datos[0]['ser_reproductor']+"']").attr('selected', 'selected');
            }
            //Si el evento es un aborto
            if(evento==5){
                $("#muerte").show();
                $("#espmuerte > option[value='"+datos[0]['mue_espec_muerte']+"']").attr('selected', 'selected');
            }
            //Si el evento es un aborto
            if(evento==6){
                $("#venta").show();
                $("#espventa > option[value='"+datos[0]['ven_especificacion_venta']+"']").attr('selected', 'selected');
            }
            //Si el evento es un secado
            if(evento==7){
                $("#secado").show();
                $("#medcuartosm > option[value='"+datos[0]['sec_med_cuartos_mamarios']+"']").attr('selected', 'selected');
            }
        }
    });
}

function actualizar() {
    location.href=URL+'granja';
}
