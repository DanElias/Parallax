<?php

//se conecta con la base de datos indicada
function conectDb()
{//¿Estos parámetros deben de cambiar cuando la págn se suba a otro servidor que no sea tu propia pc?
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyecto";

    @$con = new mysqli($servername, $username, $password, $dbname);

    if($con->connect_error){
      //die("No se ha podido establecer una conexión con la base de datos. " . $con->connection_error);
        include("error_server_card.html");
      //echo "<script>alert('No hemos podido establecer una conexión con la base de datos. Asegúrate de estar conectado a Internet o vuelve a intentarlo más tarde');</script>";

    }
    $con->set_charset("utf8");
    return $con;
}

//cierra la conexión con la base de datos
function closeDb($mysql)
{
    $mysql->close();
}

function obtenerRoles(){
    $con = conectDb();
    $query="SELECT * FROM rol ORDER BY descripcion ASC";
    $result=$con->query($query);
    $salida='<option value="0">Elige un rol</option>';
    //PARA PODER GUARDAR SE OCUPA UN VALOR QUE EN ESTE CASO SERÍA EL ID DEL INCIDENTE
    while($row=  mysqli_fetch_array($result,MYSQLI_BOTH)){
        $salida.="<option value='$row[id_rol]'>$row[descripcion]</option>";
    }
    return  $salida;
}
function eliminarUsuarioPorID($id_usuario)
{

    $conn = conectDb();
    $sql = "DELETE FROM usuario WHERE id_usuario = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        closeDB($conn);
        return true;
    } else{
        closeDB($conn);
        return false;
    }
    closeDB($conn);
}

