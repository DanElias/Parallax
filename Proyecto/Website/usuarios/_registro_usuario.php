<?php

require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

//Funcion que va a ir en queries

function registrar_usuario($usuario,$nombre,$apellido,$password,$fecha_nacimiento,$fecha_creacion,$id_rol)
{
	$conn = conectDb();

    $sql = "INSERT INTO usuario(email, nombre, apellido, passwd, fecha_nacimiento, fecha_creacion, id_rol) VALUES (\"".$usuario."\",\"".$nombre."\",\"".$apellido."\",\"".$password."\",\"".$fecha_nacimiento."\",\"".$fecha_creacion."\",\"".$id_rol."\")";

    if(mysqli_query($conn,$sql)){
        closeDb($conn);
        return true;
    }
    else{
        closeDb($conn);
        return false;
    }
}




if (isset($_POST["submit"])) 
{
    $_POST["nombre"] = htmlentities($_POST["nombre"]);
    $_POST["apellido"] = htmlentities($_POST["apellido"]);
    $_POST["email"] = htmlentities($_POST["email"]);
    $_POST["password"] = htmlentities($_POST["password"]);
    $_POST["fecha_nacimiento"] = htmlentities($_POST["fecha_nacimiento"]);
    $_POST["rol"] = htmlentities($_POST["rol"]);

    if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"])
        && isset($_POST["password"]) && isset($_POST["fecha_nacimiento"]) && isset($_POST["rol"])&& $_POST["nombre"] != ""
        && $_POST["apellido"] != "" && $_POST["email"] != "" && $_POST["password"] != ""
        && $_POST["password2"] != "" && $_POST["rol"] != "") {


        $registrar =  registrar_usuario( $_POST["nombre"],$_POST["apellido"],$_POST["email"],password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["fecha_nacimiento"], $_POST["fecha_nacimiento"], $_POST["rol"]);


    }
	header("location:./_usuarios_vista.php");

	

}

?>