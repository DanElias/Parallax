<?php
session_start();
$GLOBALS['local_servidor'] = 1;
$_SESSION['error_bd_login'] = 0;

//se conecta con la base de datos indicada
function conectDb()
{//¿Estos parámetros deben de cambiar cuando la págn se suba a otro servidor que no sea tu propia pc?
    if($GLOBALS['local_servidor'] == 0){
        $servername = "";
        $username = "marianas";
        $password = "1Ky4L05bly";
        $dbname = "marianas_salaMariana";
    }else{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "proyecto";
    }

     $con = new mysqli($servername, $username, $password, $dbname);


    if($con->connect_error){
      //die("No se ha podido establecer una conexión con la base de datos. " . $con->connection_error);
      //include("error_server_card.html");
      //echo "<script>alert('No hemos podido establecer una conexión con la base de datos. Asegúrate de estar conectado a Internet o vuelve a
       //intentarlo más tarde');</script>";
      if($_SESSION['error_bd_login']==1){
          include("../views/_header_login.html");
          include("../login/_login.html");
          echo alertaNoHayConexion();
          include("../views/_footer_admin.html");
      }
      else{
        alertaNoHayConexion();
        include("../views/_footer_admin.html");
      }
      die();
    }
    //mysqli_query("SET NAMES 'utf8'");
    $con->set_charset("utf8");
    return $con;

}

//cierra la conexión con la base de datos
function closeDb($mysql)
{
    $mysql->close();
}

