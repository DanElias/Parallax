<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  require_once('../validaciones.php');
  $nombre = htmlentities($_POST['nombre']);
  $apellido = htmlentities($_POST['apellido']);
  $fecha = htmlentities($_POST['fecha']);
  $ocupacion = htmlentities($_POST['ocupacion']);
  $grado = htmlentities($_POST['grado']);
  $empresa = htmlentities($_POST['empresa']);
  $telefono = htmlentities($_POST['telefono']);
  $titulo = htmlentities($_POST['titulo']);
  if(val_n($nombre) &&
     val_n($apellido) &&
     val_date($fecha) &&
     val_ocupacion($ocupacion) &&
     val_grado($grado) &&
     val_empresa($empresa) && strlen($empresa) <= 256 &&
     val_telefono($telefono) &&
     val_empresa($titulo) && strlen($titulo) <= 256){
       if(insertarTutor($nombre, $apellido, $telefono, $fecha, $ocupacion, $empresa, $grado, $titulo)){
         echo 'Tutor insertado con éxito!';
       } else{
         echo 'Errores en los campos, no se insertó el tutor';
       }
  } else {
    echo 'Errores en los campos, no se insertó el tutor';
  }






?>
