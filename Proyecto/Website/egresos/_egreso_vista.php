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
    
    if($_SESSION['exito_eliminar_egreso'] == 1){
        echo "<script type='text/javascript'> alert('!El egreso ha sido eliminado¡');</script>";
        $_SESSION['exito_eliminar_egreso'] = 0;
    }
    
     
    if($_SESSION['error_eliminar_egreso'] == 1){
        echo "<script type='text/javascript'> alert('!El egreso no ha podido ser eliminado¡');</script>";
        $_SESSION['error_eliminar_egreso'] = 0;
    }
    
    if($_SESSION['exito_agregar_egreso'] == 1){
        echo "<script type='text/javascript'> alert('!El egreso ha sido registrado con exito!');</script>";
        $_SESSION['exito_agregar_egreso'] = 0;
    }
    
    if($_SESSION['error_agregar_egreso'] == 1){
        echo "<script type='text/javascript'> alert('!El egreso no ha podido ser agregado¡');</script>";
        $_SESSION['error_agregar_egreso'] = 0;
    }
    
    
    footer_html();
    echo '<script type="text/javascript" src="ajax_egreso.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
    <script type="text/javascript" src="validaciones.js"></script>';

} else {
    header("location:../login/_login_vista.php");

}
?>