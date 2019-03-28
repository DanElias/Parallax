<?php
require_once("_util_cuentas_contables.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

//Funcion que va a ir en queries


if (isset($_POST["submit"])) {
    $_POST["nombre_cuenta"] = htmlentities($_POST["nombre_cuenta"]);
    $_POST["descripcion_cuenta"] = htmlentities($_POST["descripcion_cuenta"]);


    if (isset($_POST["nombre_cuenta"])
        && isset($_POST["descripcion_cuenta"])
        && $_POST["nombre_cuenta"] != ""
        && $_POST["descripcion_cuenta"] != "") {
        $registrar = registrar_cuenta_contable($_POST["nombre_cuenta"], $_POST["descripcion_cuenta"]);
    }
    header("location:./_cuentas_contables_vista.php");


}

?>*/