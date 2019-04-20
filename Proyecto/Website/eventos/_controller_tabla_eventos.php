<?php

/*
    Autor: Daniel Elias
        Este controlador genera la tabla que apareece en la sección de Eventos del sistema administrativo
        Esta tabla funciona con un pluggin de busqueda y de descarga de archivos de dataTables
*/

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../basesdedatos/_conection_queries_db.php");
require_once("./_util_eventos.php");//utilizó el util de eventos

$result = obtenerEventos(); // se hace el query que obtiene todos los eventos registrados
$query_table = "";//aquí iré guardando la tabla generada

if (mysqli_num_rows($result) > 0) { //reviso que el query fue exitoso si me dió como resultado más de un row o si existe al menos un evento registrado
    
    while ($row = mysqli_fetch_assoc($result)) {
        $row_date = explode('-', $row["fecha"]); //cambio el formato de la fecha
        $query_table .= "<tr>";
        $query_table .= '<td>' . $row["nombre"] . '</td>';
        $query_table .= "<td>" . $row_date[2] . "/" . $row_date[1] . "/" . $row_date[0] . "</td>"; //le da formato dd/mm/YYYY a la fecha
        $query_table .= "<td>" . $row["hora"] . " hrs. </td>";
        $query_table .= "<td>" . $row["lugar"] . "</td>";
        $query_table .= '<td style="display:none;">' . $row["imagen"] . '</td>'; //no quiero que este row aparezca en el front end pero si en excel y pdf de descarga
        $query_table .= '<td style="display:none;">' . $row["descripcion"] . '</td>';
        
        $query_table .= 
                    '<td>
                        <a class="modal-trigger" href="javascript:void(0);" onclick="mostrar_informacion_evento('.$row['id_evento'].')">
                            Mas información
                        </a></td>'; 
                        //esto lo hago con ajax, en caso de click mando llamar una funcion en el ajax_eventos.js y le mando el id, para saber de que row quiero más información
        
        $query_table .=
                    '<td>
                        <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable" href="javascript:void(0);" onclick="mostrar_editar_evento('.$row['id_evento'].')">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>'; 
                    //esto lo hago con ajax, en caso de click mando llamar una funcion en el ajax_eventos.js y le mando el id, para saber que row estoy editando
       
        $query_table .=
                    '<td>
                        <a class="btn btn-medium waves-effect waves-light red accent-3 hoverable" href="_controller_eliminar_evento.php?id=' . $row['id_evento'] . '">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>';
                    // a diferencia de los dos anteriores esto lo hago con sólo php, usando $_GET[], en caso de eliminar mando el id del row que quiero eliminar
                    //aquí específico a qué php estoy mandando llamar, a diferencia de las dos anteriores donde primero tengo que pasar por ajax_eventos.js
        
        $query_table .= "</tr>"; //cierro el row
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
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Lugar</th>
                                <th style="display:none;">Imagen</th>
                                <th style="display:none;">Descripcion</th>
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
                        
                        <div id="modal_informacion_evento_ajax">
                        
                        </div>
                        
                        <div id="modal_editar_evento_ajax">
                        
                        </div>
                          
                    </div>
            
                </div>
            
            </div><!--div del wrapper que empieza después del sidenav-->';

} else { 
    
    //Caso de Prueba:
    //En caso de que no se haya podido hacer el query o que no haya eventos registrados sólo sale un renglón con "Lo sentimos no encontramos eventos"
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