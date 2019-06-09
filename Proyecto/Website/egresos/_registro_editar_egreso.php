<?php

    //require_once("_util_usuarios.php");
    require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y 

    session_start();



    $_SESSION['editar_egreso_exito'] = 0;
    $_SESSION['editar_egreso_error'] = 0;
    
   
    
    if (isset($_POST["submit2"])){


        $_POST["folio_factura2"] = htmlentities($_POST["folio_factura2"]);
        $_POST["concepto2"] = htmlentities($_POST["concepto2"]);
        $_POST["importe2"] = htmlentities($_POST["importe2"]);
        $_POST["fecha_egreso2"] = htmlentities($_POST["fecha_egreso2"]);
        $_POST["cuenta_bancaria_egreso2"] = htmlentities($_POST["cuenta_bancaria_egreso2"]);
        $_POST["rfc2"] = htmlentities($_POST["rfc2"]);
        $_POST["id_cuentacontable2"] = htmlentities($_POST["id_cuentacontable2"]);
        $_POST["observaciones2"] = htmlentities($_POST["observaciones2"]);

        if(isset($_POST["folio_factura2"])
            && isset($_POST["concepto2"]) 
            && isset($_POST["importe2"]) 
            && isset($_POST["fecha_egreso2"]) 
            && isset($_POST["cuenta_bancaria_egreso2"]) 
            && isset($_POST["rfc2"]) 
            && isset($_POST["id_cuentacontable2"])
            && isset($_POST["observaciones2"])
            && $_POST["folio_factura2"] != ""
            && $_POST["concepto2"] != ""
            && $_POST["importe2"] != "" 
            && $_POST["fecha_egreso2"] != "" 
            && $_POST["cuenta_bancaria_egreso2"] != "" 
            && $_POST["rfc2"] != "" 
            && $_POST["id_cuentacontable2"] != ""
            && $_POST["observaciones2"] != ""
       

        ){

        	//echo "<h1>ID QUE LLEGO DEL FORM".$_POST["idEgreso"]."</h1>";
            //$result =  obtener_id_de_egreso($_POST["folio_factura2"],$_POST["concepto2"],$_POST["importe2"],$_POST["fecha_egreso2"]); 

            $flag = true;

             //FOLIO, NUMEROS Y LETRAS
            if(!(preg_match('/[A-Za-z0-9]/', $_POST["folio_factura2"]))){
                $flag = false;
                //echo "<br>FOLIO MALO";
            }


            //CONCEPTO, NUMEROS Y LETRAS
            if(!(preg_match('/[áéíóúüñÑÁÉÍÓÚüA-Za-z0-9.\s]/', $_POST["concepto2"]))){
                $flag = false;
                //echo "<br>CONCEPTO MALO";        
            }

            if(!(preg_match('/[0-9.,]/', $_POST["importe2"]))){
                //echo "<br>IMPORTE MALO";
                $flag = false;
            }

            //FECHA SE VALIDA CON MATERIALIZE

            //CUENTA DE 20, SOLO NUMEROS
            if(!(is_numeric($_POST['cuenta_bancaria_egreso2']))){
                $flag = false;
                //echo "<br>CUENTA MALA";
                
            }

            //SELECT PROVEEDOR 
            if($_POST['rfc2']=='0'){    
                $flag = false;
                //echo "<br>PROVEEDOR MALO";
            }

            //SELECT CUENTA CONTABLE
            if($_POST["id_cuentacontable2"]==0){
                $flag = false;
                //echo "<br>ID MALO";
            }
            //echo "<br>".$id_egreso;
            /*
            echo "<br>".$_POST["folio_factura2"]; 
            echo "<br>".$_POST["concepto2"]; 
            echo "<br>".$_POST["importe2"]; 
            echo "<br>".$_POST["fecha_egreso2"]; 
            echo "<br>".$_POST["cuenta_bancaria_egreso2"]; 
            echo "<br>".$_POST["rfc2"]; 
            echo "<br>".$_POST["id_cuentacontable2"]; 
            echo "<br>".$_POST["observaciones2"];
            $_POST["idEgreso"]*/ 

            if(!$flag){
               
                    $_SESSION['editar_egreso_error'] = 1;
                    header("location:./_egreso_vista.php");
                    if($GLOBALS['local_servidor'] == 1){
                            echo '<script type="text/javascript">
                            window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                            </script>';
                    }
                   

              // echo "<br>NO SE MANDARA EL REGISTRO";
            }else{

                
                $editar = editar_egreso($_POST["idEgreso"],$_POST["folio_factura2"],$_POST["concepto2"],$_POST["importe2"],$_POST["fecha_egreso2"], $_POST["observaciones2"], $_POST["cuenta_bancaria_egreso2"], $_POST["rfc2"], $_POST["id_cuentacontable2"]);

               if($editar){
                    //echo "Se mando el registro";
                    $_SESSION['editar_egreso_exito'] = 1;
                    
                    header("location:./_egreso_vista.php");
                    
                    if($GLOBALS['local_servidor'] == 1){
                            echo '<script type="text/javascript">
                            window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                            </script>';
                    }
               }else{
                   // echo "Algo fallo en el registro ";
                    
                    $_SESSION['editar_egreso_error'] = 1;
                    header("location:./_egreso_vista.php");
                     if($GLOBALS['local_servidor'] == 1){
                            echo '<script type="text/javascript">
                        window.location="https://www.marianasala.org/Website/egresos/_egreso_vista.php";
                        </script>';
                    }
                }

            }    //llave del else antes de editar   
           
        }
    }

?>