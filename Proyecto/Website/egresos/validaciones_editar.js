var flag_folio = true;
var flag_concepto = true;
var flag_importe = true;
var flag_cuenta = true;
var flag_observaciones = true;
var flag_drop_proveedor = true;
var flag_drop_cuenta = true;

function validar_folio(){
    var cadena = $('#folio_factura2').val();
   
    var special = /[^0-9a-zA-Z]/g.test(cadena);
   
    if(special){
    
      $("#error_folio2").html('*Sólo numeros y letras').css("color","red");
      $("#error_folio2").show();
      flag_folio = false;

    }else{
      $("#error_folio2").hide();
      flag_folio = true;
      
    } 
}

function validar_concepto(){
    var cadena = $('#concepto2').val();
    var special = /[^áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/g.test(cadena);

    if(special==true){
        
        $("#error_concepto2").html('*No caracteres especiales').css("color","red");
        $("#error_concepto2").show();  
        flag_concepto = false;
    }else{
        $("#error_concepto2").hide();
        flag_concepto = true;
    } 
}

function validar_importe(){
  var cadena = $('#importe2').val();
  var special = /[^0-9.]/g.test(cadena);
  if(special){
      $("#error_importe2").html('*Sólo números').css("color","red");
      $("#error_importe2").show(); 
      flag_importe = false;
  }else{
    $("#error_importe2").hide();
      flag_importe = true;
  }
}

function validar_cuenta_bancaria(){
  var tamano = $("#cuenta_bancaria_egreso2").val().length;
      if(!(/^[\d]+$/i.test($('#cuenta_bancaria_egreso2').val()))){
          $("#error_cuenta_bancaria_egreso2").html('*Sólo dígitos').css("color","red");
          $("#error_cuenta_bancaria_egreso2").show();  
          flag_cuenta = false;
      }else{
          $("#error_cuenta_bancaria_egreso2").hide();
          flag_cuenta = true;
      }
}

function validar_drop_proveedor(){
    var proveedor = $('#selected_proveedor2').val();
    if(proveedor=='0'){
          $("#error_proveedor_egreso2").html('*Debes seleccionar un proveedor').css("color","red");
          $("#error_proveedor_egreso2").show();
          flag_drop_proveedor = false;
    }else{
          $("#error_proveedor_egreso2").hide();
          flag_drop_proveedor = true;
    }
}


function validar_drop_cuenta(){
    var cuenta = $('#selected_cuenta2').val();
    if(cuenta=='0'){
        $("#error_cuenta_egreso2").html('*Debes seleccionar una cuenta').css("color","red");
        $("#error_cuenta_egreso2").show();
        flag_drop_cuenta = false;
    }else{
        $("#error_cuenta_egreso2").hide();
        flag_drop_cuenta = true;
    }
}

function validar_observaciones(){
  
    var cadena = $('#observaciones2').val();
    var special = /[^áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/g.test(cadena);  
   
    if(special==true){
      
        $("#error_observaciones2").html('*No caracteres especiales').css("color","red");
        $("#error_observaciones2").show(); 
        flag_observaciones = false;
    }else{
        $("#error_observaciones2").hide();
        flag_observaciones = true;
    } 
}


function validar_form(){

  var proveedor = $('#selected_proveedor2').val();
  var cuenta = $('#selected_cuenta2').val();

  if(proveedor=='0'){
    $("#error_proveedor_egreso2").html('*Debes seleccionar un proveedor').css("color","red");
    $("#error_proveedor_egreso2").show();
      flag_drop_proveedor = false;
  }else{
    $("#error_proveedor_egreso2").hide();
      flag_drop_proveedor = true;
  }

  if(cuenta=='0'){
    $("#error_cuenta_egreso2").html('*Debes seleccionar una cuentas').css("color","red");
    $("#error_cuenta_egreso2").show();
      flag_drop_cuenta = false;
  }else{
    $("#error_cuenta_egreso2").hide();
      flag_drop_cuenta = true;
  }

  
  if(flag_folio&& flag_concepto && flag_importe && flag_cuenta && flag_observaciones && flag_drop_proveedor && flag_drop_cuenta){
      
           
  }else{
      return false;
    
  }
 
}

