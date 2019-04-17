<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_usuarios.php");

$_GET['id'] = htmlentities($_GET['id']);

//Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
if (isset($_GET['id']) && $_GET['id'] != "") {
    //EN ESTA PARTE A CONTINUACION HARÉ EL REGISTRO EN LA BASE DE DATOS
    //PODEMOS VER QUE LO DEMÁS DEL CÓDIGO ES LA PARTE QUE VALIDA QUE EL FORM SE LLENÓ DE MANERA CORRECTA.
    //-----------------------------------------------------------------------------------------------------------
    
        if (eliminarUsuarioPorID($_GET['id'])) {
            header_html();
            sidenav_html();
            usuarios_html();
            form_usuario_html();
            controller_tabla_usuario_php();
            
            echo
            "<script type='text/javascript'>
                                alert(\"¡El usuario ha sido eliminado exitosamente!\");
                    </script>";
            footer_html();
            echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
        }

    //--------------------------------------------------------------------------------------------------------------
}

?>