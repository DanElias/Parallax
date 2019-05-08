<?php
    require_once("../basesdedatos/_conection_queries_db.php");
    
    $proveedores = obtenerProveedor();
    $drop_proveedores ="<select required name='rfc' id='selected_proveedor'><option value='0'>Selecciona el proveedor</option>";
    
    if(mysqli_num_rows($proveedores)>0){
        //echo "<h1>SI ENTRO</h1>";
        while($row = mysqli_fetch_assoc($proveedores)){
        	$drop_proveedores.="<option value='".$row['rfc']."'>".$row['razon_social']."</option>" ;
            //$drop_proveedores.='<option value=\"'.$row['rfc'].'\">'.$row['razon_social']."</option>";

            //echo "hola: ".$row["id_tipo"];
        }
    }
   $drop_proveedores.="</select>";
   echo $drop_proveedores;
    
?>