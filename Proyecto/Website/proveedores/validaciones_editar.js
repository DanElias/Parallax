var flag_rfc = true;
var flag_alias = true;
var flag_razon = true;
var flag_nombre = true;
var flag_telefono = true;
var flag_banco = true;
var flag_cuenta = true;

function validar_rfc(){
    var tamano = $("#rfc_editar").val().length;

    if(tamano<10){
          $("#error_rfc_editar").html('*Debe tener mínimo 10 caracteres alfanuméricos').css("color","red");
          $("#error_rfc_editar").css('padding-left','10%');
          $("#error_rfc_editar").show();
          flag_rfc = false;
    }else{
          $("#error_rfc_editar").hide();
          var cadena = $('#rfc_editar').val();

          var result_numeros = /[0-9]/g.test(cadena);
          var result_letras = /[A-Za-z]/g.test(cadena);
          var special = /[\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\,|\.|\>|\?|\/|\""|\;|\:/|-]/g.test(cadena)
         
          if(result_numeros==false||result_letras==false||special==true){

              $("#error_rfc_editar").html('*Sólo numeros y letras').css("color","red");
              $("#error_rfc_editar").show();
              flag_rfc = false;

          }else{
              $("#error_rfc_editar").hide();
              flag_rfc = true;
          }
    }
 
}


function validar_alias(){
    var cadena = $('#alias_editar').val();
    var special = /[\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\>|\?|\/|\""|\;|\:/|-]/g.test(cadena)
    var size = cadena.length;

    if(special==true){
        $("#error_alias_editar").html('*No caracteres especiales').css("color","red");
        $("#error_alias_editar").css('padding-left','10%');
        $("#error_alias_editar").show();  
        flag_alias = false;

    }else{

        $("#error_alias_editar").hide();
        flag_alias = true;
    } 
}

function validar_razon(){
    var cadena = $('#razon_social_editar').val();
    var special = /[\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\>|\?|\/|\""|\;|\:/|-]/g.test(cadena)
    var size = cadena.length;

    if(special==true){

        $("#error_razon_editar").html('*No caracteres especiales').css("color","red");
        $("#error_razon_editar").css('padding-left','10%');
        $("#error_razon_editar").show();  
        flag_razon = false;

    }else{

        $("#error_razon_editar").hide();
        flag_razon = true;
    } 
}

function validar_nombre(){
  
    var cadena = $('#nombre_contacto_editar').val();

    var result_numeros = /[0-9]/g.test(cadena);
    var special = /[\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\>|\?|\/|\""|\;|\:/|-]/g.test(cadena)
    var size = cadena.length;

    if(special==true){

        $("#error_nombre_editar").html('*No caracteres especiales').css("color","red");
        $("#error_nombre_editar").css('padding-left','7%');
        $("#error_nombre_editar").show();  
        flag_nombre = false;

    }else{

        $("#error_nombre_editar").hide();
        flag_nombre = true;
    } 
}


function validar_telefono(){
    var cadena = $('#telefono_proveedor_editar').val();
    var special = /[^0-9-\s]/g.test(cadena);
    if(special){
        $("#error_telefono_editar").html('*Sólo números').css("color","red");
       // $("#error_nombre").css('padding-left','10%');
        $("#error_telefono_editar").show(); 
        flag_telefono = false;
    }else{
        $("#error_telefono_editar").hide();
        flag_telefono = true;
    }
}

function validar_banco(){
  
    var cadena = $('#banco_editar').val();

    var result_numeros = /[0-9]/g.test(cadena);
    var special = /[\`|\~|\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\+|\=|\[|\{|\]|\}|\||\\|\'|\<|\>|\?|\/|\""|\;|\:/|-]/g.test(cadena)
    var size = cadena.length;

    if(special==true){

        $("#error_banco_editar").html('*No caracteres especiales').css("color","red");
        $("#error_banco_editar").css('padding-left','5%');
        $("#error_banco_editar").show();  
        flag_banco = false;

    }else{

        $("#error_banco_editar").hide();
        flag_banco = true;
    } 
}

function validar_cuenta(){
    var tamano = $("#cuenta_bancaria_editar").val().length;
    if(tamano<18 || !(/^[\d]+$/i.test($('#cuenta_bancaria_editar').val()))){
          $("#error_cuenta_editar").html('*Deben ser exactamente 18 dígitos').css("color","red");
          $("#error_cuenta_editar").css('padding-left','7%');
          $("#error_cuenta_editar").show();  
          flag_cuenta = false;
    }else{
          $("#error_cuenta_editar").hide();
          flag_cuenta = true;
    }
}

function validar_form(){
	
  	if(flag_rfc && flag_alias && flag_razon && flag_nombre && flag_telefono && flag_banco && flag_cuenta){

  	}else{
        return false;
    }
}
