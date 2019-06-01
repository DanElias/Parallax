<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_egreso.php");

session_start();
$_GET['id'] = htmlentities($_GET['id']);

if (eliminar_egreso_folio($_GET['id'])){
        $_SESSION['eliminar_egreso_exito'] = 1;
        header("location:_egreso_vista.php");
        if($GLOBALS['local_servidor'] == 1){
                    echo '<script type="text/javascript">
                window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                </script>';
                }
} else {
    
    $_SESSION['eliminar_egreso_error']=1;
    header("location:_egreso_vista.php");
    if($GLOBALS['local_servidor'] == 1){
                    echo '<script type="text/javascript">
                window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                </script>';
                }
}

?>