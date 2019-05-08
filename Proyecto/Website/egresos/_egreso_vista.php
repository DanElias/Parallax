<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_egreso.php");
session_start(); //Inicio de sesion

if (isset($_SESSION["usuario"])) {
    
    header_html();
    sidenav_html();
    body_egreso();
    controller_tabla_egreso_php();
    form_egreso_html();
    modal_informacion_egreso_html();
    footer_html();
    echo '<script type="text/javascript" src="ajax_egreso.js"></script>
    <script type="text/javascript" src="../js/validation_proveedor.js"></script>
    <script type="text/javascript" src="ajax.js"></script>';
    
    if($_SESSION['exito_eliminar_egreso'] == 1){
        "<script type='text/javascript'> alert('!El usuario ha sido eliminado¡');</script>";
        $_SESSION['exito_eliminar_egreso'] = 0;
    }
    
} else {
    header("location:../login/_login_vista.php");

}
?>