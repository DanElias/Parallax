<?php

//util de admin para que el nombre del header sea correcto
require_once ("util_admin.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout

if(isset($_SESSION["usuario"])) {
    header_html();
    body_admin_main();
    sidenav_html();
    footer_html();

} else {
    header("location:../login/login.php");

}
?>