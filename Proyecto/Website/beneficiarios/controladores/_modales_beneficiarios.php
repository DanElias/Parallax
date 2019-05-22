<?php
// en este php mando llamar mis funciones de query y conexiones con la base de datos
  require_once("../../basesdedatos/_conection_queries_db.php");
  $id = $_POST['id'];
  $result = getInfoBeneficiarios();

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
      $padres = benTutor($row['id_beneficiario']);
      $estado = getEstadoById($row['id_beneficiario']);
      $fecha = new Datetime($row['fecha_nacimiento']);
      $diff = $today->diff($fecha);
      $row_date = explode('-', $row['fecha_nacimiento']);


      echo '
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
                  <div class="col s2">
                      <p class="mi_titulo s6">ID Beneficiario:</p>&nbsp;&nbsp;
                      <p class="mi_parrafo s6">'.$row['id_beneficiario'].'</p>
                  </div>

                  <div class="col s5">
                      <p class="mi_titulo s6">Nombre:</p>&nbsp;&nbsp;
                      <p class="mi_parrafo s6">'.$row['nombre'].' '.$row['apellido_paterno'].' '.$row['apellido_materno'].'</p>
                  </div>

                  <div class="col s3">
                      <p class="mi_titulo s6">Fecha de Nacimiento</p>&nbsp;&nbsp;
                      <p class="mi_parrafo s6">'.$row_date[2].'/'.$row_date[1].'/'.$row_date[0].'</p>
                  </div>

                  <div class="col s2">
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
                  <div class="col s3">
                      <p class="mi_titulo s6">Grado Escolar:</p>&nbsp;&nbsp;
                      <p class="mi_parrafo s6">'.$row['grado_escolar'].'</p>
                  </div>

                  <div class="col s2">
                      <p class="mi_titulo s6">Grupo:</p>&nbsp;&nbsp;
                      <p class="mi_parrafo s6">'.$row['grupo'].'</p>
                  </div>

                  <div class="col s7">
                      <p class="mi_titulo s6">Domicilio:</p>&nbsp;&nbsp;
                      <p class="mi_parrafo s6">'.$row['calle'].' '.$row['numero_calle'].', Col. '.$row['colonia'].'</p>
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

              <div class="row">';
              while($row2 = mysqli_fetch_assoc($padres)){
                  echo '<div class="col s12">
                      <p class="mi_titulo s6">'.$row2['rel'].'</p>&nbsp;&nbsp;
                      <p class="mi_parrafo s6">'.$row2['name'].' '.$row2['lastname'].'</p>&nbsp;&nbsp;
                      <p class="mi_parrafo s6"><a class="modal-trigger" href="#modal_informacion_tutor_'.$row2['id'].'">Mas información</a>
                      </p>
                  </div>';
              }


              echo '</div>
          </div>


          </div>
      </div>';
    }
  } else { // si no hay eventos registrados en la tabla
      echo "No encontramos Beneficiarios registrados";
  }


?>
