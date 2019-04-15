<?php

require_once("_util_sitio.php");

header_sitio_html();

_parallax("../images/f1.jpg", "Eventos");

controller_cards_eventos_php();

footer_sitio_html();

?>