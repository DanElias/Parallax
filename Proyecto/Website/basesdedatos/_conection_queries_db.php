<?php

//se conecta con la base de datos indicada
    function conectDb(){//¿Estos parámetros deben de cambiar cuando la págn se suba a otro servidor que no sea tu propia pc?
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "proyecto";

        $con = mysqli_connect($servername, $username, $password, $dbname);

        //Check connection
        if (!$con) {
            //die("Connection failed: ".mysqli_connect_error());
            die("Error 505: Internal Sever Error");
        }

        return $con;
    }

//cierra la conexión con la base de datos
    function closeDb($mysql){
        mysqli_close($mysql);
    }

 //obtiene todas las tuplas con todos sus datos
    function obtenerEventos(){
        
        $conn = conectDb();
        
        $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento";
        
        $result = mysqli_query($conn, $sql);
        
        closeDb($conn);
        
        return $result;
    }

    // regresa todos los datos de una tupla cuyo nombre sea igual al especificado
    function obtenerEventosPorNombre($nombre_evento){
        $conn = conectDb();
        
        $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento WHERE nombre LIKE '%".$nombre_evento."%'";
        
        $result = mysqli_query($conn, $sql);
        
        closeDb($conn);
        
        return $result;
    }

    // regresa todos los datos de una tupla cuyo fecha ocurra antes o igual a una fecha especificada.
    function obtenerEventosPorFecha($fecha_evento){//Las fechas se guardan como 1998-03-28
        $conn = conectDb();
        
        $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento WHERE fecha LIKE '%".$fecha_evento."%'";
        
        echo $sql;
        
        $result = mysqli_query($conn, $sql);
        
        closeDb($conn);
        
        return $result;
    }
    
    function obtenerEventosPorID($id_evento){
        
        $conn = conectDb();
        
        $sql = "SELECT id_evento, nombre, fecha, hora, lugar, descripcion, imagen FROM evento WHERE id_evento = '".$id_evento."'";
        
        $result = mysqli_query($conn, $sql);
        
        closeDb($conn);
        
        return $result;
    }
    
    function obtenerEventoReciente(){
        
        $conn = conectDb();
        
        $sql = "SELECT id_evento FROM evento ORDER BY id_evento DESC LIMIT 1";
        
        $result = mysqli_query($conn, $sql);
        
        closeDb($conn);
        
        return $result;
    }
    
    //Inserta un nuevo evento en la base de datos
    function insertarEvento($nombre_evento,$fecha_evento, $hora_evento, $lugar_evento, $descripcion_evento, $imagen_evento){
        $conn=conectDb();
        
        
        //INSERT INTO evento VALUES (,'Venta de Garage' ,'2019-03-28', '16:30:00','Mariana Sala I.A.P.' ,'Vamos a vender mobiliario para obtener fondos.', '../eventos/uploads/f3.jpg')
        
        $sql="INSERT INTO evento (id_evento, nombre, fecha, hora, lugar, descripcion, imagen) VALUES 
        (0,\"".$nombre_evento."\",\"".$fecha_evento."\",\"".$hora_evento."\",\"".$lugar_evento."\",\"". $descripcion_evento."\",\"".$imagen_evento."\")";
        
        if(mysqli_query($conn,$sql)){
            closeDb($conn);
            return true;
        }
        else{
            closeDb($conn);
            return false;
        }
        
    }
    
    //Inserta un nuevo evento en la base de datos
    function editarEvento($id_evento, $nombre_evento,$fecha_evento,$hora_evento,$lugar_evento, $descripcion_evento, $imagen_evento){
        $conn=conectDb();
        
        $sql="UPDATE evento SET id_evento=".$id_evento.", nombre='".$nombre_evento."', fecha='".$fecha_evento."', hora='".$hora_evento."', lugar='".$lugar_evento."', descripcion='".$descripcion_evento."', imagen='".$imagen_evento."'
        WHERE id_evento=".$id_evento."";
        
        if(mysqli_query($conn,$sql)){
            closeDb($conn);
            return true;
        }
        else{
            closeDb($conn);
            return false;
        }
        
    }
    
    //borra el evento que tenga el id 
    function eliminarEventoPorID($id_evento){
        $conn = conectDb();
        
        $sql = "DELETE FROM evento WHERE id_evento ='".$id_evento."'";
        
        if(mysqli_query($conn,$sql)){
            closeDb($conn);
            return true;
        }
        else{
            closeDb($conn);
            return false;
        }
    }


    function registrar_usuario($usuario,$nombre,$apellido,$password,$fecha_nacimiento,$fecha_creacion,$id_rol){
        $conn = conectDb();

        //Query de SQl para insertar en la tabla de usaurios
        $sql = "INSERT INTO usuario(email, nombre, apellido, passwd, fecha_nacimiento, fecha_creacion, id_rol) VALUES (\"".$usuario."\",\"".$nombre."\",\"".$apellido."\",\"".$password."\",\"".$fecha_nacimiento."\",\"".$fecha_creacion."\",\"".$id_rol."\")";

        if(mysqli_query($conn,$sql)){
            closeDb($conn);
            return true;
        }
        else{
            closeDb($conn);
            return false;
        }
    }

    function registrar_proveedor($rfc, $alias,$razon, $nombre, $telefono, $cuenta, $banco){
        $conn = conectDb();
        //$sql = "INSERT INTO Proveedor(rfc,alias,razon_social,nombre_contacto,telefono_contacto,cuenta_bancaria, banco) VALUES (\"".$rfc."\",\"".$alias."\",\"".$razon."\",\"".$nombre."\",\"".$telefono."\",\"".$cuenta."\",\"".$banco."\")";
        //Query de SQl para insertar en la tabla de proveedores
         $sql = "INSERT INTO Proveedor(rfc,alias,razon_social,nombre_contacto,telefono_contacto,cuenta_bancaria, banco) 
                VALUES ('$rfc', '$alias','$razon', '$nombre', '$telefono', '$cuenta', '$banco')";

    
        //'$rfc','$alias','$razon','$nombre','$telefono','$cuenta','$banco''
        
        if(mysqli_query($conn,$sql)){
            closeDb($conn);
            return true;
        }else{
            closeDb($conn);
            return false;
        }
 
    }

    function registrar_cuenta_contable($nombre_cuenta,$descripcion_cuenta){
    $conn = conectDb();

        //Query de SQl para insertar en la tabla de cuenta contable
    $sql = "INSERT INTO cuenta_contable(nombre, descripcion) VALUES (\"".$nombre_cuenta."\",\"".$descripcion_cuenta."\")";

    if(mysqli_query($conn,$sql)){
        closeDb($conn);
        return true;
    }
    else{
        closeDb($conn);
        return false;
    }
}

function autentificarse($email, $password)
{
    $con = conectDb();

    //$sql = "SELECT email,passwd FROM usuario WHERE email = '$email' And passwd = '$password'";
    $sql = "SELECT passwd FROM usuario WHERE email = '$email'";

    $result = mysqli_query($con, $sql);
    $row =  mysqli_fetch_assoc($result);
    $contra = password_verify($password,$row['passwd']);
    return $contra;


}

/*
*Esta funcion dependiendo del email y el password regresara el nombre del usuario
*/
function login($email, $password)
{


    // SELECT nombre FROM login WHERE email = 'josecarlos@gmail.com' And password = '123'
    $con = conectDb();
    $sql = "SELECT nombre,id_rol FROM usuario WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    return $result;
}

function obtenerUsuario(){

    $conn = conectDb();

    $sql = "SELECT id_usuario, nombre, email, fecha_creacion,id_rol FROM usuario";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;
}

function obtenerProveedor(){

    $conn = conectDb();

    $sql = "SELECT rfc, alias, telefono_contacto, cuenta_bancaria FROM proveedor";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;
}

function obtenerEgresos(){

    $conn = conectDb();

    $sql = "SELECT folio_factura, fecha,importe,cuenta_bancaria FROM egreso";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;
}


function obtenerCuentas(){

    $conn = conectDb();

    $sql = "SELECT id_cuentacontable, nombre,descripcion FROM cuenta_contable";

    $result = mysqli_query($conn, $sql);

    closeDb($conn);

    return $result;
}



?>