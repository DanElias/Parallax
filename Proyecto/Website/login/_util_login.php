<?php

//Funciones de util para login
function header_html($titulo="LogIn") {
    include("../views/_header_login.html");
}

function login($email, $password) {
    $usuario = "";

    if ($email == "" && $password == "") {
        $usuario = "Mariana Sala";
    }

    return $usuario;
}

function info($mensaje) {
    $mensaje = $mensaje;
    echo $mensaje;
}

?>
