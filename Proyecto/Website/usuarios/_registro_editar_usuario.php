<?php

require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

session_start();

if (isset($_POST["submit_editar"])){
    $_POST["nombre"] = htmlentities($_POST["nombre"]);
    $_POST["apellido"] = htmlentities($_POST["apellido"]);
    $_POST["email"] = htmlentities($_POST["email"]);
    $_POST["password"] = htmlentities($_POST["password"]);
    $_POST["fecha_nacimiento"] = htmlentities($_POST["fecha_nacimiento"]);
    $_POST["rol"] = htmlentities($_POST["rol"]);
    var_dump(editarUsuario($_POST["email"], $_POST["nombre"],$_POST["apellido"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["fecha_nacimiento"],$_POST["rol"]));
        if (editarUsuario($_POST["email"], $_POST["nombre"],$_POST["apellido"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["fecha_nacimiento"],$_POST["rol"])) {

            header_html();
            sidenav_html();
            usuarios_html();

            $result = obtenerUsuariosPorID($_POST["id_usuario"]);
            $row = mysqli_fetch_assoc($result);
            if (!isset($_SESSION['id_usuario'])) {
                $_SESSION['id_usuario'] = $row['id_usuario'];
            } else {
                $_SESSION['id_usuario'] = $row['id_usuario'];
            }

            form_usuario_html();
            controller_tabla_usuario_php();

            echo
            "<script type='text/javascript'>
                            alert(\"¡El usuarios e aregistrado de manera exitosa!\");
                            jQuery(document).ready(function(){
                                  jQuery('#_modal_informacion_cuenta_contable').modal();
                                  jQuery(document).ready(function(){
                                      jQuery('#_modal_informacion_cuenta_contable').modal('open');
                                  });
                            });
                    </script>";
            footer_html();
            echo '<script type="text/javascript" src="ajax_usuario.js"></script>';

        }
        echo 'Entro pero ahi se quedo';

}

?>