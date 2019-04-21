<?php

function header_html($titulo = "Proveedores")
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

function body_proveedores()
{
    include("proveedor.html");
}

function controller_tabla_proveedor_php(){
	include('_controller_tabla_proveedor.php');
}


function form_proveedor_html()
{
    include("_form_proveedor.html");
}


function form_eliminar_proveedor_html()
{
    include("_form_eliminar_proveedor.html");
}


function modal_informacion_proveedor_html()
{
    include("_modal_informacion_proveedor.html");
}

/*
function form_editar_proveedor()
{
    include("forms/_form_editar_proveedor.html");
}

function form_eliminar_proveedor()
{
    include("forms/_form_eliminar_proveedor.html");
}

function modal_informacion_proveedores()
{
    include("_modal_informacion_proveedores.html");
}

function controller_tabla_proveedores_php()
{
    include("controladores/_controller_tabla_proveedores.php");
}*/

?>