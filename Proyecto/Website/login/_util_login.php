<?php

require_once("../basesdedatos/_conection_queries_db.php");
//Funciones de util para login
function header_html($titulo = "LogIn")
{
    include("../views/_header_login.html");
}

function body_html(){
    include("_login.html");
}

function footer_hml()
{
    include("../views/_footer_login.html");
}
?>


