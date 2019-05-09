<?php

function header_sitio_html()
{
    include("_header_sitio.html");
}

function footer_sitio_html()
{
    include("_footer_sitio.html");
}

function home_sitio_html()
{
    include("_home_sitio.html");
}

function _parallax($image_url, $titulo)
{
    $parallax_container =
        '<div class="parallax-container first-container">
            <header id="home_header" class="container_small"> 
                <h3 class="my_parallax_title container_small">' . $titulo . '</h3>
            </header>
            <div class="parallax container_small">';
                $parallax_container .= '<img src="' . $image_url . '" class=" container_small" >
            </div>
        </div>';
    echo $parallax_container;
}

function controller_cards_eventos_php()
{
    include("_controller_cards_eventos.php");
}

function apoyanos_html(){
    include("apoyanos.html");
}


?>