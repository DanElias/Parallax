<?php

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

function modal_informacion_beneficiarios_html()
{
    include("_modal_informacion_beneficiarios.html");
}

/*function modal_informacion_tutor_html()
{
    include("_modal_informacion_tutor.html");
}*/

/*function imprimirnombreTutor($result){
  while($row = mysqli_fetch_assoc($result)){

    echo '<tr>
      <td>';
    echo $row['nombre'];
    echo '</td>
      <td><a class="modal-trigger" href="#_modal_informacion_tutor">Mas informacion</a></td>
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
}
*/
function imprimirnombreTutor($result){
  while($row = mysqli_fetch_assoc($result)){

    echo '<tr>
      <td>';
    echo $row['nombre'];
    echo '</td>
      <td><a class="modal-trigger" href="#_modal_informacion_tutor_'.$row['id_tutor'].'">Mas informacion</a></td>
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
}

function modalesTutores($result){
  while($row = mysqli_fetch_assoc($result)){
    echo '<!-- Modal Structure -->
    <div id="_modal_informacion_tutor_'.$row['id_tutor'].'" class="modal modal-fixed-footer my_modal ">
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
                    <p class="mi_parrafo s6">'.$row['nombre'].'</p>
                </div>

                <div class="col s12">
                    <p class="mi_titulo s6">Fecha de Nacimiento</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">'.$row['fecha_nacimiento'].'</p>
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
