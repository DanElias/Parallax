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

function body_egreso()
{
    include("egreso.html");
}

function controller_tabla_egreso_php(){
	include('_controller_tabla_egreso.php');
}


function form_egreso_html()
{
    include("_form_egreso.html");
}


function form_eliminar_egreso_html()
{
    include("_form_eliminar_egreso.html");
}


function modal_informacion_egreso_html()
{
    include("_modal_informacion_egreso.html");
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