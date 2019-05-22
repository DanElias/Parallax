<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  $id = htmlentities($_POST['id']);
  $row = mysqli_fetch_assoc(getInfoTutorById($id));
  echo '
  <input type="hidden" value="'.$row['id_tutor'].'" id="eeid_t" />
  <div class="row">
      <div class="input-field col s4">
          <i class="material-icons prefix">person</i>
          <input  type="text" class="validate ubuntu-text" id="eenombre_tutor" name="nombre_tutor" value="'.$row['nombre'].'" required>
          <label for="nombre_tutor">Nombre(s)</label>
      </div>
      <div class="input-field col s4">
          <!--i class="material-icons prefix">person</i-->
          <input  type="text" class="validate ubuntu-text" id="eeapellido_tutor" name="apellido_tutor" value="'.$row['apellido'].'" required>
          <label for="apellido_tutor">Apellido(s)</label>
      </div>
      <div class="input-field col s4">
        <i class="material-icons prefix">cake</i>
        <input  type="date"  id="eefecha_nacimiento_tutor"  name="fecha_nacimiento_tutor" value="'.$row['fecha_nacimiento'].'" required class="ubuntu-text">
        <label for="fecha_nacimiento_tutor">Fecha de nacimiento</label>
      </div>
  </div>

  <div class="row">
      <div class="input-field col s4">
          <i class="material-icons prefix">phone</i>
          <input  type="text" class="validate ubuntu-text" id="eetelefono" value="'.$row['telefono'].'" name="telefono" required>
          <label for="telefono">Telefono</label>
      </div>
      <div class="input-field col s4">
          <i class="material-icons prefix">work</i>
          <input  type="text" class="validate ubuntu-text" id="eeocupacion" value="'.$row['ocupacion'].'" name="ocupacion" required>
          <label for="ocupacion">Ocupacion </label>
      </div>
      <div class="input-field col s4">
          <i class="material-icons prefix">domain</i>
          <input  type="text" class="validate ubuntu-text" id="eeempresa" value="'.$row['nombre_empresa'].'" name="empresa" required>
          <label for="empresa">Nombre de Empresa</label>
      </div>
  </div>

  <div class="row">
      <div class="input-field col s4">
              <i class="material-icons prefix">file_copy</i>
             <select  id="eegrado_estudios_tutor" name="grado_estudios_tutor" required class="ubuntu-text">
                <option value="Ninguno">Ninguno</option>';
          if($row['grado_estudio'] == 'Primaria'){
            echo '
                <option value="Primaria" selected >Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="Licenciatura">Licenciatura</option>
                <option value="Posgrado">Posgrado</option>';
          } else if($row['grado_estudio'] == 'Secundaria'){
            echo '
                <option value="Primaria" >Primaria</option>
                <option value="Secundaria" selected>Secundaria</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="Licenciatura">Licenciatura</option>
                <option value="Posgrado">Posgrado</option>';
          } else if($row['grado_estudio'] == 'Bachillerato'){
            echo '
                <option value="Primaria" >Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Bachillerato" selected >Bachillerato</option>
                <option value="Licenciatura">Licenciatura</option>
                <option value="Posgrado">Posgrado</option>';
          } else if($row['grado_estudio'] == 'Licenciatura'){
            echo '
                <option value="Primaria" >Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Bachillerato" >Bachillerato</option>
                <option value="Licenciatura" selected >Licenciatura</option>
                <option value="Posgrado">Posgrado</option>';
          } else if($row['grado_estudio'] == 'Posgrado'){
            echo '
                <option value="Primaria" >Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Bachillerato" >Bachillerato</option>
                <option value="Licenciatura" >Licenciatura</option>
                <option value="Posgrado" selected >Posgrado</option>';
          } else {
            echo '
                <option value="Primaria" >Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Bachillerato" >Bachillerato</option>
                <option value="Licenciatura" selected >Licenciatura</option>
                <option value="Posgrado">Posgrado</option>';
          }

          echo '
             </select>
             <label for="grado_estudios_tutor">Grado de Estudios</label>
     </div>

      <div class="input-field col s4">
          <i class="material-icons prefix">school</i>
          <input  type="text" class="validate ubuntu-text" id="eetitulo" name="titulo" value="'.$row['titulo_obtenido'].'" required>
          <label for="titulo">Titulo Obtenido</label>
      </div>
  </div>


  <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
  <div class="my_modal_buttons">
      <div class="row">
          <div class="col s3">
          </div>
          <div class="col s6">
          <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
              <i class="material-icons right">check_circle_outline</i>
          </button>
          </div>

      </div>
  </div>


  ';
?>
