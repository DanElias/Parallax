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
function form_agregar_usuario()
{
 include("forms/_form_agregar_usuario.html");
}
function form_editar_usuario()
{
 include("forms/_form_editar_usuario.html");
}
function form_eliminar_usuario()
{
 include("forms/_form_eliminar_usuario.html");
}



?>