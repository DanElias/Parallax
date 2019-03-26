<?php

require_once("../basesdedatos/_conection_queries_db.php");
//Funciones de util para login
function header_html($titulo = "LogIn")
{
    include("../views/_header_login.html");
}

/*
*Esta funcion recibira como parametros el correo y la contraseña enviados por el metodo post
*seguido se buscara un elemento que cumpla con las especificaciones
*@Input: email,password
*@Ouptu: 1 o 0
*/
function autentificarse($email, $password)
{
    $con = conectDb();
    password_hash($_POST["password"], PASSWORD_DEFAULT);
    die();
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
    $sql = "SELECT nombre FROM usuario WHERE email = '$email' And passwd = '$password'";
    $result = mysqli_query($con, $sql);

    return $result;
}

function info($mensaje)
{
    $mensaje = $mensaje;
    echo $mensaje;
}

function hora_fecha()
{
    date_default_timezone_set('GMT-6');

}

?>
