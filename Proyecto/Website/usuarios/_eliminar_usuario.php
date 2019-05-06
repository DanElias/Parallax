<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_usuarios.php");
session_start();
$_GET['id'] = htmlentities($_GET['id']);
$_SESSION['error3'] = 0;
$_SESSION['eliminar_usuario'] = 0;
//Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
if (isset($_GET['id']) && $_GET['id'] != "") {


    //-----------------------------------------------------------------------------------------------------------
    if($_SESSION['id_usuario'] != $_GET['id']){
        if (eliminarUsuarioPorID($_GET['id'])) {
            $_SESSION['eliminar_usuario'] = 1;

            header("location:_usuarios_vista.php");
            if($GLOBALS['local_servidor'] == 1){
                echo'<script type="text/javascript">
		window.location="https://www.marianasala.org/Website/usuarios/_usuarios_vista.php";
		</script>';
            }

        }
    }else{
        $_SESSION['error3'] = 1;
        header("location:_usuarios_vista.php");
        if($GLOBALS['local_servidor'] == 1){
            echo'<script type="text/javascript">
		window.location="https://www.marianasala.org/Website/usuarios/_usuarios_vista.php";
		</script>';
        }
    }


    //--------------------------------------------------------------------------------------------------------------
}

?>