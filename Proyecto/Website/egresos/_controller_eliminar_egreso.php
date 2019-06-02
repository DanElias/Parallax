<?php

require_once("../basesdedatos/_conection_queries_db.php"); //utiliza el archivo de queries de la base de datos
require_once("_util_egreso.php");// utiliza el util de eventos para recargar la página

session_start(); //para poder utilizar session


$_GET['folio'] = htmlentities($_GET['folio']);
//echo $_GET['folio'];
//$_POST['hola'] = htmlentities($_POST['hola']);
//echo $_POST['hola'];



header_html();
sidenav_html();
body_egreso();
controller_tabla_egreso_php();
form_egreso_html();
modal_informacion_egreso_html();

    echo '
    <!-- Modal Structure -->
        <div id="_form_eliminar_egreso" class="modal  my_modal">
            <div class="row my_modal_header_row">
                <div class="my_modal_header_eliminar z-depth-2 col s12">
                    <h4 class="my_modal_header">Eliminar</h4>
                </div>
            </div>
            <br><br>
            <div class="modal-content my_modal_content">
                <br><br>
                <h5 class="my_modal_description2">¿Quieres eliminar este elemento de manera permanente, nunca volverlo a
                    ver?</h5>
                <br>
                <br>
        
                <div class="my_modal_buttons">
                    <div class="row">
        
                        <div class="col s12 m6">
                            <button type="button" class="modal-close btn waves-effect waves-light modal-close">Cancelar
                                <i class="material-icons right">highlight_off</i>
                            </button>
                        </div>
                        <div class="col s12 m6">
                              <a class="btn red" type="submit" name="action" href="_eliminar_egreso.php?id='.$_GET['folio'].'">Estoy
                                seguro de Eliminar<i class="material-icons right">check_circle_outline</i>
                            </a>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        
    echo
    "<script type='text/javascript'>
            jQuery(document).ready(function(){
                  jQuery('#_form_eliminar_egreso').modal();
                  jQuery(document).ready(function(){
                      jQuery('#_form_eliminar_egreso').modal('open');
                  });
            });
            
           
    </script>";
  
    
    footer_html();
    
    echo'

    <script type="text/javascript" src="ajax_egreso.js"></script> 
    	
        <script type="text/javascript" src="validaciones.js"></script>
        <script type="text/javascript" src="validaciones_editar.js"></script>';


?>