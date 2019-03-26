<?php

    require_once("_util_sitio.php");
    
    header_sitio_html();
    
    _parallax("../images/eventos_header.jpg","Eventos");
     
    controller_cards_eventos_php();

    footer_sitio_html();
    
?>