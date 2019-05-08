<?php

//util de admin para que el nombre del header sea correcto
require_once("_util_admin.php");

session_start();
//Condicionales para el caso de hacer logout

if (isset($_SESSION['usuario'])) {
    $_SESSION['registro'] = 0;
    $_SESSION['error1'] = 0;
    $_SESSION['error2'] = 0;
    $_SESSION['error3'] = 0;
    $_SESSION['error4'] = 0;
    $_SESSION['error5'] = 0;
    $_SESSION['error6'] = 0;
    $_SESSION['error7'] = 0;
    $_SESSION['error8'] = 0;
    $_SESSION['registro_rol'] = 0;
    $_SESSION['editar_rol'] = 0;
    $_SESSION['editar_usuario'] = 0;
    $_SESSION['eliminar_usuario'] = 0;
    $_SESSION['eliminar_rol'] = 0;
    $_SESSION['exito_eliminar_egreso'] = 0;
    $_SESSION['error_eliminar_egreso'] = 0;
    $_SESSION['exito_agregar_egreso'] = 0;
    $_SESSION['error_agregar_egreso'] = 0;
    $_SESSION['proveedor_eliminado'] = 0;
    $_SESSION['registro_proveedor'] = 0;
    
    $_SESSION['editar_proveedor_exito'] = 0;
    $_SESSION['error_eliminar_proveedor'] = 0;
    $_SESSION['editar_proveedor_error'] = 0;
    //Llamada de funciones (util.php) de lo que se nesecite en el form
    header_html();
    body_admin_main();
    sidenav_html();
    footer_html();


    //Si no hay una sesion activa, reedirigria a login
} else {

    header("location:../login/_login_vista.php");

}
?>