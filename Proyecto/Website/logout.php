<?php
session_start();
session_unset();
session_destroy();
header("location:admin/_admin_vista.php");

?>