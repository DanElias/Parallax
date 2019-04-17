<?php

require_once("_util_cuentas_contables.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

session_start();


if (isset($_POST["submit"])) {
    //Aquí guardo lo que está en los campos del form en variables
    $_POST["id_cuentacontable"] = htmlentities($_POST["id_cuentacontable"]);
    $_POST["nombre"] = htmlentities($_POST["nombre"]);
    $_POST["descripcion"] = htmlentities($_POST["descripcion"]);

    //Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
    if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && $_POST["nombre"] != "" && $_POST["descripcion"] != ""){

        //EN ESTA PARTE A CONTINUACION HARÉ EL REGISTRO EN LA BASE DE DATOS
        //PODEMOS VER QUE LO DEMÁS DEL CÓDIGO ES LA PARTE QUE VALIDA QUE EL FORM SE LLENÓ DE MANERA CORRECTA.
        //------------------------------------------------------------------------------------------------------------
        if (editarCuenta($_POST["id_cuentacontable"], $_POST["nombre"], $_POST["descripcion"] )) {
        
            header_html();
            sidenav_html();
            cuentacontable_html();

            $result = obtenerCuentaPorID($_POST["id_cuentacontable"]);
            $row = mysqli_fetch_assoc($result);
            if (!isset($_SESSION['id_cuentacontable'])) {
                $_SESSION['id_cuentacontable'] = $row['id_cuentacontable'];
            } else {
                $_SESSION['id_cuentacontable'] = $row['id_cuentacontable'];
            }

            form_cuentacontable_html();
            controller_tabla_cuentas_php();
            controller_modal_informacion_cuentacontable();
 
            echo
            "<script type='text/javascript'>
                            alert(\"¡La cuenta contable se ha registrado de manera exitosa!\");
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