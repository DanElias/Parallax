<?php

require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

session_start();


if (isset($_POST["submit_editar"])) {
    //Aquí guardo lo que está en los campos del form en variables
    $_POST["id_usuario"] = htmlentities($_POST["id_usuario"]);
    $_POST["nombre"] = htmlentities($_POST["nombre"]);
    $_POST["apellido"] = htmlentities($_POST["apellido"]);
    $_POST["email"] = htmlentities($_POST["email"]);
    $_POST["password"] = htmlentities($_POST["password"]);
    $_POST["fecha_nacimiento"] = htmlentities($_POST["fecha_nacimiento"]);
    $_POST["rol"] = htmlentities($_POST["rol"]);


    //Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
    if (isset($_POST["id_usuario"])
        && isset($_POST["nombre"])
        && isset($_POST["apellido"])
        && isset($_POST["email"])
        && isset($_POST["password"])
        && isset($_POST["fecha_nacimiento"])
        && isset($_POST["rol"])
        && $_POST["id_usuario"] != ""
        && $_POST["nombre"] != ""
        && $_POST["apellido"] != ""
        && $_POST["email"] != ""
        && $_POST["password"] != ""
        && $_POST["rol"] != ""
        && $_POST["fecha_nacimiento"] != ""){
            //var_dump(editarUsuario( $_POST["id_usuario"],$_POST["nombre"],$_POST["apellido"],$_POST["email"] ,password_hash($_POST["password"], PASSWORD_DEFAULT),$_POST["fecha_nacimiento"],$_POST["rol"]));
        if (editarUsuario( $_POST["id_usuario"],$_POST["nombre"],$_POST["apellido"],$_POST["email"] ,password_hash($_POST["password"], PASSWORD_DEFAULT),$_POST["fecha_nacimiento"],$_POST["rol"])) {
            header("location:_usuarios_vista.php");
            $result = obtenerUsuariosPorID($_POST["id_usuario"]);
            $row = mysqli_fetch_assoc($result);
            if (!isset($_SESSION['id_usuario'])) {
                $_SESSION['id_usuario'] = $row['id_usuario'];
            } else {
                $_SESSION['id_usuario'] = $row['id_usuario'];
            }

            echo
            "<script type='text/javascript'>
                            alert(\"¡El usuario se se ha registrado de manera exitosa!\");
                            jQuery(document).ready(function(){
                                  jQuery('#_modal_informacion_cuenta_contable').modal();
                                  jQuery(document).ready(function(){
                                      jQuery('#_modal_informacion_cuenta_contable').modal('open');
                                  });
                            });
                    </script>";
            footer_html();
            echo '<script type="text/javascript" src="ajax_cuentas_contables.js"></script>';
            /*----------------------------------------------------------------------------------------------------------------------------------*/
        }
    }
}

?>