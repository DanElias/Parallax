<?php
// en este php mando llamar mis funciones de query y conexiones con la base de datos
//session_start();
  require_once("../../basesdedatos/_conection_queries_db.php");
  //$script =
  $result2 = getNombreTutor();
  echo '<option value="" disabled selected></option>';
  while($row2 = mysqli_fetch_assoc($result2)){
    echo '
      <option value="'.$row2['id_tutor'].'">'.$row2['nombre'].' '.$row2['apellido'].'</option>';
  }
?>
