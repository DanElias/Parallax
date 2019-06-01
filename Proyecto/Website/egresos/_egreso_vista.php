<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_egreso.php");
session_start(); //Inicio de sesion

if (isset($_SESSION["usuario"])) {


        header_html();
        sidenav_html();
        body_egreso();
        controller_tabla_egreso_php();
        form_egreso_html();
        modal_informacion_egreso_html();

        if($_SESSION['eliminar_egreso_exito'] == 1){
            echo "<script type='text/javascript'> alert('¡El egreso ha sido eliminado!');</script>";
            $_SESSION['eliminar_egreso_exito'] = 0;
        }


        if($_SESSION['eliminar_egreso_error'] == 1){
            echo "<script type='text/javascript'> alert('!El egreso no ha podido ser eliminado!');</script>";
            $_SESSION['eliminar_egreso_error'] = 0;
        }

        if($_SESSION['registrar_egreso_exito'] == 1){
            echo "<script type='text/javascript'> alert('¡El egreso ha sido registrado con exito!');</script>";
            $_SESSION['registrar_egreso_exito'] = 0;
        }

        if($_SESSION['registrar_egreso_error'] == 1){
            echo '<script type="text/javascript"> alert("¡El egreso no pudo ser registrado!  Verifica que hayas llenado los campos correctamente");</script>';
            $_SESSION['registrar_egreso_error'] = 0;
        }


        if($_SESSION['editar_egreso_error'] == 1){
            echo "<script type='text/javascript'> alert('¡El egreso no pudo ser editado! Verifica que hayas llenado los campos correctamente');</script>";
            $_SESSION['editar_egreso_error'] = 0;
        }

        if($_SESSION['editar_egreso_exito'] == 1){
            echo "<script type='text/javascript'> alert('¡El egreso se editó con exito!');</script>";
            $_SESSION['editar_egreso_exito'] = 0;
        }


        echo '	<script type="text/javascript" src="ajax_egreso.js"></script>

            <script type="text/javascript" src="ajax.js"></script>
                <script type="text/javascript" src="validaciones.js"></script>
                <script type="text/javascript" src="validaciones_editar.js"></script>';

        footer_html();


    }else{
    	 header("location:../login/_login_vista.php");
    }
?>
