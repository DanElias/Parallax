<?php

require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

//Funcion que va a ir en queries


if (isset($_POST["submit"]))
{
    //Valdiamos que no se pongan cosas raras
    $_POST["nombre"] = htmlentities($_POST["nombre"]);


    //Validar que no este vacio y llamar funcion para registrar lo que este en los campos
    if(isset($_POST["nombre"])) {

        $registrar =  registrar_Rol( $_POST["nombre"]);

    }else{
        $error= "Debe llenar este campo";
    }
    header("location:./_usuarios_vista.php");


}

?>