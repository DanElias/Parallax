<?php

//util de admin para que el nombre del header sea correcto

require_once('_util_egreso.php');
session_start(); //Inicio de sesion


//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"])) {
    header_html();
    sidenav_html();
    body_egreso();//evento_html();
    controller_tabla_egreso_php();//AQUI VA EL DE LA TABLA//controller_tabla_eventos_php();
    form_egreso_html(); //REVISAR ESTE
    form_eliminar_egreso_html();//form_eliminar_evento_html();
    modal_informacion_egreso_html();//modal_informacion_evento_html();
    footer_html();
    echo '<script type="text/javascript" src="ajax_egreso.js"></script>';
    
} else {
    //header("location:../login/_login.php");

}
?>