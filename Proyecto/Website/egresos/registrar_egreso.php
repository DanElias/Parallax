<?php

    //require_once("_util_usuarios.php");
    require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y 

    session_start();

   
    if (isset($_POST["submit"])){
        
        $_POST["folio_factura"] = htmlentities($_POST["folio_factura"]);
        $_POST["concepto"] = htmlentities($_POST["concepto"]);
        $_POST["importe"] = htmlentities($_POST["importe"]);
        $_POST["fecha_egreso"] = htmlentities($_POST["fecha_egreso"]);
        $_POST["cuenta_bancaria_egreso"] = htmlentities($_POST["cuenta_bancaria_egreso"]);
        $_POST["rfc"] = htmlentities($_POST["rfc"]);
        $_POST["id_cuentacontable"] = htmlentities($_POST["id_cuentacontable"]);
        $_POST["observaciones"] = htmlentities($_POST["observaciones"]);

        if(isset($_POST["folio_factura"])
            && isset($_POST["concepto"]) 
            && isset($_POST["importe"]) 
            && isset($_POST["fecha_egreso"]) 
            && isset($_POST["cuenta_bancaria_egreso"]) 
            && isset($_POST["rfc"]) 
            && isset($_POST["id_cuentacontable"])
            && isset($_POST["observaciones"])
            && $_POST["folio_factura"] != ""
            && $_POST["concepto"] != ""
            && $_POST["importe"] != "" 
            && $_POST["fecha_egreso"] != "" 
            && $_POST["cuenta_bancaria_egreso"] != "" 
            && $_POST["rfc"] != "" 
            && $_POST["id_cuentacontable"] != ""
            && $_POST["observaciones"] != ""
        ){

            $flag = true;

            //FOLIO, NUMEROS Y LETRAS
            if(!(preg_match('/[A-Za-z0-9]/', $_POST["folio_factura"]))){
                $flag = false;
                echo "<br>FOLIO MALO";
            }


            //CONCEPTO, NUMEROS Y LETRAS
            if(!(preg_match('/[áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/', $_POST["concepto"]))){
                $flag = false;
                echo "<br>CONCEPTO MALO";        
            }

            if(!(preg_match('/[0-9.,]/', $_POST["importe"]))){
                $flag = false;
                //echo "<br>IMPORTE MALO";
            }

            //FECHA SE VALIDA CON MATERIALIZE

            //CUENTA DE 20, SOLO NUMEROS
            if(!(is_numeric($_POST['cuenta_bancaria_egreso']))){
                $flag = false;
                //echo "<br>CUENTA MALA";
                ////echo "No tiene 18";
                //mensaje de que no lo tiene

            }

            //SELECT PROVEEDOR 
            if($_POST['rfc']=='0'){    
                $flag = false;
                //echo "<br>PROVEEDOR MALO";

            }

            //SELECT CUENTA CONTABLE
            if($_POST["id_cuentacontable"]==0){
                $flag = false;
                //echo "<br>ID MALO";

            }

        
            if(!$flag){

               // echo "<h1>No se mandara</h1>";
                
                $_SESSION['registrar_egreso_error']=1; 
                header("location:./_egreso_vista.php");
                if($GLOBALS['local_servidor'] == 1){
                        echo '<script type="text/javascript">
                    window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                    </script>';
                }
            }else{
               if(registrar_egreso($_POST["folio_factura"], $_POST["concepto"],$_POST["importe"],$_POST["fecha_egreso"], $_POST["observaciones"], $_POST["cuenta_bancaria_egreso"], $_POST["rfc"], $_POST["id_cuentacontable"])){
                    
                    $_SESSION['registrar_egreso_exito']=1; 
                    header("location:_egreso_vista.php");
                    if($GLOBALS['local_servidor'] == 1){
                        echo '<script type="text/javascript">
                        window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                        </script>';
                    }
               }else{
                    $_SESSION['registrar_egreso_error']=1; 
                    header("location:./_egreso_vista.php");
                    if($GLOBALS['local_servidor'] == 1){
                        echo '<script type="text/javascript">
                    window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                    </script>';
                    }
               }

            }      
    
        }
    }

?>