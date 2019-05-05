<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../basesdedatos/_conection_queries_db.php");
//require_once("./_util_eventos.php");

$result = obtenerEgresos();
$query_table = "";

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {

        $query_table .= "<tr>";
        $query_table .= '<td>' . $row["folio_factura"] . '</td>';
        $query_table .= '<td>' . $row["concepto"] . '</td>';
        $query_table .= '<td>' . $row["importe"] . '</td>';
        $query_table .= '<td>' . $row["fecha"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["observaciones"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["cuenta_bancaria"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["rfc"] . '</td>'; 
        //$query_table .= '<td style="display:none;">' . $row["id_cuentacontable"] . '</td>'; 
        $query_table .= '<td>
                            <a class="modal-trigger" href="javascript:void(0);"                       
                                onclick="mostrar_informacion_egreso(\''.$row['folio_factura'].'\')">Mas información
                            </a>
                        </td>';
        $query_table .=
            '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable" href="javascript:void(0);" onclick="mostrar_editar_egreso(\''.$row['folio_factura'].'\',\''.$row['rfc'].'\',\''.$row['id_cuentacontable'].'\')">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>';
        $query_table .= '<td>
                        <a class="btn btn-medium waves-effect waves-light red accent-3 hoverable" href="_eliminar_egreso.php?id=' . $row['folio_factura'] . '">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>';
        $query_table .= "</tr>";
    }

    echo '
        <div class="wrapper">
             
                    <div class="table-wrapper responsive-table new_data_table">
                        
                        <table class="stripped highlight responsive-table data_table fixed_header" id="my_pagination_table">
                            <thead>

                            <tr class="my_table_headers">
                                <th>Folio</th>
                                <th>Concepto</th>
                                <th>Importe</th>
                                <th>Fecha</th>
                                <th style="display:none;">Observaciones</th>
                                <th style="display:none;">Cuenta Bancaria</th>
                                <th style="display:none;">RFC</th>
                                <th class="no_mostrar">Más Información</th>
                                <th class="no_mostrar">Editar</th>
                                <th class="no_mostrar">Eliminar</th>
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
                        
                        <div id="modal_informacion_egreso_ajax"></div>  
                        
                        <div id="modal_editar_egreso_ajax"></div>
                          
                    </div>
            
                
            
            </div><!--div del wrapper que empieza después del sidenav-->';

} else { // si no hay eventos registrados en la tabla
     echo ' <div class="wrapper">
                <div class="section white  my_section">
                    <div class="table-wrapper responsive-table new_data_table">
                    
                        <table class="stripped highlight responsive-table data_table fixed_header" >
                            <thead>
                            <tr class="my_table_headers">
                                <th> &nbsp; &nbsp; Lo sentimos, no encontramos eventos.</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
        </div><!--div del wrapper que empieza después del sidenav-->';
}


?>