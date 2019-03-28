<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_usuarios.php");


<<<<<<< HEAD
$_GET['id'] = htmlentities($_GET['id']);

//Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
if (isset($_GET['id']) && $_GET['id'] != "") {
=======
$_GET['id_usuario']= htmlentities($_GET['id_usuario']);

//Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
if (isset($_GET['id_usuario']) && $_GET['id_usuario'] != ""){
>>>>>>> 66e2cb926ca5b7441249bab020920167ca1b13e6
    //EN ESTA PARTE A CONTINUACION HARÉ EL REGISTRO EN LA BASE DE DATOS
    //PODEMOS VER QUE LO DEMÁS DEL CÓDIGO ES LA PARTE QUE VALIDA QUE EL FORM SE LLENÓ DE MANERA CORRECTA.
    //------------------------------------------------------------------------------------------------------------

<<<<<<< HEAD
    $result = obtenerEventosPorID($_GET['id']);
    $row = mysqli_fetch_assoc($result);

    echo $filename;

    if (file_exists($filename)) {
        unlink($filename);
        if (eliminarEventoPorID($_GET['id'])) {
=======
    $result=obtenerUsuariosPorID($_GET['id_usuario']);
    $row=mysqli_fetch_assoc($result);

    echo $filename;
        if(eliminarUsuarioPorID($_GET['id_usuario'])){
>>>>>>> 66e2cb926ca5b7441249bab020920167ca1b13e6
            header_html();
            sidenav_html();
            evento_html();
            controller_tabla_usuarios_php();
            form_evento_html();
            form_eliminar_evento_html();
            echo
            "<script type='text/javascript'>
                                alert(\"¡El usuario se ha borrado de manera exitosa!\");
                    </script>";
            footer_html();
        } else {
            echo "Por ele momento no";
        }

<<<<<<< HEAD
    } else {
        echo "UJU Por el momento no podemos eliminar el evento. Inténtalo más tarde";
=======
    }
    else {
        echo "UJU Por el momento no podemos eliminar el usaurio. Inténtalo más tarde";
>>>>>>> 66e2cb926ca5b7441249bab020920167ca1b13e6
    }


    //--------------------------------------------------------------------------------------------------------------
<<<<<<< HEAD
} else {
    echo "Por el momento no podemos eliminar el evento. Inténtalo más tarde";
}


function eliminarimagen()
{


}

=======
>>>>>>> 66e2cb926ca5b7441249bab020920167ca1b13e6
?>