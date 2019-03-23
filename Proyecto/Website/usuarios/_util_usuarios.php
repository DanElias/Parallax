<?php
function header_html($titulo = "Usuarios")
{
include("../views/_header_admin.html");
}

function sidenav_html()
{
include("../views/_sidenav_admin.html");
}

function footer_html()
{
include("../views/_footer_admin.html");
}

function body_usuarios()
{
include("_usuarios.html");
}

?>