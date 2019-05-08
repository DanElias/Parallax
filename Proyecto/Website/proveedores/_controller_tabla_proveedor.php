<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../basesdedatos/_conection_queries_db.php");
//require_once("./_util_eventos.php");

$result = obtenerProveedor();
$query_table = "";

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {

        $query_table .= "<tr>";
        $query_table .= '<td>' . $row["rfc"] . '</td>';
        $query_table .= '<td>' . $row["alias"] . '</td>';
        $query_table .= '<td>' . $row["telefono_contacto"] . '</td>';
        $query_table .= '<td>' . $row["cuenta_bancaria"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["razon_social"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["nombre_contacto"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["banco"] . '</td>'; 
        $query_table .= '<td>
                            <a class="modal-trigger" href="javascript:void(0);"                       
                                onclick="mostrar_informacion_proveedor(\''.$row['rfc'].'\')">Mas información
                            </a>
                        </td>';
        $query_table .=
            '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable" href="javascript:void(0);" onclick="mostrar_editar_proveedor(\''.$row['rfc'].'\')">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>';
        $query_table .= '<td>
        
        		<script language="JavaScript1.2" type="text/javascript"> 
                                                    function eliminar () 
                                                    { 
                                                        var statusConfirm = confirm("¿Realmente desea eliminar esto?"); 
                                                        if (statusConfirm == true) 
                                                        { 
                                                            window.location="_eliminar_proveedor.php?id='.$row['rfc'].'";
                                                        } 
                                                        else 
                                                        { 
                                                         
                                                        } 
                            } 
                        </script> 
                        <a class="btn btn-medium waves-effect waves-light red accent-3 hoverable"  href = "javascript:eliminar()" href="_eliminar_proveedor.php?id=' . $row['rfc'] . '">
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
                                <th>RFC</th>
                                <th>Alias</th>
                                <th>Teléfono</th>
                                <th>Cuenta bancaria</th>
                                <th style="display:none;">Razon Social</th>
                                <th style="display:none;">Nombre Contacto</th>
                                <th style="display:none;">Banco</th>
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
                        
                        <div id="modal_informacion_proveedor_ajax">
                        
                        </div>
                        
                        <div id="modal_editar_proveedor_ajax">
                        
                        </div>
                          
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