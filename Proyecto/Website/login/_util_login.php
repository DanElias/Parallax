<?php

//Funciones de util para login
function header_html($titulo="LogIn") {
    include("../views/_header_login.html");
}

function login($email, $password) {
    $usuario = "";
    //Usuario y contraseña en blancos

    if ($email == "" && $password == "") {
        $usuario = "Nombre de la usuaria"; //debera jalar los datos de la base de datos especificamente Nombre
    }

    return $usuario;
}

function info($mensaje) {
    $mensaje = $mensaje;
    echo $mensaje;
}

?>
