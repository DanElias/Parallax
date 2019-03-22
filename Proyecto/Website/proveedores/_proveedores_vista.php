<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_proveedores.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"])) {
    header_html();
    sidenav_html();
    body_proveedores();
    form_agregar_proveedor();
    form_editar_proveedor();
    form_eliminar_proveedor();
    modal_informacion_proveedores();
    footer_html();

} else {
    header("location:../login/_login_vista.php");

}

?>