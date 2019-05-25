<?php

    //require_once("_util_usuarios.php");
    require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y 

    session_start();
    
    $_SESSION['editar_egreso_exito'] = 0;
    $_SESSION['editar_egreso_error'] = 0;
    


    
    if (isset($_POST["submit2"])){

        $_SESSION['folio_anterior'] = htmlentities($_SESSION['folio_anterior']);
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

        $flag = true;

        //FOLIO, NUMEROS Y LETRAS
        if(!(preg_match('/[A-Za-z]/', $_POST["folio_factura2"]))|| !(preg_match('/[0-9]/', $_POST["folio_factura2"]))){
            $flag = false;
            echo "<br>FOLIO MALO";
        }


        //CONCEPTO, NUMEROS Y LETRAS
        if(is_numeric($_POST['concepto2']) || !(preg_match('/^[a-záéíóúüñÑÁÉÍÓÚü0-9 .\-]+$/i',$_POST['concepto2']))){
            $flag = false;
            echo "<br>CONCEPTO MALO";        
        }

        if(!(is_numeric($_POST['importe2']))){
            $flag = false;
            echo "<br>IMPORTE MALO";
        }

        //FECHA SE VALIDA CON MATERIALIZE

        //CUENTA DE 20, SOLO NUMEROS
        if(strlen($_POST["cuenta_bancaria_egreso2"])<18){
            $flag = false;
            echo "<br>CUENTA MALA";
            //echo "No tiene 18";
            //mensaje de que no lo tiene

        }

        //SELECT PROVEEDOR 
        if($_POST['rfc2']=='0'){    
            $flag = false;
            echo "<br>RFC MALO";

        }

        //SELECT CUENTA CONTABLE
        if($_POST["id_cuentacontable2"]==0){
            $flag = false;
            echo "<br>ID MALO";

        }

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
            $editar = editar_egreso($_POST["folio_factura2"],$_SESSION['folio_anterior'],$_POST["concepto2"],$_POST["importe2"],$_POST["fecha_egreso2"], $_POST["observaciones2"], $_POST["cuenta_bancaria_egreso2"], $_POST["rfc2"], $_POST["id_cuentacontable2"]);

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

        }
           
           
    }
        
}

?>