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
      

        //RFC_editar DEBE SER EXACTAMENTE 13, SOLO NUMEROS Y LETRAS

        if(strlen($_POST["rfc_editar"])<10 || !(preg_match('/[^A-Za-z0-9]/', $_POST["rfc_editar"])) || !(preg_match('/[^A-Za-z0-9]/', $_POST["rfc_editar"])) ){
            $flag = false;
            echo "<br>rfc_editar malo";
        }

        
        //ALIAS DEBE SER A LO MUCHO 20, LETRAS Y NUMEROS, SIN CARACTERES ESPECIALES
        if(!(preg_match('/[A-Za-z0-9\s]/', $_POST["alias_editar"]))){
            echo "<br>ALIAS NO";
            $flag = false;
        }


        //RAZON A LO MUCHO 30, MISMO QUE ALIAS
        if(!(preg_match('/[A-Za-z0-9]/', $_POST["razon_social_editar"]))){
            echo "<br>RAZON MAL";
            $flag = false;
        }

        //NOMBRE CONTACTO DE 40, LETRAS
        if(!(preg_match('/[A-Za-z\s]/', $_POST["nombre_contacto_editar"]))){
            $flag = false;
            echo "<br>NOMBRE MAL";
        }

        //TELEFONO A LO MUCHO 20, NUMEROS Y ESPACIOS
        if(!(preg_match('/[0-9\s]/', $_POST["telefono_proveedor_editar"]))){
            $flag = false;
            echo "<br>TELEFONO MAL";
        }

        //BANCO A LO MUCHO 40, SOLO NO CARACTERES ESPECIALES, MISMO QUE ALIAS
        if(!(preg_match('/[A-Za-z0-9]/', $_POST["banco_editar"]))){
            echo "<br>BANCO NO";
            $flag = false;
        }

        //CUENTA DE 20, SOLO NUMEROS
        if(strlen($_POST["cuenta_bancaria_editar"])<18){
            $flag = false;
            echo "<br>CUENTA MALA";          //echo "No tiene 18";         //mensaje de que no lo tiene

        }

        /*
        if($flag){
            
            if(editar_proveedor($_POST['rfc_editar'], $_SESSION['rfc_anterior'], $_POST["alias_editar"], $_POST["razon_social_editar"], $_POST["nombre_contacto_editar"], $_POST["telefono_proveedor_editar"], $_POST["cuenta_bancaria_editar"], $_POST["banco_editar"])){
  				echo "todo bien";
  				
                header("location:./_proveedor_vista.php");
				$_SESSION['editar_proveedor_exito'] = 1;
                if($GLOBALS['local_servidor'] == 1){
                    echo '<script type="text/javascript">
                window.location="https://www.marianasala.org/Website/proveedores/_proveedor_vista.php";
                </script>';
                }
                echo  "<script type='text/javascript'>
                                    alert('¡El proveedor se ha actualizado de manera exitosa!');
                            </script>";
            }else{
            	echo "algo mal ";
            	//$_SESSION['editar_proveedor_error'] = 1;
                //echo "LA CONSULTA FALLO";
            }  
            //mostrar errores
        }else{
            echo "NO SE MANDARA  ";   
            
        }*/
  
    }
    
}  
    
?>