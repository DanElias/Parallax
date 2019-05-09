<?php

require_once("../../basesdedatos/_conection_queries_db.php");
function tabla_roles(){
    $salida=obtenerRoles();
    return $salida;
}

echo tabla_roles();
?>