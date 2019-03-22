<?php

    //se conecta con la base de datos indicada
    function conectDb(){//¿Estos parámetros deben de cambiar cuando la págn se suba a otro servidor que no sea tu propia pc?
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "logindb";
        
        $con = mysqli_connect($servername, $username, $password, $dbname);
        
        //Check connection
        if(!$con){
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
        
        $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, lugar_evento, descripcion_evento FROM Eventos";
        
        $result = mysqli_query($conn, $sql);
        
        closeDb($conn);
        
        return $result;
    }

    // regresa todos los datos de una tupla cuyo nombre sea igual al especificado
    function obtenerEventosPorNombre($nombre_evento){
        $conn = conectDb();
        
        $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, lugar_evento, descripcion_evento FROM Eventos WHERE nombre_evento LIKE '%".$nombre_evento."%'";
        
        $result = mysqli_query($conn, $sql);
        
        closeDb($conn);
        
        return $result;
    }

    // regresa todos los datos de una tupla cuyo fecha ocurra antes o igual a una fecha especificada.
    function obtenerEventosPorFecha($fecha_evento){//Las fechas se guardan como 1998-03-28
        $conn = conectDb();
        
        $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, lugar_evento, descripcion_evento FROM Eventos where fecha_evento LIKE '%".$fecha_evento."%'";
        
        echo $sql;
        
        $result = mysqli_query($conn, $sql);
        
        closeDb($conn);
        
        return $result;
    }

//Validacion de server para que el usuario no ponga url
    



?>