<?php
require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_login.php");

session_start();

 if (isset($_POST["submit"])){
     
    $_POST['email'] = htmlentities($_POST['email']);
    $_POST['password'] = htmlentities($_POST['password']);
    
  
if (isset($_POST["email"]) && isset($_POST["password"])) {
    

    //Datos que va a tomar, validar con htmltiteies
    $_POST['email'] = htmlentities($_POST['email']);
    $_POST['password'] = htmlentities($_POST['password']);
    
    $usuario = login($_POST["email"], $_POST["password"]);
    

    if (autentificarse(($_POST["email"]), ($_POST["password"]))) {
        
        echo '<script>alert("fuck");</script>';
        //Te manda a location de admin
        header("location:../admin/_admin_vista.php");


        //Si si existe , saca el nombre de la sesion (correo y contraseñas)
        if (mysqli_num_rows($usuario)) {
            while ($row = mysqli_fetch_assoc($usuario)) {

                //asigna a sesion el nombre de la personas
                $_SESSION['usuario'] = $row['nombre'];
                $_SESSION['id_rol'] = $row['id_rol'];

            }
        }
    } else {
        //Reedireccion a login si no esta la sesion iniciada
        $error = "Usuario y/o contraseña incorrectos";
        header_html();
        include("_login.html");
        include("../views/_footer_login.html");
    }

    //Si es la primera vez , solo mostrara los datos
} else {
     
    header_html();
    include("_login.html");
    include("../views/_footer_login.html");
}
} else {
     
    header_html();
    include("_login.html");
    include("../views/_footer_login.html");
}