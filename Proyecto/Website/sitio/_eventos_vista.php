<?php

    require_once("_util_sitio.php");
    
    header_sitio_html();
    
     _parallax("../images/eventos_header.jpg","Eventos");
     
     cards_eventos_html();

    footer_sitio_html();
    
?>