function editarRol($descripcion,$id_rol)
{

    $conn = conectDb();
    $sql = "UPDATE `rol` SET `descripcion` = '".$descripcion."' WHERE `rol`.`id_rol` = '".$id_rol."'";
    $result = mysqli_query($conn, $sql);

    closeDb($conn);
    return $result;

}
function obtenerTablaRoles()
{
    $conn = conectDb();
    $sql = "SELECT id_rol, descripcion  FROM rol";
    if($stmt = $conn->prepare($sql)){
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function eliminarPrivilegioPorId($id_usuario)
{

    $conn = conectDb();
    $sql = "DELETE FROM rol_privilegio WHERE id_rol = ?";
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
function eliminarRolPorId($id_usuario)
{

    $conn = conectDb();
    $sql = "DELETE FROM rol WHERE id_rol = ?";
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
function registrar_rol_privilegio($id_rol,$id_privilegio){
    $conn = conectDb();
    $sql = "INSERT INTO rol_privilegio (id_rol,id_privilegio) VALUES (?,?)";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('ii',$id_rol,$id_privilegio);
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
function obtener_rol_reciente()
{
    $conn = conectDb();
    $sql = "SELECT id_rol FROM rol ORDER BY id_rol DESC LIMIT 1";
    if($stmt = $conn->prepare($sql)){
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
    closeDB($conn);
    return $result;
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

function obtenerRolPorId($id_rol){

    $conn = conectDb();
    $sql = "SELECT id_rol,descripcion FROM rol WHERE id_rol= ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('i', $id_rol);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }
    closeDB($conn);
    return $result;
}


function obtenerPrivilegios($rol){
    $con = conectDb();
    $query="SELECT * FROM rol_privilegio WHERE id_rol = $rol";
    $result=$con->query($query);
    return  $result;
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

function eliminarUsuarioPorRol($id_rol)
{

    $conn = conectDb();
    $sql = "DELETE FROM usuario WHERE id_rol = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('i', $id_rol);
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

function obtenerEventosSiguientes($fecha){
    $conn = conectDb();

     $sql = "
          SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento
          WHERE fecha>= ? ";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$fecha);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function obtenerEventosPasados($fecha){
    $conn = conectDb();

     $sql = "
          SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento
          WHERE fecha< ? ";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$fecha);
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


function registrar_usuario($usuario, $nombre, $apellido, $password, $fecha_nacimiento, $id_rol)
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
    $sql = "INSERT INTO usuario(email, nombre, apellido, passwd, fecha_nacimiento, id_rol) VALUES (?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('sssssi',$usuario, $nombre, $apellido, $password, $fecha_nacimiento, $id_rol);
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


/******    CONSULTAS PROVEEDOR       *****/
function obtenerProveedor()
{

    /*$conn = conectDb();

    $sql = "SELECT rfc, alias, telefono_contacto, cuenta_bancaria FROM proveedor";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT rfc, alias, razon_social, nombre_contacto, telefono_contacto, cuenta_bancaria, banco  FROM proveedor";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function obtener_razon($rfc){
  $conn = conectDb();
    $sql = "SELECT razon_social FROM proveedor WHERE rfc=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$rfc);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return $result;
    } else{
      closeDB($conn);
      return false;
    }
    closeDB($conn);

}

function obtener_proveedor_id($rfc){

    $conn = conectDb();
    $sql = "SELECT rfc, alias, razon_social, nombre_contacto, telefono_contacto, cuenta_bancaria, banco FROM proveedor WHERE rfc = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s', $rfc);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}


function registrar_proveedor($rfc, $alias, $razon, $nombre, $telefono, $cuenta, $banco){
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
    $sql = "INSERT INTO proveedor(rfc,alias,razon_social,nombre_contacto,telefono_contacto,cuenta_bancaria, banco) VALUES (?,?,?,?,?,?,?)";
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



function editar_proveedor($rfc_actual,$rfc_anterior, $alias, $razon, $nombre, $telefono, $cuenta, $banco){
	$conn = conectDb();
    $sql = "UPDATE proveedor SET rfc=?, alias=?, razon_social=?, nombre_contacto=?, telefono_contacto=?, cuenta_bancaria=?, banco=? WHERE rfc=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ssssssss',$rfc_actual, $alias, $razon, $nombre, $telefono, $cuenta, $banco, $rfc_anterior);
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

function eliminar_proveedor_id($rfc)
{

    $conn = conectDb();

    $sql = "DELETE FROM proveedor WHERE rfc = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$rfc);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return true;
    }else{

      closeDB($conn);
      return false;
    }
    closeDB($conn);
}

/**************************/

/************CONSULTAS EGRESOS**************/
function obtenerEgresos(){

    /*$conn = conectDb();

    $sql = "SELECT folio_factura, fecha,importe,cuenta_bancaria FROM egreso";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;*/
    $conn = conectDb();
    $sql = "SELECT folio_factura, concepto, importe, fecha , observaciones, cuenta_bancaria, rfc, id_cuentacontable FROM egreso";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function registrar_egreso($folio_factura, $concepto, $importe, $fecha, $observaciones, $cuenta_bancaria, $rfc,$id_cuentacontable){
    $conn = conectDb();
    $sql = "INSERT INTO egreso(folio_factura,concepto,importe,fecha,observaciones,cuenta_bancaria,rfc,id_cuentacontable) VALUES (?,?,?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ssdssssi',$folio_factura,$concepto,$importe,$fecha,$observaciones,$cuenta_bancaria,$rfc,$id_cuentacontable);
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

function obtener_egreso_folio($folio_factura){

    $conn = conectDb();
    $sql = "SELECT folio_factura,concepto,importe,fecha,observaciones,cuenta_bancaria,rfc,id_cuentacontable FROM egreso WHERE folio_factura = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s', $folio_factura);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}

function editar_egreso($folio_factura, $concepto, $importe, $fecha, $observaciones, $cuenta_bancaria, $rfc,$id_cuentacontable){
  $conn = conectDb();
    $sql = "UPDATE egreso SET folio_factura=?, concepto=?, importe=?, fecha=?, observaciones=?, cuenta_bancaria=?, rfc=?, id_cuentacontable=? WHERE folio_factura=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ssdssssis',$folio_factura, $concepto, $importe, $fecha, $observaciones, $cuenta_bancaria, $rfc,$id_cuentacontable,$folio_factura);
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

function eliminar_egreso_folio($folio_factura){

    $conn = conectDb();
    $sql = "DELETE FROM egreso WHERE folio_factura = ?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('s',$folio_factura);
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


/********************/

function obtener_nombre_cuenta($id_cuenta){
    $conn = conectDb();
    $sql = "SELECT nombre FROM cuenta_contable WHERE id_cuentacontable=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$id_cuenta);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
      closeDB($conn);
      return $result;
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
function obtenerCorreos()
{
    $conn = conectDb();
    $sql = "SELECT email FROM usuario";
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


function obtenerIdCuentaDelEgreso($id_cuentacontable)
{
    $conn = conectDb();
    $sql = "SELECT id_cuentacontable FROM egreso WHERE id_cuentacontable = ?";
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
    $sql = "SELECT id_usuario,nombre,id_rol FROM usuario WHERE email = ?";
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
    $sql = "SELECT id_usuario, nombre,apellido, email, fecha_creacion,descripcion FROM usuario,rol WHERE rol.id_rol = usuario.id_rol";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
}





function obtenerEgresosPeriodo($fecha_inicial, $fecha_final)
{
    $conn = conectDb();
    $sql = "
            SELECT folio_factura, concepto, importe, fecha ,cuenta_bancaria, observaciones, rfc, id_cuentacontable
            FROM egreso
            WHERE fecha>='".$fecha_inicial."' AND fecha<='".$fecha_final."'";
    $result = mysqli_query($conn, $sql);
    closeDb($conn);
    return $result;
}


function obtenerCuentas(){

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


  function insertarTutor($nombre, $apellido, $telefono, $fecha, $ocupacion, $empresa, $grado, $titulo){
    $conn = conectDb();
    $sql = "INSERT INTO tutor(nombre, apellido, telefono, fecha_nacimiento, ocupacion, nombre_empresa, grado_estudio, titulo_obtenido) VALUES (?,?,?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ssssssss',$nombre,$apellido,$telefono,$fecha,$ocupacion,$empresa,$grado,$titulo);
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

  function editarTutor($id,$nombre, $apellido,$telefono,$fecha, $ocupacion, $empresa, $grado, $titulo){
    $conn = conectDb();
    $sql = "UPDATE tutor SET nombre=?, apellido=?, telefono=?, fecha_nacimiento=?, ocupacion=?, nombre_empresa=?, grado_estudio=?, titulo_obtenido=? WHERE id_tutor=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ssssssssi',$nombre,$apellido,$telefono,$fecha,$ocupacion,$empresa,$grado,$titulo,$id);
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
    $sql = "SELECT id_tutor,nombre,apellido FROM tutor ORDER BY apellido";
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

  function getBeneficiariosActivos(){
    $conn = conectDb();
    $sql = "SELECT * FROM beneficiario WHERE estado=1";
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

  function getEstadoById($id){
    $conn = conectDb();
    $sql = "SELECT estado FROM beneficiario WHERE id_beneficiario=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$id);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    if ($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
          $estado = $row['estado'];
      }
    } else{
      $estado = -1;
    }
    return $estado;
  }

  function modificarEstado($id,$estado){
    $conn = conectDb();
    $sql = "UPDATE beneficiario SET estado=? WHERE id_beneficiario=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('ii',$estado,$id);
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

  function getInfoById($id){
    $conn = conectDb();
    $sql = "SELECT * FROM beneficiario WHERE id_beneficiario=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$id);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getInfoTutorById($id){
    $conn = conectDb();
    $sql = "SELECT * FROM tutor WHERE id_tutor=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$id);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getIDsBen(){
    $conn = conectDb();
    $sql = "SELECT id_beneficiario FROM beneficiario";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function reporteEstado(){
    $conn = conectDb();

    $sql = "
        SELECT estado, count(*) as number FROM beneficiario
        GROUP BY estado
    ";
	if($stmt = $conn->prepare($sql)){
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
	}
	closeDB($conn);
    return $result;
  }

  function benTutor($idben){
    $conn = conectDb();
    $sql = "SELECT t.nombre as name, t.apellido as lastname, bt.parentesco as rel, t.id_tutor as id FROM tutor t, beneficiario_tutor bt, beneficiario b WHERE b.id_beneficiario=bt.id_beneficiario AND t.id_tutor=bt.id_tutor AND b.id_beneficiario=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$idben);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function correctID_Tut($id){
    $conn = conectDb();
    $sql = "SELECT nombre, apellido FROM tutor WHERE id_tutor=?";
    if($stmt = $conn->prepare($sql) ){
      $stmt->bind_param('i',$id);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function getLastBen(){
    $conn = conectDb();
    $sql = "SELECT id_beneficiario FROM beneficiario ORDER BY id_beneficiario DESC LIMIT 1";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }

  function insertarBeneficiario($nombre,$apellido_p,$apellido_m,$estado,$fecha,$sexo,$grado,$grupo,$numero,$calle,$colonia,$nivel,$escuela,$alergias,$cuota){
    $conn = conectDb();
    $sql = "INSERT INTO beneficiario(nombre, apellido_paterno, apellido_materno, estado, fecha_nacimiento, sexo, grado_escolar, grupo, numero_calle, calle, colonia, nivel_socioeconomico, nombre_escuela, enfermedades_alergias, cuota) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('sssissssssssssd',$nombre,$apellido_p,$apellido_m,$estado,$fecha,$sexo,$grado,$grupo,$numero,$calle,$colonia,$nivel,$escuela,$alergias,$cuota);
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

  function editarBeneficiario($id,$nombre,$apellido_p,$apellido_m,$estado,$fecha,$sexo,$grado,$grupo,$numero,$calle,$colonia,$nivel,$escuela,$alergias,$cuota){
    $conn = conectDb();
    $sql = "UPDATE beneficiario SET nombre=?, apellido_paterno=?, apellido_materno=?, estado=?, fecha_nacimiento=?, sexo=?, grado_escolar=?, grupo=?, numero_calle=?, calle=?, colonia=?, nivel_socioeconomico=?, nombre_escuela=?, enfermedades_alergias=?, cuota=? WHERE id_beneficiario=?";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('sssissssssssssdi',$nombre,$apellido_p,$apellido_m,$estado,$fecha,$sexo,$grado,$grupo,$numero,$calle,$colonia,$nivel,$escuela,$alergias,$cuota,$id);
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

  function deleteBeneficiario($id){
    deleteBenTut1($id);
    $conn = conectDb();
    $sql = "DELETE FROM beneficiario WHERE id_beneficiario=?";
    if($stmt = $conn->prepare($sql) ){
      $stmt->bind_param('i',$id);
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

  function deleteBenTut1($id){
    $conn = conectDb();
    $sql = "DELETE FROM beneficiario_tutor WHERE id_beneficiario=?";
    if($stmt = $conn->prepare($sql) ){
      $stmt->bind_param('i',$id);
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

  function deleteBenTut2($id){
    $conn = conectDb();
    $sql = "DELETE FROM beneficiario_tutor WHERE id_tutor=?";
    if($stmt = $conn->prepare($sql) ){
      $stmt->bind_param('i',$id);
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

  function deleteTutor($id){
    deleteBenTut2($id);
    $conn = conectDb();
    $sql = "DELETE FROM tutor WHERE id_tutor=?";
    if($stmt = $conn->prepare($sql) ){
      $stmt->bind_param('i',$id);
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

  function insertarBenTut($id_ben,$id_tutor,$parentesco){
    $conn = conectDb();
    $sql = "INSERT INTO beneficiario_tutor(id_beneficiario, id_tutor, parentesco) VALUES (?,?,?)";
    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('iis',$id_ben,$id_tutor,$parentesco);
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


  function reporteSexo($estado){
    $conn = conectDb();

    $sql = "
        SELECT sexo, count(*) as number FROM beneficiario
        WHERE estado = ?
        GROUP BY sexo
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$estado);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteGradoEscolar($estado){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    $sql = "
        SELECT grado_escolar, count(*) as number FROM beneficiario
        WHERE estado = ?
        GROUP BY grado_escolar
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$estado);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteGrupo($estado){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    $sql = "
        SELECT grupo, count(*) as number FROM beneficiario
        WHERE estado = ?
        GROUP BY grupo
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$estado);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteNivel($estado){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    $sql = "
        SELECT nivel_socioeconomico, count(*) as number FROM beneficiario
        WHERE estado = ?
        GROUP BY nivel_socioeconomico
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$estado);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteEscuela($estado){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    $sql = "
        SELECT nombre_escuela, count(*) as number FROM beneficiario
        WHERE estado = ?
        GROUP BY nombre_escuela
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$estado);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteEnfermedades($estado){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    $sql = "
        SELECT enfermedades_alergias, count(*) as number FROM beneficiario
        WHERE estado = ?
        GROUP BY enfermedades_alergias
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$estado);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteCuota($estado){
    $conn = conectDb();

    $sql = "
        SELECT cuota, count(*) as number FROM beneficiario
        WHERE estado = ?
        GROUP BY cuota
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->bind_param('i',$estado);
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteOcupacion(){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    $sql = "
        SELECT ocupacion, count(*) as number FROM tutor
        GROUP BY ocupacion
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteEmpresa(){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    $sql = "
        SELECT nombre_empresa, count(*) as number FROM tutor
        GROUP BY nombre_empresa
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteEstudio(){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    $sql = "
        SELECT grado_estudio, count(*) as number FROM tutor
        GROUP BY grado_estudio
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }

  function reporteTitulo(){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    $sql = "
        SELECT titulo_obtenido, count(*) as number FROM tutor
        GROUP BY titulo_obtenido
    ";

    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }

    closeDB($conn);
    return $result;
  }


function reporteCuenta($fecha_inicial, $fecha_final){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    if($fecha_inicial!="" && $fecha_final!=""){
       $sql = "
            SELECT nombre, count(*) as number FROM egreso E, cuenta_contable C
            WHERE E.id_cuentacontable=C.id_cuentacontable AND fecha>='".$fecha_inicial."' AND fecha<='".$fecha_final."'
            GROUP BY C.nombre";
    }
    else{
        $sql = "
            SELECT nombre, count(*) as number FROM egreso E, cuenta_contable C
            WHERE E.id_cuentacontable=C.id_cuentacontable
            GROUP BY C.nombre";
  }

  $result = mysqli_query($conn, $sql);
  closeDb($conn);
  return $result;
}

function reporteProveedores($fecha_inicial, $fecha_final){
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

    if($fecha_inicial!="" && $fecha_final!=""){
       $sql = "
            SELECT razon_social, count(*) as number FROM egreso E, proveedor P
            WHERE E.rfc=P.rfc AND fecha>='".$fecha_inicial."' AND fecha<='".$fecha_final."'
            GROUP BY razon_social";
    }
    else{
        $sql = "
          SELECT razon_social, count(*) as number FROM egreso E, proveedor P
          WHERE E.rfc=P.rfc
          GROUP BY razon_social
       ";
  }

  $result = mysqli_query($conn, $sql);
  closeDb($conn);
  return $result;
}

  /*function reporteProveedores(){ //con prepared statement
    $conn = conectDb();
    $conn->set_charset("utf8");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");
    $sql = "
        SELECT razon_social, count(*) as number FROM egreso E, proveedor P
        WHERE E.rfc=P.rfc
        GROUP BY razon_social
    ";
    if($stmt = $conn->prepare($sql)){
      $stmt->execute();
      $result = $stmt->get_result();
      $stmt->close();
    }
    closeDB($conn);
    return $result;
  }*/


  function alertaNoHayConexion(){
    $alerta='

    <div id="_form_alerta_error" class="modal  my_modal">
        <div class="row my_modal_header_row">
            <div class="my_modal_header_eliminar z-depth-2 col s12">
                <h4 class="my_modal_header">Lo sentimos</h4>
            </div>
        </div>
        <br><br>
        <div class="modal-content my_modal_content">
            <br><br>
            <h5 class="my_modal_description2"></h5>
            <div class="row">
                <div class="col s12">
                        <h5>
                          Lo sentimos, no hay conexión con la base de datos. Asegúrate de estar conectado a internet o contacta al administrador.
                          <br><br> (Error 505)
                        <h5>
                </div>
            <div>
            <br>
            <br>

            <div class="my_modal_buttons">
                <div class="row">

                    <div class="col s12 m12">
                        <button class="modal-close btn waves-effect waves-light modal-close">Ok, estoy enterado.
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>';


    $alerta.= "<script type='text/javascript'>
            $(document).ready(function(){
                  $('#_form_alerta_error').modal();
                  $(document).ready(function(){
                      $('#_form_alerta_error').modal('open');
                  });
            });
    </script>";

    echo $alerta;

  }



?>
