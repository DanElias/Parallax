<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../basesdedatos/_conection_queries_db.php");

$result = obtenerCuentas();
$query_table = "";

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {
        $query_table .= "<tr>";
        $query_table .= '<td style="display:none;">' . $row["id_cuentacontable"] . '</td>';
        $query_table .= "<td>" . $row["nombre"] . "</td>";
        $query_table .= "<td>" . $row["descripcion"] . "</td>";
        $query_table .= '<td><a class="modal-trigger" href="javascript:void(0);" onclick="mostrar_informacion_cuenta('.$row['id_cuentacontable'].')">Mas información</a></td>';
        $query_table .=
            '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable" href="javascript:void(0);" onclick="mostrar_editar_cuenta('.$row['id_cuentacontable'].')">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>';
        $query_table .=
            '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable" href="_eliminar_cuenta_contable.php?id='.$row['id_cuentacontable'].'">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>';
        $query_table .= "</tr>";
    }

    echo '
        <div class="wrapper">
             <div class="section white  my_section">
                    <div class="table-wrapper responsive-table new_data_table">
                        <table class="stripped highlight responsive-table data_table fixed_header" id="my_pagination_table">
                            <thead>
                            <tr class="my_table_headers">
                                <th style="display:none;">ID Cuenta Contable</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Más Información</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
    
                            <tbody>'
                                . $query_table .
                                '</tbody>
                        </table>
                        
                         <div class="col-md-12 center text-center">
                            <br>
                            <ul class="pagination pager" id="myPager"></ul>
                            <br>
                    	    <span class="left" id="total_reg"></span>
                        </div>
                        
                        <div id="modal_informacion_cuenta_ajax">
                        
                        </div>
                        
                        <div id="modal_editar_cuenta_ajax">
                        
                        </div>
                        
                    </div>
                </div>
            </div><!--div del wrapper que empieza después del sidenav-->';

} else { // si no hay eventos registrados en la tabla
    echo "No encontramos eventos registrados";
}

?>