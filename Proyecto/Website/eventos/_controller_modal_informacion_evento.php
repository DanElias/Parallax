<?php

/*
    Autor: Daniel Elias
    
        Este controlador genera el modal de más información del evento, se utiliza cuando se acaba de registrar o editar un evento con éxito
        Puede confundirse, pero este archivo es diferente a _controller_modal_mas_informacion_evento.php
        La diferencia es que este archivo usa $_SESSION para mandar el id del evento al query
        
        Archivos relacionados: _conection_queries_db.php | _registro_editar_evento.php | _registro_evento.php | _util_eventos.php (en caso de error)
*/

require_once("../basesdedatos/_conection_queries_db.php"); //uso el archivo de queries de bases de datos sql
require_once("_util_eventos.php");//uso el archivo de las aprtes htmls y que llama a algunos controladores

$result = obtenerEventosPorID($_SESSION["id_evento"]); // Obtengo el evento por su id $_SESSION["id_evento"]
$cards = ""; //donde voy a guardar el card con la informacion del evento

if (mysqli_num_rows($result) > 0) { //checa que el query haya arrojado un resultado de al menos un row
    
    while ($row = mysqli_fetch_assoc($result)) { //voy generando las cards, que en realidad solo es una por el query que se mando llamar.
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
                                    </div>';
                                    
                 if($row["link_facebook"]!=NULL){
                    
                     $cards .= '    <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                        <div class="col s12">
                                            <div>
                                                <i class="material-icons prefix">camera_alt</i>
                                                
                                                <a href="' . $row["link_facebook"] . '" target="_blank">Visita el Álbum de Facebook</a>
                                            
                                            </div>
                                        </div>
                                    </div>';
                }                              
                                    
               
                                    
                                    
                $cards .=       '</div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>';
                
                echo '
                <!-- Modal Structure -->
                <div id="_modal_informacion_evento" class="modal modal-fixed-footer my_modal  my_big_modal">
                    <div class="row my_modal_header_row">
                        <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
                
                        <div class="my_modal_header1">
                            <div class="col s11 my_form_title">
                                Información del Evento
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
                </div>';
                
                echo //abro el modal de mas informacion
                "<script type='text/javascript'>
                        alert(\"¡El evento se ha registrado de manera exitosa!\");
                        jQuery(document).ready(function(){
                              jQuery('#_modal_informacion_evento').modal();
                              jQuery(document).ready(function(){
                                  jQuery('#_modal_informacion_evento').modal('open');
                              });
                        });
                </script>";
                
    }//find del while que recorre cada row del query generado
    
} else { // si no se encontró ningún evento con el id que se mando (caso poco probable) 
    $_SESSION['error_evento']="Se ha guardado el evento con éxito pero no logramos mostrarte retroalimentación de cómo es que se registró.
    Consulta la tabla de eventos registrados y verás que tu evento ya está guardado sin problemas!"; // se guarda un error
    mostrar_alerta_error_modal_informacion(); // se muestra el modal con una alerta
}


//Esta función manda llamar un modal que muestra si existió un error en el procesamiento del código anterior

//Caso de prueba: Si se registro un evento nuevo pero no apareció la retroalimentación de cómo quedó guardado.
//Caso de prueba: Si se registro la edición de un evento  pero no apareció la retroalimentación de cómo quedó guardado.
function mostrar_alerta_error_modal_informacion()
{
    
    $error=$_SESSION['error_evento'];
   
    $alerta='
    <div id="_form_alerta_error" class="modal  my_modal">
        <div class="row my_modal_header_row">
            <div class="my_modal_header_eliminar z-depth-2 col s12">
                <h4 class="my_modal_header">¡El evento se ha guardado con éxito!, pero...</h4>
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