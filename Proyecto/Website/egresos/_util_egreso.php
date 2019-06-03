<?php

function header_html($titulo = "Egresos")
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
    include("_egreso.html");
}

function controller_tabla_egreso_php(){
    include('_controller_tabla_egreso.php');
}

function drop_proveedor()
{
    include("mostrar_proveedor.php");
}

function drop_cuenta()
{
    include("mostrar_cuentacontable.php");
}

function form_egreso_html()
{
    include("_form_egreso.html");
}



function modal_informacion_egreso_html()
{
    include("_modal_informacion_egreso.html");
}


function form_editar_egreso()
{
    include("egreso_editar_form.html");
}



function modal_informacion_egreso(){
    include("_modal_informacion_egreso.html");
}



?>