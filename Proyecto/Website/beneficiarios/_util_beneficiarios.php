<?php

function header_html($titulo = "MS - Admin")
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

function beneficiarios_html()
{
    include("beneficiarios.html");
}

function form_beneficiarios_html()
{
    include("_form_beneficiarios.html");
}

function form_eliminar_beneficiarios_html()
{
    include("_form_eliminar_beneficiarios.html");
}

function form_estado_beneficiarios_html()
{
    include("_form_estado_beneficiarios.html");
}

function form_tutor_html()
{
    include("_form_tutor.html");
}

function modal_informacion_beneficiarios_html()
{
    include("_modal_informacion_beneficiarios.html");
}

function modal_informacion_tutor_html()
{
    include("_modal_informacion_tutor.html");
}

?>