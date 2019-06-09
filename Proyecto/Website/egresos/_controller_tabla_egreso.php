<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../basesdedatos/_conection_queries_db.php");
//require_once("./_util_eventos.php");
//session_start();
$result = obtenerEgresos();
$query_table = "";


 //obtener el drop de proveedor y seleccionar el del egreso
  $proveedores = obtenerProveedor();
  $drop_proveedores = "<div class='input-field col s3'><select required name='rfc' id='selected_proveedor' onchange='validar_drop_proveedorR()'><option value='0'>Selecciona el proveedor</option>";
   
  if(mysqli_num_rows($proveedores)>0){
        while($row = mysqli_fetch_assoc($proveedores)){
            $drop_proveedores.="<option value='".$row['rfc']."'>".$row['razon_social']."</option>"; 
        }
  }
  
  $drop_proveedores.="</select><label for='selected_proveedor' style='font-size:0.8em'>Proveedor</label><span id='error_proveedor_egreso'></span></div>";
  $_SESSION["drop_proveedores"] = $drop_proveedores;
  //echo $drop_proveedores;
  
  //obtener el drop de cuenta contable y seleccionar el del egresp
  $cuenta = obtenerCuentas();
  $drop_cuenta ="<div class='input-field col s3'><select required name='id_cuentacontable' id='selected_cuenta' onchange='validar_drop_cuentaR()'><option value='0'>Selecciona la cuenta contable</option>";
  if(mysqli_num_rows($cuenta)>0){
        while($row = mysqli_fetch_assoc($cuenta)){
            $drop_cuenta.="<option value='".$row['id_cuentacontable']."'>".$row['nombre']."</option>" ;  
        }
   }

  $drop_cuenta.="</select><label style= 'font-size:0.8em'>Cuenta contable</label><span id='error_cuenta_egreso'></span></div>";
  $_SESSION["drop_cuenta"] = $drop_cuenta;

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
                                onclick="mostrar_informacion_egreso(\''.$row['id_egreso'].'\')">Mas información
                            </a>
                        </td>';
        $query_table .=
            '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable" href="javascript:void(0);" onclick="mostrar_editar_egreso(\''.$row['id_egreso'].'\')" id="edit_button">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>';
        $query_table .= '<td>
                       <a class="btn btn-medium waves-effect waves-light red accent-3 hoverable"  href="_controller_eliminar_egreso.php?id_egreso='.$row['id_egreso'].'">
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

} else { 
     echo ' <div class="wrapper">
                <div class="section white  my_section">
                    <div class="table-wrapper responsive-table new_data_table">
                    
                        <table class="stripped highlight responsive-table data_table fixed_header" >
                            <thead>
                            <tr class="my_table_headers">
                                <th> &nbsp; &nbsp; Lo sentimos, no encontramos egresos.</th>
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