<?php

function header_html($titulo = "MS - Reportes egresos")
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

function body_reporte_egresos()
{
    include("_reporte_egresos.html");
}

function form_proveedor()
{
    include("graficas/_grafica_proveedor.html");
}

function form_cuenta()
{
    include("graficas/_grafica_cuenta.php");
}

function form_monto()
{
    include("graficas/_grafica_monto.html");
}

?>