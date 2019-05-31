<?php
    require_once("../basesdedatos/_conection_queries_db.php");
   
    $cuenta = obtenerCuentas();

    $drop_cuenta ="<select required name='id_cuentacontable2' id='selected_cuenta2' onchange='validar_drop_cuenta()'>
    <option value='0'>Selecciona la cuenta contable</option>";
    
    if(mysqli_num_rows($cuenta)>0){
        //echo "<h1>SI ENTRO</h1>";
        while($row = mysqli_fetch_assoc($cuenta)){
            $drop_cuenta.="<option value='".$row['id_cuentacontable']."'>".$row['nombre']."</option>" ;
          
        }
    }
   $drop_cuenta.="</select><label style= 'font-size:0.8em' >Cuenta contable</label><span id='error_cuenta_egreso2'></span>";
   echo $drop_cuenta;
    
?>