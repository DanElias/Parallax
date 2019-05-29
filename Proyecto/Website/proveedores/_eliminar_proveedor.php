<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_proveedor.php");

session_start();

$_GET['id'] = htmlentities($_GET['id']);

if (eliminar_proveedor_id($_GET['id'])){
    
    
	$_SESSION['eliminar_proveedor_exito'] = 1;
        header("location:_proveedor_vista.php");
        if($GLOBALS['local_servidor'] == 1){
                echo '<script type="text/javascript">
                window.location="https://www.marianasala.org/Website/usuarios/_usuarios_vista.php";
                </script>';
    }
  
}else{
	header("location:_proveedor_vista.php");
        if($GLOBALS['local_servidor'] == 1){
                    echo '<script type="text/javascript">
                window.location="https://www.marianasala.org/Website/usuarios/_usuarios_vista.php";
                </script>';
                }
	$_SESSION['eliminar_proveedor_error'] = 1;
    
}




?>