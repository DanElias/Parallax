<?php

require_once("_util_beneficiarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

session_start();

//$_SESSION['link_imagen'];
$_SESSION['error_tutor'];
//$_SESSION['id_evento'];

if (isset($_POST["submit"])) {
    //Aquí guardo lo que está en los campos del form en variables
    $_POST["nombre_tutor"] = htmlentities($_POST["nombre_tutor"]);
    $_POST["fecha_nacimiento_tutor"] = htmlentities($_POST["fecha_nacimiento_tutor"]);
    $_POST["telefono"] = htmlentities($_POST["telefono"]);
    $_POST["ocupacion"] = htmlentities($_POST["ocupacion"]);
    $_POST["empresa"] = htmlentities($_POST["empresa"]);
    $_POST["titulo"] = htmlentities($_POST["titulo"]);
    $_POST["grado_estudios_tutor"] = htmlentities($_POST["grado_estudios_tutor"]);

    //Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
    if (isset($_POST["nombre_tutor"])
        && isset($_POST["fecha_nacimiento_tutor"])
        && isset($_POST["telefono"])
        && isset($_POST["ocupacion"])
        && isset($_POST["empresa"])
        && isset($_POST["titulo"])
        && isset($_POST["grado_estudios_tutor"])
        && $_POST["nombre_tutor"] != ""
        && $_POST["fecha_nacimiento_tutor"] != ""
        && $_POST["telefono"] != ""
        && $_POST["ocupacion"] != ""
        && $_POST["empresa"] != ""
        && $_POST["titulo"] != ""
        && $_POST["grado_estudios_tutor"] != "")
        {

        // si no hay errores entonces mostrar pantalla de éxito
        if (!checkmydateNact()
            && !is_numeric($_POST["nombre_tutor"])
            && !is_numeric($_POST["ocupacion"])
            && !is_numeric($_POST["empresa"])
            && !is_numeric($_POST["titulo"])
            && !is_numeric($_POST["grado_estudios_tutor"]))
            {

            //Validar que la imagen insertada sea valida
            if (validar_imagen()) {

                //EN ESTA PARTE A CONTINUACION HARÉ EL REGISTRO EN LA BASE DE DATOS
                //PODEMOS VER QUE LO DEMÁS DEL CÓDIGO ES LA PARTE QUE VALIDA QUE EL FORM SE LLENÓ DE MANERA CORRECTA.
                //------------------------------------------------------------------------------------------------------------
                if (insertarEvento($_POST["nombre_evento"], $_POST["fecha_evento"], $_POST["hora_evento"], $_POST["lugar_evento"], $_POST["descripcion_evento"], $_SESSION['link_imagen'])) {

                    /*------------------------------------------------EN ESTA PARTE YA VOY A MOSTRAR LA INFORMACION DEL EVENTO GUARDADO EN LA PÁGINA*/
                    header_html();
                    sidenav_html();
                    evento_html();

                    //Esta sección es para obtener el id del evento que acabo de subir y poder mostrarlo en mi modal//
                    $result=obtenerEventoReciente();
                    $row=mysqli_fetch_assoc($result);
                    if(!isset($_SESSION['id_evento'])){
                        $_SESSION['id_evento']=$row['id_evento'];
                    }

                    controller_modal_informacion_evento_php();
                    form_evento_html();
                    form_eliminar_evento_html();
                    controller_tabla_eventos_php();

                    echo
                    "<script type='text/javascript'>
                                    alert(\"¡El evento se ha registrado de manera exitosa!\");
                                    jQuery(document).ready(function(){
                                          jQuery('#_modal_informacion_evento').modal();
                                          jQuery(document).ready(function(){
                                              jQuery('#_modal_informacion_evento').modal('open');
                                          });
                                    });
                            </script>";
                    footer_html();
                    /*----------------------------------------------------------------------------------------------------------------------------------*/
                }
            }

        } // si hay errores revisar cuáles son y mostrarlos
        else {
            $_SESSION['error_tutor']  = "<br><br> El evento no se ha podido registrar.";
            checkmydate();
            if (is_numeric($_POST["nombre_tutor"])) {
            $_SESSION['error_tutor'] .= "<br><br> El nombre del evento no debe incluir sólo números";
            }
            if (is_numeric($_POST["descripcion_evento"])) {
                $_SESSION['error_tutor'] .= "<br><br> La descripción del evento no debe incluir sólo números";
            }
            if (is_numeric($_POST["lugar_evento"])) {
                $_SESSION['error_tutor'] .= "<br><br> El lugar del evento no debe incluir sólo números";
            }
            mostrar_alerta_erro_tutor();
        }

    } else {
        $_SESSION['error_evento'] .= "<br><br> Olvidaste llenar todos los campos del formulario <br> El evento no se ha podido registrar.";
        mostrar_alerta_error_tutor();
    }
} else {
    mostrar_alerta_error_tutor();
}

function checkmydateNact()
{
    $input_date = $_POST["fecha_nacimiento_tutor"];//Las fechas se guardan como 1998-03-28
    $test_date = explode('-', $input_date);
    $current_date = date("Y-m-d");
    $test_current = explode('-', $current_date);

    // se valida que no se registre una fecha posterior a la actual
    if ($test_date[0] >= $test_current[0]) {
        $_SESSION['error_tutor'] .= "<br><br> Hay errores en la fecha: El año no es válido";
        return true;
    }

    return false;
}


function mostrar_alerta_error_tutor()
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
}

?>
