

var flag_folio = true;
var flag_concepto = true;
var flag_importe = true;
var flag_cuenta = true;
var flag_observaciones = true;
var flag_drop_proveedor = true;
var flag_drop_cuenta = true;

function validar_folioR(){
	//console.log("entra");
	var cadena = $('#folio_factura').val(); 
    var special = /[^0-9a-zA-Z]/g.test(cadena);
   
    if(special){

    	$("#error_folio").html('*Sólo numeros y letras').css("color","red");
    	$("#error_folio").show();
    	flag_folio = false;

    }else{
    	$("#error_folio").hide();
    	flag_folio = true;
    	
    }	
}

function validar_conceptoR(){
	  var cadena = $('#concepto').val();
    var special = /[^áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/g.test(cadena);

    if(special==true){
      	$("#error_concepto").html('*No caracteres especiales').css("color","red");
      	$("#error_concepto").show();	
      	flag_concepto = false;
    }else{
      	$("#error_concepto").hide();
      	flag_concepto = true;
    }	
}

function validar_importeR(){
	var cadena = $('#importe').val();
  var special = /[^0-9.]/g.test(cadena);
  if(special){
      $("#error_importe").html('*Sólo números').css("color","red");
      $("#error_importe").show(); 
      flag_importe = false;
  }else{
      $("#error_importe").hide();
      flag_importe = true;
  }

}

function validar_cuenta_bancariaR(){
	var tamano = $("#cuenta_bancaria_egreso").val().length;
  		if(!(/^[\d]+$/i.test($('#cuenta_bancaria_egreso').val()))){
    			$("#error_cuenta_bancaria_egreso").html('*Sólo dígitos').css("color","red");
    			$("#error_cuenta_bancaria_egreso").show();	
    			flag_cuenta = false;
  		}else{
    			$("#error_cuenta_bancaria_egreso").hide();
    			flag_cuenta = true;
  		}
}

function validar_drop_proveedorR(){
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


function validar_drop_cuentaR(){
    var cuenta = $('#selected_cuenta').val();
    if(cuenta=='0'){
        $("#error_cuenta_egreso").html('*Debes seleccionar una cuenta contable').css("color","red");
        $("#error_cuenta_egreso").show();
        flag_drop_cuenta = false;
    }else{
        $("#error_cuenta_egreso").hide();
        flag_drop_cuenta = true;
    }
}

function validar_observacionesR(){
	
  	var cadena = $('#observaciones').val();
    var special = /[^áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/g.test(cadena);	
    if(special==true){
      	$("#error_observaciones").html('*No caracteres especiales').css("color","red");
      	$("#error_observaciones").show();	
      	flag_observaciones = false;
    }else{
      	$("#error_observaciones").hide();
      	flag_observaciones = true;
    }	
}




function validar_formE(){


	var proveedor = $('#selected_proveedor').val();
	var cuenta = $('#selected_cuenta').val();
	
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

  
	if(!(flag_folio && flag_concepto && flag_importe && flag_cuenta && flag_observaciones && flag_drop_proveedor && flag_drop_cuenta)){      
      return false;
	}
  	
}


