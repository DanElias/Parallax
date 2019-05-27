<?php
require_once('../basesdedatos/_conection_queries_db.php');

function header_html($titulo = "Beneficiarios")
{
    include("../views/_header_admin.html");
}

function sidenav_html()
{
    include("../views/_sidenav_admin.html");
}

function footer_html()
{
    include("../views/_footer_admin.html");
}

function beneficiarios_html()
{
    include("beneficiarios.html");
}

function form_beneficiarios_html()
{
    include("_form_beneficiarios.html");
}

function form_editar_beneficiario_html(){
    include('_form_editar_beneficiarios.html');
}

function form_eliminar_beneficiarios_html()
{
    include("_form_eliminar_beneficiarios.html");
}

function form_estado_beneficiarios_html()
{
    include("_form_estado_beneficiarios.html");
}

function form_tutor_html()
{
    include("_form_tutor.html");
}

function form_editar_tutor_html()
{
    include("_form_editar_tutor.html");
}

function form_editar_tutor_html2()
{
    include("_form_editar_tutor_2.html");
}

function form_eliminar_tutor_html()
{
    include("_form_eliminar_tutor.html");
}

function form_eliminar_tutor_html2()
{
    include("_form_eliminar_tutor_2.html");
}

function imprimirnombreTutor($result){

    //_'.$row['id_tutor'].'
    echo '<tr>
      <td><label>
        <input type="checkbox" class="filled-in center-align" id="benTut1" checked disabled/>
        <span></span>
      </label></td>
      <td><select id="parentesco1" name="parentesco" required>
          <option value="" disabled selected></option>
          <option value="Padre">Padre</option>
          <option value="Madre">Madre</option>
          <option value="Tutor">Tutor</option>
      </select></td>;
      <td><select id="tutor1" name="tutor1" required>';
          /*<option value="" disabled selected></option>';
      while($row = mysqli_fetch_assoc($result)){
        echo '
          <option value="'.$row['id_tutor'].'">'.$row['nombre'].' '.$row['apellido'].'</option>';
      }*/
      echo '</select></td>';
      echo '<td><a class="modal-trigger" href="#modal_informacion_tutor_1" id="info1">Más información</a></td>
      <td>
          <a href="#_form_editar_tutor" class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small" id="botonEditarTutor1"><i class="material-icons">edit</i></a>
      </td>
      <td>
          <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable small"
             href="#_form_eliminar_beneficiarios"><i class="material-icons">delete</i></a>
      </td>
    </tr>';
    echo '<tr>
      <td><label>
        <input type="checkbox" class="filled-in center-align" id="benTut2" />
        <span></span>
      </label></td>
      <td><select id="parentesco2" name="parentesco" >
          <option value="" disabled selected></option>
          <option value="Padre">Padre</option>
          <option value="Madre">Madre</option>
          <option value="Tutor">Tutor</option>
      </select></td>;
      <td><select id="tutor2" name="tutor2">';
          /*<option value="" disabled selected></option>';
      $result2 = getNombreTutor();
      while($row2 = mysqli_fetch_assoc($result2)){
        echo '
          <option value="'.$row2['id_tutor'].'">'.$row2['nombre'].' '.$row2['apellido'].'</option>';
      }*/
      echo '</select></td>';
      echo '<td><a class="modal-trigger" href="#modal_informacion_tutor_2" id="info2">Más información</a></td>
      <td>
          <a href="#_form_editar_tutor" class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small" id="botonEditarTutor2"><i class="material-icons">edit</i></a>
      </td>
      <td>
          <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable small" href="#_form_eliminar_beneficiarios"><i class="material-icons">delete</i></a>
      </td>
    </tr>';


}

function ben_html(){
  echo '<div class="wrapper"><br><br><br>

      <div class="" id="beneficiarioshtml">

              <div class="row">
                  <div class="col s12 m6">
                      <div class="header my_heading_text" style="padding-left:0.5em;">Beneficiarios<i class="material-icons my_title_icon">accessibility_new</i>
                      </div>
                  </div>

                  <div class="col s12 m6">
                      <!-- Modal Trigger -->
                      <div class="my_add_button_container responsive">
                          <a class="waves-effect waves-light btn modal-trigger blue darken-2 hoverable tooltipped"
                             data-position="bottom" data-tooltip="Aquí puedes agregar un beneficiario"
                             href="#_form_beneficiarios">Agregar Beneficiario<i
                                  class="material-icons right">person_add</i></a>
                      </div>
                  </div>
              </div>


              <!--div style="padding-left:3em;">
                  <label for="botonActivos">
                    <input type="checkbox" class="filled-in" checked="checked" id="botonActivos" name="botonActivos" />
                    <span>Mostrar sólo beneficiarios activos</span>
                  </label>
              </div-->


              <div class="row">
                  <form class="my_search">
                      <!--div class="row my_search valign">
                          <div class="input-field col s4 my_search tooltipped" data-position="bottom"
                               data-tooltip="Aquí puedes realizar una búsqueda de acuerdo a la palabra introducida y a las casillas de los filtros de búsqueda seleccionados">
                              <i class="material-icons prefix my_search">search</i>
                              <input id="icon_prefix" type="text" class="validate my_search">
                              <label for="icon_prefix" class="my_search">Introduce una palabra clave</label>
                          </div>

                          <div class="input-field col s2">
                              <a class="btn btn-medium waves-effect waves-light deep-purple hoverable">Buscar</a>
                          </div>
                      </div-->
                  </form>
              </div>



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
                      <tbody id="cuerpoTablaBeneficiarios">';
                      tablaBeneficiario(getInfoBeneficiarios());
            echo'
                      </tbody>
                  </table>

                   <div class="col-md-12 center text-center" id="paginator">
                      <br>
                      <ul class="pagination pager" id="myPager"></ul>
                      <br>
                    <span class="left" id="total_reg"></span>
                  </div>
                  <span id="modBen"></span><span id="modEst"></span><span id="todosTutores"></span>
              </div>
  </div><!--div del wrapper que empieza después del sidenav-->';

}


