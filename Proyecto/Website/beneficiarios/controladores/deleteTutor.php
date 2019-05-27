<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  //$nombre,$apellido,$estado,$fecha,$sexo,$grado,$grupo,$domicilio,$nivel,$escuela,$alergias,$cuota
  $id = htmlentities($_POST['id']);
  $nombre = htmlentities($_POST['nombre']);
  if(is_numeric($id) && !preg_match("/[^A-Za-záéíóúüñÑÁÉÍÓÚ&; ]/", $nombre)){
    $result = correctID_Tut($id);
    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_assoc($result);
      $comp = $row['nombre']." ".$row['apellido'];
      if($comp == $nombre){
        if(deleteTutor($id)){
          echo 'Tutor eliminado!';
        } else{
          echo 'Error, favor de recargar la página';
        }
      } else {
        echo 'El valor del ID y el Tutor no coinciden, por favor recargue la página';
      }
    } else {
      echo 'El valor del ID y el Tutor no coinciden, por favor recargue la página';
    }
  } else{
    echo 'El valor del ID y el Beneficiario no coinciden, por favor recargue la página';
  }

?>
