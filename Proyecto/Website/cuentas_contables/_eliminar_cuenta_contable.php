<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_cuentas_contables.php");

$_GET['id'] = htmlentities($_GET['id']);

//Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
if (isset($_GET['id']) && $_GET['id'] != "") {
    //EN ESTA PARTE A CONTINUACION HARÉ EL REGISTRO EN LA BASE DE DATOS
    //PODEMOS VER QUE LO DEMÁS DEL CÓDIGO ES LA PARTE QUE VALIDA QUE EL FORM SE LLENÓ DE MANERA CORRECTA.
    //-----------------------------------------------------------------------------------------------------------
    
        if (eliminarCuentaPorID($_GET['id'])) {
            header_html();
            sidenav_html();
            cuentacontable_html();
            form_cuentacontable_html();
            controller_tabla_cuentas_php();
            controller_modal_informacion_cuentacontable();
            
            echo
            "<script type='text/javascript'>
                                alert(\"¡La cuenta contable se ha borrado de manera exitosa!\");
                    </script>";
            footer_html();
            echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
        }

    //--------------------------------------------------------------------------------------------------------------
}

?>