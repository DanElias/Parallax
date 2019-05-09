<?php

//util de admin para que el nombre del header sea correcto

require_once('_util_proveedor.php');
session_start(); //Inicio de sesion


//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"]) && $_SESSION['cinco'] == 1) {
    header_html();
    sidenav_html();
    body_proveedores();//evento_html();
    controller_tabla_proveedor_php();//AQUI VA EL DE LA TABLA//controller_tabla_eventos_php();
    form_proveedor_html(); //REVISAR ESTE
    form_eliminar_proveedor_html();//form_eliminar_evento_html();
    modal_informacion_proveedor_html();//modal_informacion_evento_html();
    footer_html();
    
     if($_SESSION['proveedor_eliminado'] == 1){
        echo
        "<script type='text/javascript'> alert('El proveedor se ha eliminado exitosamente');</script>";
        $_SESSION['proveedor_eliminado'] = 0;

    }
    if($_SESSION['error_eliminar_proveedor'] == 1){
        echo
        "<script type='text/javascript'> alert('El proveedor No se ha podido eliminar, asegurese de que no haya ningun egreso con este proveedor');</script>";
        $_SESSION['error_eliminar_proveedor'] = 0;

    }
    if($_SESSION['editar_proveedor_exito'] == 1){
        echo
        "<script type='text/javascript'> alert('El proveedor se edito correctamente');</script>";
        $_SESSION['editar_proveedor_exito'] = 0;

    }
    if($_SESSION['editar_proveedor_error'] == 1){
        echo
        "<script type='text/javascript'> alert('El proveedor no se pudo editar, asegures de que no haya ningun egreso con ese proveedor');</script>";
        $_SESSION['editar_proveedor_error'] = 0;

    }
    if($_SESSION['registro_proveedor'] == 1){
        echo
        "<script type='text/javascript'> alert('El proveedor se registro exitosamente');</script>";
        $_SESSION['registro_proveedor'] = 0;

    }
    
    echo '<script type="text/javascript" src="ajax_proveedor.js"></script>
    <script type="text/javascript" src="../js/validation_proveedor.js"></script>';
    
} else {
    header("location:../login/_login_vista.php");

}
?>