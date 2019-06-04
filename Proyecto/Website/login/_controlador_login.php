<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_login.php");

session_start();
$GLOBALS['local_servidor'] = 0;
 if (isset($_POST["submit"])){


   //die("yes");

    if (isset($_POST["email"]) && isset($_POST["password"])) {

      //die("yes 2");
      //Datos que va a tomar, validar con htmltiteies
      $email = htmlentities($_POST['email']);
      $pass = htmlentities($_POST['password']);

      $_SESSION['error_bd_login']=1;
      if (autentificarse($email, $pass)) {
        //header("Location: ../../admin/index.php");
          //die("autentificarse");
          //Te manda a location de admin
          //header("location:../admin/_admin_vista.php");
          $usuario = login($email, $pass);
          $_SESSION['error_bd_login']=0;

          //Si si existe , saca el nombre de la sesion (correo y contraseñas)
          //if (mysqli_num_rows($usuario) == 1) {

          $row = mysqli_fetch_assoc($usuario);
          //asigna a sesion el nombre de la personas
          if(!isset($_SESSION['usuario'])){
          	$_SESSION['usuario'] = $row['nombre'];
          } else{
          	$_SESSION['usuario'] = $row['nombre'];
          }
          if(!isset($_SESSION['id_rol'])){
          	$_SESSION['id_rol'] = $row['id_rol'];
          } else{
          	$_SESSION['id_rol'] = $row['id_rol'];
          }
          if(!isset($_SESSION['id_usuario'])){
          	$_SESSION['id_usuario'] = $row['id_usuario'];
          } else{
          	$_SESSION['id_usuario'] = $row['id_usuario'];
          }
          /*if($GLOBALS['local_servidor'] == 0){
            echo "<script type='text/javascript'>  window.location='../admin'; </script>";
            die();
          } else {
            header("Location: ../admin/_admin_vista.php");
            die();
          }*/
          echo "<script>window.location='../admin/_admin_vista.php';</script>";
          die();


    } else {
        //Reedireccion a login si no esta la sesion iniciada
        $_SESSION['error_bd_login']=0;
        $error = "Usuario y/o contraseña incorrectos";
        header_html();
        include("_login.html");
        include("../views/_footer_login.html");
    }

  } else {
    $_SESSION['error_bd_login']=0;
    $error = "Usuario y/o contraseña vacios";
    header_html();
    include("_login.html");
    include("../views/_footer_login.html");
  }

} else {
  header_html();
  include("_login.html");
  include("../views/_footer_login.html");
}
?>
