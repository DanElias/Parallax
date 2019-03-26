<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_eventos.php");
session_start(); //Inicio de sesion


//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"])) {
    header_html();
    sidenav_html();
    evento_html();
    controller_tabla_eventos_php();
    form_evento_html();
    form_eliminar_evento_html();
    modal_informacion_evento_html();
    
    footer_html();
} else {
    header("location:../login/_login.php");

}
?>