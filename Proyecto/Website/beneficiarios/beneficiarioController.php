<?php
  session_start();
  require_once('../basesdedatos/_conection_queries_db.php');

  $opcion = $_POST['opcion'];
  if($opcion == 1){
      while($row = mysqli_fetch_row(getNombreBeneficiarios())){
        echo '<tr>
          <td>';
        echo $row[0];
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


?>
