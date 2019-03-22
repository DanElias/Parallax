<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_admin.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout

if (isset($_SESSION['usuario'])) {
    //Llamada de funciones (util.php) de lo que se nesecite en el form
    header_html();
    fecha();
    body_admin_main();
    sidenav_html();
    footer_html();

    //Si no hay una sesion activa, reedirigria a login
} else {
    header("location:../login/_login_vista.php");

}
?>