<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("_conection_queries_db.php");
require_once("html_structures.php");

$result = obtenerEventos();
$query_table;
$query_table = '<div class="responsive-table table-status-sheet">';
$query_table .= '<table class="my_table2">';
$query_table .= '<tr><th>ID Evento</th> <th>Nombre Evento</th> <th>Fecha Evento</th> <th>Hora Evento</th> <th>Lugar Evento</th> <th> Descripcion Evento</th> </tr>';

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {
        $row_date = explode('-', $row["fecha_evento"]);
        $query_table .= "<tr>";
        $query_table .= "<td>" . $row["id_evento"] . "</td>";
        $query_table .= "<td>" . $row["nombre_evento"] . "</td>";
        $query_table .= "<td>" . $row_date[2] . "/" . $row_date[1] . "/" . $row_date[0] . "</td>"; //le da formato dd/mm/YYYY a la fecha -> UX
        $query_table .= "<td>" . $row["hora_evento"] . " hrs. </td>";
        $query_table .= "<td>" . $row["lugar_evento"] . "</td>";
        $query_table .= "<td>" . $row["descripcion_evento"] . "</td>";
        $query_table .= "</tr>";
    }

    $query_table .= '</table>';
    $query_table .= '</div>';
    _header();
    _simple_white_section_table("!Estos son los eventos encontrados!", $query_table);
    _footer();
} else { // si no hay eventos registrados en la tabla
    _header();
    _simple_white_section_table("No encontramos eventos registrados :(", "");
    _footer();
}

?>