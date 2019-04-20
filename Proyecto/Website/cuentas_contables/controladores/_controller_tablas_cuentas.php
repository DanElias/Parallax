<?php

/*
    Autor: Daniel Elias
        Este controlador genera la tabla que apareece en la sección de Cuentas Contables del sistema administrativo
        Esta tabla funciona con un pluggin de busqueda y de descarga de archivos de dataTables
*/

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../basesdedatos/_conection_queries_db.php");

$session_start();

$result = obtenerCuentas();// se hace el query que obtiene todas las cuentas registradas
$query_table = "";//aquí iré guardando la tabla generada

if (mysqli_num_rows($result) > 0) {//reviso que el query fue exitoso si me dió como resultado más de un row o si existe al menos una cuenta registrada

    while ($row = mysqli_fetch_assoc($result)) {
        $query_table .= "<tr>";
        $query_table .= '<td style="display:none;">' . $row["id_cuentacontable"] . '</td>';
        $query_table .= "<td>" . $row["nombre"] . "</td>";
        $query_table .= "<td>" . $row["descripcion"] . "</td>";
        $query_table .= 
                    '<td>
                        <a class="modal-trigger" href="javascript:void(0);" onclick="mostrar_informacion_cuenta('.$row['id_cuentacontable'].')">
                            Mas información
                        </a>
                    </td>';
                    //esto lo hago con ajax, en caso de click mando llamar una funcion en el ajax_cuentas_contables.js y le mando el id, para saber de que row quiero más información
        
        $query_table .=
                    '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable" href="javascript:void(0);" onclick="mostrar_editar_cuenta('.$row['id_cuentacontable'].')">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>';
                    //esto lo hago con ajax, en caso de click mando llamar una funcion en el ajax_cuentas_contables.js y le mando el id, para saber que row estoy editando
                    
        $query_table .=
                    '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable" href="_controller_eliminar_cuenta.php?id='.$row['id_cuentacontable'].'">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>';
                    // a diferencia de los dos anteriores esto lo hago con sólo php, usando $_GET[], en caso de eliminar mando el id del row que quiero eliminar
                    //aquí específico a qué php estoy mandando llamar, a diferencia de las dos anteriores donde primero tengo que pasar por ajax_cuentas_contables.js
                    
        $query_table .= "</tr>";//cierro el row
    }

    //esto es la tabla en sí, recordemos que la clase wrapper es para que se mueva al lado del sidenav
    //las columnas que no quiero que aparezcan en el front end les pongo display: none, si se verán en el pdf y excel
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

} else {
    //Caso de Prueba:
    //En caso de que no se haya podido hacer el query o que no haya cuentas registradas sólo sale un renglón con "Lo sentimos no encontramos cuentas contables registradas"
    echo ' <div class="wrapper">
        <div class="section white  my_section">
            <div class="table-wrapper responsive-table new_data_table">
            
                <table class="stripped highlight responsive-table data_table fixed_header" >
                    <thead>
                    <tr class="my_table_headers">
                        <th> &nbsp; &nbsp; Lo sentimos, no encontramos cuentas contables registradas.</th>
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