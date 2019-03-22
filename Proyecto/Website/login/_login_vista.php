<?php

//Inicio de sesion
require_once("_util_login.php");
require_once("../basesdedatos/_conection_queries_db.php");
session_start();

//Se debe tener email y password con algo lleno para pasar a la sigueinte validacion
if (isset($_POST["email"]) && isset($_POST["password"])) {

    //Datos que va a tomar, validar con htmltiteies
    $_POST['email'] = htmlentities($_POST['email']);
    $_POST['password'] = htmlentities($_POST['password']);

    //Llamar funciones de validar y usaurio
    $validar = autentificarse(($_POST["email"]), ($_POST["password"]));
    $usuario = login($_POST["email"], $_POST["password"]);

    //De la funcion validar (que regresa el objeto de Sql) si encuentra la consulta entra al if
    if (mysqli_num_rows($validar)) {

        //Te manda a location de admin
        header("location:../admin/_admin_vista.php");


        //Si si existe , saca el nombre de la sesion (correo y contraseñas)
        if (mysqli_num_rows($usuario)) {
            while ($row = mysqli_fetch_assoc($usuario)) {

                //asigna a sesion el nombre de la personas
                $_SESSION['usuario'] = $row['nombre'];
            }
        }
    } else {
        //Reedireccion a login si no esta la sesion iniciada
        $error = "Usuario y/o contraseña incorrectos";
        header_html();
        include("_login.html");
        include("../views/_footer_login.html");
    }

    //Si es la priemra vez , solo mostrara los datos
} else {
    header_html();
    include("_login.html");
    include("../views/_footer_login.html");
}


?>