<?php
require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
session_start();

$_SESSION['editar_rol'] = 0;
//Funcion que va a ir en queries
if (isset($_POST["submit"])){
    $_POST["nombre_rol"] = htmlentities($_POST["nombre_rol"]);
    $_POST['id_rol'] = htmlentities($_POST['id_rol']);

    if (isset($_POST["nombre_rol"]) && $_POST["nombre_rol"] != "" && $_POST['id_rol'] != 1 ){

        if (editarRol($_POST["nombre_rol"],$_POST['id_rol'])) {
            eliminarPrivilegioPorId($_POST['id_rol']);
            $Rol = $_POST['id_rol'] ;


            if(isset($_POST["eBeneficiarios"])){
                registrar_rol_privilegio($Rol,$_POST["eBeneficiarios"]);
            }
            if(isset($_POST["eReporte_Beneficiarios"])){
                registrar_rol_privilegio($Rol,$_POST["eReporte_Beneficiarios"]);
            }
            if(isset($_POST["eEgresos"])){
                registrar_rol_privilegio($Rol,$_POST["eEgresos"]);
            }
            if(isset($_POST["eReporte_Egresos"])){
                registrar_rol_privilegio($Rol,$_POST["eReporte_Egresos"]);
            }
            if(isset($_POST["eCuentas_contables"])){
                registrar_rol_privilegio($Rol,$_POST["eCuentas_contables"]);
            }
            if(isset($_POST["eProveedores"])){
                registrar_rol_privilegio($Rol,$_POST["eProveedores"]);
            }
            if(isset($_POST["eEventos"])){
                registrar_rol_privilegio($Rol,$_POST["eEventos"]);
            }
            if(isset($_POST["eUsuarios"])){
                registrar_rol_privilegio($Rol,$_POST["eUsuarios"]);
            }
            $_SESSION['editar_rol'] = 1;
            header("location:_rol_vista.php");
            if($GLOBALS['local_servidor'] == 1){
                echo'<script type="text/javascript">
		window.location="https://www.marianasala.org/Website/usuarios/_rol_vista.php";
		</script>';
            }



        }

    }else{
        $_SESSION['error6'] = 1;
        header("location:_rol_vista.php");
        if($GLOBALS['local_servidor'] == 1){
            echo'<script type="text/javascript">
		window.location="https://www.marianasala.org/Website/usuarios/_rol_vista.php";
		</script>';
        }
    }



}

?>