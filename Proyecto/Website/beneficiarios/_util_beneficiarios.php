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

function imprimirnombreTutor($result){
  while($row = mysqli_fetch_assoc($result)){

    echo '<tr>
      <td>';
    echo $row['nombre'].' '.$row['apellido'];
    echo '</td>
      <td><a class="modal-trigger" href="#_modal_informacion_tutor_'.$row['id_tutor'].'">Más información</a></td>
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

function tablaBeneficiario(){
  include('controladores/_tabla_beneficiario.php');
}

function modalesBeneficiario($result){
  while($row = mysqli_fetch_assoc($result)){
    echo '<!-- Modal Structure -->
    <div id="_modal_informacion_beneficiarios_'.$row['id_beneficiario'].'" class="modal modal-fixed-footer my_big_modal ">
        <div class="row my_modal_header_row">

            <div class="my_modal_header1 z-depth-2 col s12">
                <h4 class="my_modal_header">Información Beneficiario</h4>

            </div>

        </div>
        <br><br><br>

        <div class="modal-content my_modal_content">

            <div class="row">
                <div class="col s3">
                    <p class="mi_titulo s6">ID Beneficiario:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">319</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Nombre:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Carlos Sánchez</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Fecha de Nacimiento</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">31/09/2002</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Edad:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">17</p>
                </div>
            </div>

            <div class="row">

                <div class="col s3">
                    <p class="mi_titulo s6">Sexo:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Hombre</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Estado:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Activo</p>
                </div>

                <div class="col s3">
                    <p class="mi_titulo s6">Status Economico:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Medio Bajo</p>
                </div>

            </div>

            <div class="row">
                <div class="col s4">
                    <p class="mi_titulo s6">Grado Escolar:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">1ro de secundaria</p>
                </div>

                <div class="col s4">
                    <p class="mi_titulo s6">Grupo:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Osos</p>
                </div>

                <div class="col s4">
                    <p class="mi_titulo s6">Domicilio:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Calle Escondida #31 Col. Bolaños</p>
                </div>
            </div>


            <div class="row">
                <div class="col s4">
                    <p class="mi_titulo s6">Nombre Escuela:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Secundaria Técnica No.21</p>
                </div>

                <div class="col s5">
                    <p class="mi_titulo s6">Enfermedades y Alergias:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">Alergia al paracetamol</p>
                </div>

                <div class="col s2">
                    <p class="mi_titulo s6">Cuota:</p>&nbsp;&nbsp;
                    <p class="mi_parrafo s6">$150</p>
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
                    <p class="mi_parrafo s6">'.$row['nombre'].' '.$row['apellido'].'</p>
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
