<?php

function header_html($titulo = "MS - Reportes Beneficiarios")
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

function body_beneficiarios()
{
    include("_reporte_beneficiarios.html");
}

function form_cuotas()
{
    include("graficas/_grafica_cuotas.html");
}

function form_edades()
{
    include("graficas/_grafica_edades.html");
}

function form_estatus()
{
    include("graficas/_grafica_estatus.html");
}

function form_genero()
{
    include("graficas/_grafica_genero.html");
}

function form_grado()
{
    include("graficas/_grafica_grado.html");
}

function form_grupos()
{
    include("graficas/_grafica_grupos.html");
}

?>