<?php

    //require_once("_util_usuarios.php");
    require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

    //Funcion que va a ir en queries


    if (isset($_POST["submit"])){

        $_POST["rfc"] = htmlentities($_POST["rfc"]);
        $_POST["alias"] = htmlentities($_POST["alias"]);
        $_POST["razon_social"] = htmlentities($_POST["razon_social"]);
        $_POST["nombre_contacto"] = htmlentities($_POST["nombre_contacto"]);
        $_POST["telefono_proveedor"] = htmlentities($_POST["telefono_proveedor"]);
        $_POST["banco"] = htmlentities($_POST["banco"]);
        $_POST["cuenta_bancaria"] = htmlentities($_POST["cuenta_bancaria"]);


        if(isset($_POST["rfc"])
            && isset($_POST["alias"]) 
            && isset($_POST["razon_social"]) 
            && isset($_POST["nombre_contacto"]) 
            && isset($_POST["telefono_proveedor"]) 
            && isset($_POST["banco"]) 
            && isset($_POST["cuenta_bancaria"])
            && $_POST["rfc"] != ""
            && $_POST["alias"] != ""
            && $_POST["razon_social"] != "" 
            && $_POST["nombre_contacto"] != "" 
            && $_POST["telefono_proveedor"] != "" 
            && $_POST["banco"] != "" 
            && $_POST["cuenta_bancaria"] != ""
       

        ){
            //$rfc, $alias,$razon, $nombre, $telefono, $cuenta, $banco

            echo "<h1>TODOS LOS CAMPOS ESTAN LLENOS</h1>";
            $registrar = registrar_proveedor($_POST["rfc"],$_POST["alias"], $_POST["razon_social"],$_POST["nombre_contacto"],$_POST["telefono_proveedor"],$_POST["cuenta_bancaria"],$_POST["banco"]);


           if($registrar){
                echo "<h1>DEBE ESTAR EN LA BASE DE DATOS</h1>";
           }else{
                echo "<h1>NO FUNCIONO</h1>";
           }
        }
    	header("location:./_proveedores_vista.php");

    	

    }

?>