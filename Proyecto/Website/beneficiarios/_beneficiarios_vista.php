<?php

require_once("_util_beneficiarios.php");
session_start(); //Inicio de sesion
//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"])) {

    //Htmls a llamar
    header_html();
    sidenav_html();
    form_beneficiarios_html();
    form_tutor_html();
    form_eliminar_beneficiarios_html();
    form_estado_beneficiarios_html();
    //modal_informacion_beneficiarios_html();
    //modal_informacion_tutor_html();
    beneficiarios_html();
    footer_html();
    echo '<script src="js/ajax.js"></script>';
} else {
    header("location:../login/_login_vista.php");

}

?>
