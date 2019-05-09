<?php

function header_html($titulo = "Usuarios")
{
    include("../views/_header_login.html");
}
function footer_html_contra()
{
    include("../views/_footer_login.html");
}


function body_html(){
    include("_contrasena_olvidada.html");
}
?>