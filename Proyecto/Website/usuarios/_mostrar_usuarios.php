<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../basesdedatos/_conection_queries_db.php");

$result=obtenerEventos();
$query_table="";

if(mysqli_num_rows($result)>0){
    //output data of each row;
    while($row = mysqli_fetch_assoc($result)){
        $row_date=explode('-',$row["fecha"]);
        $query_table.="<tr>";
        $query_table.='<td>'.$row["nombre"].'</td>';
        $query_table.="<td>". $row_date[2]."/".$row_date[1]."/".$row_date[0]."</td>"; //le da formato dd/mm/YYYY a la fecha -> UX
        $query_table.="<td>".$row["hora"]." hrs. </td>";
        $query_table.="<td>".$row["lugar"]."</td>";
        $query_table.="<td>".$row["descripcion"]."</td>";
        $query_table.='<td><a class="modal-trigger" href="_controller_modal_mas_informacion_evento.php?id='.$row['id_evento'].'">Mas información</a></td>';
        $query_table.=
            '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable" href="_eventos_editar_form.php?id='.$row['id_evento'].'">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>';
        $query_table.=
            '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable" href="_eliminar_evento.php?id='.$row['id_evento'].'">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>';
        $query_table.="</tr>";
    }

    echo '
        <div class="wrapper">
             <div class="section white  my_section">
                    <div class="table-wrapper responsive-table new_data_table">
                        <table class="stripped highlight responsive-table data_table fixed_header">
                            <thead>
                            <tr class="my_table_headers">
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Más Información</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
    
                            <tbody>'
        . $query_table.
        '</tbody>
                        </table>
                    </div>
            
                </div>
            
            </div><!--div del wrapper que empieza después del sidenav-->';

}
else{ // si no hay eventos registrados en la tabla
    echo "No encontramos eventos registrados";
}

?>