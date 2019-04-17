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
        body_usuarios();
        form_agregar_usuario();
        controller_tabla_usuarios_php();
        controller_modal_informacion_usuarios_php();

        echo
        "<script type='text/javascript'>
                                alert(\"¡El usuario se ha borrado de manera exitosa!\");
                    </script>";
        footer_html();
        echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
    }

    //--------------------------------------------------------------------------------------------------------------
}

?>