<?php

function header_html($titulo = "Cuentas Contables")
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

function cuentacontable_html()
{
    include("cuentascontables.html");
}

function form_cuentacontable_html()
{
    include("_form_cuentacontable.html");
}

function form_eliminar_cuentacontable_html()
{
    include("_form_eliminar_cuentacontable.html");
}

function modal_informacion_cuentacontable_html()
{
    include("_modal_informacion_cuentacontable.html");
}

function controller_tabla_cuentas_php(){
    include("_controller_tablas_cuentas.php");
}

?>