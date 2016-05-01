$(function(){
    $("#modprincipal").addClass("active open");
})

var primerdia=""; ultimodia=""; dia="";
$(".diaevento").click(function(){
    dia=$(this).text();
})

$('#calendario tr td').click(function(){
    var mes = $('#calendario tr td').index(this)-1;
    while(mes>12){ 
        mes=mes-12-2;
    }
    if(mes<10){ 
        mes="0"+mes;
    }
    if (dia!="") {
        $("#fechaevento").val(dia+'-'+mes+'-2016'); 
        dia="";
    }
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

function nuevocancel(){
    $("#fechaevento").datepicker("remove"); 
    $("#form_evento").trigger("reset");
}