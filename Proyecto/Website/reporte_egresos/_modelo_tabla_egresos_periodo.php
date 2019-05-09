<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../basesdedatos/_conection_queries_db.php");

$_POST['fecha_inicial']=htmlentities($_POST['fecha_inicial']);
$_POST['fecha_final']=htmlentities($_POST['fecha_final']);

$result = obtenerEgresosPeriodo($_POST['fecha_inicial'], $_POST['fecha_final']);

$query_table = "";

if (mysqli_num_rows($result) > 0){
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {
        $row_date = explode('-', $row["fecha"]);
        $query_table .= "<tr>";
        $query_table .= '<td>' . $row["folio_factura"] . '</td>';
        $query_table .= "<td>" . $row["importe"] . "</td>";
        $query_table .= "<td>" . $row_date[2] . "/" . $row_date[1] . "/" . $row_date[0] . "</td>"; //le da formato dd/mm/YYYY a la fecha -> UX
        $query_table .= '<td style="display:none;">' . $row["concepto"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["cuenta_bancaria"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["observaciones"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["rfc"] . '</td>';
        $query_table .= '<td style="display:none;">' . $row["id_cuentacontable"] . '</td>';
        $query_table .= '<td><a class="modal-trigger" onclick="mostrar_informacion_egreso('.$row['folio_factura'].')">Mas información</a></td>';
        $query_table .= "</tr>";
    }

    echo '
        <div class="wrapper">
             <div class="section white  my_section">
                
                
                <br>
                
                <div class="row">
                
                <div class=" col s12 m5 grey-text text-darken-2" style="font-size:1.3em; padding-left:2.5em;">
                    A continuación se muestra su reporte:
                </div>
                
                    <div class="col s12 m3 left">
                        <!-- Modal Trigger -->
                        <a class="waves-effect waves-light btn modal-trigger blue darken-2"
                        data-position="bottom" href="#_grafica_proveedor_periodo">
                            Gráfica Proveedores
                            <i class="material-icons right large">group</i>
                        </a>
                    </div>
                    
                    <div class="col s12 m4 left">
                        <!-- Modal Trigger -->
                        <a class="waves-effect waves-light btn modal-trigger blue darken-2"
                           data-position="bottom" href="#_grafica_cuenta_periodo">
                            Gráfica Cuentas contables
                            <i class="material-icons right center">receipt</i>
                        </a>
                    </div>
                </div>    
                
                
                    <div class="table-wrapper responsive-table new_data_table">
                        <table class="stripped highlight responsive-table data_table fixed_header" id="my_pagination_table">
                            <thead>
                            <tr class="my_table_headers">
                                <th>Folio Factura</th>
                                <th>Importe</th>
                                <th>Fecha</th>
                                <th style="display:none;">Concepto</th>
                                <th style="display:none;">Cuenta Bancaria</th>
                                <th style="display:none;">Observaciones</th>
                                <th style="display:none;">RFC Proveedor</th>
                                <th style="display:none;">ID Cuenta Contable</th>
                                <th>Más Información</th>
                            </tr>
                            </thead>
    
                            <tbody>'
                                . $query_table .
                                '</tbody>
                        </table>
                        
                        <div id="modal_informacion_egreso_ajax">
                        
                        </div>
                        
                         <div class="col-md-12 center text-center">
                            <br>
                            <ul class="pagination pager" id="myPager"></ul>
                            <br>
                    	    <span class="left" id="total_reg"></span>
                        </div>
                        
                    </div>
                </div>
            </div><!--div del wrapper que empieza después del sidenav-->';

} else { 
    //Caso de Prueba:
    //En caso de que las fechas no coincidan con ningún egreso registrado
     echo ' <div class="wrapper">
                    <div class="table-wrapper responsive-table new_data_table">
                    
                        <table class="stripped highlight responsive-table data_table fixed_header" >
                            <thead>
                            <tr class="my_table_headers">
                                <th> &nbsp; &nbsp; Lo sentimos, no encontramos egresos que pertenezcan al periodo de tiempo dado.</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        
                    </div>
        </div><!--div del wrapper que empieza después del sidenav-->';
}

?>