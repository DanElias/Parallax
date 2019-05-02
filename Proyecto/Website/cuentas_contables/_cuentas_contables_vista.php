<?php

/*
    Autor: Daniel Elias
        Este archivo php muestra los htmls y utiliza el controlador de la tabla, digamos que es el front end de la sección de cuentas contables
*/

//util de admin para que el nombre del header sea correcto
require_once("_util_cuentas_contables.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"]) && $_SESSION['seis'] == 1) {
    header_html();
    sidenav_html();
    cuentacontable_html();
    form_cuentacontable_html();
    controller_tabla_cuentas_php();
    footer_html();
    echo '<script type="text/javascript" src="ajax_cuentas_contables.js"></script>';
    
} else {
    header("location:../login/_login_vista.php");

}
//Caso de Prueba: La sesión expiró o el usuario quiere acceder a la página de eventos sin haber iniciado sesión 

?>