<?php
  require_once('../../basesdedatos/_conection_queries_db.php');
  $id = htmlentities($_POST['id']);
  $row = mysqli_fetch_assoc(getInfoById($id));
  echo '
  <input type="hidden" value="'.$row['id_beneficiario'].'" id="eid_b" />
  <div class="row">
      <div class="input-field col s3">
          <i class="material-icons prefix">face</i>
          <input type="text" class="validate ubuntu-text" id="enombre" name="nombre" value="'.$row['nombre'].'" required>
          <label for="nombre">Nombre(s)</label>
      </div>

      <div class="input-field col s2">
          <input type="text" class="validate ubuntu-text" id="eapellido_paterno" name="apellido_paterno" value="'.$row['apellido_paterno'].'" required>
          <label for="apellido_paterno">Apellido Paterno</label>
      </div>

      <div class="input-field col s2">
          <input type="text" class="validate ubuntu-text" id="eapellido_materno" name="apellido_materno" value="'.$row['apellido_materno'].'" required>
          <label for="apellido_materno">Apellido Materno</label>
      </div>

      <div class="input-field col s3">
          <i class="material-icons prefix">cake</i>
          <input type="date" class="ubuntu-text" name="efecha_nacimiento" id="efecha_nacimiento" value="'.$row['fecha_nacimiento'].'" required>
          <label for="fecha_nacimiento">Fecha de nacimiento</label>
      </div>

      <div class="input-field col s2">
          <i class="material-icons prefix">group</i>
          <select id="esexo" name="sexo" required class="ubuntu-text" >
              <option value="" disabled ></option>
              ';
          if($row['sexo'] == 'H'){
            echo '<option value="H" selected>Hombre</option>
            <option value="M">Mujer</option>';
          } else{
            echo '<option value="H" >Hombre</option>
            <option value="M" selected>Mujer</option>';
          }

              echo '
          </select>
          <label for="sexo">Sexo</label>
      </div>
  </div>

  <div class="row">
      <div class="input-field col s4">
          <i class="material-icons prefix">home</i>
          <input type="text" class="validate ubuntu-text" id="enumero_domicilio" name="numero_domicilio" value="'.$row['numero_calle'].'" required>
          <label for="numero_domicilio">Número de casa/departamento</label>
        </div>
      <div class="input-field col s4">
          <input type="text" class="validate ubuntu-text" id="ecalle" name="calle" value="'.$row['calle'].'" required>
          <label for="calle">Calle</label>
      </div>

      <div class="input-field col s4">

          <input type="text" class="validate ubuntu-text" id="ecolonia" name="colonia" value="'.$row['colonia'].'" required>
          <label for="colonia">Colonia</label>
      </div>
  </div>

  <div class="row">
      <div class="input-field col s3" class="ubuntu-text">
          <i class="material-icons prefix">school</i>
          <select id="egrado" name="grado" required class="ubuntu-text">
          <option value="" disabled></option>';
          if($row['grado_escolar'] == '1ro Preescolar'){
            echo '<option value="1ro Preescolar" selected>1ro Preescolar</option>
            <option value="2do Preescolar">2do Preescolar</option>
            <option value="3ro Preescolar">3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria">2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria">5to Primaria</option>
            <option value="6to Primaria">6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '2do Preescolar'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" selected>2do Preescolar</option>
            <option value="3ro Preescolar">3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria">2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria">5to Primaria</option>
            <option value="6to Primaria">6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '3ro Preescolar'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" selected>3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria">2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria">5to Primaria</option>
            <option value="6to Primaria">6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '4to Preescolar'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar" selected>4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria">2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria">5to Primaria</option>
            <option value="6to Primaria">6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '1ro Primaria'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria" selected>1ro Primaria</option>
            <option value="2do Primaria">2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria">5to Primaria</option>
            <option value="6to Primaria">6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '2do Primaria'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria" selected>2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria">5to Primaria</option>
            <option value="6to Primaria">6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '3ro Primaria'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria" >2do Primaria</option>
            <option value="3ro Primaria" selected>3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria">5to Primaria</option>
            <option value="6to Primaria">6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '4to Primaria'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria" >2do Primaria</option>
            <option value="3ro Primaria" >3ro Primaria</option>
            <option value="4to Primaria" selected>4to Primaria</option>
            <option value="5to Primaria">5to Primaria</option>
            <option value="6to Primaria">6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '5to Primaria'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria" >2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria" selected>5to Primaria</option>
            <option value="6to Primaria">6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '6to Primaria'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria" >2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria" >5to Primaria</option>
            <option value="6to Primaria" selected>6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '1ro Secundaria'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria" >2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria" >5to Primaria</option>
            <option value="6to Primaria" >6to Primaria</option>
            <option value="1ro Secundaria" selected>1ro Secundaria</option>
            <option value="2do Secundaria">2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '2do Secundaria'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria" >2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria" >5to Primaria</option>
            <option value="6to Primaria" >6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria" selected>2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          } else if($row['grado_escolar'] == '3ro Secundaria'){
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria" >2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria" >5to Primaria</option>
            <option value="6to Primaria" >6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria" >2do Secundaria</option>
            <option value="3ro Secundaria" selected>3ro Secundaria</option>';
          } else {
            echo '<option value="1ro Preescolar" >1ro Preescolar</option>
            <option value="2do Preescolar" >2do Preescolar</option>
            <option value="3ro Preescolar" >3ro Preescolar</option>
            <option value="4to Preescolar">4to Preescolar</option>
            <option value="1ro Primaria">1ro Primaria</option>
            <option value="2do Primaria" >2do Primaria</option>
            <option value="3ro Primaria">3ro Primaria</option>
            <option value="4to Primaria">4to Primaria</option>
            <option value="5to Primaria" >5to Primaria</option>
            <option value="6to Primaria" >6to Primaria</option>
            <option value="1ro Secundaria">1ro Secundaria</option>
            <option value="2do Secundaria" >2do Secundaria</option>
            <option value="3ro Secundaria">3ro Secundaria</option>';
          }
 echo'
          </select>
          <label for="grado">Grado Escolar</label>
      </div>
      <div class="input-field col s3">
          <i class="material-icons prefix">domain</i>
          <input type="text" class="validate ubuntu-text" id="eescuela" name="escuela" value="'.$row['nombre_escuela'].'" required>
          <label for="escuela">Nombre Escuela</label>
      </div>
      <div class="input-field col s3">
          <i class="material-icons prefix">business</i>
          <select class="ubuntu-text" id="egrupo" name="grupo" required>
              <option value="" disabled></option>';
          if($row['grupo'] == 'Preescolar'){
            echo'<option value="Preescolar" selected>Preescolar</option>
            <option value="Primaria Baja">Primaria Baja</option>
            <option value="Primaria Alta">Primaria Alta</option>
            <option value="Secundaria">Secundaria</option>';
          } else if($row['grupo'] == 'Primaria Baja'){
            echo'<option value="Preescolar">Preescolar</option>
            <option value="Primaria Baja" selected>Primaria Baja</option>
            <option value="Primaria Alta">Primaria Alta</option>
            <option value="Secundaria">Secundaria</option>';
          } else if($row['grupo'] == 'Primaria Alta'){
            echo'<option value="Preescolar">Preescolar</option>
            <option value="Primaria Baja" >Primaria Baja</option>
            <option value="Primaria Alta" selected>Primaria Alta</option>
            <option value="Secundaria">Secundaria</option>';
          } else if($row['grupo'] == 'Secundaria'){
            echo'<option value="Preescolar">Preescolar</option>
            <option value="Primaria Baja" >Primaria Baja</option>
            <option value="Primaria Alta" >Primaria Alta</option>
            <option value="Secundaria" selected>Secundaria</option>';
          } else {
            echo'<option value="Preescolar">Preescolar</option>
            <option value="Primaria Baja" >Primaria Baja</option>
            <option value="Primaria Alta" >Primaria Alta</option>
            <option value="Secundaria">Secundaria</option>';
          }
      echo '
          </select>
          <label for="grupo">Grupo (Mariana Sala)</label>
      </div>
      <div class="input-field col s3">
          <i class="material-icons prefix" required>attach_money</i>
          <input type="number" step="0.01" id="ecuota" name="cuota" class="validate ubuntu-text" value="'.$row['cuota'].'">
          <label for="cuota">Cuota</label>
      </div>
      <div class="input-field col s6">
          <i class="material-icons prefix">local_hospital</i>
          <input type="text" class="validate ubuntu-text" id="eenfermedades" name="enfermedades" value="'.$row['enfermedades_alergias'].'" required>
          <label for="enfermedades">Enfermedades y Alergias</label>
      </div>
      <div class="input-field col s3">
          <i class="material-icons prefix" required>device_hub</i>
          <select id="estatus" name="status" required class="ubuntu-text">
              <option value="" disabled ></option>';

          if($row['nivel_socioeconomico'] == 'Pobreza Extrema'){
            echo'<option value="Pobreza Extrema" selected >Pobreza Extrema</option>
            <option value="Pobreza">Pobreza</option>
            <option value="Media Baja">Media Baja</option>
            <option value="Media Media">Media Media</option>
            <option value="Media Alta">Media Alta</option>';
          } else if($row['nivel_socioeconomico'] == 'Pobreza'){
            echo'<option value="Pobreza Extrema" >Pobreza Extrema</option>
            <option value="Pobreza" selected>Pobreza</option>
            <option value="Media Baja">Media Baja</option>
            <option value="Media Media">Media Media</option>
            <option value="Media Alta">Media Alta</option>';
          } else if($row['nivel_socioeconomico'] == 'Media Baja'){
            echo'<option value="Pobreza Extrema" >Pobreza Extrema</option>
            <option value="Pobreza">Pobreza</option>
            <option value="Media Baja" selected>Media Baja</option>
            <option value="Media Media">Media Media</option>
            <option value="Media Alta">Media Alta</option>';
          } else if($row['nivel_socioeconomico'] == 'Media Media'){
            echo'<option value="Pobreza Extrema" >Pobreza Extrema</option>
            <option value="Pobreza">Pobreza</option>
            <option value="Media Baja" selected>Media Baja</option>
            <option value="Media Media" selected>Media Media</option>
            <option value="Media Alta">Media Alta</option>';
          } else if($row['nivel_socioeconomico'] == 'Media Alta'){
            echo'<option value="Pobreza Extrema" >Pobreza Extrema</option>
            <option value="Pobreza">Pobreza</option>
            <option value="Media Baja" >Media Baja</option>
            <option value="Media Media">Media Media</option>
            <option value="Media Alta" selected>Media Alta</option>';
          } else {
            echo'<option value="Pobreza Extrema" >Pobreza Extrema</option>
            <option value="Pobreza">Pobreza</option>
            <option value="Media Baja" >Media Baja</option>
            <option value="Media Media">Media Media</option>
            <option value="Media Alta" >Media Alta</option>';
          }
          echo '
          </select>
          <label for="status">Estatus Socioeconómico</label>
      </div>

      <div class="switch col s3 center vertical-align">
          <label>
              Beneficiario Inactivo';
        if($row['estado'] == 0){
            echo '<input type="checkbox" id="eestado" name="estado" >';
        } else{
          echo '<input type="checkbox" id="eestado" name="estado" checked>';
        }

              echo'
              <span class="lever"></span>
              Beneficiario Activo!
          </label>
      </div>

  </div>


  <div class="row">

  </div>
  <br>
  <!-- Check -->
  <div class="row">
      <div class="col s3 m3 center">
          <!-- Modal Trigger -->
          <p>Agregar Tutor</p>
          <a class="center waves-effect waves-light btn-floating modal-trigger blue darken-2 hoverable tooltipped"
             data-position="bottom" data-tooltip="Aquí puedes agregar un tutor" href="#_form_tutor"><i
                  class="material-icons right">add</i></a>
      </div>

      <div class="col s9 m9 center">
          <div class="table-wrapper responsive-table new_data_table">
              <table class="stripped highlight responsive-table data_table fixed_header">
                  <thead>
                  <tr class="my_table_headers">
                      <th>Selección</th>
                      <th>&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
                      <th>Parentesco</th>
                      <th>Nombre Tutor</th>
                      <th>Más información</th>
                      <!--th>Editar</th>
                      <th>Eliminar</th-->
                  </tr>
                  </thead>

                  <tbody id="etablaExternaTutor" class="dybody">';
                  $res = benTutor($id);
                  $data = mysqli_fetch_assoc($res);
                  if(mysqli_num_rows($res) > 1) {
                    echo '
                    <tr>
                      <td>
                        <label>
                          <input type="checkbox" class="filled-in center-align" id="ebenTut1" checked disabled/>
                          <span></span>
                        </label>
                      </td>
                      <td>
                        <p id="eidtutor1">&nbsp;&nbsp;'.$data['id'].'&nbsp;&nbsp;</p>
                      </td>
                      <td>
                        <select id="eparentesco1" name="parentesco" required>';
                    if($data['rel'] == 'Padre'){
                      echo '<option value="" disabled ></option>
                            <option value="Padre" selected>Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Tutor">Tutor</option>';
                    } else if($data['rel'] == 'Madre'){
                      echo '<option value="" disabled ></option>
                            <option value="Padre" >Padre</option>
                            <option value="Madre" selected>Madre</option>
                            <option value="Tutor">Tutor</option>';
                    } else if($data['rel'] == 'Tutor'){
                      echo '<option value="" disabled ></option>
                            <option value="Padre" selected>Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Tutor" selected>Tutor</option>';
                    }
                    echo '    </select>
                      </td>
                      <td>
                        <select id="etutor1" name="tutor1" required>';
                    $result2 = getNombreTutor();
                        echo '<option value="" disabled></option>';
                        while($row2 = mysqli_fetch_assoc($result2)){
                          if($row2['id_tutor'] == $data['id']){
                            echo '
                              <option value="'.$row2['id_tutor'].'" selected>'.$row2['nombre'].' '.$row2['apellido'].'</option>';
                          } else{
                            echo '<option value="'.$row2['id_tutor'].'" >'.$row2['nombre'].' '.$row2['apellido'].'</option>';
                          }
                        }
                    echo '    </select>
                      </td>
                      <td><a class="modal-trigger" href="#modal_informacion_tutor_'.$data['id'].'" id="einfo1">Más información</a></td>
                      <!--td>
                          <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small"
                             href="#_form_editar_tutor" id="ebotonEditarTutor1" onmouseover="llenarEditTutor('.$data['id'].')"><i class="material-icons">edit</i></a>
                      </td>
                      <td>
                          <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable small"
                             href="#_form_eliminar_tutor" id="ebotonBorrarTutor1" onmouseover="genBorrarTut('.$data['id'].')"><i class="material-icons">delete</i></a>
                      </td-->
                    </tr>
                    <tr>
                      <td><label>
                        <input type="checkbox" class="filled-in center-align" id="ebenTut2" checked />
                        <span></span>
                      </label></td>
                      <td>
                        <p id="eidtutor2">&nbsp;&nbsp;'.$data['id'].'&nbsp;&nbsp;</p>
                      </td>
                      <td>
                        <select id="eparentesco2" name="parentesco" >';
                        $data = mysqli_fetch_assoc($res);
                        if($data['rel'] == 'Padre'){
                          echo '<option value="" disabled ></option>
                                <option value="Padre" selected>Padre</option>
                                <option value="Madre">Madre</option>
                                <option value="Tutor">Tutor</option>';
                        } else if($data['rel'] == 'Madre'){
                          echo '<option value="" disabled ></option>
                                <option value="Padre" >Padre</option>
                                <option value="Madre" selected>Madre</option>
                                <option value="Tutor">Tutor</option>';
                        } else if($data['rel'] == 'Tutor'){
                          echo '<option value="" disabled ></option>
                                <option value="Padre" selected>Padre</option>
                                <option value="Madre">Madre</option>
                                <option value="Tutor" selected>Tutor</option>';
                        }
                        echo '    </select>
                          </td>
                          <td>
                            <select id="etutor2" name="tutor2" required>';
                        $result2 = getNombreTutor();
                            echo '<option value="" disabled></option>';
                            while($row2 = mysqli_fetch_assoc($result2)){
                              if($row2['id_tutor'] == $data['id']){
                                echo '
                                  <option value="'.$row2['id_tutor'].'" selected>'.$row2['nombre'].' '.$row2['apellido'].'</option>';
                              } else{
                                echo '<option value="'.$row2['id_tutor'].'" >'.$row2['nombre'].' '.$row2['apellido'].'</option>';
                              }
                            }
                      echo '  </select>
                      </td>
                      <td><a class="modal-trigger" href="#modal_informacion_tutor_'.$data['id'].'" id="einfo2">Más información</a></td>
                      <!--td>
                          <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small"
                             href="#_form_editar_tutor_2" id="ebotonEditarTutor2" onmouseover="llenarEditTutor2('.$data['id'].')"><i class="material-icons">edit</i></a>
                      </td>
                      <td>
                          <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable small"
                             href="#_form_eliminar_tutor_2" id="ebotonBorrarTutor2" onmouseover="genBorrarTut2('.$data['id'].')"><i class="material-icons">delete</i></a>
                      </td-->
                    </tr>
                </table>
              </div>

            </div>
          </div>';
        } else if(mysqli_num_rows($res) == 1) {
          echo '
          <tr>
            <td>
              <label>
                <input type="checkbox" class="filled-in center-align" id="ebenTut1" checked disabled/>
                <span></span>
              </label>
            </td>
            <td>
              <p id="eidtutor1">&nbsp;&nbsp;'.$data['id'].'&nbsp;&nbsp;</p>
            </td>
            <td>
              <select id="eparentesco1" name="parentesco" required>';
          if($data['rel'] == 'Padre'){
            echo '<option value="" disabled ></option>
                  <option value="Padre" selected>Padre</option>
                  <option value="Madre">Madre</option>
                  <option value="Tutor">Tutor</option>';
          } else if($data['rel'] == 'Madre'){
            echo '<option value="" disabled ></option>
                  <option value="Padre" >Padre</option>
                  <option value="Madre" selected>Madre</option>
                  <option value="Tutor">Tutor</option>';
          } else if($data['rel'] == 'Tutor'){
            echo '<option value="" disabled ></option>
                  <option value="Padre" selected>Padre</option>
                  <option value="Madre">Madre</option>
                  <option value="Tutor" selected>Tutor</option>';
          }
          echo '    </select>
            </td>
            <td>
              <select id="etutor1" name="tutor1" required>';
          $result2 = getNombreTutor();
              echo '<option value="" disabled></option>';
              while($row2 = mysqli_fetch_assoc($result2)){
                if($row2['id_tutor'] == $data['id']){
                  echo '
                    <option value="'.$row2['id_tutor'].'" selected>'.$row2['nombre'].' '.$row2['apellido'].'</option>';
                } else{
                  echo '<option value="'.$row2['id_tutor'].'" >'.$row2['nombre'].' '.$row2['apellido'].'</option>';
                }
              }
          echo '    </select>
            </td>
            <td><a class="modal-trigger" href="#modal_informacion_tutor_'.$data['id'].'" id="einfo1">Más información</a></td>
            <!--td>
                <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small"
                   href="#_form_editar_tutor" id="ebotonEditarTutor1" onmouseover="llenarEditTutor('.$data['id'].')"><i class="material-icons">edit</i></a>
            </td>
            <td>
                <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable small"
                   href="#_form_eliminar_tutor" id="ebotonBorrarTutor1" onmouseover="genBorrarTut('.$data['id'].')"><i class="material-icons">delete</i></a>
            </td-->
          </tr>
        <tr>
          <td><label>
            <input type="checkbox" class="filled-in center-align" id="ebenTut2" />
            <span></span>
          </label></td>
          <td>
            <p id="eidtutor2"></p>
          </td>
          <td>
            <select id="eparentesco2" name="parentesco" >
              <option value="" disabled selected></option>
              <option value="Padre">Padre</option>
              <option value="Madre">Madre</option>
              <option value="Tutor">Tutor</option>
            </select>
          </td>
          <td>
            <select id="etutor2" name="tutor2" >';
            $result2 = getNombreTutor();
                echo '<option value="" disabled selected></option>';
                while($row2 = mysqli_fetch_assoc($result2)){
                  echo '<option value="'.$row2['id_tutor'].'" >'.$row2['nombre'].' '.$row2['apellido'].'</option>';

                }

          echo '  </select>
          </td>
          <td><a class="modal-trigger" href="#modal_informacion_tutor_2" id="einfo2">Más información</a></td>
          <!--td>
              <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small"
                 href="#_form_editar_tutor_2" id="ebotonEditarTutor2"><i class="material-icons">edit</i></a>
          </td>
          <td>
              <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable small"
                 href="#_form_eliminar_tutor_2" id="ebotonBorrarTutor2"><i class="material-icons">delete</i></a>
          </td-->
        </tr>
      </tbody>
      </table>
      </div>

      </div>
      </div>';
    } else {
      echo '
      <tr>
        <td>
          <label>
            <input type="checkbox" class="filled-in center-align" id="ebenTut1" checked disabled/>
            <span></span>
          </label>
        </td>
        <td>
          <p id="eidtutor1">&nbsp;&nbsp;&nbsp;&nbsp;</p>
        </td>
        <td>
          <select id="eparentesco1" name="parentesco" required>
              <option value="" disabled selected></option>
              <option value="Padre" >Padre</option>
              <option value="Madre">Madre</option>
              <option value="Tutor">Tutor</option>';
      echo '</select>
        </td>
        <td>
          <select id="etutor1" name="tutor1" required>';
            $result2 = getNombreTutor();
          echo '<option value="" disabled selected></option>';
          while($row2 = mysqli_fetch_assoc($result2)){
              echo '<option value="'.$row2['id_tutor'].'" >'.$row2['nombre'].' '.$row2['apellido'].'</option>';
            }

      echo '    </select>
        </td>
        <td><a class="modal-trigger" href="#modal_informacion_tutor_" id="einfo1">Más información</a></td>
        <!--td>
            <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small"
               href="#_form_editar_tutor" id="ebotonEditarTutor1" ><i class="material-icons">edit</i></a>
        </td>
        <td>
            <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable small"
               href="#_form_eliminar_tutor" id="ebotonBorrarTutor1" ><i class="material-icons">delete</i></a>
        </td-->
      </tr>
    <tr>
      <td><label>
        <input type="checkbox" class="filled-in center-align" id="ebenTut2" />
        <span></span>
      </label></td>
      <td>
        <p id="eidtutor2"></p>
      </td>
      <td>
        <select id="eparentesco2" name="parentesco" >
          <option value="" disabled selected></option>
          <option value="Padre">Padre</option>
          <option value="Madre">Madre</option>
          <option value="Tutor">Tutor</option>
        </select>
      </td>
      <td>
        <select id="etutor2" name="tutor2" >';
        $result2 = getNombreTutor();
            echo '<option value="" disabled selected></option>';
            while($row2 = mysqli_fetch_assoc($result2)){
              echo '<option value="'.$row2['id_tutor'].'" >'.$row2['nombre'].' '.$row2['apellido'].'</option>';

            }

      echo '  </select>
      </td>
      <td><a class="modal-trigger" href="#modal_informacion_tutor_2" id="einfo2">Más información</a></td>
      <!--td>
          <a class="btn btn-medium waves-effect waves-light modal-trigger amber darken-1 accent-3 hoverable small"
             href="#_form_editar_tutor_2" id="ebotonEditarTutor2"><i class="material-icons">edit</i></a>
      </td>
      <td>
          <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable small"
             href="#_form_eliminar_tutor_2" id="ebotonBorrarTutor2"><i class="material-icons">delete</i></a>
      </td-->
    </tr>
  </tbody>
  </table>
  </div>

  </div>
  </div>';
    }
    echo' <div class="my_modal_buttons">
      <div class="row">
          <div class="col s3">
            <!--button class="btn waves-effect waves-light red modal-close">Cancelar
                <i class="material-icons right">highlight_off</i>
            </button-->
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
