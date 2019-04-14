<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_eventos.php");

$_GET['id'] = htmlentities($_GET['id']);
if (isset($_GET['id']) && $_GET['id'] != "") {
    $result = obtenerEventosPorID($_GET['id']);
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
        }
    } else { // si no hay eventos registrados en la tabla
        $_SESSION['error_evento']="No encontramos el evento solcitado. Inténtalo más tarde.";
        mostrar_alerta_error_modal_mas_informacion();
    }

    //Aqui habría que separar la vista del controladores
    header_html();
    sidenav_html();
    evento_html();
    form_evento_html();
    form_eliminar_evento_html();
    controller_tabla_eventos_php();

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

    footer_html();

}

function mostrar_alerta_error_modal_mas_informacion()
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
}


?>