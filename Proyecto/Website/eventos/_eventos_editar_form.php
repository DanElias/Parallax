<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("_util_eventos.php");
require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
session_start();
$_SESSION['id_evento'] = $_POST['id'];
$_POST['id'] = htmlentities($_POST['id']);
$result = obtenerEventosPorID($_POST['id']);
$edit_form = '';

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {

        $edit_form = '
                 <!-- Modal Structure -->
                    <div id="_form_editar_evento" class="modal my_modal modal1  my_big_modal" name="modal1">
                        <div class="row my_modal_header_row">
                                <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
                                
                            <div class="my_modal_header1">
                                <div class="col s11 my_form_title">
                                   Editar Evento
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
                            <p>Aquí puede editar un evento</p>
            
                            <form class="col s12" action="_registro_editar_evento.php" method="post" enctype="multipart/form-data">
                                
                                <div class="row">
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">event</i>
                                      <input  type="text" class="validate" name="nombre_evento" id="nombre_evento" value="' . $row['nombre'] . '">
                                      <label for="nombre_evento">Nombre del evento</label>
                                      <input  type="hidden" name="id_evento" id="id_evento" value=' . $row['id_evento'] . '>
                                    </div>
                                    <div class="input-field col s2">
                                      <i class="material-icons prefix">calendar_today</i>
                                    <input type="date" name="fecha_evento" id="fecha_evento" value="' . $row['fecha'] . '" required>
                                    </div>
                                     <div class="input-field col s2">
                                      <i class="material-icons prefix">access_time</i>
                                    <input type="time" name="hora_evento" id="hora_evento" value="' . $row['hora'] . '">
                                    </div>
                                </div>
                            
                                
                                <div class="row">
                                    <div class="input-field col s2">
                                      <i class="material-icons prefix">place</i>
                                      <input  type="text" class="validate" name="lugar_evento" id="lugar_evento" value="' . $row['lugar'] . '" >
                                      <label for="lugar_evento">Lugar</label>
                                    </div>
                                    <div class="input-field col s10">
                                      <i class="material-icons prefix">description</i>
                                      <input  type="text" class="validate" name="descripcion_evento" id="descripcion_evento" value="' . $row['descripcion'] . '">
                                      <label for="descripcion_evento">Descripción</label>
                                    </div>
                                </div>
                                
                                <!--<form class="col s12" action="_registro_evento.php" method="post" enctype="multipart/form-data">-->
                                    <div class="row">
                                        
                                        <div> &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Agrega una imagen para el evento:</div>
                                        <div class="input-field col s4">
                                          <i class="material-icons prefix">icon</i>
                                          <input  type="file" name="fileToUpload" id="fileToUpload" required value="' . $row['imagen'] . '">
                                        </div>
                                        
                                        <!--<div class="col s1">
                                        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Upload Image">Subir Imagen
                                            <i class="material-icons right">check_circle_outline</i>
                                        </button>
                                        </div>
                                        <div class="col s1">
                                            <a class="btn btn-medium waves-effect waves-light modal-trigger red accent-3 hoverable" href=""><i class="material-icons">delete</i></a>
                                        </div>-->
                    
                                    </div><br><br>
                               <!-- </form>-->
    
    
                                <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
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
                                  jQuery('#_form_editar_evento').modal();
                                  jQuery(document).ready(function(){
                                      jQuery('#_form_editar_evento').modal('open');
                                      M.updateTextFields(); 
                                  });
                            });
                    </script>";
                    
    //M.updateTextFields() sirve para que se actualizen los text fields y se mueven los labels de los campos que ya estan llenos.}
    
} else { // si no hay eventos registrados en la tabla
    $_SESSION['error_evento']="No encontramos el evento especificado, inténtalo más tarde";
    mostrar_alerta_error_modal_editar();
}


function mostrar_alerta_error_modal_editar()
{
    header_html();
    sidenav_html();
    evento_html();
    form_evento_html();
    controller_tabla_eventos_php();
    form_eliminar_evento_html();
    alerta_error($_SESSION['error_evento']);
    modal_informacion_evento_html();
    echo
    "<script type='text/javascript'>
            jQuery(document).ready(function(){
                  jQuery('#_form_alerta_error').modal();
                  jQuery(document).ready(function(){
                      jQuery('#_form_alerta_error').modal('open');
                  });
            });
    </script>";
    footer_html();
    echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
}

?>