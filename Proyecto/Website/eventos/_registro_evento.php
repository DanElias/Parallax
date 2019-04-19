<?php

/*
    Autor: Daniel Elias
        Este archivo php revisa que los campos del form de agregar evento se hayan llenado de manera correcta
        También revisa la imagen
        Si se llenó de manera correcta entonces se hace un INSERT en la base de datos
        El archivo que mandó llamar a este php es _form_evento.html al momento de que el usuario diera click en submit
        Este archivo difiere de registro_editar_evento.php porque este archivo hace un INSERT en vez de un update, utiliza el query obtener_evento_reciente
*/


require_once("_util_eventos.php"); //se utiliza porque se vuelve a recargar la página
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

session_start(); //para poder utilizar session

$_SESSION['link_imagen'] = " "; //se va a guardar el link de la imagen
$_SESSION['error_evento'] = " "; //se va a guardar algo en caso de que ellas errores
$_SESSION['id_evento'] = " "; //se va a guardar el id del evento


if (isset($_POST["submit"])) {
    //Aquí guardo lo que está en os campos del form en variables
    $_POST["nombre_evento"] = htmlentities($_POST["nombre_evento"]); //htmlentities evitar hackers
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
        && $_POST["descripcion_evento"] != ""){

        // si no hay errores entonces mostrar pantalla de éxito
        if (validar_nombre_evento() && validar_lugar_evento() && validar_descripcion_evento()) {

            //Validar que la imagen insertada sea valida
            if (validar_imagen()){
                
                //editarEvento es una funcion de connection queries que hace un UPDATE en la tabla
                //también checo que si haya un elemento con ese id haha
                 if (insertarEvento($_POST["nombre_evento"], $_POST["fecha_evento"], $_POST["hora_evento"], $_POST["lugar_evento"], $_POST["descripcion_evento"], $_SESSION['link_imagen'])){
                    
                    header_html();//recargo la pagina
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

                    form_evento_html();
                    controller_tabla_eventos_php();
                    controller_modal_informacion_evento_php();
                    footer_html();
                    echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
                
                } else {
                    //Caso de Prueba: no se pudo editar el evento en la tabla de eventos porque
                    //ya no existe ese evento, o no hay conexion con la base de datos
                    $_SESSION['error_evento'] = "No logramos registrar el evento. Inténtalo más tarde";
                    mostrar_alerta_error_registro_editar();
                }
                
            }else{
                //Caso de Prueba: no se pudo editar el evento en la tabla de eventos porque
                //la imagen no es válida, excede el tamaño o no es un formato aceptado
                 $_SESSION['error_evento'] = "No logramos registrar el evento. Inténtalo más tarde";
                mostrar_alerta_error_registro_editar();
            }

        }
        else {
            //Caso de Prueba: no se pudo editar el evento porque el campo de nombre, lugar o descripcion o están en blanco
            //o tienen sólo espacios, o son sólo números o tienen caracteres especiales
            $_SESSION['error_evento'].= "<br><br> El evento no se ha podido registrar.";
            mostrar_alerta_error_registro_editar();
        }

    } else {
        //Caso de Prueba: no se pudo editar el evento porque el campo de nombre, lugar o descripcion o están en blanco
        //o tienen sólo espacios
        $_SESSION['error_evento'] .= "<br><br> Olvidaste llenar todos los campos del formulario <br> El evento no se ha podido registrar.";
        mostrar_alerta_error_registro_editar();
       
    }
} else {
     $_SESSION['error_evento'] = "No logramos registrar el evento. Inténtalo más tarde";
    mostrar_alerta_error_registro_editar();
       
}


//Aquí se valida la imagen que se subió
function validar_imagen()
{
    $timestampimagen=time();//con esto el nombre de la imagen nunca se repite wuuu
     
    $target_dir = "uploads/". $timestampimagen;
   
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    
    //-------------------------------------------------------------------------------------------------------------------//
    $_SESSION['link_imagen'] = "../eventos/".$target_file; //Guardo el link de la imagen para mandarlo a la base de datos
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

function validar_nombre_evento(){
    if(ctype_space($_POST['nombre_evento']) || $_POST['nombre_evento']==""){
        $_SESSION['error_evento'].= "El nombre contiene solo espacios o está vacío";
        return false;
    }
    
    else if (!(preg_match('/^[a-záéíóúüñÑÁÉÍÓÚü0-9 .\-]+$/i',$_POST['nombre_evento']))){
         $_SESSION['error_evento'].= "El nombre no puede contener caracteres especiales (*&_/-%#)";
         return false;
    }
     
    else if(is_numeric($_POST['nombre_evento'])){
        $_SESSION['error_evento'].= "El nombre no puede contener solo números";
        return false;
    }
   
    else{
        return true;
    }  
}

function validar_lugar_evento(){
    if(ctype_space($_POST['lugar_evento']) || $_POST['lugar_evento']==""){
        $_SESSION['error_evento'].= "El lugar contiene solo espacios o está vacío";
        return false;
    }
    
    else if (!(preg_match('/^[a-záéíóúüñÑÁÉÍÓÚü0-9 .\-]+$/i',$_POST['lugar_evento']))){
         $_SESSION['error_evento'].= "El lugar no puede contener caracteres especiales (*&_/-%#)";
         return false;
    }
     
    else if(is_numeric($_POST['lugar_evento'])){
         $_SESSION['error_evento'].= "El lugar no puede contener solo números";
         return false;
    }
   
    else{
        return true;
    }  
}

function validar_descripcion_evento(){
    if(ctype_space($_POST['descripcion_evento']) || $_POST['descripcion_evento']==""){
         $_SESSION['error_evento'].= "La descripción contiene solo espacios o está vacío";
         return false;
    }
    
    else if (!(preg_match('/^[a-záéíóúüñÑÁÉÍÓÚü0-9 .\-]+$/i',$_POST['descripcion_evento']))){
         $_SESSION['error_evento'].= "La descripción no puede contener caracteres especiales (*&_/-%#)";
         return false;
    }
     
    else if(is_numeric($_POST['descripcion_evento'])){
        $_SESSION['error_evento'].= "La descripción no puede contener solo números";
        return false;
    }
   
    else{
        return true;
    }  
}

function mostrar_alerta_error_registro_editar()
{
    header_html();
    sidenav_html();
    evento_html();
    form_evento_html();
    controller_tabla_eventos_php();
    alerta_error($_SESSION['error_evento']);
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

/*function checkmydate() //sirve para checar si se quiere registrar un evento con una fecha que ya pasó
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
}*/

?>