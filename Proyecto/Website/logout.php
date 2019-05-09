<?php
session_start();
session_unset();
session_destroy();
header("location:admin/_admin_vista.php");
echo '<script type="text/javascript">
	    window.location="https://www.marianasala.org/Website/admin/_admin_vista.php";
	    </script>';

?>