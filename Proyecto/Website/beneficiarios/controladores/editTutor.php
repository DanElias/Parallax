<?php
    require_once('../../basesdedatos/_conection_queries_db.php');
    $id = htmlentities($_POST['id']);
    $nombre = htmlentities($_POST['nombre']);
    $apellido = htmlentities($_POST['apellido']);
    $fecha = htmlentities($_POST['fecha']);
    $ocupacion = htmlentities($_POST['ocupacion']);
    $grado = htmlentities($_POST['grado']);
    $empresa = htmlentities($_POST['empresa']);
    $telefono = htmlentities($_POST['telefono']);
    $titulo = htmlentities($_POST['titulo']);
    if(editarTutor($id,$nombre, $apellido, $telefono, $fecha, $ocupacion, $empresa, $grado, $titulo)){
      //do nothing
    } else{
      echo '<script>alert("error")</script>';
    }

?>
