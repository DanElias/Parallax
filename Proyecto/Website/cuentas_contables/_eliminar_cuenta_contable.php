<?php

/*
    Autor: Daniel Elias
        Este archivo php hace la eliminación de un row de la tabla de cuentas contables
        Recibe el id del row a eliminar desde el archivo _controller_eliminar_cuenta.php
*/

require_once("../basesdedatos/_conection_queries_db.php");//utiliza el archivo de queries de la base de datos
require_once("_util_cuentas_contables.php"); // utiliza el util de eventos para recargar la página

$_GET['id'] = htmlentities($_GET['id']); //Recibe el id del row a eliminar desde el archivo _controller_eliminar_evento.php

if (isset($_GET['id']) && $_GET['id'] != ""){
    
        $result = obtenerCuentaPorID($_GET['id']); //Obtengo el evento a eliminar de la base de datos  $_GET['id']
        //así reviso si el evento con ese id si existe en la base de datos
        
        if(mysqli_num_rows($result)>0){
            if (eliminarCuentaPorID($_GET['id'])){ //reviso si si se pudo eliminar la cuenta contable solicitada $_GET['id']
        
                header("location:_cuentas_contables_vista.php");
                //recargo la página
                header_html();
                sidenav_html();
                cuentacontable_html();
                form_cuentacontable_html();
                controller_tabla_cuentas_php();
                echo
                "<script type='text/javascript'>
                                    alert(\"¡La cuenta contable se ha borrado de manera exitosa!\");
                        </script>";
                footer_html();
                echo '<script type="text/javascript" src="ajax_cuentas_contables.js"></script>';
                
            } else {//si no existe una cuenta contable con ese id mando un error (poco probable que ocurra)
                //Caso de Prueba: al eliminar la cuenta no se manda el id correcto, ya no existe esa cuenta en la tabla o no se pudo conectar con la base de datos.
                $_SESSION['error_cuenta']="Por el momento no podemos eliminar la cuenta contable. Inténtalo más tarde";
                mostrar_alerta_error_eliminar();
            }
        } else {//si no existe una cuenta contable con ese id mando un error (poco probable que ocurra)
            //Caso de Prueba: al eliminar la cuenta no se manda el id correcto, ya no existe esa cuenta en la tabla o no se pudo conectar con la base de datos.
            $_SESSION['error_cuenta']="Por el momento no podemos eliminar la cuenta contable. Inténtalo más tarde";
            mostrar_alerta_error_eliminar();
        }
        
} else {
    $_SESSION['error_cuenta']="Por el momento no podemos eliminar la cuenta. Inténtalo más tarde";
    mostrar_alerta_error_eliminar();
}


function mostrar_alerta_error_eliminar()
{
    //recargo la página
    header_html();
    sidenav_html();
    cuentacontable_html();
    form_cuentacontable_html();
    controller_tabla_cuentas_php();
    alerta_error($_SESSION['error_cuenta']);
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
    echo '<script type="text/javascript" src="ajax_cuentas_contables.js"></script>';
}

?>