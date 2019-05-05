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


        $edit_form = '<!-- Modal Structure -->
        <div id="_form_editar_rol" class="modal my_big_modal_rol modal1">
            <div class="row my_modal_header_row">
                <div class="my_modal_header1 z-depth-2 col s12">
                    <h4 class="my_modal_header ">Editar Rol</h4>
                </div>
            </div>
            <br><br><br>
        
            <div class="modal-content my_modal_content">
                <p>Aquí puedes Editar los roles existentes</p>
        
                <!-- Inicio del form de Rol-->
                <!-- Final del form de ROles-->
        
            </div>
        </div>';

    }


    echo $edit_form;
    echo
    "<script type='text/javascript'>
                            jQuery(document).ready(function(){
                                  jQuery('#_form_editar_rol').modal();
                                  jQuery(document).ready(function(){
                                      jQuery('#_form_editar_rol').modal('open');
                                      M.updateTextFields(); 
                                  });
                            });
                            
                    </script>";


    //M.updateTextFields() sirve para que se actualizen los text fields y se mueven los labels de los campos que ya estan llenos.

}

?>