//obtiene todas las tuplas con todos sus datos
function obtenerEventos()
{
    $conn = conectDb();
    $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

// regresa todos los datos de una tupla cuyo nombre sea igual al especificado
function obtenerEventosPorNombre($nombre_evento)
{
    /*$conn = conectDb();

    $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento WHERE nombre LIKE '%" . $nombre_evento . "%'";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento WHERE nombre LIKE '%?%'";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$nombre_evento);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;

}

// regresa todos los datos de una tupla cuyo fecha ocurra antes o igual a una fecha especificada.
function obtenerEventosPorFecha($fecha_evento)
{//Las fechas se guardan como 1998-03-28
    /*$conn = conectDb();

    $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento WHERE fecha LIKE '%" . $fecha_evento . "%'";

    echo $sql;

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento WHERE fecha LIKE '%?%'";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$fecha_evento);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function obtenerEventosPorID($id_evento)
{
    /*$conn = conectDb();

    $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento WHERE id_evento = '" . $id_evento . "'";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;
    */
    $conn = conectDb();
    $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento WHERE id_evento = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$id_evento);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function obtenerEventoReciente()
{

    /*$conn = conectDb();

    $sql = "SELECT id_evento FROM evento ORDER BY id_evento DESC LIMIT 1";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT id_evento FROM evento ORDER BY id_evento DESC LIMIT 1";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

//Inserta un nuevo evento en la base de datos
function insertarEvento($nombre_evento, $fecha_evento, $hora_evento, $lugar_evento, $descripcion_evento, $imagen_evento)
{
    /*$conn = conectDb();


    //INSERT INTO evento VALUES (,'Venta de Garage' ,'2019-03-28', '16:30:00','Mariana Sala I.A.P.' ,'Vamos a vender mobiliario para obtener fondos.', '../eventos/uploads/f3.jpg')

    $sql = "INSERT INTO evento (id_evento, nombre, fecha, hora, lugar, descripcion, imagen) VALUES
        (0,\"" . $nombre_evento . "\",\"" . $fecha_evento . "\",\"" . $hora_evento . "\",\"" . $lugar_evento . "\",\"" . $descripcion_evento . "\",\"" . $imagen_evento . "\")";

    if (mysqli_query($conn, $sql)) {
        closeDb($conn);
        return true;
    } else {
        closeDb($conn);
        return false;
    }*/
    $conn = conectDb();
    $sql = "INSERT INTO evento (nombre, fecha, hora, lugar, descripcion, imagen) VALUES (?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ssssss',$nombre_evento, $fecha_evento, $hora_evento, $lugar_evento, $descripcion_evento, $imagen_evento);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);

}

//Inserta un nuevo evento en la base de datos
function editarEvento($id_evento, $nombre_evento, $fecha_evento, $hora_evento, $lugar_evento, $descripcion_evento, $imagen_evento)
{
    /*$conn = conectDb();

    $sql = "UPDATE evento SET id_evento=$id_evento, nombre='" . $nombre_evento . "', fecha='" . $fecha_evento . "', hora='" . $hora_evento . "', lugar='" . $lugar_evento . "', descripcion='" . $descripcion_evento . "', imagen='" . $imagen_evento . "'
        WHERE id_evento=" . $id_evento . "";

    if (mysqli_query($conn, $sql)) {
        closeDb($conn);
        return true;
    } else {
        closeDb($conn);
        return false;
    }*/
    $conn = conectDb();
    $sql = "UPDATE evento SET id_evento=?, nombre=?, fecha=?, hora=?, lugar=?, descripcion=?, imagen=? WHERE id_evento=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('issssssi',$id_evento, $nombre_evento, $fecha_evento, $hora_evento, $lugar_evento, $descripcion_evento, $imagen_evento, $id_evento);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);

}

//borra el evento que tenga el id
function eliminarEventoPorID($id_evento)
{
    /*$conn = conectDb();

    $sql = "DELETE FROM evento WHERE id_evento ='" . $id_evento . "'";

    if (mysqli_query($conn, $sql)) {
        closeDb($conn);
        return true;
    } else {
        closeDb($conn);
        return false;
    }*/
    
    $conn = conectDb();
    $sql = "DELETE FROM evento WHERE id_evento = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$id_evento);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);
}


function registrar_usuario($usuario, $nombre, $apellido, $password, $fecha_nacimiento, $fecha_creacion, $id_rol)
{
    /*$conn = conectDb();

    //Query de SQl para insertar en la tabla de usaurios
    $sql = "INSERT INTO usuario(email, nombre, apellido, passwd, fecha_nacimiento, fecha_creacion, id_rol) VALUES (\"" . $usuario . "\",\"" . $nombre . "\",\"" . $apellido . "\",\"" . $password . "\",\"" . $fecha_nacimiento . "\",\"" . $fecha_creacion . "\",\"" . $id_rol . "\")";

    if (mysqli_query($conn, $sql)) {
        closeDb($conn);
        return true;
    } else {
        closeDb($conn);
        return false;
    }*/
    $conn = conectDb();
    $sql = "INSERT INTO usuario(email, nombre, apellido, passwd, fecha_nacimiento, fecha_creacion, id_rol) VALUES (?,?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ssssssi',$usuario, $nombre, $apellido, $password, $fecha_nacimiento, $fecha_creacion, $id_rol);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);
}

function registrar_Rol($nombre)
{
    /*
    $conn = conectDb();

    //Query de SQl para insertar en la tabla de usaurios
    $sql = "INSERT INTO rol (descripcion) VALUES ($nombre)";

    if (mysqli_query($conn, $sql)) {
        closeDb($conn);
        return true;
    } else {
        closeDb($conn);
        echo 'Error: '. mysqli_error($conn);
        return false;
    }
    */

    $conn = conectDb();
    $sql = "INSERT INTO rol (descripcion) VALUES (?)";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('s',$nombre);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        closeDB($conn);
        return true;
    } else{
        closeDB($conn);
        echo mysqli_error($sql);
        return false;
    }
    closeDB($conn);

}


