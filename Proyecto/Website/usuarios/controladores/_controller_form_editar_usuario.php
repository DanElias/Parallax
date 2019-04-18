<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../_util_usuarios.php");
require_once("../../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
session_start();
$_SESSION['id'] = $_POST['id'];
$_POST['id'] = htmlentities($_POST['id']);
$result = obtenerUsuariosPorID($_POST['id']);
$edit_form = '';

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {


        $edit_form = '
                 <!-- Modal Structure -->
                    <div id="_form_editar_usuario" class="modal my_modal modal1" name="modal1">
                        <div class="row my_modal_header_row">
                                <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
                                
                            <div class="my_modal_header1">
                                <div class="col s11 my_form_title">
                                   Editar Usuario
                                   <i class=" material-icons my_title_icon_middle">calendar_today</i>
                                 </div>
                             
                                <div class="col s1">
                                     <br> 
                                    <a class="my_modal_buttons btn btn-medium waves-effect waves-light modal-close red accent-3 hoverable center" style="font-size:2em;font-family: Roboto;" href="#_form_eliminar_beneficiarios">
                                       × 
                                    </a>
                                </div>
                            </div>
                            
                           
                        </div>
                        <br><br><br>
                        
                        <div class="modal-content my_modal_content">
                            <p>Aquí puede editar el usuario</p>
            
                            <form class="col s12" action="_registro_editar_usuario.php" method="post" enctype="multipart/form-data">
                                
                                                      <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">description</i>
                                        <input type="text" class="validate" name="nombre" id="nombre" value = "' . $row['nombre'] . '"> 
                                        <label for="nombre">Nombre</label>
                                        <input  type="hidden" name="id_usuario" id="id_usuario" value=' . $row['id_usuario'] . '>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">description</i>
                                        <input type="text" class="validate" name="apellido" id="apellido" value = "' . $row['apellido'] . '">
                                        <label for="apellido">Apellido</label>
                                    </div>
                    
                    
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input type="email" class="validate" name="email" id="email" value = "' . $row['email'] . '">
                                        <label for="email">Correo Electronico</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">lock</i>
                                        <input type="password" class="validate" name="password" id="password" >
                                        <label for="password">Contraseña</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">lock</i>
                                        <input type="password" class="validate" name="password2" id="password2">
                                        <label for="password">Confirmar contraseña</label>
                                    </div>
                    
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">cake</i>
                                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required value = "' . $row['fecha_nacimiento'] . '">
                                        <label for="fecha_nacimiento">Fecha de nacimiento ddmmAAAA</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">cake</i>
                                        <input type="text" name="rol" id="rol" value = "' . $row['id_rol'] . '">
                                        <label for="rol">ROL</label>
                                    </div>
                    
                    
                                </div>
                    
                                <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
                                <div class="my_modal_buttons">
                                    <div class="row">
                                        <div class="col s6">
                                            <button class="btn waves-effect waves-light" type="submit" name="submit_editar" id="submit_editar">Guardar
                                                <i class="material-icons right">check_circle_outline</i>
                                            </button>
                                        </div>
                                        <div class="col s6">
                                            <button class="btn waves-effect waves-light red modal-close" type="button">Cancelar
                                                <i class="material-icons right">highlight_off</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Final del form de beneficiarios-->
                        </div>
                    </div>';

    }

    echo $edit_form;
    echo
    "<script type='text/javascript'>
                            jQuery(document).ready(function(){
                                  jQuery('#_form_editar_usuario').modal();
                                  jQuery(document).ready(function(){
                                      jQuery('#_form_editar_usuario').modal('open');
                                      M.updateTextFields(); 
                                  });
                            });
                    </script>";

    //M.updateTextFields() sirve para que se actualizen los text fields y se mueven los labels de los campos que ya estan llenos.

}

?>