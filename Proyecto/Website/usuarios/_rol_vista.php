<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout


if (isset($_SESSION["usuario"]) && $_SESSION['ocho'] == 1) {

    header_html();
    sidenav_html();
    rol_html();
    form_usuario_html();
    form_rol_html();
    form_editar_rol_html();
    controller_tabla_rol_php();
    footer_html();


    echo '<script type="text/javascript" src="ajax_usuario.js"></script>';




} else {
    header("location:../login/_login_vista.php");

}
?>
