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
    
    $_SESSION['error_bd_login']=1;
    
    $usuario = login($_POST["email"], $_POST["password"]);
    
    
    if (autentificarse(($_POST["email"]), ($_POST["password"]))) {
        
        //echo '<script>alert("fuck");</script>';
        //Te manda a location de admin
        header("location:../admin/_admin_vista.php");
        
        $_SESSION['error_bd_login']=0;

        //Si si existe , saca el nombre de la sesion (correo y contraseñas)
        if (mysqli_num_rows($usuario)) {
            while ($row = mysqli_fetch_assoc($usuario)) {
 	
                //asigna a sesion el nombre de la personas
                if(!isset($_SESSION['usuario'])){
                	$_SESSION['usuario'] = $row['nombre'];
                }
                else{
                	$_SESSION['usuario'] = $row['nombre'];
                }
                $_SESSION['id_rol'] = $row['id_rol'];
                $_SESSION['id_usuario'] = $row['id_usuario'];
                if($GLOBALS['local_servidor'] == 1){
                    echo'<script type="text/javascript">
		window.location="https://www.marianasala.org/Website/admin/_admin_vista.php";
		</script>';
                }


            }
        }
    } else {
        //Reedireccion a login si no esta la sesion iniciada
        $_SESSION['error_bd_login']=0;
        $error = "Usuario y/o contraseña incorrectos";
        header_html();
        include("_login.html");
        include("../views/_footer_login.html");
    }

    //Si es la primera vez , solo mostrara los datos
} else {
    $_SESSION['error_bd_login']=0;
    header_html();
    include("_login.html");
    include("../views/_footer_login.html");
}
} else {
    $_SESSION['error_bd_login']=0;
    header_html();
    include("_login.html");
    include("../views/_footer_login.html");
}

$_SESSION['error_bd_login']=0;