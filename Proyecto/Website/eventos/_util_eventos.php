<?php

function header_html($titulo="MS - Admin") {
    include("../views/_header_admin.html");
}

function sidenav_html(){
    include("../views/_sidenav_admin.html");
}

function footer_html(){
    include("../views/_footer_admin.html");
}

function evento_html(){
    include("eventos.html");
}

function form_evento_html(){
    include("_form_evento.html");
}

function modal_informacion_evento_html(){
    include("_modal_informacion_evento.html");
}

function form_eliminar_evento_html(){
    include("_form_eliminar_evento.html");
}

?>