<?php

function header_html($titulo="MS - Reportes Beneficiarios") {
    include("../views/_header_admin.html");
}

function sidenav_html(){
    include("../views/_sidenav_admin.html");
}

function footer_html(){
    include("../views/_footer_admin.html");
}

function body_beneficiarios(){
    include("_reporte_beneficiarios.html");
}

?>