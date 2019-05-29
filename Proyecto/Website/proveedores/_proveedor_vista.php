<?php

//util de admin para que el nombre del header sea correcto

require_once('_util_proveedor.php');
session_start(); //Inicio de sesion



if (isset($_SESSION["usuario"]) && $_SESSION['cinco'] == 1) {
	    header_html();
	    sidenav_html();
	    body_proveedores();
	    controller_tabla_proveedor_php();
	    form_proveedor_html(); 
	    modal_informacion_proveedor_html();


	    if($_SESSION['eliminar_proveedor_exito'] == 1){
	        echo
	        "<script type='text/javascript'> alert('El proveedor se ha eliminado correctamente!');</script>";
	        $_SESSION['eliminar_proveedor_exito'] = 0;

	    }
	    if($_SESSION['eliminar_proveedor_error'] == 1){
	        echo
	        "<script type='text/javascript'> alert('El proveedor no se ha podido eliminar, asegurese de que no haya ningun egreso con este proveedor');</script>";
	        $_SESSION['eliminar_proveedor_error'] = 0;

	    }
	    if($_SESSION['editar_proveedor_exito'] == 1){
	        echo
	        "<script type='text/javascript'> alert('El proveedor se editó correctamente!');</script>";
	        $_SESSION['editar_proveedor_exito'] = 0;

	    }
	    if($_SESSION['editar_proveedor_error'] == 1){
	        echo
	        "<script type='text/javascript'> alert('El proveedor no se pudo editar, asegurese de que no haya ningun egreso con ese proveedor');</script>";
	        $_SESSION['editar_proveedor_error'] = 0;

	    }
	    if($_SESSION['registrar_proveedor_exito'] == 1){
	        echo
	        "<script type='text/javascript'> alert('El registro fue exitoso!');</script>";
	        $_SESSION['registrar_proveedor_exito'] = 0;

	    }
	    
	    if($_SESSION['registrar_proveedor_error'] == 1){
	        echo "<script type='text/javascript'> alert('Hubo un error, el registro no fue exitoso !');</script>";
	        $_SESSION['registrar_proveedor_error'] = 0;

	    }
	    
	    echo'<script type="text/javascript" src="ajax_proveedor.js"></script>
	    	 <script type="text/javascript" src="validaciones_registrar.js"></script>
	       	 <script type="text/javascript" src="validaciones_editar.js"></script>
	                ';
	         

	    footer_html();
	    
	}else {
	    header("location:../login/_login_vista.php");

	}

?>