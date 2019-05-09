
<?php

/*
    Autor: Daniel Elias
        Este archivo php revisa que los campos del form de editar cuenta contable se hayan llenado de manera correcta
        Si se llenó de manera correcta entonces se hace un UPDATE en la base de datos
        El archivo que mandó llamar a este php es controller_form_editar_cuentacontables.php al momento de que el usuario diera click en submit
        Este archivo difiere de agregar_cuenta_contable.php porque este archivo hace un UPDATE en vez de un insert, 
        utiliza el query obtenerCuentaPorID de connection queries.php
*/


require_once("_util_cuentas_contables.php");//se utiliza porque se vuelve a recargar la página
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

session_start(); //para poder utilizar session

$_SESSION['id_cuentacontable'];//se va a guardar el id del evento
$_SESSION['error_cuenta'] = " "; //se va a guardar algo en caso de que ellas errores

if (isset($_POST["esubmit"])){
    //Aquí guardo lo que está en os campos del form en variables
    $_POST["enombre_cuenta"] = htmlentities($_POST["enombre_cuenta"]); //htmlentities evitar hackers
    $_POST["edescripcion_cuenta"] = htmlentities($_POST["edescripcion_cuenta"]);

    //Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
    if (isset($_POST["enombre_cuenta"]) && isset($_POST["edescripcion_cuenta"]) 
        && $_POST["enombre_cuenta"] != "" && $_POST["edescripcion_cuenta"] != ""){
    
        if (validar_nombre_cuenta() && validar_descripcion_cuenta()){//se valida espacios, vacío, carac especiales y sólo números
        
            //registrar_cuenta_contable es una funcion de connection queries que hace un INSERT en la tabla
            if(editarCuenta($_POST["id_cuentacontable"], $_POST["enombre_cuenta"], $_POST["edescripcion_cuenta"] )) {
                
                //ya que se hizo bien el registro recargo la página y le muestro reto al usuario de que fue lo que se guardó
                header_html();
                sidenav_html();
                cuentacontable_html();
    
                //Esta sección es para obtener el id de la cuenta que acabo de subir y poder mostrarla en mi modal//
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
                footer_html();
                echo '<script type="text/javascript" src="ajax_cuentas_contables.js"></script>';
    
            } else{
                //Caso de Prueba: no se pudo registrar la cuenta en la tabla porque
                //ya no existe esa cuenta, o no hay conexion con la base de datos
                $_SESSION['error_cuenta'] = "<br>No logramos registrar la cuenta. Inténtalo más tarde";
                mostrar_alerta_error_registro();
            }
        
        } else {
            //Caso de Prueba: no se pudo registrar la cuenta porque el campo de nombre o descripcion o están en blanco
            //o tienen sólo espacios, o son sólo números o tienen caracteres especiales
            $_SESSION['error_cuenta'] .= "<br>La cuenta no se ha podido registrar";
            mostrar_alerta_error_registro();
        }

    } else {
        //Caso de Prueba: no se pudo editar el evento porque el campo de nombre, lugar o descripcion o están en blanco
        //o tienen sólo espacios
        $_SESSION['error_cuenta'] .= "<br>Olvidaste llenar todos los campos del formulario <br> La cuenta no se ha podido registrar.";
        mostrar_alerta_error_registro();
    }

} else{
    $_SESSION['error_evento'] = "<br>No logramos registrar la cuenta. Inténtalo más tarde";
    mostrar_alerta_error_registro();
}

function validar_nombre_cuenta(){
    if(ctype_space($_POST['enombre_cuenta']) || $_POST['enombre_cuenta']==""){
        $_SESSION['error_cuenta'].= "El nombre contiene solo espacios o está vacío";
        return false;
    }
    
    else if (!(preg_match('/^[a-záéííóúüñÑÁÉÍÓÚü0-9 .\-]+$/ui',$_POST['enombre_cuenta'])) && preg_match("/^\pL+(?>[- ']\pL+)*$/u",$_POST['enombre_cuenta'])){
         $_SESSION['error_cuenta'].= "El nombre no puede contener caracteres especiales (*&_/-%#,)";
         return false;
    }
     
    else if(is_numeric($_POST['enombre_cuenta'])){
        $_SESSION['error_cuenta'].= "El nombre no puede contener solo números";
        return false;
    }
   
    else{
        return true;
    }  
}

function validar_descripcion_cuenta(){
    if(ctype_space($_POST['edescripcion_cuenta']) || $_POST['edescripcion_cuenta']==""){
         $_SESSION['error_cuenta'].= "La descripción contiene solo espacios o está vacío";
         return false;
    }
    
    else if (!(preg_match('/^[a-záéíóúüñÑÁÉÍÓÚü0-9 .\-]+$/ui',$_POST['edescripcion_cuenta'])) && preg_match("/^\pL+(?>[- ']\pL+)*$/u",$_POST['edescripcion_cuenta'])){
         $_SESSION['error_cuenta'].= "La descripción no puede contener caracteres especiales (*&_/-%#,)";
         return false;
    }
     
    else if(is_numeric($_POST['edescripcion_cuenta'])){
        $_SESSION['error_cuenta'].= "La descripción no puede contener solo números";
        return false;
    }
   
    else{
        return true;
    }  
}

function mostrar_alerta_error_registro()
{
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