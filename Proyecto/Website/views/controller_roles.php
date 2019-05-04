<?php
require_once("../basesdedatos/_conection_queries_db.php");



echo  $_SESSION['id_rol'] . '<br>';

$result = obtenerPrivilegios($_SESSION['id_rol']);
$query_table = "";
$_SESSION['uno'] = 0;
$_SESSION['dos'] = 0;
$_SESSION['tres'] = 0;
$_SESSION['cuatro'] = 0;
$_SESSION['cinco'] = 0;
$_SESSION['seis'] = 0;
$_SESSION['siete'] = 0;
$_SESSION['ocho'] = 0;

if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if($row["id_privilegio"] == 1){
            $_SESSION['uno'] = 1;
        }
        if($row["id_privilegio"] == 2){

            $_SESSION['dos'] = 1;
        }
        if($row["id_privilegio"] == 3){
            $_SESSION['tres'] = 1;
        }
        if($row["id_privilegio"] == 4){

            $_SESSION['cuatro'] = 1;
        }
        if($row["id_privilegio"] == 5){

            $_SESSION['cinco'] = 1;
        }
        if($row["id_privilegio"] == 6){

            $_SESSION['seis'] = 1;
        }
        if($row["id_privilegio"] == 7){

            $_SESSION['siete'] = 1;
        }
        if($row["id_privilegio"] == 8){

            $_SESSION['ocho'] = 1;
        }
    }


}


?>