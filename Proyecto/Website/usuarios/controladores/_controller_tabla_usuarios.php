<?php
error_reporting(0);
    require_once("../../basesdedatos/_conection_queries_db.php");
    $pattern = strtolower($_GET['pattern']);

    $emails=array();
    $nombres=array();
    $apellidos=array();


    $response = "";
    $result=obtenerUsuario();

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
          array_push($emails,$row["email"]); // guarda los nombres de todos los eventos en un array
          array_push($nombres,$row["nombre"]);
          array_push($apellidos,$row["apellido"]);
        }
    }

    $size=0;

    for($i=0; $i<count($nombres); $i++)
    {
       $pos=stripos(strtolower($nombres[$i]),$pattern); // hacer la comparación de strings
       if(!($pos===false))
       {
        $size++;
        $email=$emails[$i];
        $nombre=$nombres[$i];
        $apellido=$apellidos[$i];
        $response.= '<tr>
                        <td>'.$email.'</td>
                        <td>'. $nombre.'</td>
                        <td>'.$apellido.'</td>
                
                    </tr>';
       }

    }

    if($size>0){
        echo  '<div class="responsive-table table-status-sheet"> 
                    <table class="">
                    <tr>
                        <th>Email</th> 
                        <th>Nombre</th> 
                        <th>Apellido</th> 
                    </tr>'.$response.'</table> </div>';
    }



?>
