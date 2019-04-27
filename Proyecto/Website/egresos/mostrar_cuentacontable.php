<?php
    require_once("../basesdedatos/_conection_queries_db.php");
   
    $cuenta = obtenerCuenta();
    $drop_cuenta ="<select id='selected_cuenta'><option value='0'>Selecciona la cuenta contable</option>";
    
    if(mysqli_num_rows($cuenta)>0){
        //echo "<h1>SI ENTRO</h1>";
        while($row = mysqli_fetch_assoc($cuenta)){
            $drop_cuenta.="<option value='$row[id_cuentacontable]'>$row[descripcion]</option>'" ;
            //echo "hola: ".$row["id_tipo"];
        }
    }
   $drop_cuenta.="</select>";
   echo $drop_cuenta;
    
?>