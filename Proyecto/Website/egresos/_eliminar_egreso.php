<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_egreso.php");

session_start();
$_GET['id'] = htmlentities($_GET['id']);

if (eliminar_egreso_folio($_GET['id'])){
        $_SESSION['exito_eliminar_egreso'] = 1;
        header("location:_egreso_vista.php");
        if($GLOBALS['local_servidor'] == 1){
                    echo '<script type="text/javascript">
                window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                </script>';
                }
} else {
    echo "<script>alert('hola');</script>";
    $_SESSION['error_eliminar_egreso']=1;
    header("location:_egreso_vista.php");
    if($GLOBALS['local_servidor'] == 1){
                    echo '<script type="text/javascript">
                window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                </script>';
                }
}

?>