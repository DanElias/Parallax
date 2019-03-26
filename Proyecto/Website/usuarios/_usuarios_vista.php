<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_usuarios.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"])) {
    header_html();
    sidenav_html();
    body_proveedores();
    form_agregar_usuario();
    form_agregar_rol();
    form_editar_usuario();
    form_eliminar_usuario();
    modal_informacion_usuario();
    footer_html();

} else {
    header("location:../login/_login_vista.php");

}

?>