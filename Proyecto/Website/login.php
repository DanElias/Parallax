<?php
require_once("util.php");
session_start();

if(isset($_POST["email"]) && isset($_POST["password"])) {

    $usuario = login(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"]));
    if ($usuario != "") {
        $_SESSION["usuario"] = $usuario;
        header("location:admin.php");
    } else {
        $error = "Usuario y/o contraseña incorrectos";
        include("_login.html");
    }
} else {
    $error = "Usuario y/o contraseña incorrectos";
    include("_login.html");
}
if(isset($_POST["submit"])) {
    $_POST['email'] = htmlentities($_POST['email']);
    $_POST['password'] = htmlentities($_POST['password']);

}else {
    header_html();
    include("_login.html");
    include("views/_footer_login.html");
}




?>