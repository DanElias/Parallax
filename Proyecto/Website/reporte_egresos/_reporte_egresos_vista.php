<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_reporte_egresos.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"]) && $_SESSION['cuatro'] == 1) {
    header_html();
    sidenav_html();
    body_reporte_egresos();
    form_cuenta();
    form_proveedor();
    footer_html();
     echo '<script type="text/javascript" src="ajax_reporte_egresos.js"></script>';

} else {
    header("location:../login/_login_vista.php");

}
?>