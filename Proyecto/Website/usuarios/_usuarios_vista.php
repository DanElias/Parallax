<?php
require_once ("_util_usuarios.php");
session_start(); //Inicio de sesion

if (isset($_SESSION["usuario"])) {
    header_html();
    sidenav_html();
    body_usuarios();

    
} else {
    header("location:../login/_login_vista.php");

}
?>