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
      <td><select id="tutor1" name="tutor" required>
          <option value="" disabled selected></option>';
      while($row = mysqli_fetch_assoc($result)){
        echo '
          <option value="'.$row['id_tutor'].'">'.$row['nombre'].' '.$row['apellido'].'</option>';
      }
      echo '</select></td>';
      echo '<td><a class="modal-trigger" href="#modal_informacion_tutor_1" id="info1">Más información</a></td>
      <td>
          <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small"
             href="#_form_editar_beneficiarios"><i class="material-icons">edit</i></a>
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
      <td><select id="tutor2" name="tutor">
          <option value="" disabled selected></option>';
      $result2 = getNombreTutor();
      while($row2 = mysqli_fetch_assoc($result2)){
        echo '
          <option value="'.$row2['id_tutor'].'">'.$row2['nombre'].' '.$row2['apellido'].'</option>';
      }
      echo '</select></td>';
      echo '<td><a class="modal-trigger" href="#modal_informacion_tutor_2" id="info2">Más información</a></td>
      <td>
          <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small"
             href="#_form_editar_beneficiarios"><i class="material-icons">edit</i></a>
      </td>
      <td>
          <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable small"
             href="#_form_eliminar_beneficiarios"><i class="material-icons">delete</i></a>
      </td>
    </tr>';


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
      $query_table .= '<td><a class="modal-trigger" href="#modal_informacion_beneficiarios_'.$row['id_beneficiario'].'" >Más información</a></td>';
      $query_table .= '<td>';
      $query_table .= '<a class="modal-trigger btn btn-medium waves-effect waves-light green accent-3 hoverable modal-trigger" onmouseover="genEstado('.$row['id_beneficiario'].')" ';
      $query_table .= 'href="#modal_estado_beneficiarios"><i class="material-icons">power_settings_new</i></a>';
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
    echo $query_table;

  } else { // si no hay eventos registrados en la tabla
      echo "<script>alert('No encontramos Beneficiarios registrados');</script>";
  }
}

function modalesBeneficiario($result){
  $today = new Datetime(date('y.m.d'));
  while($row = mysqli_fetch_assoc($result)){
    $fecha = new Datetime($row['fecha_nacimiento']);
    $diff = $today->diff($fecha);
    $row_date = explode('-', $row['fecha_nacimiento']);
    $estado = getEstadoById($row['id_beneficiario']);
    echo '<!-- Modal Structure -->
    <div id="modal_informacion_beneficiarios_'.$row['id_beneficiario'].'" class="modal modal-fixed-footer my_big_modal ">
    <div class="row my_modal_header_row">
        <div class="my_modal_header1">
            <div class="col s11 my_form_title">
                información beneficiario
                <i class="material-icons my_title_icon">accessibility_new</i>
            </div>

            <div class="col s1">
                <br>
                <a class="my_modal_buttons btn btn-medium waves-effect waves-light modal-close red accent-3 hoverable center"
                   style="font-size:2em;font-family: Roboto;">
                    ×
                </a>
            </div>
        </div>


    </div>
        <br><br><br>

        <div class="modal-content my_modal_content">

            <div class="row">
                <div class="col s3">
                    <p class="mi_titulo s6">ID Beneficiario:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['id_beneficiario'].'</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Nombre:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['nombre'].' '.$row['apellido'].'</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Fecha de Nacimiento</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row_date[2].'/'.$row_date[1].'/'.$row_date[0].'</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Edad:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$diff->y.' años</p>
                </div>
            </div>

            <div class="row">

                <div class="col s3">
                    <p class="mi_titulo s6">Sexo:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">';

      if($row['sexo'] == 'H'){
        echo 'Hombre';
      } else{
        echo 'Mujer';
      }
                  echo  '</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Estado:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">';
        if($estado == 1){
          echo 'Activo';
        } else{
          echo 'Inactivo';
        }


                echo '</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Status Economico:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['nivel_socioeconomico'].'</p>
                </div>

            </div>

            <div class="row">
                <div class="col s4">
                    <p class="mi_titulo s6">Grado Escolar:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['grado_escolar'].'</p>
                </div>

                <div class="col s4">
                    <p class="mi_titulo s6">Grupo:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['grupo'].'</p>
                </div>

                <div class="col s4">
                    <p class="mi_titulo s6">Domicilio:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['domicilio'].'</p>
                </div>
            </div>


            <div class="row">
                <div class="col s4">
                    <p class="mi_titulo s6">Nombre Escuela:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['nombre_escuela'].'</p>
                </div>

                <div class="col s5">
                    <p class="mi_titulo s6">Enfermedades y Alergias:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['enfermedades_alergias'].'</p>
                </div>

                <div class="col s2">
                    <p class="mi_titulo s6">Cuota:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['cuota'].'</p>
                </div>
            </div>

            <div class="row">

                <div class="col s12">
                    <p class="mi_titulo s6">Tutor:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Martín Sanchez</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6"><a class="modal-trigger" href="#_modal_informacion_tutor">Mas información</a>
                    </p>
                </div>

                <div class="col s12">
                    <p class="mi_titulo s6">Tutor:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Karla Suárez</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6"><a class="modal-trigger" href="#_modal_informacion_tutor">Mas información</a>
                    </p>
                </div>


            </div>
        </div>


    </div>
    </div>';
  }
}

/*function editarEstado(){
  $result = getIDsBen();
  $script = "<script type='text/javascript'>";
  while($row = mysqli_fetch_assoc($result)){
    $script .= '$(document).ready(function(){
          $("#formaEditarEstado_'.$row['id_beneficiario'].'").submit(function (ev){
              ev.preventDefault();
              var est=-1;

              if($("#palancaEstado_'.$row['id_beneficiario'].'").prop("checked")){
                est = 1;
              } else{
                est = 0;
              }
              console.log("estado = " + est);
              $.post("controladores/estadoController.php", { id : '.$row['id_beneficiario'].', estado : est } )
               .done(function(data){
                 console.log("Estado modificado");
                 alert("Estado del beneficiario modificado!");

                })
                .fail(function(){
                  alert("No se pudo modificar el estado");

                  console.log("Error");
                })
              });
            });';
        }
      $script .= '</script>';
      echo $script;
}*/

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
