<?php

//Util de admin, correponde el titulo y sus diferentes paginas
function header_html($titulo = "Mariana Sala - Admin")
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

function body_admin_main()
{
    include("_admin.html");
}


?>