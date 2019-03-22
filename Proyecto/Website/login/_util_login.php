<?php

require_once("../basesdedatos/_conection_queries_db.php");
//Funciones de util para login
function header_html($titulo="LogIn") {
    include("../views/_header_login.html");
}

/*
*Esta funcion recibira como parametros el correo y la contraseña enviados por el metodo post
*seguido se buscara un elemento que cumpla con las especificaciones 
*@Input: email,password
*@Ouptu: 1 o 0 
*/
function autentificarse($email,$password){
    $con = conectDb();

    $sql = "SELECT email,password FROM login WHERE email = '$email' And password = '$password'";
    $result = mysqli_query($con,$sql);

    return $result;

}

/*
*Esta funcion dependiendo del email y el password regresara el nombre del usuario 
*/
function login($email,$password) {
     $usuario = "";

    if ($email == "" && $password == "") {
        $usuario = "usuario";
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