function tablaBeneficiario($result){
  $query_table = "";
  $today = new Datetime(date('y.m.d'));
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
      $fecha = new Datetime($row['fecha_nacimiento']);
      $diff = $today->diff($fecha);
      $query_table .= "<tr>";
      $query_table .= '<td class="first_col_data_table">'.$row['id_beneficiario'].'</td>';
      $query_table .= '<td>'.$row['nombre'].' '.$row['apellido_paterno'].' '.$row['apellido_materno'].'</td>';
      $query_table .= '<td>'.$diff->y.' años</td>';
      $query_table .= '<td style="display:none;">' . $row["fecha_nacimiento"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["sexo"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["grado_escolar"] . '</td>';
      $query_table .= '<td style="display:none;">'.$row["calle"].' '.$row["numero_calle"].', Col. '.$row["colonia"].'</td>';
      $query_table .= '<td style="display:none;">' . $row["nivel_socioeconomico"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["nombre_escuela"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["enfermedades_alergias"] . '</td>';
      $query_table .= '<td style="display:none;">' . $row["cuota"] . '</td>';
      $query_table .= '<td>'.$row['grupo'].'</td>';
      $query_table .= '<td><a class="modal-trigger" href="#modal_informacion_beneficiarios_'.$row['id_beneficiario'].'" >Más información</a></td>';
      $query_table .= '<td>';
      if($row['estado'] == 1){
          $query_table .= '<a class="modal-trigger btn btn-medium waves-effect waves-light green accent-3 hoverable modal-trigger" onmouseover="genEstado('.$row['id_beneficiario'].')" ';
      } else{
          $query_table .= '<a class="modal-trigger btn btn-medium waves-effect waves-light grey accent-3 hoverable modal-trigger" onmouseover="genEstado('.$row['id_beneficiario'].')" ';
      }
      //$query_table .= '<a class="modal-trigger btn btn-medium waves-effect waves-light gray accent-3 hoverable modal-trigger" onmouseover="genEstado('.$row['id_beneficiario'].')" ';
      $query_table .= 'href="#modal_estado_beneficiarios"><i class="material-icons">power_settings_new</i></a>';
      $query_table .= '</td>';
      $query_table .= '<td>';
      $query_table .= '<a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable"';
      $query_table .= 'href="#_form_editar_beneficiarios" onmouseover=llenarEdit('.$row['id_beneficiario'].')><i class="material-icons">edit</i></a>';
      $query_table .= '</td>';
      $query_table .= '<td>';
      $query_table .= '<a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable"';
      $query_table .= 'href="#_form_eliminar_beneficiarios" onmouseover=genBorrarBen('.$row['id_beneficiario'].')><i class="material-icons">delete</i></a>';
      $query_table .= '</td>';
      $query_table .= '</tr>';
    }
    echo $query_table;

  } else { // si no hay eventos registrados en la tabla
      echo "<script>alert('No encontramos Beneficiarios registrados');</script>";
  }
}

function estado(){
    include('modales_estado_beneficiario.html');
}

function modalesTutores($result){
  while($row = mysqli_fetch_assoc($result)){
    $row_date = explode('-', $row['fecha_nacimiento']);
    echo '<!-- Modal Structure -->
    <div id="modal_informacion_tutor_'.$row['id_tutor'].'" class="modal modal-fixed-footer my_modal ">
        <div class="row my_modal_header_row">
            <div class="my_modal_header_tutor z-depth-2 col s12">
                <h4 class="my_modal_header ">Informacion Tutor</h4>
            </div>
        </div>
        <br><br><br>

        <div class="modal-content my_modal_content">

            <div class="row">

                <div class="col s12">
                    <p class="mi_titulo s6">ID:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['id_tutor'].'</p>
                </div>
                <div class="col s12">
                    <p class="mi_titulo s6">Nombre:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['nombre'].' '.$row['apellido'].'</p>
                </div>

                <div class="col s12">
                    <p class="mi_titulo s6">Fecha de Nacimiento</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row_date[2].'/'.$row_date[1].'/'.$row_date[0].'</p>
                </div>

                <div class="col s12">
                    <p class="mi_titulo s6">Telefono:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['telefono'].'</p>
                </div>

                <div class="col s12">
                    <p class="mi_titulo s6">Ocupacion:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['ocupacion'].'</p>
                </div>

                <div class="col s12">
                    <p class="mi_titulo s6">Nombre Empresa:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['nombre_empresa'].'</p>
                </div>

                <div class="col s12">
                    <p class="mi_titulo s6">Grado Estudios:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['grado_estudio'].'</p>
                </div>

                <div class="col s12">
                    <p class="mi_titulo s6">Titulo Obtenido:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['titulo_obtenido'].'</p>
                </div>
            </div>


        </div>
    </div>';
  }
}
?>
