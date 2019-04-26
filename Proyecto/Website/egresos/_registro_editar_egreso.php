<?php

//require_once("_util_usuarios.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

//Funcion que va a ir en queries


session_start();
/*
if(isset($_POST["submit"])){
    echo "RFC2 DEL FORM EDITADO:". $_POST["rfc"];

    echo "<br>RFC ANTERIOR : ". $_SESSION['rfc'];

}*/


if (isset($_POST["submit"])) {

    $_POST["rfc2"] = htmlentities($_POST["rfc2"]);
    $_POST["alias2"] = htmlentities($_POST["alias2"]);
    $_POST["razon_social2"] = htmlentities($_POST["razon_social2"]);
    $_POST["nombre_contacto2"] = htmlentities($_POST["nombre_contacto2"]);
    $_POST["telefono_proveedor2"] = htmlentities($_POST["telefono_proveedor2"]);
    $_POST["banco2"] = htmlentities($_POST["banco2"]);
    $_POST["cuenta_bancaria2"] = htmlentities($_POST["cuenta_bancaria2"]);


    if (isset($_POST["rfc2"])
        && isset($_POST["alias2"])
        && isset($_POST["razon_social2"])
        && isset($_POST["nombre_contacto2"])
        && isset($_POST["telefono_proveedor2"])
        && isset($_POST["banco2"])
        && isset($_POST["cuenta_bancaria2"])
        && $_POST["rfc2"] != ""
        && $_POST["alias2"] != ""
        && $_POST["razon_social2"] != ""
        && $_POST["nombre_contacto2"] != ""
        && $_POST["telefono_proveedor2"] != ""
        && $_POST["banco2"] != ""
        && $_POST["cuenta_bancaria2"] != ""


    ){
        $flag = true;
        //echo $_POST["rfc2"]."<br>".$_POST["alias"]."<br>".$_POST["razon_social"]."<br>".$_POST["nombre_contacto"]."<br>".$_POST["telefono_proveedor"]."<br>".$_POST["banco"]."<br>".$_POST["cuenta_bancaria"];

        

        //RFC2 DEBE SER EXACTAMENTE 13, SOLO NUMEROS Y LETRAS

        if(strlen($_POST["rfc2"])<13 || !(preg_match('/[A-Za-z]/', $_POST["rfc2"]))|| !(preg_match('/[0-9]/', $_POST["rfc2"]))){
            $flag = false;
            echo "<br>rfc2 malo";
        }

        
        //ALIAS DEBE SER A LO MUCHO 20, LETRAS Y NUMEROS, SIN CARACTERES ESPECIALES
        if(!(preg_match('/[A-Za-z0-9\s]/', $_POST["alias2"]))){
            echo "<br>ALIAS NO";
            $flag = false;
        }


        //RAZON A LO MUCHO 30, MISMO QUE ALIAS
        if(!(preg_match('/[A-Za-z0-9]/', $_POST["razon_social2"]))){
            echo "<br>RAZON MAL";
            $flag = false;
        }

        //NOMBRE CONTACTO DE 40, LETRAS
        if(!(preg_match('/[A-Za-z\s]/', $_POST["nombre_contacto2"]))){
            $flag = false;
            echo "<br>NOMBRE MAL";
        }

        //TELEFONO A LO MUCHO 20, NUMEROS Y ESPACIOS
        if(!(preg_match('/[0-9\s]/', $_POST["telefono_proveedor2"]))){
            $flag = false;
            echo "<br>TELEFONO MAL";
        }

        //BANCO A LO MUCHO 40, SOLO NO CARACTERES ESPECIALES, MISMO QUE ALIAS
        if(!(preg_match('/[A-Za-z0-9]/', $_POST["banco2"]))){
            echo "<br>BANCO NO";
            $flag = false;
        }

        //CUENTA DE 20, SOLO NUMEROS
        if(strlen($_POST["cuenta_bancaria2"])<18){
            $flag = false;
            echo "<br>CUENTA MALA";          //echo "No tiene 18";         //mensaje de que no lo tiene

        }

        if($flag){
            echo "mandara el edit con:  ".$_SESSION['rfc2'];
            echo "mandara el edit con : ".$_POST['rfc2'];
            
            if(editar_proveedor($_POST['rfc2'], $_SESSION['rfc2'], $_POST["alias2"], $_POST["razon_social2"], $_POST["nombre_contacto2"], $_POST["telefono_proveedor2"], $_POST["cuenta_bancaria2"], $_POST["banco2"])){
  
                header("location:./_proveedor_vista.php");
                echo  "<script type='text/javascript'>
                                    alert('¡El proveedor se ha actualizado de manera exitosa!');
                            </script>";
            }else{
                echo "LA CONSULTA FALLO";
            }  
            //mostrar errores
        }else{
            echo "NO SE MANDARA  ";   
            
        }
  
    }
    
}  //header("location:./_proveedores_vista.php");
    
?>