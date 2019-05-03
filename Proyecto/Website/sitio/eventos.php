<?php

require_once("_util_sitio.php");
session_start();

header_sitio_html();

_parallax("../images/f1.jpg", "Eventos <i class='material-icons large'>calendar_today</i> ");

controller_cards_eventos_php();

footer_sitio_html();

?>