function registrar_proveedor($rfc, $alias, $razon, $nombre, $telefono, $cuenta, $banco)
{
    /*$conn = conectDb();
    //$sql = "INSERT INTO Proveedor(rfc,alias,razon_social,nombre_contacto,telefono_contacto,cuenta_bancaria, banco) VALUES (\"".$rfc."\",\"".$alias."\",\"".$razon."\",\"".$nombre."\",\"".$telefono."\",\"".$cuenta."\",\"".$banco."\")";
    //Query de SQl para insertar en la tabla de proveedores
    $sql = "INSERT INTO Proveedor(rfc,alias,razon_social,nombre_contacto,telefono_contacto,cuenta_bancaria, banco)
                VALUES ('$rfc', '$alias','$razon', '$nombre', '$telefono', '$cuenta', '$banco')";


    //'$rfc','$alias','$razon','$nombre','$telefono','$cuenta','$banco''

    if (mysqli_query($conn, $sql)) {
        closeDb($conn);
        return true;
    } else {
        closeDb($conn);
        return false;
    }*/
    $conn = conectDb();
    $sql = "INSERT INTO Proveedor(rfc,alias,razon_social,nombre_contacto,telefono_contacto,cuenta_bancaria, banco) VALUES (?,?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('sssssss',$rfc, $alias, $razon, $nombre, $telefono, $cuenta, $banco);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);

}

function registrar_cuenta_contable($nombre_cuenta, $descripcion_cuenta)
{
    /*$conn = conectDb();

    //Query de SQl para insertar en la tabla de cuenta contable
    $sql = "INSERT INTO cuenta_contable(nombre, descripcion) VALUES (\"" . $nombre_cuenta . "\",\"" . $descripcion_cuenta . "\")";

    if (mysqli_query($conn, $sql)) {
        closeDb($conn);
        return true;
    } else {
        closeDb($conn);
        return false;
    }*/
    $conn = conectDb();
    $sql = "INSERT INTO cuenta_contable(nombre, descripcion) VALUES (?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ss',$nombre_cuenta, $descripcion_cuenta);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);
}

