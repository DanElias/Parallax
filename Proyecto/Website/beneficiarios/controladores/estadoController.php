<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  $id = htmlentities($_POST['id']);
  $estado = htmlentities($_POST['estado']);
  modificarEstado($id,$estado);

?>
