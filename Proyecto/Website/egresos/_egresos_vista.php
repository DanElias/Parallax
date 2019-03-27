<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_egresos.php");
session_start(); //Inicio de sesion

if (isset($_SESSION["usuario"])) {

    //Htmls a llamar
    header_html();
    sidenav_html();
    body_egresos();
    form_egresos();
    form_eliminar_egresos();
    controller_tabla_egresos_php();
    modal_informacion_egresos();
    form_agregar_proveedor();
    form_editar_proveedor();
    form_eliminar_proveedor_lista();
    modal_informacion_proveedores();
    form_cuentacontable_html();
    form_eliminar_cuentacontable_lista_html();
    modal_informacion_cuentacontable_html();
    footer_html();
} else {
    header("location:../login/_login_vista.php");

}
?>