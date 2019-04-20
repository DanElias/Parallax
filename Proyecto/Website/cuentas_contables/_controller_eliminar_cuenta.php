<?php

/*
    Autor: Daniel Elias
        Este controlador genera el modal que le pregunta el usuario si de verdad quiere eliminar el elemento seleccionado
        Recibe el id de ese row desde el controller de la tabla de eventos cuando el usuario da click en eliminar
        Si el usuario aquí presiona que si quiere eliminar el elemento, ese id que recibió se vuelve a mandar por get a _eliminar_evento.php
        Se puede decir que este es un php intermedio antes de eliminar el row para confirmar si el usuario no picó eliminar sin querer
*/

require_once("../basesdedatos/_conection_queries_db.php"); //utiliza el archivo de queries de la base de datos
require_once("_util_cuentas_contables.php");// utiliza el util de eventos para recargar la página

$_GET['id'] = htmlentities($_GET['id']);

header_html(); //vuelvo a cargar todo porque pues no estoy usando ajax
sidenav_html();
cuentacontable_html();
form_cuentacontable_html();
controller_tabla_cuentas_php();

//Todo ese php es un caso de Prueba

//Caso de Prueba: el usuario dio click sin querer al botón eliminar del row y no quiere eliminar ese row
//Caso de Prueba: el usuario dio click al botón eliminar del row y si quiere eliminar ese row

//genero mi modal de confirmar si de verdad quiero eliminar ese row de la tabla y lo despliego, mando el id que recibí en caso de
//que el usuario si de click en que de verdad si quiere eliminar el elemento.
echo '
    <!-- Modal Structure -->
        <div id="_form_eliminar_cuenta" class="modal  my_modal">
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
                            <button class="modal-close btn waves-effect waves-light modal-close">Cancelar
                                <i class="material-icons right">highlight_off</i>
                            </button>
                        </div>
                        <div class="col s12 m6">
                            <a class="btn red" type="submit" name="action" href="_eliminar_cuenta_contable.php?id='.$_GET['id'].'">Estoy
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
                  jQuery('#_form_eliminar_cuenta').modal();
                  jQuery(document).ready(function(){
                      jQuery('#_form_eliminar_cuenta').modal('open');
                  });
            });
    </script>";
    
footer_html();
echo '<script type="text/javascript" src="ajax_cuentas_contables.js"></script>';

?>