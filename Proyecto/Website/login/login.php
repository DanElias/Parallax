<?php

//Inicio de sesion
require_once("util_Login.php");
session_start();

//Condicionales de validacion de email
if(isset($_POST["email"]) && isset($_POST["password"])) {

    $_POST['email'] = htmlentities($_POST['email']);
    $_POST['password'] = htmlentities($_POST['password']);

    $usuario = login(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"]));
    if ($usuario != "") {
        $_SESSION["usuario"] = $usuario; //Asignacion de usaurio y contraseña en util_Login.php
        header("location:../admin/admin_vista.php");
    } else {
        $error = "Usuario y/o contraseña incorrectos";
        header_html();
        include("_login.html");
        include("../views/_footer_login.html");
    }
    //Si es la priemra vez , solo mostrara los datos
} else {
    header_html();
    include("_login.html");
    include("../views/_footer_login.html");
}


?>