<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  //$nombre,$apellido,$estado,$fecha,$sexo,$grado,$grupo,$domicilio,$nivel,$escuela,$alergias,$cuota
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
  $idtut1 = htmlentities($_POST['idtut1']);
  $parentesco1 = htmlentities($_POST['par1']);
  $bandera = false;
  if(isset($_POST['idtut2']) && $_POST['idtut2'] != ""){
    $idtut2 = htmlentities($_POST['idtut2']);
    $parentesco2 = htmlentities($_POST['par2']);
    $bandera = true;
  }
  if(insertarBeneficiario($nombre,$apellido_paterno,$apellido_materno,$estado,$fecha,$sexo,$grado,$grupo,$numero,$calle,$colonia,$nivel,$escuela,$alergias,$cuota)){
    $result = getLastBen();
    $row = mysqli_fetch_assoc($result);
    insertarBenTut($row['id_beneficiario'], $idtut1, $parentesco1);
    if($bandera){
      $result2 = getLastBen();
      $row2 = mysqli_fetch_assoc($result2);
      insertarBenTut($row2['id_beneficiario'], $idtut2, $parentesco2);
    }
  } else{
    die('No se pudo compa');
    echo '<script>alert("error")</script>';
  }




?>
