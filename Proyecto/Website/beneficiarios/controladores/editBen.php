<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  //$nombre,$apellido,$estado,$fecha,$sexo,$grado,$grupo,$domicilio,$nivel,$escuela,$alergias,$cuota
  $id = htmlentities($_POST['id']);
  $nombre = htmlentities($_POST['nombre']);
  $apellido_paterno = htmlentities($_POST['apellido_paterno']);
  $apellido_materno = htmlentities($_POST['apellido_materno']);
  $estado = htmlentities($_POST['estado']);
  $fecha = htmlentities($_POST['fecha']);
  $sexo = htmlentities($_POST['sexo']);
  $grado = htmlentities($_POST['grado']);
  $grupo = htmlentities($_POST['grupo']);
  $numero = htmlentities($_POST['numero']);
  $calle = htmlentities($_POST['calle']);
  $colonia = htmlentities($_POST['colonia']);
  $nivel = htmlentities($_POST['nivel']);
  $escuela = htmlentities($_POST['escuela']);
  $alergias = htmlentities($_POST['alergias']);
  $cuota = htmlentities($_POST['cuota']);
  if(editarBeneficiario($id,$nombre,$apellido_paterno,$apellido_materno,$estado,$fecha,$sexo,$grado,$grupo,$numero,$calle,$colonia,$nivel,$escuela,$alergias,$cuota)){
    insertarBenTut
  } else{

  }




?>
