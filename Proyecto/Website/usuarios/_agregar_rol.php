<?php
require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

//Funcion que va a ir en queries
if (isset($_POST["submit"])){
    $_POST["nombre_rol"] = htmlentities($_POST["nombre_rol"]);
    $No_rol = obtener_rol_reciente();
    $row = mysqli_fetch_assoc($No_rol);
    $Rol = $row["id_rol"];
    $rol_actual =$Rol +  1;



    if(isset($_POST["Beneficiarios"]) ){
        var_dump(registrar_rol_privilegio(3,3));
    }
    if(isset($_POST["Reporte_Beneficiarios"]) ){
        registrar_rol_privilegio($rol_actual,2);
    }
    if(isset($_POST["Egresos"]) ){
        registrar_rol_privilegio($rol_actual,3);
    }
    if(isset($_POST["Reporte_Egresos"]) ){
        registrar_rol_privilegio($rol_actual,4);
    }
    if(isset($_POST["Proveedores"]) ){
        registrar_rol_privilegio($rol_actual,5);
    }
    if(isset($_POST["Cuentas_contables"]) ){
        registrar_rol_privilegio($rol_actual,6);
    }
    if(isset($_POST["Eventos"]) ){
        registrar_rol_privilegio($rol_actual,7);
    }
    if(isset($_POST["Usuarios"]) ){
        registrar_rol_privilegio($rol_actual,8);
    }


    if (isset($_POST["nombre_rol"]) && $_POST["nombre_rol"] != "" ){

        if (registrar_Rol($_POST["nombre_rol"])) {

            //header("location:_usuarios_vista.php");

            footer_html();

        }

    }

}

?>