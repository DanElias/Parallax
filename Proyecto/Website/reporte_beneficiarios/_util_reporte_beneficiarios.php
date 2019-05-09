<?php

function header_html($titulo = "Reportes Beneficiarios")
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

function grafica_cuota()
{
    include("graficas/_grafica_cuota.php");
}

function grafica_estado()
{
    include("graficas/_grafica_estado.php");
}

function grafica_sexo()
{
    include("graficas/_grafica_sexo.php");
}

function grafica_grado()
{
    include("graficas/_grafica_grado_escolar.php");
}

function grafica_grupo()
{
    include("graficas/_grafica_grupo.php");
}

function grafica_escuela()
{
    include("graficas/_grafica_escuela.php");
}

function grafica_enfermedades()
{
    include("graficas/_grafica_enfermedades.php");
}

function grafica_nivel()
{
    include("graficas/_grafica_nivel.php");
}

function grafica_ocupacion()
{
    include("graficas/_grafica_ocupacion.php");
}

function grafica_empresa()
{
    include("graficas/_grafica_empresa.php");
}

function grafica_estudio()
{
    include("graficas/_grafica_estudio.php");
}

function grafica_titulo()
{
    include("graficas/_grafica_titulo.php");
}

?>