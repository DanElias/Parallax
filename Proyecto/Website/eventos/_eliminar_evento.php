<?php

/*
    Autor: Daniel Elias
        Este archivo php hace la eliminación de un row de la tabla evento
        Recibe el id del row a eliminar desde el archivo _controller_eliminar_evento.php
*/

require_once("../basesdedatos/_conection_queries_db.php"); //utiliza el archivo de queries de la base de datos
require_once("_util_eventos.php");// utiliza el util de eventos para recargar la página

$_GET['id'] = htmlentities($_GET['id']);  //Recibe el id del row a eliminar desde el archivo _controller_eliminar_evento.php

if (isset($_GET['id']) && $_GET['id'] != ""){

    $result = obtenerEventosPorID($_GET['id']); //Obtengo el evento a eliminar de la base de datos
    $row = mysqli_fetch_assoc($result); //guardo el row del resultado
    $filename = $row['imagen']; //obtengo el nombre de la imagen que será usado para borrarla del folder de uploads
    //guardo el nombre de la imagen antes de intentar borrar el row, porque si no se borra entonces no queremos que se borre la imagen
   
        if (eliminarEventoPorID($_GET['id']) && mysqli_num_rows($result)>0){ //reviso si el evento con ese id si existe en la base de datos
            //ya que vimos que si se borro el row ahora si procedo a eliminar su imagen
             if (file_exists($filename)) { //si existe en la base de datos una imagen con ese nombre, la elimino del folder de uploads
                unlink($filename); //en teoría esta función siempre debería de funcionar porque es de PHP
            }

            //recargo la página
            header_html();
            sidenav_html();
            evento_html();
            form_evento_html();
            controller_tabla_eventos_php();
            
            echo
            "<script type='text/javascript'>
                            alert(\"¡El evento se ha borrado de manera exitosa!\");
            </script>"; //mando la alerta de que si se logró eliminar el evento
            
            footer_html();
            echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
            
        } else {//si no existe un evento con ese id mando un error (poco probable que ocurra)
            //Caso de Prueba: al eliminar el evento no se manda el id correcto, ya no existe ese evento en la tabla o no se pudo conectar con la base de datos.
            $_SESSION['error_evento']="Por el momento no podemos eliminar el evento. Inténtalo más tarde";
            mostrar_alerta_error_eliminar();
        }
            
} else {
    $_SESSION['error_evento']="Por el momento no podemos eliminar el evento. Inténtalo más tarde";
    mostrar_alerta_error_eliminar();
}



function mostrar_alerta_error_eliminar()
{
    header_html();
    sidenav_html();
    evento_html();
    form_evento_html();
    controller_tabla_eventos_php();
    alerta_error($_SESSION['error_evento']); //Recordar que esta funcion se manda llamar en util_cuentas_contables.php
    echo
    "<script type='text/javascript'>
            jQuery(document).ready(function(){
                  jQuery('#_form_alerta_error').modal();
                  jQuery(document).ready(function(){
                      jQuery('#_form_alerta_error').modal('open');
                  });
            });
    </script>";
    footer_html();
    echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
}


?>