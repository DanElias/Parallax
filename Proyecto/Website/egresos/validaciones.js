document.getElementById("folio_factura").onkeyup =  validar_folio;
document.getElementById("concepto").onkeyup =  validar_concepto;
document.getElementById("importe").onkeyup =  validar_importe;
document.getElementById("cuenta_bancaria_egreso").onkeyup =  validar_cuenta_bancaria;
document.getElementById("drop_proveedor").onchange =  validar_drop_proveedor;
document.getElementById("drop_cuenta").onchange =  validar_drop_cuenta;
//LOS DROPS SE VALIDAN CUANDO LE DAS SUBMIT
document.getElementById("observaciones").onkeyup =  validar_observaciones;
//document.getElementById("guardar_egreso").onclick =  validar_form;


var flag_folio = true;
var flag_concepto = true;
var flag_importe = true;
var flag_cuenta = true;
var flag_observaciones = true;
var flag_drop_proveedor = true;
var flag_drop_cuenta = true;

function validar_folio(){
	var cadena = $('#folio_factura').val();
	console.log(cadena);
    var result_numeros = /[0-9]+/g.test(cadena);
    var result_letras = /[A-Za-z]+/g.test(cadena);
    var special = /^[!@#\/<>$%\^\&*\)\(+=._-]+$/g.test(cadena);
    //áéíóúüñÑÁÉÍÓÚü
    if(result_numeros==false||result_letras==false){
    	//console.log("debe tener letras y numeros");
    	$("#error_folio").html('*Sólo numeros y letras').css("color","red");
    	$("#error_folio").show();
    	flag_folio = false;

    }else{
    	$("#error_folio").hide();
    	flag_folio = true;
    	//console.log("ya cumple con las dos");
    }	
}

function validar_concepto(){
	var cadena = $('#concepto').val();
	//console.log(cadena);

    var special = /[\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:/]+$/g.test(cadena)
    var size = cadena.length;

    //záéíóúüñÑÁÉÍÓÚü
    if(special==true){
    	console.log(cadena);
    	$("#error_concepto").html('*No caracteres especiales').css("color","red");
    	$("#error_concepto").show();	
    	flag_concepto = false;
    }else{
    	$("#error_concepto").hide();
    	flag_concepto = true;
    }	
}

function validar_importe(){
	var cadena = $('#importe').val();
	if(isNaN(cadena)){
		$("#error_importe").html('*Sólo números').css("color","red");
    	$("#error_importe").show();	
    	flag_importe = false;
	}else{
		$("#error_importe").hide();
    	flag_importe = true;
	}
}

function validar_cuenta_bancaria(){
	var tamano = $("#cuenta_bancaria_egreso").val().length;
  		if(tamano<18 || !(/^[\d]+$/i.test($('#cuenta_bancaria_egreso').val()))){
  			$("#error_cuenta_bancaria_egreso").html('*Deben ser exactamente 18 dígitos').css("color","red");
  			$("#error_cuenta_bancaria_egreso").show();	
  			flag_cuenta = false;
  		}else{
  			$("#error_cuenta_bancaria_egreso").hide();
  			flag_cuenta = false;
  		}
}

function validar_drop_proveedor(){
    var proveedor = $('#selected_proveedor').val();
    if(proveedor=='0'){
          $("#error_proveedor_egreso").html('*Debes seleccionar un proveedor').css("color","red");
          $("#error_proveedor_egreso").show();
          flag_drop_proveedor = false;
    }else{
          $("#error_proveedor_egreso").hide();
          flag_drop_proveedor = true;
    }
}


function validar_drop_cuenta(){
    var cuenta = $('#selected_cuenta').val();
    if(cuenta=='0'){
        $("#error_cuenta_egreso").html('*Debes seleccionar una cuenta').css("color","red");
        $("#error_cuenta_egreso").show();
        flag_drop_cuenta = false;
    }else{
        $("#error_cuenta_egreso").hide();
        flag_drop_cuenta = true;
    }
}

function validar_observaciones(){
	
  	var cadena = $('#observaciones').val();
	//console.log(cadena);

    var special = /[\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:/]+$/g.test(cadena)
    var size = cadena.length;

    //záéíóúüñÑÁÉÍÓÚü
    if(special==true){
    	console.log(cadena);
    	$("#error_observaciones").html('*No caracteres especiales').css("color","red");
    	$("#error_observaciones").show();	
    	flag_observaciones = false;
    }else{
    	$("#error_observaciones").hide();
    	flag_observaciones = true;
    }	
}

$(document).ready(function(){
  //console.log("hola");
  
    $("#form_egreso").submit(function() {
       console.log("hola hola hola");
    });
});


/*
function validar_form(){
	var proveedor = $('#selected_proveedor').val();
	//console.log($('#selected_proveedor').find('option:selected').css('color', 'red')); 
	var cuenta = $('#selected_cuenta').val();
	//console.log(proveedor);
	//console.log(cuenta);
	if(proveedor=='0'){
		$("#error_proveedor_egreso").html('*Debes seleccionar un proveedor').css("color","red");
		$("#error_proveedor_egreso").show();
  		flag_drop_proveedor = false;
	}else{
		$("#error_proveedor_egreso").hide();
  		flag_drop_proveedor = true;
	}

	if(cuenta=='0'){
		$("#error_cuenta_egreso").html('*Debes seleccionar una cuentas').css("color","red");
		$("#error_cuenta_egreso").show();
  		flag_drop_cuenta = false;
	}else{
		$("#error_cuenta_egreso").hide();
  		flag_drop_cuenta = true;
	}

	if(flag_folio&& flag_concepto && flag_importe && flag_cuenta && flag_observaciones && flag_drop_proveedor && flag_drop_cuenta){
      console.log("deberia funcionar e ir al registro ");
      //return true;
	}else{
      console.log("Una bandera es falsa ");
      return false;
  }
  	
}*/

//console.log("ESTA ES FLAG:");console.log(flag);	
