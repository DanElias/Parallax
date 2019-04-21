
$(document).ready(function(){

    
  //	alert("JQUERY IS BEING USED");
  	$("#error_rfc").hide();
  	$("#error_alias").hide();
  	$("#error_razon").hide();
  	$("#error_nombre").hide();
  	$("#error_telefono").hide();
  	$("#error_banco").hide();
  	$("#error_cuenta").hide();


  	var error_rfc = false;
  	var error_alias = false;
  	var error_razon = false;
  	var error_nombre = false;
  	var error_telefono = false;
  	var error_banco = false;
  	var error_cuenta = false;
	
  	$("#rfc").focusout(function() {
		  check_rfc();

	  });

  	$("#alias").focusout(function() {
		  check_alias();

  	});

  	$("#razon_social").focusout(function() {
  		check_razon(); //llamo alias porque son las mismas condiciones

  	});

  	$("#nombre_contacto").focusout(function() {
  		check_nombre();

  	});

  	$("#telefono_proveedor").focusout(function() {
  		check_telefono();

  	});

  	$("#banco").focusout(function() {
  		check_banco(); //mismo que alias

  	});

  	$("#cuenta_bancaria").focusout(function() {
  		check_cuenta();

  	});
  	
	/*******	PARA EVITAR QUE SE ENVÍE CON ERRORES			*******/
  
  	$("#proveedor_form").submit(function() {
  		error_rfc = false;
  		error_alias = false;
  		error_razon = false;
  		error_nombre = false;
  		error_telefono = false;
  		error_banco = false;
  		error_cuenta = false;
  	
  		check_rfc();
  		check_alias();
  		check_razon();
  		check_nombre();
  		check_telefono();
  		check_banco();
  		check_cuenta();
  		if(error_rfc == false 
  			&& error_alias == false 
  			&& error_razon == false
  			&& error_nombre == false
  			&& error_telefono == false
  			&& error_banco == false
  			&& error_cuenta == false){
  			return true;
  		} else {
  			return false;	
  		}

  	});

	/**********/
  	function check_rfc(){
  		var tamano = $("#rfc").val().length;

      if(tamano==0){
        console.log("hola");
          $("#error_rfc").html('*No olvides este campo').css("color","red");
          $("#error_rfc").css('padding-left','10%');
          $("#error_rfc").show();
      }else{
          if(tamano<13 || !(/^[A-Za-z0-9]+$/i.test($('#rfc').val()))){
            $("#error_rfc").html('*El RFC debe contener 13 caracteres, no caracteres especiales').css("color","red");
            $("#error_rfc").css('padding-left','10%');
            $("#error_rfc").show();
          error_rfc = true;
          }else{
            $("#error_rfc").hide();
          }
      }
  		
  	}


  	function check_alias(){
  		if(!(/^[\d\w\s]+$/i.test($('#alias').val()))){
  			console.log("HUBO UN ERROR, QUIERE DECIR QUE LEYO UNA COSA COMO UN PUNTO ");	
  			$("#error_alias").html('*No caracteres especiales').css("color","red");
         $("#error_alias").css('padding-left','10%');
  			$("#error_alias").show();
  			error_alias = true;
  		}else{
  			$("#error_alias").hide();
  		}
  		//console.log("LA EXPRESION REGULAR ESTA FUNCIONANDO");
  	}

  	function check_razon(){
  		if(!(/^[\d\w\s]+$/i.test($('#razon_social').val()))){
  			console.log("HUBO UN ERROR, QUIERE DECIR QUE LEYO UNA COSA COMO UN PUNTO ");	
  			$("#error_razon").html('*No caracteres especiales').css("color","red");
         $("#error_razon").css('padding-left','10%');
  			$("#error_razon").show();
  			error_razon = true;
  		}else{
  			$("#error_razon").hide();
  		}
  		//console.log("LA EXPRESION REGULAR ESTA FUNCIONANDO");
  	}
  	function check_nombre(){
  		if(!(/^[a-z\s]+$/i.test($('#nombre_contacto').val()))){
  			$("#error_nombre").html('*Sólo letras').css("color","red");
         $("#error_nombre").css('padding-left','10%');
  			$("#error_nombre").show();	
  			error_nombre = true;
  		}else{
  			$("#error_nombre").hide();
  		}
  	}

  	function check_telefono(){
  		if(!(/^[\d\s]+$/i.test($('#telefono_proveedor').val()))){
  			$("#error_telefono").html('*Sólo números').css("color","red");
         $("#error_telefono").css('padding-left','10%');
  			$("#error_telefono").show();	
  			error_telefono = true;
  		}else{
  			$("#error_telefono").hide();
  		}
  	}  


  	function check_banco(){
  		if(!(/^[\d\w\s]+$/i.test($('#banco').val()))){
  			console.log("HUBO UN ERROR, QUIERE DECIR QUE LEYO UNA COSA COMO UN PUNTO ");	
  			$("#error_banco").html('*No caracteres especiales').css("color","red");
         $("#error_banco").css('padding-left','10%');
  			$("#error_banco").show();
  		}else{
  			$("#error_banco").hide();
  		}
  		//console.log("LA EXPRESION REGULAR ESTA FUNCIONANDO");
  	}

  	function check_cuenta(){
  		var tamano = $("#cuenta_bancaria").val().length;
  		if(tamano<18 || !(/^[\d]+$/i.test($('#cuenta_bancaria').val()))){
  			$("#error_cuenta").html('*Deben ser exactamente 18 dígitos').css("color","red");
         $("#error_cuenta").css('padding-left','10%');
  			$("#error_cuenta").show();		
  		}else{
  			$("#error_cuenta").hide();
  		}
  	}
  	/*
  //PARA EL RFC: 13, SOLO NUMEROS Y LETRAS
  $.validator.addMethod('rfc_size', function(value, element) {
    return this.optional(element) 
      || value.length == 13

        
  }, '<p style="color:red;display:inline;">*El rfc debe ser exactamente 13 caracteres</p>');


  //ALIAS: ALFANUMERICO, MAXIMO 20
  
  jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[\d\w\s]+$/i.test(value);
  }, "<p style='color:red'>*No caracteres especiales</p>");
  
  //RAZON SOCIAL: ALFANUMERICO, MAXIMO 30
        //MISMA QUE PARA ALIAS

  //NOMBRE CONTACTO: LETRAS maximo 40
  jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
  }, "<p style='color:red'>*Sólo letras</p>");
  
  

  //TELEFONO: NUMEROS Y ESPACIOS, MAXIMO 20
  jQuery.validator.addMethod("phone", function(value, element) {
    return this.optional(element) || /^[\d\s]+$/i.test(value);
  }, "<p style='color:red'>*Sólo números</p>");
  
  //BANCO: LETRAS, MAXIMO 40
    //ALFANUMERIC

  //CUENTA BANCARIA: NUMEROS, MAXIMO 20

  $.validator.addMethod('cuenta', function(value, element) {
    return this.optional(element) 
      || value.length == 20
      && /^[\d]+$/i.test(value);
      
  }, '<p style="color:red">*Debe ser exactamente 20 digítos</p>');

  //



  $("#proveedor_form").validate({

    //errorElement:'p',
    rules:{
     
      rfc:{
        required:true,
        rfc_size: true
      },
            
      alias:{
        required: true,
        alphanumeric: true
       
      },
      
      razon_social:{
        required: true,
        alphanumeric:true
      },

      nombre_contacto:{
        required: true,
        lettersonly: true
      },

      telefono_proveedor:{
        required: true,
        phone:true
      },

      banco:{
        required: true,
        alphanumeric: true
      },

      cuenta_bancaria:{
        required: true,
        cuenta: true
      },
    },
    messages:{
     
      rfc:{
        required: '<p style="color:red; display:inline; padding-left:10%;">*Llene este campo</p>'
      },

      alias:{
        required: '<br><p style="color:red">*Llene este campo</p>'
      },
      razon_social:{
        required: '<br><p style="color:red">*Llene este campo</p>'
      },
      nombre_contacto:{
        required: '<br><p style="color:red">*Llene este campo</p>'
      },
      telefono_proveedor:{
        required: '<br><p style="color:red">*Llene este campo</p>'
      },
      banco:{
        required: '<br><p style="color:red">*Llene este campo</p>'
      },
      cuenta_bancaria:{
        required: '<br><p style="color:red">*Llene este campo</p>'
      },
    
    
  });}*/

});