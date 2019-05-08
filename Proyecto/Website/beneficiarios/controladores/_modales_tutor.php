<?php
  require_once("../../basesdedatos/_conection_queries_db.php");
  $id = $_POST['id'];
  $num = $_POST['numero'];
  $result = getInfoTutorById($id);
  $row = mysqli_fetch_assoc($result);
  $row_date = explode('-', $row['fecha_nacimiento']);
  echo '<!-- Modal Structure -->
  <div id="modal_informacion_tutor_'.$num.'" class="modal modal-fixed-footer my_modal ">
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



?>
