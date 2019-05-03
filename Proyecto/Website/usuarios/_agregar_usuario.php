<?php
require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
session_start();
//Funcion que va a ir en queries

$result = obtenerCorreos();
$bandera = 0;

if (isset($_POST["submit"])){
    $_POST["nombre"] = htmlentities($_POST["nombre"]);
    $_POST["apellido"] = htmlentities($_POST["apellido"]);
    $_POST["email"] = htmlentities($_POST["email"]);
    $_POST["password"] = htmlentities($_POST["password"]);
    $_POST["fecha_nacimiento"] = htmlentities($_POST["fecha_nacimiento"]);
    $_POST["rol"] = htmlentities($_POST["rol"]);


    if (isset($_POST["nombre"])
        && isset($_POST["apellido"])
        && isset($_POST["email"])
        && isset($_POST["password"])
        && isset($_POST["fecha_nacimiento"])
        && isset($_POST["rol"])
        && $_POST["nombre"] != ""
        && $_POST["apellido"] != ""
        && $_POST["email"] != ""
        && $_POST["password"] != ""
        && $_POST["rol"] != ""
        && $_POST["fecha_nacimiento"] != ""){

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if($_POST["email"] == $row['email']){
                    $_SESSION['error1'] = 1;
                    $bandera = 1;
                    header("location:_usuarios_vista.php");

                }
            }
        }

        
        //EN ESTA PARTE A CONTINUACION HARÉ EL REGISTRO EN LA BASE DE DATOS
        //PODEMOS VER QUE LO DEMÁS DEL CÓDIGO ES LA PARTE QUE VALIDA QUE EL FORM SE LLENÓ DE MANERA CORRECTA.
        //------------------------------------------------------------------------------------------------------------
        if($bandera == 0){
            if (registrar_usuario($_POST["email"], $_POST["nombre"],$_POST["apellido"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["fecha_nacimiento"],$_POST["rol"])) {
                /*------------------------------------------------EN ESTA PARTE YA VOY A MOSTRAR LA INFORMACION DEL EVENTO GUARDADO EN LA PÁGINA*/

                $_SESSION['registro'] = 1;
                echo $_SESSION['registro'];
                //Esta sección es para obtener id del usario y mostrarlo en el modal/form
                $result = obtener_usuario_reciente();
                $row = mysqli_fetch_assoc($result);
                if (!isset($_SESSION['id_usuario'])) {
                    $_SESSION['id_usuario'] = $row['id_usuario'];
                } else {
                    $_SESSION['id_usuario'] = $row['id_usuario'];
                }

                header("location:_usuarios_vista.php");
                echo '<script type="text/javascript" src="ajax_usuario.js"></script>';
                /*-----------------------------------------------------------------------------------------------------------------*/

            }
        }

    }else{
        $_SESSION['error2'] = 1;
    }



}

?>