<?php
require_once('../../basesdedatos/_conection_queries_db.php');
$result = getInfoBeneficiarios();
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)){
    $estado = getEstadoById($row['id_beneficiario']);

    echo '<!-- Modal Structure -->
    <div id="modal_estado_beneficiarios_'.$row['id_beneficiario'].'" class="modal my_modal">
    <div class="row my_modal_header_row">
        <div class="my_modal_header_estado z-depth-2 col s12">
            <h4 class="my_modal_header">Estado Beneficiario</h4>
        </div>
    </div>
    <br><br>
    <div class="modal-content my_modal_content">
        <br><br><br>
        <h5 class="my_modal_description2">Cambiar el estado del beneficiario</h5>
        <br>
        <br>
        <br>
        <form id="formaEditarEstado">
        <div>
            <!-- Switch -->
            <div class="switch col s6 center vertical-align">
                <label>
                    Beneficiario Inactivo';
    if($estado == 0){
      echo '<input type="checkbox">';
    } else{
      echo '<input type="checkbox" checked>';
    }

    echo '<span class="lever"></span>
                    Beneficiario Activo!
                </label>
            </div>
        </div>
        <br><br>

        <div class="my_modal_buttons">
            <div class="row">
                <div class="col s6">
                    <button class="modal-close btn waves-effect waves-light" type="submit" name="action">Cambiar
                        Estado<i class="material-icons right">check_circle_outline</i>
                    </button>
                </div>
                <div class="col s6">
                    <button class="modal-close btn waves-effect waves-light red" modal-close>NO Cambiar Estado
                        <i class="material-icons right">highlight_off</i>
                    </button>
                </div>
            </div>
        </div>
        </form>
        </div>
    </div>';
  }
} else{
  echo '<script>alert("No se encontró el estado")</script>';
}

?>
