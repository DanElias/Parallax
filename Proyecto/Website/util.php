<?php

function header_html($titulo="LogIn") {
    include("views/_header_login.html");
}

function login($email, $password) {
    $usuario = "";

    if ($email == "mariana@ms.mx" && $password == "1234") {
        $usuario = "Mariana Sala";
    }

    return $usuario;
}

function info($mensaje) {
    $mensaje = $mensaje;
    echo $mensaje;
}

?>
