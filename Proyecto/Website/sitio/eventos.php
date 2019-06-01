<?php

require_once("_util_sitio.php");
session_start();

header_sitio_html();

_parallax("../images/f6.jpg", "Nuestros Eventos <i class='material-icons medium'>calendar_today</i> ");

controller_cards_eventos_php();

footer_sitio_html();

?>