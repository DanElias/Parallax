<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  $id = $_POST['id'];
  $result = getInfoTutorById($id);
  //if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
      //$estado = getEstadoById($row['id_beneficiario']);

    echo '
      <div class="my_modal_buttons">
          <div class="row">
              <input type="hidden" value="'.$id.'" id="borrarTut2_id">
              <h5>Tutor: '.$row['nombre'].' '.$row['apellido'].'</h5>
              <div class="col s3 m3">
                  <!--button class="modal-close btn waves-effect waves-light modal-close">Cancelar
                      <i class="material-icons right">highlight_off</i>
                  </button-->
              </div>
              <div class="col s6 m6">
                  <button class="modal-close btn waves-effect red waves-light" type="submit" name="action">Estoy
                      seguro
                      de Eliminar<i class="material-icons right">check_circle_outline</i>
                  </button>
              </div>
          </div>
      </div>';
  //} else{
    //echo '<script>alert("No se encontró el estado")</script>';
  //}
 ?>
