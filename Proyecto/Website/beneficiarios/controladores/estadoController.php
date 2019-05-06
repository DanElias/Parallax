<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  //$id = htmlentities($_POST['id_ben']);
  //$estado = htmlentities($_POST['estado']);
  $id = 41;
  $estado = 0;
  var_dump($id);
  var_dump($estado);
  die();
  modificarEstado($id,$estado);
  header("location:../_beneficiarios_vista.php");
?>
