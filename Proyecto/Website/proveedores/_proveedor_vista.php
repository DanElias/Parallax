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
    echo '<script type="text/javascript" src="ajax_proveedor.js"></script>
    <script type="text/javascript" src="../js/validation_proveedor.js"></script>';
    
} else {
    //header("location:../login/_login.php");

}
?>