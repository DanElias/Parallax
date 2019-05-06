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
    controller_tabla_rol_php();
    footer_html();
    if($_SESSION['registro_rol'] == 1){
        echo
        "<script type='text/javascript'> alert('El Rol ha sido registrado exitosamente');</script>";
        $_SESSION['registro_rol'] = 0;

    }
    if($_SESSION['eliminar_rol'] == 1){
        echo
        "<script type='text/javascript'> alert('El Rol se elimino exitosamente');</script>";
        $_SESSION['eliminar_rol'] = 0;

    }
    if($_SESSION['error4'] == 1){
        echo
        "<script type='text/javascript'> alert('El Rol no se pudo registrar exitosamente');</script>";
        $_SESSION['error4'] = 0;

    }
    if($_SESSION['editar_rol'] == 1){
        echo
        "<script type='text/javascript'> alert('El Rol se edito correctamnete');</script>";
        $_SESSION['editar_rol'] = 0;

    }

    echo '<script type="text/javascript" src="ajax_usuario.js"></script>';




} else {
    header("location:../login/_login_vista.php");

}
?>
