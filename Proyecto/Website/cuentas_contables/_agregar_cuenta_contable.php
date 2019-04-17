<?php
require_once("_util_cuentas_contables.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

//Funcion que va a ir en queries

$_SESSION['id_cuentacontable'];

if (isset($_POST["submit"])){
    $_POST["nombre_cuenta"] = htmlentities($_POST["nombre_cuenta"]);
    $_POST["descripcion_cuenta"] = htmlentities($_POST["descripcion_cuenta"]);


    if (isset($_POST["nombre_cuenta"]) && isset($_POST["descripcion_cuenta"]) 
        && $_POST["nombre_cuenta"] != ""&& $_POST["descripcion_cuenta"] != ""){
        
        //EN ESTA PARTE A CONTINUACION HARÉ EL REGISTRO EN LA BASE DE DATOS
        //PODEMOS VER QUE LO DEMÁS DEL CÓDIGO ES LA PARTE QUE VALIDA QUE EL FORM SE LLENÓ DE MANERA CORRECTA.
        //------------------------------------------------------------------------------------------------------------
        if (registrar_cuenta_contable($_POST["nombre_cuenta"], $_POST["descripcion_cuenta"])) {
            
            /*------------------------------------------------EN ESTA PARTE YA VOY A MOSTRAR LA INFORMACION DEL EVENTO GUARDADO EN LA PÁGINA*/
            header_html();
            sidenav_html();
            cuentacontable_html();

            //Esta sección es para obtener el id del evento que acabo de subir y poder mostrarlo en mi modal//
            $result = obtener_cuenta_contable_reciente();
            $row = mysqli_fetch_assoc($result);
            if (!isset($_SESSION['id_cuenta_contable'])) {
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
            /*-----------------------------------------------------------------------------------------------------------------*/

        }

    }

}

?>