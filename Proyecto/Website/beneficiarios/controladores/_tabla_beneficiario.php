<?php
// en este php mando llamar mis funciones de query y conexiones con la base de datos
  require_once("../basesdedatos/_conection_queries_db.php");

  $result = getInfoBeneficiarios();
  $query_table = "";
  /*Textos completos
id_beneficiario
nombre
apellido
estado
fecha_nacimiento
sexo
grado_escolar
grupo
domicilio
nivel_socioeconomico
nombre_escuela
enfermedades_alergias
cuota*/
  $today = new Datetime(date('y.m.d'));
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
      $fecha = new Datetime($row['fecha_nacimiento']);
      $diff = $today->diff($fecha);
      $query_table .= "<tr>";
      $query_table .= '<td class="first_col_data_table">'.$row['id_beneficiario'].'</td>';
      $query_table .= '<td>'.$row['nombre'].' '.$row['apellido'].'</td>';
      $query_table .= '<td>'.$diff->y.' años</td>';
      $query_table .= '<td style="display:none;">' . $row["fecha_nacimiento"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["sexo"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["grado_escolar"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["domicilio"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["nivel_socioeconomico"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["nombre_escuela"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["enfermedades_alergias"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["cuota"] . '</td>';
      $query_table .= '<td>'.$row['grupo'].'</td>';
      $query_table .= '<td><a class="modal-trigger" href="#_modal_informacion_beneficiarios_'.$row['id_beneficiario'].'">Más información</a></td>';
      $query_table .= '<td>';
      $query_table .= '<a class="btn btn-medium waves-effect waves-light modal-trigger green accent-3 hoverable"';
      $query_table .= 'href="#_form_estado_beneficiarios"><i class="material-icons">power_settings_new</i></a>';
      $query_table .= '</td>';
      $query_table .= '<td>';
      $query_table .= '<a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable"';
      $query_table .= 'href="#_form_editar_beneficiarios"><i class="material-icons">edit</i></a>';
      $query_table .= '</td>';
      $query_table .= '<td>';
      $query_table .= '<a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable"';
      $query_table .= 'href="#_form_eliminar_beneficiarios"><i class="material-icons">delete</i></a>';
      $query_table .= '</td>';
      $query_table .= '</tr>';
    }
  
  echo '
                      <div class="table-wrapper responsive-table new_data_table">
                          <table class="stripped highlight responsive-table data_table fixed_header" id="my_pagination_table">
                              <thead>
                              <tr class="my_table_headers">
                                <th class="first_col_data_table">ID</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th style="display:none;">Fecha Nacimiento</th>
                                <th style="display:none;">Sexo</th>
                                <th style="display:none;">Grado Escolar</th>
                                <th style="display:none;">Domicilio</th>
                                <th style="display:none;">Nivel Socioeconómico</th>
                                <th style="display:none;">Escuela</th>
                                <th style="display:none;">Enfermedades y alergias</th>
                                <th style="display:none;">Cuota</th>
                                <th>Grupo</th>
                                <th>Más Información</th>
                                <th>Estado</th>
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

                      </div>
                  </div>
              </div><!--div del wrapper que empieza después del sidenav-->';

  } else { // si no hay eventos registrados en la tabla
      echo "No encontramos Beneficiarios registrados";
  }
?>
