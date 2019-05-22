<?php
require_once('../../basesdedatos/_conection_queries_db.php');
  $id = $_POST['id'];
  $result = getInfoById($id);
  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $estado = getEstadoById($row['id_beneficiario']);

    echo '
            <div>
              <!-- Switch -->

              <div class="switch col s6 center vertical-align">
                  <label>
                      Beneficiario Inactivo
                      <input type="hidden" value='.$row['id_beneficiario'].' name="id_ben" id="id_ben">';
      if($estado == 0){
                echo '<input type="checkbox" name="palancaEstado" id="palancaEstado">';
      } else{
                echo '<input type="checkbox" checked name="palancaEstado" id="palancaEstado" >';//id="palancaEstado_'.$row['id_beneficiario'].' checked >';
      }

      echo '          <span class="lever"></span>
                        Beneficiario Activo!
                  </label>
              </div>
            </div>
            <br><br>

            <div class="my_modal_buttons">
              <div class="row">
                  <div class="col s3">
                  </div>
                  <div class="col s6">
                      <button class="btn waves-effect waves-light modal-close" id="botonCambiarEstado">Cambiar
                          Estado<i class="material-icons right">check_circle_outline</i>
                      </button>
                  </div>
                  <!--div class="col s6">
                      <a class="modal-close btn waves-effect waves-light modal-close red hoverable" >NO Cambiar Estado
                          <i class="material-icons right">highlight_off</i>
                      </a>
                  </div-->
                </div>
              </div>';

  } else{
    //echo '<script>alert("No se encontró el estado")</script>';
  }
 ?>
