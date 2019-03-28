<?php

require_once("_util_eventos.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

session_start();

$_SESSION['link_imagen'];
$_SESSION['error_evento'];
$_SESSION['id_evento'];

if (isset($_POST["submit"])) {
    //Aquí guardo lo que está en los campos del form en variables
    $_POST["nombre_evento"] = htmlentities($_POST["nombre_evento"]);
    $_POST["fecha_evento"] = htmlentities($_POST["fecha_evento"]);
    $_POST["hora_evento"] = htmlentities($_POST["hora_evento"]);
    $_POST["lugar_evento"] = htmlentities($_POST["lugar_evento"]);
    $_POST["descripcion_evento"] = htmlentities($_POST["descripcion_evento"]);

    //Aquí checo que se hayan llenado todos los campos y que no sólo estén vacíos
    if (isset($_POST["nombre_evento"])
        && isset($_POST["hora_evento"])
        && isset($_POST["fecha_evento"])
        && isset($_POST["lugar_evento"])
        && isset($_POST["descripcion_evento"])
        && $_POST["nombre_evento"] != ""
        && $_POST["fecha_evento"] != ""
        && $_POST["hora_evento"] != ""
        && $_POST["lugar_evento"] != ""
        && $_POST["descripcion_evento"] != "") {

        // si no hay errores entonces mostrar pantalla de éxito
        if (!checkmydate() && !is_numeric($_POST["nombre_evento"])
            && !is_numeric($_POST["descripcion_evento"])
            && !is_numeric($_POST["lugar_evento"])) {

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
                    $result = obtenerEventoReciente();
                    $row = mysqli_fetch_assoc($result);
                    if (!isset($_SESSION['id_evento'])) {
                        $_SESSION['id_evento'] = $row['id_evento'];
                    } else {
                        $_SESSION['id_evento'] = $row['id_evento'];
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
            $_SESSION['error_evento'] = "<br><br> El evento no se ha podido registrar.";
            checkmydate();
            if (is_numeric($_POST["nombre_evento"])) {
                $_SESSION['error_evento'] .= "<br><br> El nombre del evento no debe incluir sólo números";
            }
            if (is_numeric($_POST["descripcion_evento"])) {
                $_SESSION['error_evento'] .= "<br><br> La descripción del evento no debe incluir sólo números";
            }
            if (is_numeric($_POST["lugar_evento"])) {
                $_SESSION['error_evento'] .= "<br><br> El lugar del evento no debe incluir sólo números";
            }
            mostrar_alerta_error();
        }

    } else {
        $_SESSION['error_evento'] .= "<br><br> Olvidaste llenar todos los campos del formulario <br> El evento no se ha podido registrar.";
        mostrar_alerta_error();
    }
} else {
    mostrar_alerta_error();
}

function checkmydate()
{
    $input_date = $_POST["fecha_evento"];//Las fechas se guardan como 1998-03-28
    $test_date = explode('-', $input_date);
    $current_date = date("Y-m-d");
    $test_current = explode('-', $current_date);

    // se valida que no se registre un evento que tiene una fecha que ya pasó -> hay error
    if ($test_date[0] < $test_current[0]) {
        $_SESSION['error_evento'] .= "<br><br> Hay errores en la fecha: El año seleccionado ya pasó.";
        return true;
    }
    // si se escoge un mes que ya paso de este mismo año -> hay error
    if ($test_date[0] == $test_current[0] && $test_date[1] < $test_current[1]) {
        $_SESSION['error_evento'] .= "<br><br>  Hay errores en la fecha: El mes seleccionado ya pasó.";
        return true;
    }
    //si se escoge un día que ya paso de este mismo mes y año -> hay error
    if ($test_date[0] == $test_current[0] && $test_date[1] == $test_current[1] && $test_date[2] < $test_current[2]) {
        $_SESSION['error_evento'] .= "<br><br> Hay errores en la fecha: El día seleccionado ya pasó.";
        return true;
    }

    return false;
}


/*EN ESTA PARTE VOY A SUBIR LA IMAGEN A MI CARPETA DE UPLOADS Y CHECO QUE TODO ESTÉ EN ORDEN CON LA IMAGEN*/
function validar_imagen()
{
    $target_dir = "uploads/";
    //var_dump($_FILES);
    //die();

    //var_dump($_FILES["fileToUpload"]["tmp_name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    //-------------------------------------------------------------------------------------------------------------------//
    $_SESSION['link_imagen'] = "../eventos/" . $target_file; //Guardo el link de la imagen para mandarlo a la base de datos
    //------------------------------------------------------------------------------------------------------------------//

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $info = "El archivo si es una imagen - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $GLOBALS['error'] .= "<br><br> El archivo no es una imagen.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {

        /*aqui revisar donde voy a desplegar el error*/
        $_SESSION['error_evento'] .= "<br><br> La imagen seleccionada tiene el mismo nombre que otra imagen que ya se había subido.";

        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000000) {

        /*aqui revisar donde voy a desplegar el error*/
        $_SESSION['error_evento'] .= "<br><br> Tu imagen es muy grande.";

        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {

        /*aqui revisar donde voy a desplegar el error*/
        $_SESSION['error_evento'] .= "<br><br> Sólo puedes subir archivos JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {

        /*aqui revisar donde voy a desplegar el error*/
        $_SESSION['error_evento'] .= "<br><br> Nosotros no logramos subir la imagen, inténtalo más tarde. ";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


            /*aqui revisar donde voy a desplegar la informacion*/
            $info .= "<br> El archivo: " . basename($_FILES["fileToUpload"]["name"]) . " se ha subido exitosamente";


        } else {

            /*aqui revisar donde voy a desplegar el error*/
            $_SESSION['error_evento'] .= "<br><br> Ocurrió un error de nuestra parte al intentar subir tu archivo, vuelve a intentarlo más tarde.";

            $uploadOk = 0;
        }
    }

    if ($uploadOk == 0) {
        return false;
    } else {
        return true;
    }

}

function mostrar_alerta_error()
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