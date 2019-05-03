<?php

require_once("_util_sitio.php");
session_start();

header_sitio_html();
_parallax("../images/f3.jpg", "¡Súmate a la Causa! ");
apoyanos_html();
footer_sitio_html();

?>