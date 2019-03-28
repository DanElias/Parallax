<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_cuentas_contables.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"])) {
    header_html();
    sidenav_html();
    cuentacontable_html();
    form_cuentacontable_html();
    controller_tabla_cuentas_php();
    modal_informacion_cuentacontable_html();
    footer_html();
} else {
    header("location:../login/_login_vista.php");

}
?>