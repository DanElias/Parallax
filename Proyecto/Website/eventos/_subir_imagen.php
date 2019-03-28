<?php

require_once("../html_structures.php");

$error = '';
$info = '';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $info = "El archivo si es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error = "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $error = "Lo sentimos, el archivo ya se ha subido anteriormente, ya existe.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $error = "Lo sentimos, tu archivo es muy grande";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    $error = "Lo sentimos, sólo puedes subir archivos JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error .= "<br> Lo sentimos, tu archivo no pudo ser subido. ";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $info .= "<br> El archivo: " . basename($_FILES["fileToUpload"]["name"]) . " se ha subido exitosamente";
    } else {
        $error = "<br> Lo sentimos, ocurrió un error al subir tu archivo, vuelve a intentarlo más tarde.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 1) {
    _header();
    _form_sesion();
    _simple_white_section("¡SE HA SUBIDO LA IMAGEN!", $info . "<br> A continuación se muestra tu imagen: ");
    _parallax_simple($target_file);
    _footer();
} else {
    include("index.php");
}

?>