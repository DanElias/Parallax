<?php

/*
    Autor: Daniel Elias
    
        Este controlador genera el modal de más información del evento, se utiliza cuando el usuario da click en el botón de mas información de cada evento
        Puede confundirse, pero este archivo es diferente a _controller_modal_informacion_evento.php
        La diferencia es que este archivo usa $_POST para mandar el id del evento al query
        El ID esta guadado secretamente en el form de editar y se manda con el click de mas informacion a este controller.
        
        Archivos relacionados: _conection_queries_db.php | _controller_tabla_eventos.php | _registro_editar_evento.php | _registro_evento.php | _util_eventos.php (en caso de error)
*/

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_eventos.php");

$session_start();

$_POST['id'] = htmlentities($_POST['id']);
if (isset($_POST['id']) && $_POST['id'] != "") {
    $result = obtenerEventosPorID($_POST['id']);//$_POST['id']
    $cards = "";

    if (mysqli_num_rows($result) > 0) {
        //output data of each row;
        while ($row = mysqli_fetch_assoc($result)) {
            $row_date = explode('-', $row["fecha"]);
            $cards .= '
                        <div class="row" style="width: 80%;">
                            <div class="col s12 m12">
                                <div class="card horizontal" >
                                    <div class="card-image">
                                        <img src="' . $row["imagen"] . '" class="" style="object-fit:cover">
                                    </div>
                                        <div class="card-stacked">
                                            <div class="card-content">
                                                <p style="font-family: Staatliches; color: #0d3d63; font-size: 1.2em;">
                                                    <i class="material-icons prefix">event</i>
                                                    ' . $row["nombre"] . '
                                                    <hr>
                                                </p>
                
                                            <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                                <div class="col m12 s12">
                                                    <div>
                                                        <i class="material-icons prefix">calendar_today</i>
                                                        Fecha: ' . $row_date[2] . '/' . $row_date[1] . '/' . $row_date[0] . '
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                                <div class="col m12 s12">
                                                    <div>
                                                        <i class="material-icons prefix">access_time</i>
                                                        Hora: ' . $row["hora"] . '
                                                    </div>
                                                </div>
                                            </div>
                                          
                                          
                                            <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                                <div class="col s12">
                                                    <div>
                                                        <i class="material-icons prefix">place</i>
                                                        Lugar: ' . $row["lugar"] . '
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                                <div class="col s12">
                                                    <div>
                                                        <i class="material-icons prefix">description</i>
                                                        Descripcion: ' . $row["descripcion"] . '
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>';
                        
        }//fin del while
        
        echo '
            <!-- Modal Structure -->
            <div id="_modal_mas_informacion_evento" class="modal modal-fixed-footer my_modal  my_big_modal">
                <div class="row my_modal_header_row">
                    <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
            
                    <div class="my_modal_header1">
                        <div class="col s11 my_form_title">
                            Informacion Evento
                        </div>
            
                        <div class="col s1">
                            <br>
                            <a class="my_modal_buttons btn btn-medium waves-effect waves-light modal-close red accent-3 hoverable center"
                               style="font-size:2em;font-family: Roboto;" href="#_form_eliminar_beneficiarios">
                                ×
                            </a>
                        </div>
                    </div>
            
            
                </div>
                <br><br><br>
            
                <div class="modal-content my_modal_content">
                    <div>
                    <br><br><br>
                ' . $cards . '
                    </div>
                 </div>
            </div>
            
            <script type=\'text/javascript\'>
                    jQuery(document).ready(function(){
                          jQuery(\'#_modal_mas_informacion_evento\').modal();
                          jQuery(document).ready(function(){
                              jQuery(\'#_modal_mas_informacion_evento\').modal(\'open\');
                          });
                    });
            </script>
            
            ';
            
    } else { // si no hay eventos registrados en la tabla
        $_SESSION['error_evento']="No logramos mostrar información del evento solicitado. Inténtalo más tarde.";
        mostrar_alerta_error_modal_mas_informacion();
    }
}

function mostrar_alerta_error_modal_mas_informacion()
{
    $error=$_SESSION['error_evento'];
   
    $alerta='
    <div id="_form_alerta_error" class="modal  my_modal">
        <div class="row my_modal_header_row">
            <div class="my_modal_header_eliminar z-depth-2 col s12">
                <h4 class="my_modal_header">Lo sentimos...</h4>
            </div>
        </div>
        <br><br>
        <div class="modal-content my_modal_content">
            <br><br>
            <h5 class="my_modal_description2"></h5>
            <div class="row">
                <div class="col s12">
                        <h5>' . $error . '<h5>
                </div>
            <div>
            <br>
            <br>

            <div class="my_modal_buttons">
                <div class="row">

                    <div class="col s12 m12">
                        <button class="modal-close btn waves-effect waves-light modal-close">Ok, estoy enterado.
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    
   
    $alerta.= "<script type='text/javascript'>
            $(document).ready(function(){
                  $('#_form_alerta_error').modal();
                  $(document).ready(function(){
                      $('#_form_alerta_error').modal('open');
                  });
            });
    </script>";
    
    echo $alerta;
}


?>