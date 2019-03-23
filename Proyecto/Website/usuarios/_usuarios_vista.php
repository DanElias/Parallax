<?php
require_once ("_util_usuarios.php");
session_start(); //Inicio de sesion

if (isset($_SESSION["usuario"])) {
    header_html();
    sidenav_html();
    body_usuarios();
    form_agregar_usuario();
    form_editar_usuario();
    form_eliminar_usuario();


} else {
    header("location:../login/_login_vista.php");

}
?>