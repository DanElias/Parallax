<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  //$nombre,$apellido,$estado,$fecha,$sexo,$grado,$grupo,$domicilio,$nivel,$escuela,$alergias,$cuota
  $id = htmlentities($_POST['id']);
  $nombre = htmlentities($_POST['nombre']);
  if(is_numeric($id) && !preg_match("/[^A-Za-záéíóúüñÑÁÉÍÓÚ&; ]/", $nombre)){
    $result = correctID_Ben($id);
    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_assoc($result);
      $comp = $row['nombre']." ".$row['apellido_paterno']." ".$row['apellido_materno'];
      if($comp == $nombre){
        if(deleteBeneficiario($id)){
          echo 'Beneficiario eliminado!';
        } else{
          echo 'Error, favor de recargar la página';
        }
      } else {
        echo 'El valor del ID y el Beneficiario no coinciden, por favor recargue la página';
      }
    } else {
      echo 'El valor del ID y el Beneficiario no coinciden, por favor recargue la página';
    }
  } else{
    //echo $comp.' '.$nombre;
    /*if(!is_numeric($id)){
      echo 'ID no numerico '.$id.' '.$nombre;
    } else {
      echo 'Nombre no cumple regex ';//.$id.' '.$nombre;
      $result = correctID_Tut($id);
      if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $comp = $row['nombre']." ".$row['apellido'];
        echo $comp;
      }
    }*/
    echo 'El valor del ID y el Beneficiario no coinciden, por favor recargue la página';
  }

  ?>
