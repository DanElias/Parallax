<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_egreso.php");
session_start(); //Inicio de sesion

if (isset($_SESSION["usuario"])) {

    /*
    header_html();
    sidenav_html();
    body_proveedores();//evento_html();
    controller_tabla_proveedor_php();//AQUI VA EL DE LA TABLA//controller_tabla_eventos_php();
    form_proveedor_html(); //REVISAR ESTE
    form_eliminar_proveedor_html();//form_eliminar_evento_html();
    modal_informacion_proveedor_html();//modal_informacion_evento_html();
    footer_html();
    echo '<script type="text/javascript" src="ajax_proveedor.js"></script>';
    */

    //Htmls a llamar
    header_html();
    sidenav_html();
    body_egreso();
    controller_tabla_egreso_php();
    form_egreso_html();
    /*
    form_egresos();
    form_eliminar_egresos();
    modal_informacion_egresos();
    form_agregar_proveedor();
    form_editar_proveedor();
    form_eliminar_proveedor_lista();
    modal_informacion_proveedores();
    form_cuentacontable_html();
    form_eliminar_cuentacontable_lista_html();
    modal_informacion_cuentacontable_html();*/
    footer_html();
} else {
    header("location:../login/_login_vista.php");

}
?>