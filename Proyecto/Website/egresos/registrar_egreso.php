<?php

    //require_once("_util_usuarios.php");
    require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
   

    /*
    $folio_factura = $_POST['folio_factura'];
    $concepto = $_POST['concepto'];
    $importe = $_POST['importe'];
    $fecha = $_POST['fecha_egreso'];
    $cuenta_bancaria =  $_POST['cuenta_bancaria'];
    $rfc = $_POST['selected_proveedor']; 
    $id_cuentacontable = $_POST['selected_cuenta']; 
    $observaciones = $_POST['observaciones'];
    
    
    echo "<h1>ENTRO AL REGISTRAR</h1>";
    echo "Folio:".$folio_factura."<br>".
    "Cocenpto: ".$concepto."<br>". 
    "Importe: ".$importe."<br>". 
    "Fehca: ".$fecha."<br>".  
    "Cuenta bancaria: ".$cuenta_bancaria."<br>". 
    "RFC: ".$rfc."<br>". 
    "id cuenta: ".$id_cuentacontable."<br>".
    "observaciones:".$observaciones."<br>"; */
    
    if (isset($_POST["submit"])){
        
        $_POST["folio_factura"] = htmlentities($_POST["folio_factura"]);
        $_POST["concepto"] = htmlentities($_POST["concepto"]);
        $_POST["importe"] = htmlentities($_POST["importe"]);
        $_POST["fecha_egreso"] = htmlentities($_POST["fecha_egreso"]);
        $_POST["cuenta_bancaria"] = htmlentities($_POST["cuenta_bancaria"]);
        $_POST["rfc"] = htmlentities($_POST["rfc"]);
        $_POST["id_cuentacontable"] = htmlentities($_POST["id_cuentacontable"]);
        $_POST["observaciones"] = htmlentities($_POST["observaciones"]);

        if(isset($_POST["folio_factura"])
            && isset($_POST["concepto"]) 
            && isset($_POST["importe"]) 
            && isset($_POST["fecha_egreso"]) 
            && isset($_POST["cuenta_bancaria"]) 
            && isset($_POST["rfc"]) 
            && isset($_POST["id_cuentacontable"])
            && isset($_POST["observaciones"])
            && $_POST["folio_factura"] != ""
            && $_POST["concepto"] != ""
            && $_POST["importe"] != "" 
            && $_POST["fecha_egreso"] != "" 
            && $_POST["cuenta_bancaria"] != "" 
            && $_POST["rfc"] != "" 
            && $_POST["id_cuentacontable"] != ""
            && $_POST["observaciones"] != ""
        ){
          

           if(registrar_egreso($_POST["folio_factura"], $_POST["concepto"],$_POST["importe"],$_POST["fecha_egreso"], $_POST["observaciones"], $_POST["cuenta_bancaria"], $_POST["rfc"], $_POST["id_cuentacontable"])){
                $_SESSION['exito_agregar_egreso']=1; 
               header("location:./_egreso_vista.php");
           }else{
                $_SESSION['error_agregar_egreso']=1; 
               header("location:./_egreso_vista.php");
           }
        }
    	
    }

?>