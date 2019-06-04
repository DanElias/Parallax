<?php

//Inicio de sesion
require_once("_util_login.php");
//require_once("_controlador_login.php");
session_start();
header_html();
include("_login.html");
include("../views/_footer_login.html");
//Se debe tener email y password con algo lleno para pasar a la sigueinte validacion


?>
