<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_egreso.php");


$_GET['id'] = htmlentities($_GET['id']);


if (eliminar_egreso_folio($_GET['id'])){
        $_SESSION['exito_eliminar_egreso'] = 1;
        header("location:_egreso_vista.php");
}else{
    echo "No funciono";
}

?>