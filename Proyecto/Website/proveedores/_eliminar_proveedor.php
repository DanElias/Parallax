<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_proveedor.php");

session_start();
//$_SESSION['proveedor_eliminado'] = 0;
$_GET['id'] = htmlentities($_GET['id']);
//echo "RFC DEL PROVEEDOR: ".$_GET['id'];

if (eliminar_proveedor_id($_GET['id'])){
    echo "DEBIO ELIMINARSE";
    /*
	$_SESSION['proveedor_eliminado'] = 1;
        header("location:_proveedor_vista.php");
        if($GLOBALS['local_servidor'] == 1){
                    echo '<script type="text/javascript">
                window.location="https://www.marianasala.org/Website/usuarios/_usuarios_vista.php";
                </script>';
                }*/
  
}else{
	header("location:_proveedor_vista.php");
        if($GLOBALS['local_servidor'] == 1){
                    echo '<script type="text/javascript">
                window.location="https://www.marianasala.org/Website/usuarios/_usuarios_vista.php";
                </script>';
                }
	$_SESSION['error_eliminar_proveedor'] = 1;
    echo "No funciono";
}



//Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
/*
if (isset($_GET['id']) && $_GET['id'] != "") {
        
        if (eliminar_proveedor_id($_GET['id'])) {           
            echo
            "<script type='text/javascript'>
                            alert(\"¡El evento se ha borrado de manera exitosa!\");
            </script>"; //mando la alerta de que si se logró eliminar el evento
            
            footer_html();
            echo '<script type="text/javascript" src="ajax_eventos.js"></script>';


        } else {

            echo "No se pudo";
            $_SESSION['error_proveedor']="Por el momento no podemos eliminar el proveedor. Inténtalo más tarde";
            //mostrar_alerta_error_eliminar();
        }

    


   
} else {
    $_SESSION['error_proveedor']="Por el momento no podemos eliminar el proveedor. Inténtalo más tarde";
    //mostrar_alerta_error_eliminar();
}
*/

/*
function mostrar_alerta_error_eliminar()
{
    header_html();
    sidenav_html();
    evento_html();
    form_evento_html();
    form_eliminar_evento_html();
    alerta_error($_SESSION['error_evento']);
    modal_informacion_evento_html();
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
*/

?>