<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_usuarios.php");
session_start();
$_GET['id'] = htmlentities($_GET['id']);
$_SESSION['error4'] = 0;
$_SESSION['eliminar_rol'] = 0;

//Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
if (isset($_GET['id']) && $_GET['id'] != "") {
    //-----------------------------------------------------------------------------------------------------------

    if (eliminarPrivilegioPorId($_GET['id'])) {
        eliminarRolPorId($_GET['id']);
        $_SESSION['eliminar_rol'] = 1;

        header("location:_rol_vista.php");
    }

    //--------------------------------------------------------------------------------------------------------------
}else{
    $_SESSION['error4'] = 1;
    header("location:_rol_vista.php");
}


?>