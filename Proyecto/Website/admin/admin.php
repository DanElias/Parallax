<?php

//util de admin para que el nombre del header sea correcto
require_once ("util_Admin.php");
session_start(); //Inicio de sesion


//Condicionales para el caso de hacer logout

if(isset($_SESSION["usuario"])) {
    header_html();
    include("_admin.html");
    include("../views/_footer_admin.html");

} else {
    header("location:../login/login.php");

}
?>