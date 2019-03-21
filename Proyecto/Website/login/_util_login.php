<?php

//Funciones de util para login
function header_html($titulo="LogIn") {
    include("../views/_header_login.html");
}

function login($email, $password) {
    $usuario = "";
    

    //Usuario y contraseña en blancos
    
    //$SQL == Llamamos funcion de util sql -- > Obtener si existen email y contraserña
    
    //Select de usaurio arroja renglon
    
    //variable row con campo
    //Otra consulta de esa consulta y seleccionamso correo y contraseña 
    if ($email == "" && $password == "") {
        $usuario = "usuario"; //debera jalar los datos de la base de datos especificamente Nombre
    }

    return $usuario;
}

function info($mensaje) {
    $mensaje = $mensaje;
    echo $mensaje;
}

function hora_fecha(){
    date_default_timezone_set('GMT-6');
    
}
?>