function obtener_cuenta_contable_reciente()
{
    $conn = conectDb();
    $sql = "SELECT id_cuentacontable FROM cuenta_contable ORDER BY id_cuentacontable DESC LIMIT 1";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function obtener_usuario_reciente()
{
    $conn = conectDb();
    $sql = "SELECT id_usuario FROM usuario ORDER BY id_usuario DESC LIMIT 1";
    if($stmt = $conn->prepare($sql)){
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function obtenerCuentaPorID($id_cuentacontable)
{
    $conn = conectDb();
    $sql = "SELECT id_cuentacontable,nombre,descripcion FROM cuenta_contable WHERE id_cuentacontable = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$id_cuentacontable);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}
function obtenerUsuariosPorID($id_usuario){

    /*$conn = conectDb();

    $sql = "SELECT id_evento FROM usuario WHERE id_usuario = '".$id_usuario."'";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT id_usuario,nombre,apellido,email,fecha_nacimiento,id_rol FROM usuario WHERE id_usuario = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
    closeDB($conn);
    return $result;
}




function editarCuenta($id_cuentacontable, $nombre, $descripcion)
{
    $conn = conectDb();
    $sql = "UPDATE cuenta_contable SET id_cuentacontable=?, nombre=?, descripcion=?  WHERE id_cuentacontable=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('issi', $id_cuentacontable, $nombre, $descripcion, $id_cuentacontable);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);

}
function editarUsuario($id_usuario, $nombre,$apellido,$email,$password,$fecha_nacimiento,$rol)
{

    $conn = conectDb();
    $sql = "UPDATE `usuario` SET `email` = '".$email."', `nombre` = '".$nombre."', `apellido` = '".$apellido."', `passwd` = '".$password."', `fecha_nacimiento` = '".$fecha_nacimiento."', `id_rol` = '".$rol."' WHERE `usuario`.`id_usuario` = '".$id_usuario."'";
    $result = mysqli_query($conn, $sql);

    closeDb($conn);
    return $result;
    /*
    $conn = conectDb();
    $sql = "UPDATE usuario SET id_usuario=?, nombre=? ,apellido=?,email=?,passw=?,fecha_nacimeint=?,id_rol=? WHERE id_usuario=?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('isssssi', $id_ususario, $nombre,$apellido,$email,$password,$fecha_nacimiento,$rol);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        closeDB($conn);
        return true;
    } else{
        closeDB($conn);
        return false;
    }
    closeDB($conn);
*/
}


function eliminarCuentaPorID($id_cuentacontable)
{
    
    $conn = conectDb();
    $sql = "DELETE FROM cuenta_contable WHERE id_cuentacontable = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i', $id_cuentacontable);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);
}




function autentificarse($email, $password)
{
    /*$con = conectDb();

    //$sql = "SELECT email,passwd FROM usuario WHERE email = '$email' And passwd = '$password'";
    $sql = "SELECT passwd FROM usuario WHERE email = '$email'";

    $result = mysqli_query($con, $sql);*/
    $conn = conectDb();
    $sql = "SELECT passwd FROM usuario WHERE email = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$email);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
    }
    $row = mysqli_fetch_assoc($result);
    $contra = password_verify($password, $row['passwd']);
    return $contra;


}

/*
*Esta funcion dependiendo del email y el password regresara el nombre del usuario
*/
function login($email, $password)
{


    /*// SELECT nombre FROM login WHERE email = 'josecarlos@gmail.com' And password = '123'
    $con = conectDb();
    $sql = "SELECT nombre,id_rol FROM usuario WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT nombre,id_rol FROM usuario WHERE email = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$email);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function obtenerUsuario()
{

    /*$conn = conectDb();

    $sql = "SELECT id_usuario, nombre, email, fecha_creacion,id_rol FROM usuario";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT id_usuario, nombre,apellido, email, fecha_creacion,id_rol FROM usuario";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function obtenerProveedor()
{

    /*$conn = conectDb();

    $sql = "SELECT rfc, alias, telefono_contacto, cuenta_bancaria FROM proveedor";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT rfc, alias, razon_social, nombre_contacto, telefono_contacto, cuenta_bancaria, banco FROM proveedor";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function obtenerEgresos()
{

    /*$conn = conectDb();

    $sql = "SELECT folio_factura, fecha,importe,cuenta_bancaria FROM egreso";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT folio_factura, concepto, importe, fecha ,cuenta_bancaria, observaciones, rfc, id_cuentacontable FROM egreso";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}


function obtenerCuentas()
{

    /*$conn = conectDb();

    $sql = "SELECT id_cuentacontable, nombre,descripcion FROM cuenta_contable";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT id_cuentacontable, nombre,descripcion FROM cuenta_contable";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}


  function registrarTutor($nombre, $telefono, $fecha, $ocupacion, $empresa, $grado, $titulo){
    $conn = conectDb();
    $sql = "INSERT INTO tutor(nombre, telefono, fecha_nacimiento, ocupacion, nombre_empresa, grado_estudio, titulo_obtenido) VALUES (?,?,'".$fecha."',?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ssssss',$nombre,$telefono,$ocupacion,$empresa,$grado,$titulo);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);
  }

  function getNombreTutor(){
    $conn = conectDb();
    $sql = "SELECT id_tutor,nombre,apellido FROM tutor";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getNombreBeneficiarios(){
    $conn = conectDb();
    $sql = "SELECT id_beneficiario,nombre,apellido,fecha_nacimiento,grupo,estado FROM beneficiario";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getInfoBeneficiarios(){
    $conn = conectDb();
    $sql = "SELECT * FROM beneficiario";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getInfoTutores(){
    $conn = conectDb();
    $sql = "SELECT * FROM tutor";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

?>
