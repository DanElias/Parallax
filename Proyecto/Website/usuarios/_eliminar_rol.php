<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_usuarios.php");

$_GET['id'] = htmlentities($_GET['id']);

//Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
if (isset($_GET['id']) && $_GET['id'] != "") {
    echo'Si entra el id';
    var_dump(eliminarPrivilegioPorId($_GET['id']));


    //-----------------------------------------------------------------------------------------------------------

    if (eliminarPrivilegioPorId($_GET['id'])) {
        eliminarRolPorId($_GET['id']);
        header("location:_rol_vista.php");
    }

    //--------------------------------------------------------------------------------------------------------------
}
echo 'Ya no hizo nada';

?>