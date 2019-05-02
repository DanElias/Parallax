<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_reporte_beneficiarios.php");
session_start(); //Inicio de sesion

//Condicionales para el caso de hacer logout

if (isset($_SESSION["usuario"])  && $_SESSION['dos'] == 1) {
    header_html();
    sidenav_html();
    body_beneficiarios();
    grafica_cuota();
    grafica_enfermedades();
    grafica_escuela();
    grafica_estado();
    grafica_grado();
    grafica_grupo();
    grafica_nivel();
    grafica_sexo();
    grafica_ocupacion();
    grafica_empresa();
    grafica_estudio();
    grafica_titulo();
    footer_html();

} else {
    header("location:../login/_login_vista.php");

}
?>