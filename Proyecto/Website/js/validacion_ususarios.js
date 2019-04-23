
$(document).ready(function(){


    //	alert("JQUERY IS BEING USED");
    $("#error_nombre").hide();
    $("#error_apellido").hide();
    $("#error_email").hide();
    $("#error_password").hide();
    $("#error_password2").hide();
    $("#error_fecha").hide();


    var error_nombre = false;
    var error_apellido = false;
    var error_correo = false;
    var error_password = false;
    var error_password2 = false;
    var error_fecha = false;

    $("#nombre").focusout(function() {
        check_nombre();

    });

    $("#apellido").focusout(function() {
        check_apellido();

    });

    $("#email").focusout(function() {
        check_email(); //llamo alias porque son las mismas condiciones

    });

    $("#password").focusout(function() {
        check_password();

    });

    $("#password2").focusout(function() {
        check_password2();

    });

    $("#fecha").focusout(function() {
        check_fecha(); //mismo que alias

    });

    /*******	PARA EVITAR QUE SE ENVÍE CON ERRORES			*******/

    $("#_form_usuario").submit(function() {
        error_nombre = false;
        error_apellido = false;
        error_email = false;
        error_password = false;
        error_password2 = false;
        error_fecha = false;

        check_nombre();
        check_apellido();
        check_email();
        check_password();
        check_password2();
        check_fecha();

        if(error_nombre == false
            && error_apellido == false
            && error_email == false
            && error_password == false
            && error_password2 == false
            && error_fecha == false){
            return true;
        } else {
            return false;
        }

    });

    /**********/
    function check_nombre(){
        var tamano = $("#nombre").val().length;

        if(tamano==0){
            console.log("hola");
            $("#error_nombre").html('*No olvides este campo').css("color","red");
            $("#error_nombre").css('padding-left','10%');
            $("#error_nombre").show();
        }else{
            if(tamano>30){
                $("#error_nombre").html('*No deben ser mayor a 30 caraceteres').css("color","red");
                $("#error_nombre").css('padding-left','10%');
                $("#error_nombre").show();
                error_nombre = true;
            }else{
                $("#error_nombre").hide();
            }
        }

    }

    function check_email(){
        var tamano = $("#email").val().length;

        if(tamano==0){
            console.log("hola");
            $("#error_email").html('*No olvides este campo').css("color","red");
            $("#error_email").css('padding-left','10%');
            $("#error_email").show();
        }else{
            if(tamano>30){
                $("#error_email").html('*No deben ser mayor a 30 caraceteres').css("color","red");
                $("#error_email").css('padding-left','10%');
                $("#error_email").show();
                error_apellido = true;
            }else{
                $("#error_email").hide();
            }
        }

    }

    function check_password(){
        var tamano = $("#password").val().length;

        if(tamano==0){
            console.log("hola");
            $("#error_password").html('*No olvides este campo').css("color","red");
            $("#error_password").css('padding-left','10%');
            $("#error_password").show();
        }else{
            if(tamano>255){
                $("#error_password").html('*No deben ser mayor a 255 caraceteres').css("color","red");
                $("#error_password").css('padding-left','10%');
                $("#error_password").show();
                error_password = true;
            }else{
                $("#error_password").hide();
            }
        }

    }

    function check_password2(){
        var tamano = $("#password2").val().length;
        var pass1 = $("#password").val();
        var pass2 = $("#password2").val();

        if(tamano==0){

            $("#error_password2").html('*No olvides este campo').css("color","red");
            $("#error_password2").css('padding-left','10%');
            $("#error_password2").show();
        }else{
            if(tamano>255 || pass1!= pass2){
                $("#error_password2").html('*Las contraseñas no son iguales').css("color","red");
                $("#error_password2").css('padding-left','10%');
                $("#error_password2").show();
                error_igual = true;
            }else{
                $("#error_password2").hide();
            }
        }
    }

});
