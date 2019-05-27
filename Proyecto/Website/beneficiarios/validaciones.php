<?php
function val_n($nombre){
  if(!preg_match("/[^A-Za-záéíóúüñÑÁÉÍÓÚ&; ]/", $nombre) && strlen($nombre) <= 40){

    return true;
  } else {
    //echo 'Nombre incorrecto';
    return false;
  }
}

function val_date($date){
  $today = new Datetime(date('y.m.d'));
  $fec = new Datetime($date);
  if($today > $fec){
    return true;

  } else {
    //echo 'Error fecha';
    return false;
  }
  /*$comp = explode('-', $date);
  if($comp[0] < $today->format('y')){
    return true;
  } else if($comp[0] == $today->format('Y')){
    if($comp[1] < $today->format('m')){
      return true;
    } else if($comp[1] == $today->format('m')){
      if($comp[2] <= $today->format('d')){
        return true;
      } else {
        echo 'Fecha incorrecto';
        return false;
      }
    } else {
      echo 'Fecha incorrecto';
      return false;
    }
  } else {
    echo 'Fecha incorrecto';
    return false;
  }*/

}

function val_telefono($telefono){
  if(!preg_match("/[^0-9()+\- ]/", $telefono) && strlen($telefono) >= 8 && strlen($telefono) <= 20){
    return true;
  } else {
    //echo 'Telefono incorrecto';
    return false;
  }
}

function val_empresa($nombre){
  if(!preg_match("/[^A-Za-záéíóúüñÑÁÉÍÓÚ&;#\.0-9 ]/", $nombre) && strlen($nombre) <= 100){
    return true;
  } else {
    //echo 'Empresa incorrecta';
    return false;
  }
}

function val_ocupacion($nombre){
  if(!preg_match("/[^A-Za-záéíóúüñÑÁÉÍÓÚ&;#\. ]/", $nombre) && strlen($nombre) <= 50){
    return true;
  } else {
    //echo 'Ocupacion incorrecta';
    return false;
  }
}
function val_grado($grado){
  switch ($grado){
    case 'Ninguno':
      return true;

    case 'Primaria':
      return true;

    case 'Secundaria':
      return true;

    case 'Bachillerato':
      return true;

    case 'Licenciatura':
      return true;

    case 'Posgrado':
      return true;

    default:
      //echo 'Grado incorrecto';
      return false;
  }
}

?>
