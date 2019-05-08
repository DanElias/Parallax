<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  //$nombre,$apellido,$estado,$fecha,$sexo,$grado,$grupo,$domicilio,$nivel,$escuela,$alergias,$cuota
  $id = htmlentities($_POST['id']);
  if(deleteTutor($id)){

  } else{
    
  }

?>
