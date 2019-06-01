<?php

    require_once("../basesdedatos/_conection_queries_db.php"); //utiliza el archivo de queries de la base de datos
    require_once("_util_proveedor.php");// utiliza el util de eventos para recargar la página

    session_start(); //para poder utilizar session

    $_GET['id'] = htmlentities($_GET['id']);
   
    $result = verificar_proveedor_en_egreso($_GET['id']);

    header_html();
    sidenav_html();
    body_proveedores();
    controller_tabla_proveedor_php();
    form_proveedor_html(); 
    modal_informacion_proveedor_html();
    
    if(mysqli_num_rows($result) > 0){
        echo '
        <!-- Modal Structure -->
            <div id="_form_eliminar_proveedors" class="modal  my_modal">
                <div class="row my_modal_header_row">
                    <div class="my_modal_header_eliminar z-depth-2 col s12">
                        <h4 class="my_modal_header">Atención</h4>
                    </div>
                </div>
                <br><br>
                <div class="modal-content my_modal_content">
                    <br><br>
                        <h5 class="my_modal_description2">
                            Este proveedor no se puede eliminar ya que está enlazado con un egreso registrado.
                            <br> <br>Sólo puede editar este proveedor.
                        
                        </h5>
                    <br>
                    <br>
            
                    <div class="my_modal_buttons">
                        <div class="row">
            
                            <div class="col s12 m12">
                                <button class="modal-close btn waves-effect waves-light modal-close">Ok, estoy enterado
                                    <i class="material-icons right">highlight_off</i>
                                </button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>';
            
        echo
        "<script type='text/javascript'>
                jQuery(document).ready(function(){
                      jQuery('#_form_eliminar_proveedors').modal();
                      jQuery(document).ready(function(){
                          jQuery('#_form_eliminar_proveedors').modal('open');
                      });
                });
        </script>";
    }else{
        echo '
    
        <div id="_form_eliminar_proveedor" class="modal  my_modal">
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
                            <a class="btn red" type="submit" name="action" href="_eliminar_proveedor.php?id='.$_GET['id'].'">Estoy
                                seguro de Eliminar<i class="material-icons right">check_circle_outline</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        
        echo
        "<script type='text/javascript'>
                jQuery(document).ready(function(){
                      jQuery('#_form_eliminar_proveedor').modal();
                      jQuery(document).ready(function(){
                          jQuery('#_form_eliminar_proveedor').modal('open');
                      });
                });
                
               
        </script>";
    }
    
  
    footer_html();
    echo    '<script type="text/javascript" src="ajax_proveedor.js"></script>
            ';
            /*
                <script type="text/javascript" src="validaciones_registrar.js"></script>
            <script type="text/javascript" src="validaciones_editar.js"></script>
            */

?>