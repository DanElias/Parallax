<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_eventos.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"])) {
    header_html();
    sidenav_html();
    evento_html();
    form_evento_html();
    controller_tabla_eventos_php();
    footer_html();
    echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
    
} else {
    header("location:../login/_login_vista.php");

}
//Caso de Prueba: La sesión expiró o el usuario quiere acceder a la página de eventos sin haber iniciado sesión 

?>