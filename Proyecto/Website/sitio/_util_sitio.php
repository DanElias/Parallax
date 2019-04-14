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
        '<div class="parallax-container first-container z-depth-4">
            <header id="home_header"> 
            <section>
                <h3 class="my_header_text">' . $titulo . '</h3>
            </section>
            </header>
            <div class="parallax ">';

    $parallax_container .= '<img src="' . $image_url . '"width="100%" >
            </div>
        </div>';
    echo $parallax_container;
}

function cards_eventos_html()
{
    include("_cards_eventos.html");
}

function controller_cards_eventos_php()
{
    include("_controller_cards_eventos.php");
}

function home_sistio_sesion_html()
{
    include("_header_sitio_sesion.html");
}


?>