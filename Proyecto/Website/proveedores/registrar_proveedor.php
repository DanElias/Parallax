<?php

//require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

//Funcion que va a ir en queries
session_start();

$_SESSION['registro_proveedor'] = 0;
$_SESSION['error_registrar_proveedor'] = 0;


if (isset($_POST["submit"])) {

    $_POST["rfc"] = htmlentities($_POST["rfc"]);
    $_POST["alias"] = htmlentities($_POST["alias"]);
    $_POST["razon_social"] = htmlentities($_POST["razon_social"]);
    $_POST["nombre_contacto"] = htmlentities($_POST["nombre_contacto"]);
    $_POST["telefono_proveedor"] = htmlentities($_POST["telefono_proveedor"]);
    $_POST["banco"] = htmlentities($_POST["banco"]);
    $_POST["cuenta_bancaria"] = htmlentities($_POST["cuenta_bancaria"]);


    if (isset($_POST["rfc"])
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
        $flag = true;

        //RFC DEBE SER EXACTAMENTE 13, SOLO NUMEROS Y LETRAS

        if(strlen($_POST["rfc"])<10 || (preg_match('/[^A-Za-z0-9]/', $_POST["rfc"])) || 
            !(preg_match('/[A-Za-z]/', $_POST["rfc"])) || !(preg_match('/[0-9]/', $_POST["rfc"]))){
            $flag = false;
            echo "rfc invalido";
        }
        
        //ALIAS DEBE SER A LO MUCHO 20, LETRAS Y NUMEROS, SIN CARACTERES ESPECIALES
        if(!(preg_match('/[áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/',$_POST['alias']))){
           	echo "<h1>Todo bien, hasta con acentos</h1>";
            $flag = false;
        }

        //RAZON A LO MUCHO 30, MISMO QUE ALIAS
     
        if(!(preg_match('/[áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/',$_POST['razon_social']))){
            echo "<h1>Todo bien, hasta con acentos</h1>";
            $flag = false;
        }
       
        //NOMBRE CONTACTO DE 40, LETRAS
        if(!(preg_match('/[A-Za-záéíóúüñÑÁÉÍÓÚü.\s]/',$_POST['nombre_contacto']))){
            $flag = false;
            echo "nombre invalido";
        }

        //TELEFONO A LO MUCHO 20, NUMEROS, GUIONES Y ESPACIOS
        if(preg_match('/[^0-9-\s]/', $_POST["telefono_proveedor"])){
            $flag = false;
            echo "telefono malo";
        }

        //BANCO A LO MUCHO 40, SOLO NO CARACTERES ESPECIALES, MISMO QUE ALIAS
        if(!(preg_match('/[áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/',$_POST['banco']))){
            echo "banco invalido";
            $flag = false;
        }

        //CUENTA DE 20, SOLO NUMEROS
        if(strlen($_POST["cuenta_bancaria"])<18|| !(is_numeric($_POST['cuenta_bancaria']))){
            $flag = false;
            echo "cuenta invalido";

            
        }

        
        if(!$flag){
        
            $_SESSION['error_registrar_proveedor'] = 1;
            header("location:./_proveedor_vista.php");
            if($GLOBALS['local_servidor'] == 1){
                echo '<script type="text/javascript">
                    window.location="https://www.marianasala.org/Website/proveedores/_proveedor_vista.php";
                    </script>';
            }
        
        }else{
            
            if(registrar_proveedor($_POST["rfc"], $_POST["alias"], $_POST["razon_social"], $_POST["nombre_contacto"], $_POST["telefono_proveedor"], $_POST["cuenta_bancaria"], $_POST["banco"])){
                $_SESSION['registro_proveedor'] = 1;
                header("location:./_proveedor_vista.php");
                if($GLOBALS['local_servidor'] == 1){
                    echo '<script type="text/javascript">                   window.location="https://www.marianasala.org/Website/proveedores/_proveedor_vista.php";
                    	</script>';
                }
             
            }
                  
        }
    }
}
?>