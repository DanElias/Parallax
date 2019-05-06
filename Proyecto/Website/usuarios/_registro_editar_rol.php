<?php
require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
session_start();

$_SESSION['editar_rol'] = 0;
//Funcion que va a ir en queries
if (isset($_POST["submit"])){
    $_POST["nombre_rol"] = htmlentities($_POST["nombre_rol"]);
    $_POST['id_rol'] = htmlentities($_POST['id_rol']);

    if (isset($_POST["nombre_rol"]) && $_POST["nombre_rol"] != "" ){
            var_dump(editarRol($_POST["nombre_rol"],$_POST['id_rol']));
        if (editarRol($_POST["nombre_rol"],$_POST['id_rol'])) {
            eliminarRolPorId($_GET['id']);
            $Rol = $_POST['id'] ;

            if(isset($_POST["Beneficiarios"])){
                registrar_rol_privilegio($Rol,$_POST["Beneficiarios"]);
            }
            if(isset($_POST["Reporte_Beneficiarios"])){
                registrar_rol_privilegio($Rol,$_POST["Reporte_Beneficiarios"]);
            }
            if(isset($_POST["Egresos"])){
                registrar_rol_privilegio($Rol,$_POST["Egresos"]);
            }
            if(isset($_POST["Reporte_Egresos"])){
                registrar_rol_privilegio($Rol,$_POST["Reporte_Egresos"]);
            }
            if(isset($_POST["Cuentas_contables"])){
                registrar_rol_privilegio($Rol,$_POST["Cuentas_contables"]);
            }
            if(isset($_POST["Proveedores"])){
                registrar_rol_privilegio($Rol,$_POST["Proveedores"]);
            }
            if(isset($_POST["Eventos"])){
                registrar_rol_privilegio($Rol,$_POST["Eventos"]);
            }
            if(isset($_POST["Usuarios"])){
                registrar_rol_privilegio($Rol,$_POST["Usuarios"]);
            }
            $_SESSION['editar_rol'] = 1;
            header("location:_rol_vista.php");
            if($GLOBALS['local_servidor'] == 1){
                echo'<script type="text/javascript">
		window.location="https://www.marianasala.org/Website/usuarios/_rol_vista.php";
		</script>';
            }


        }

    }



}

?>