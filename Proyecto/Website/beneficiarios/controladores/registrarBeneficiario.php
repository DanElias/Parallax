<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  require_once('../validaciones.php');
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
    if(is_numeric($idtut1) && is_numeric($idtut2)){
      if($idtut1 == $idtut2){
        echo 'Error, no se insertó el beneficiario, revise los campos';
      } else{
        if(val_n($nombre)
          && val_n($apellido_materno)
          && val_n($apellido_paterno)
          && val_estado($estado)
          && val_date($fecha)
          && val_sexo($sexo)
          && val_gradoben($grado)
          && val_empresa($numero) && strlen($numero) <= 50
          && val_empresa($calle) && strlen($calle) <= 100
          && val_empresa($colonia) && strlen($colonia) <= 100
          && val_status($nivel)
          && val_empresa($escuela) && strlen($escuela) <= 100
          && val_enfermedades($alergias) && strlen($alergias) <= 256
          && is_numeric($cuota)
          && val_parentesco($parentesco1)
          && val_parentesco($parentesco2) ){
            if(insertarBeneficiario($nombre,$apellido_paterno,$apellido_materno,$estado,$fecha,$sexo,$grado,$grupo,$numero,$calle,$colonia,$nivel,$escuela,$alergias,$cuota)){
              $result = getLastBen();
              $row = mysqli_fetch_assoc($result);
              insertarBenTut($row['id_beneficiario'], $idtut1, $parentesco1);
              $result2 = getLastBen();
              $row2 = mysqli_fetch_assoc($result2);
              insertarBenTut($row2['id_beneficiario'], $idtut2, $parentesco2);
              echo 'Beneficiario registrado!';
            } else{
              echo 'Error, no se insertó el beneficiario, revise los campos';
            }
          } else {
            echo 'Error, no se insertó el beneficiario, revise los campos';
          }
      }
    } else {
      echo 'Error, no se insertó el beneficiario, revise los campos';
      //die();
    }
  } else {
    if(val_n($nombre)
      && val_n($apellido_materno)
      && val_n($apellido_paterno)
      && val_estado($estado)
      && val_date($fecha)
      && val_sexo($sexo)
      && val_gradoben($grado)
      && val_empresa($numero) && strlen($numero) <= 50
      && val_empresa($calle) && strlen($calle) <= 100
      && val_empresa($colonia) && strlen($colonia) <= 100
      && val_status($nivel)
      && val_empresa($escuela) && strlen($escuela) <= 100
      && val_enfermedades($alergias) && strlen($alergias) <= 256
      && is_numeric($cuota)
      && val_parentesco($parentesco1) ){
        if(insertarBeneficiario($nombre,$apellido_paterno,$apellido_materno,$estado,$fecha,$sexo,$grado,$grupo,$numero,$calle,$colonia,$nivel,$escuela,$alergias,$cuota)){
          $result = getLastBen();
          $row = mysqli_fetch_assoc($result);
          insertarBenTut($row['id_beneficiario'], $idtut1, $parentesco1);
          echo 'Beneficiario registrado!';
        } else{
          echo 'Error, no se insertó el beneficiario, revise los campos';
        }
      } else {
        echo 'Error, no se insertó el beneficiario, revise los campos';
      }
  }



?>
