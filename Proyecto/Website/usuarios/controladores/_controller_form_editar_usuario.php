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
                    <div id="_form_editar_cuenta_contable" class="modal my_modal modal1" name="modal1">
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
                            <p>Aquí puede editar la cuenta</p>
            
                            <form class="col s12" action="_registro_editar_usaurio.php" method="post" enctype="multipart/form-data">
                                
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                      <i class="material-icons prefix">event</i>
                                      <input  type="text" class="validate" name="nombre" id="nombre" value="' . $row['nombre'] . '">
                                      <label for="nombre_evento">Nombre de la cuenta contable</label>
                                      <input  type="hidden" name="id_cuentacontable" id="id_cuentacontable" value=' . $row['id_cuentacontable'] . '>
                                    </div>
                                </div>
                            
                                
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                      <i class="material-icons prefix">description</i>
                                      <input  type="text" class="validate" name="descripcion" id="descripcion" value="' . $row['descripcion'] . '">
                                      <label for="descripcion_evento">Descripción</label>
                                    </div>
                                </div>
    
                                <!-- botones de guardar y eliminar del modal de editar cuenta contable-->
                                <div class="my_modal_buttons">
                                    <div class="row">
                                        <div class="col s6">
                                            <button class="btn waves-effect waves-light" type="submit" name="submit">Guardar
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
                                  jQuery('#_form_editar_cuenta_contable').modal();
                                  jQuery(document).ready(function(){
                                      jQuery('#_form_editar_cuenta_contable').modal('open');
                                      M.updateTextFields(); 
                                  });
                            });
                    </script>";
                    
    //M.updateTextFields() sirve para que se actualizen los text fields y se mueven los labels de los campos que ya estan llenos.
    
}

?>