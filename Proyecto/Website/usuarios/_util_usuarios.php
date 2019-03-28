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

function modal_informacion_usuario()
{
    include("_form_informacion_usuario.html");
}

function form_agregar_rol()
{
    include("forms/_form_agregar_rol.html");
}

function controller_modal_informacion_usuarios_php()
{
    include("controladores/_controller_modal_informacion_usuarios.php");
}

function controller_tabla_usuarios_php()
{
    include("controladores/_controller_tabla_usuarios.php");
}

?>