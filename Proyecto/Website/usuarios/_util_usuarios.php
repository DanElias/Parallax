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

function usuarios_html()
{
    include("_usuarios.html");
}

function form_usuario_html()
{
    include("forms/_form_usuario.html");
}
function form_rol_html()
{
    include("forms/_form_rol.html");
}

function controller_tabla_usuario_php()
{
    include("controladores/_controller_tablas_usuarios.php");
}

?>