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
    include("_cuentascontables.html");
}

function form_cuentacontable_html()
{
    include("forms/_form_cuentacontable.html");
}


function controller_modal_informacion_cuentacontable()
{
    include("controladores/_controller_modal_informacion_cuenta_contable.php");
}

function controller_tabla_cuentas_php()
{
    include("controladores/_controller_tablas_cuentas.php");
}

?>