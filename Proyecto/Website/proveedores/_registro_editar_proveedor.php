<?php

require_once("../basesdedatos/_conection_queries_db.php"); 

session_start();

$_SESSION['editar_proveedor_exito'] = 0;
$_SESSION['editar_proveedor_error'] = 0;


if (isset($_POST["submit"])) {

    $_POST["rfc_editar"] = htmlentities($_POST["rfc_editar"]);
    $_POST["alias_editar"] = htmlentities($_POST["alias_editar"]);
    $_POST["razon_social_editar"] = htmlentities($_POST["razon_social_editar"]);
    $_POST["nombre_contacto_editar"] = htmlentities($_POST["nombre_contacto_editar"]);
    $_POST["telefono_proveedor_editar"] = htmlentities($_POST["telefono_proveedor_editar"]);
    $_POST["banco_editar"] = htmlentities($_POST["banco_editar"]);
    $_POST["cuenta_bancaria_editar"] = htmlentities($_POST["cuenta_bancaria_editar"]);


    if (isset($_POST["rfc_editar"])
        && isset($_POST["alias_editar"])
        && isset($_POST["razon_social_editar"])
        && isset($_POST["nombre_contacto_editar"])
        && isset($_POST["telefono_proveedor_editar"])
        && isset($_POST["banco_editar"])
        && isset($_POST["cuenta_bancaria_editar"])
        && $_POST["rfc_editar"] != ""
        && $_POST["alias_editar"] != ""
        && $_POST["razon_social_editar"] != ""
        && $_POST["nombre_contacto_editar"] != ""
        && $_POST["telefono_proveedor_editar"] != ""
        && $_POST["banco_editar"] != ""
        && $_POST["cuenta_bancaria_editar"] != ""


    ){
        $flag = true;
      

         //RFC DEBE SER EXACTAMENTE 13, SOLO NUMEROS Y LETRAS

        if(strlen($_POST["rfc_editar"])<10 || (preg_match('/[^A-Za-z0-9]/', $_POST["rfc_editar"])) || 
            !(preg_match('/[A-Za-z]/', $_POST["rfc_editar"])) || !(preg_match('/[0-9]/', $_POST["rfc_editar"]))){
            $flag = false;
            //echo "rfc invalido";
        }
        
        //ALIAS DEBE SER A LO MUCHO 20, LETRAS Y NUMEROS, SIN CARACTERES ESPECIALES
        if(!(preg_match('/[áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/',$_POST['alias_editar']))){
            //echo "<h1>Todo bien, hasta con acentos</h1>";
            $flag = false;
        }

        //RAZON A LO MUCHO 30, MISMO QUE ALIAS
     
        if(!(preg_match('/[áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/',$_POST['razon_social_editar']))){
            //echo "<h1>Todo bien, hasta con acentos</h1>";
            $flag = false;
        }
       
        //NOMBRE CONTACTO DE 40, LETRAS
        if(!(preg_match('/[A-Za-záéíóúüñÑÁÉÍÓÚü.\s]/',$_POST['nombre_contacto_editar']))){
            $flag = false;
            //echo "nombre invalido";
        }

        //TELEFONO A LO MUCHO 20, NUMEROS, GUIONES Y ESPACIOS
        if(preg_match('/[^0-9-\s]/', $_POST["telefono_proveedor_editar"])){
            $flag = false;
            //echo "telefono malo";
        }

        //BANCO A LO MUCHO 40, SOLO NO CARACTERES ESPECIALES, MISMO QUE ALIAS
        if(!(preg_match('/[áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/',$_POST['banco_editar']))){
            //echo "banco invalido";
            $flag = false;
        }

        //CUENTA DE 20, SOLO NUMEROS
        if(strlen($_POST["cuenta_bancaria_editar"])<18|| !(is_numeric($_POST['cuenta_bancaria_editar']))){
            $flag = false;
            //echo "cuenta invalido";

            
        }

    
        if($flag){
            
            if(editar_proveedor($_POST['rfc_editar'], $_SESSION['rfc_anterior'], $_POST["alias_editar"], $_POST["razon_social_editar"], $_POST["nombre_contacto_editar"], $_POST["telefono_proveedor_editar"], $_POST["cuenta_bancaria_editar"], $_POST["banco_editar"])){
  				
                    header("location:./_proveedor_vista.php");
    				$_SESSION['editar_proveedor_exito'] = 1;
                    if($GLOBALS['local_servidor'] == 1){
                          echo '<script type="text/javascript">                     window.location="https://www.marianasala.org/Website/proveedores/_proveedor_vista.php";</script>';
                    }
                    
            }else{
                    $_SESSION['editar_proveedor_error'] = 1;
                    header("location:./_proveedor_vista.php");
                    if($GLOBALS['local_servidor'] == 1){
                        echo '<script type="text/javascript">
                            window.location="https://www.marianasala.org/Website/proveedores/_proveedor_vista.php";
                            </script>';
                    }
            }  
           
        }else{
                    $_SESSION['editar_proveedor_error'] = 1;
                    header("location:./_proveedor_vista.php");
                    if($GLOBALS['local_servidor'] == 1){
                        echo '<script type="text/javascript">
                            window.location="https://www.marianasala.org/Website/proveedores/_proveedor_vista.php";
                            </script>';
                    }
            
        }
  
    }
    
}  
    
?>