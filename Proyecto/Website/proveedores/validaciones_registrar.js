document.getElementById("rfc").onkeyup =  validar_rfc;
document.getElementById("alias").onkeyup =  validar_alias;
document.getElementById("razon_social").onkeyup =  validar_razon;
document.getElementById("nombre_contacto").onkeyup =  validar_nombre;
document.getElementById("telefono_proveedor").onkeyup =  validar_telefono;
document.getElementById("banco").onkeyup =  validar_banco;
document.getElementById("cuenta_bancaria").onkeyup =  validar_cuenta;
document.getElementById("guardar_proveedor").onclick =  validar_form;


var flag_rfc = true;
var flag_alias = true;
var flag_razon = true;
var flag_nombre = true;
var flag_telefono = true;
var flag_banco = true;
var flag_cuenta = true;

function validar_rfc(){
    var tamano = $("#rfc").val().length;

    if(tamano<10){
          $("#error_rfc").html('*Debe tener mínimo 10 caracteres alfanuméricos').css("color","red");
          $("#error_rfc").css('padding-left','10%');
          $("#error_rfc").show();
          flag_rfc = false;
    }else{
          $("#error_rfc").hide();
          var cadena = $('#rfc').val();

          var result_numeros = /[0-9]/g.test(cadena);
          var result_letras = /[A-Za-z]/g.test(cadena);
          var special = /[^A-Za-z0-9]+/g.test(cadena);
          if(special || !result_numeros || !result_letras){
            
              $("#error_rfc").html('*Debe tener numeros y letras').css("color","red");
              $("#error_rfc").show();
              flag_rfc = false;
          }else{
              $("#error_rfc").hide();
              flag_rfc = true;
          }
       
    }
 
}


function validar_alias(){
    var cadena = $('#alias').val();
    var special = /[^áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/g.test(cadena);
    if(special){
        $("#error_alias").html('*No caracteres especiales').css("color","red");
        $("#error_alias").css('padding-left','10%');
        $("#error_alias").show();  
        flag_alias = false;

    }else{

        $("#error_alias").hide();
        flag_alias = true;
    } 
}

function validar_razon(){
    var cadena = $('#razon_social').val();
    var special = /[^áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/g.test(cadena);
    

    if(special){

        $("#error_razon").html('*No caracteres especiales').css("color","red");
        $("#error_razon").css('padding-left','10%');
        $("#error_razon").show();  
        flag_razon = false;

    }else{

        $("#error_razon").hide();
        flag_razon = true;
    } 
}

function validar_nombre(){
  
    var cadena = $('#nombre_contacto').val();
   	var special = /[^áéíóúüñÑÁÉÍÓÚüA-Za-z.\s]/g.test(cadena);

    if(special){

        $("#error_nombre").html('*No caracteres especiales. No números').css("color","red");
        $("#error_nombre").css('padding-left','7%');
        $("#error_nombre").show();  
        flag_nombre = false;

    }else{

        $("#error_nombre").hide();
        flag_nombre = true;
    } 
}


function validar_telefono(){
    var cadena = $('#telefono_proveedor').val();
    var special = /[^0-9-\s]/g.test(cadena);
    if(special){
        $("#error_telefono").html('*Sólo números').css("color","red");
       // $("#error_nombre").css('padding-left','10%');
        $("#error_telefono").show(); 
        flag_telefono = false;
    }else{
        $("#error_telefono").hide();
        flag_telefono = true;
    }
}

function validar_banco(){
  
    var cadena = $('#banco').val();
   	var special = /[^áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/g.test(cadena);

    if(special){

        $("#error_banco").html('*No caracteres especiales').css("color","red");
        $("#error_banco").css('padding-left','5%');
        $("#error_banco").show();  
        flag_banco = false;

    }else{

        $("#error_banco").hide();
        flag_banco = true;
    } 
}

function validar_cuenta(){
    var tamano = $("#cuenta_bancaria").val().length;
    if(tamano<18 || !(/^[\d]+$/i.test($('#cuenta_bancaria').val()))){
          $("#error_cuenta").html('*Deben ser exactamente 18 dígitos').css("color","red");
          $("#error_cuenta").css('padding-left','7%');
          $("#error_cuenta").show();  
          flag_cuenta = false;
    }else{
          $("#error_cuenta").hide();
          flag_cuenta = true;
    }
}

function validar_form(){
	
  	if(!(flag_rfc && flag_alias && flag_razon && flag_nombre && flag_telefono && flag_banco && flag_cuenta)){
  		return false;
  	}
}
