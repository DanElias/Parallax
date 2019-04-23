<?php
require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

//Funcion que va a ir en queries

if (isset($_POST["submit"])){
    $_POST["nombre"] = htmlentities($_POST["nombre"]);

    if (isset($_POST["nombre"]) && $_POST["nombre"] != "" ){

        if (registrar_Rol($_POST["nombre"])) {

            header("location:_usuarios_vista.php");

            echo
            "<script type='text/javascript'>
                            alert(\"¡El ROL se ha registrado exitosamente!\");
                            jQuery(document).ready(function(){
                                  jQuery('#_modal_informacion_cuenta_contable').modal();
                                  jQuery(document).ready(function(){
                                      jQuery('#_modal_informacion_cuenta_contable').modal('open');
                                  });
                            });
                    </script>";
            footer_html();
            echo '<script type="text/javascript" src="ajax_usuario.js"></script>';
            /*-----------------------------------------------------------------------------------------------------------------*/

        }

    }

}

?>