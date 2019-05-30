<?php
function val_n($nombre){
  if(!preg_match("/[^A-Za-záéíóúüñÑÁÉÍÓÚ&; ]/", $nombre) && strlen($nombre) <= 100){

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
  if(!preg_match("/[^A-Za-záéíóúüñÑÁÉÍÓÚ&;#\.0-9\/ ]/", $nombre)){
    return true;
  } else {
    //echo 'Empresa incorrecta';
    return false;
  }
}

function val_enfermedades($nombre){
  if(!preg_match("/[^A-Za-záéíóúüñÑÁÉÍÓÚ&;#\.0-9, ]/", $nombre)){
    return true;
  } else {
    //echo 'Empresa incorrecta';
    return false;
  }
}

function val_ocupacion($nombre){
  if(!preg_match("/[^A-Za-záéíóúüñÑÁÉÍÓÚ&;#\.\/ ]/", $nombre) && strlen($nombre) <= 256){
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

function val_sexo($sexo){
  switch ($sexo){
    case 'H':
      return true;

    case 'M':
      return true;

    default:
      //echo 'Grado incorrecto';
      return false;
  }
}

function val_gradoben($grado){
  switch ($grado){
    case '1ro Preescolar':
      return true;

    case '2do Preescolar':
      return true;

    case '3ro Preescolar':
      return true;

    case '4to Preescolar':
      return true;

    case '1ro Primaria':
      return true;

    case '2do Primaria':
      return true;

    case '3ro Primaria':
      return true;

    case '4to Primaria':
      return true;

    case '5to Primaria':
      return true;

    case '6to Primaria':
      return true;

    case '1ro Secundaria':
      return true;

    case '2do Secundaria':
      return true;

    case '3ro Secundaria':
      return true;

    default:
      return false;
  }
}

function val_grupo($grado){
  switch ($grado){
    case 'Preescolar':
      return true;

    case 'Primaria Baja':
      return true;

    case 'Primaria Alta':
      return true;

    case 'Secundaria':
      return true;

    default:
      return false;
  }
}

function val_status($grado){
  switch ($grado){
    case 'Pobreza':
      return true;

    case 'Pobreza Extrema':
      return true;

    case 'Media Baja':
      return true;

    case 'Media Media':
      return true;

    case 'Media Alta':
      return true;

    default:
      return false;
  }
}

function val_parentesco($grado){
  switch ($grado){
    case 'Padre':
      return true;

    case 'Madre':
      return true;

    case 'Tutor':
      return true;

    default:
      return false;
  }
}

function val_estado($estado){
  switch ($estado){
    case 0:
      return true;

    case 1:
      return true;

    default:
      return false;
  }
}

?>
