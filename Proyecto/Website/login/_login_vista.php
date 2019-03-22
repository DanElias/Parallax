<?php

//Inicio de sesion
require_once("_util_login.php");
require_once("../basesdedatos/_conection_queries_db.php");
session_start();

//Condicionales de validacion de email
if(isset($_POST["email"]) && isset($_POST["password"])) {

    //Datos que va a tomar
    $_POST['email'] = htmlentities($_POST['email']);
    $_POST['password'] = htmlentities($_POST['password']);

    $validar = autentificarse(($_POST["email"]), ($_POST["password"])); 
    $usuario = login(htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["password"])); 

    if(mysqli_num_rows($validar)){
        while($row = mysqli_fetch_assoc($validar)){
            echo "<td>". $row['email']."</td>";
            echo"<td>".$row['password']."</td>";
        }
        
        //header("location:../admin/_admin_vista.php");


    }else{
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