<?php
    require_once("../basesdedatos/_conection_queries_db.php");
    
    $proveedores = obtenerProveedor();
    $drop_proveedores = "<select required name='rfc2' id='selected_proveedor2' onchange='validar_drop_proveedor()'>
        <option value='0' '>Selecciona el proveedor</option>";
    
    if(mysqli_num_rows($proveedores)>0){
        //echo "<h1>SI ENTRO</h1>";
        while($row = mysqli_fetch_assoc($proveedores)){
        	$drop_proveedores.="<option value='".$row['rfc']."'>".$row['razon_social']."</option>" ;
            //$drop_proveedores.='<option value=\"'.$row['rfc'].'\">'.$row['razon_social']."</option>";

            //echo "hola: ".$row["id_tipo"];
        }
    }
   $drop_proveedores.="</select><span id='error_proveedor_egreso2'></span>";
   echo $drop_proveedores;
    
?>