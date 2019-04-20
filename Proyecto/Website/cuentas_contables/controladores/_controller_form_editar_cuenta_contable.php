<?php

/*
    Autor: Daniel Elias
        Este archivo php genera el form llenó de una contable a editar
        
        Recibe el id del row a editar desde el archivo _controller_tablas_cuentas.php
        En realidad funciona con ajax y jquery con $post: 
        Cuando el usuario da click en el botón de editar de _controller_tablas_cuentas.php se manda llamar una función de ajax_cuenta_contable.js
        La funcion llamada desde ajax_cuenta_contable.js manda llamar a este php, haciendo que este mismo envíe una respuesta asíncrona
        Esta respuesta asíncrona se despliega en la pantalla como un modal del form con la información del row que el usuario podrá editar
        
        Ya que termina de editar sin errores este form generado mandará llamar al archivo _registro_editar_cuenta_contable.php
*/

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../_util_cuentas_contables.php");
require_once("../../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos

session_start();//para poder usar $_SESSION

$_SESSION['id'] = $_POST['id'];//guardo el id del row a editar

$_POST['id'] = htmlentities($_POST['id']);//evitar hackers

$result = obtenerCuentaPorID($_POST['id']);// obtengo la información del evento que quiero editar $_POST['id']

$edit_form = '';//aquí voy a guardar el form que el usuario podrá editar

if (mysqli_num_rows($result) > 0) {//reviso que el query me haya dado un resultado de un row
    
    while ($row = mysqli_fetch_assoc($result)) {//en realidad solo será un row al menos que la integridad referencial no este bien definida en la columna del id de la tabla
        //pues aquí guardo el form pero le cargo los valores del row para que el usuario no tenga que volver a llenarla obviamente
        //es por esto que ocupo este php
        
        $edit_form = '
                 <!-- Modal Structure -->
                    <div id="_form_editar_cuenta_contable" class="modal my_modal modal1" name="modal1">
                        <div class="row my_modal_header_row">
                                <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
                                
                            <div class="my_modal_header1">
                                <div class="col s11 my_form_title">
                                   Editar Cuenta Contable
                                   <i class=" material-icons my_title_icon_middle">calendar_today</i>
                                 </div>
                             
                                <div class="col s1">
                                     <br> 
                                    <a class="my_modal_buttons btn btn-medium waves-effect waves-light modal-close red accent-3 hoverable center" style="font-size:2em;font-family: Roboto;" href="#_form_editar_cuenta_contable">
                                       × 
                                    </a>
                                </div>
                            </div>
                            
                           
                        </div>
                        <br><br><br>
                        
                        <div class="modal-content my_modal_content">
                            <p>Aquí puede editar la cuenta</p>
            
                            <form class="col s12" action="_registro_editar_cuenta_contable.php" method="post" enctype="multipart/form-data">
                                
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                      <i class="material-icons prefix">event</i>
                                      <input  type="text" class="validate" name="enombre_cuenta" id="enombre_cuenta" value="'.$row['nombre'].'" required onkeyup="validar_campo_cuenta(\'enombre_cuenta\',\'#evalidar_nombre_cuenta\')" >
                                      <label for="nombre_evento">Nombre de la cuenta contable</label>
                                      <div class="red-text text-accent-3" id="evalidar_nombre_cuenta"></div>
                                      <input  type="hidden" name="id_cuentacontable" id="id_cuentacontable" value='.$row['id_cuentacontable'].' >
                                    </div>
                                </div>
                            
                                
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                      <i class="material-icons prefix">description</i>
                                      <input  type="text" class="validate" name="edescripcion_cuenta" id="edescripcion_cuenta" value="'.$row['descripcion'].'" required onkeyup="validar_campo_cuenta(\'edescripcion_cuenta\',\'#evalidar_descripcion_cuenta\')" >
                                      <label for="descripcion_evento">Descripción</label>
                                      <div class="red-text text-accent-3" id="evalidar_descripcion_cuenta"></div>
                                    </div>
                                </div>
    
                                <!-- botones de guardar y eliminar del modal de editar cuenta contable-->
                                <div class="my_modal_buttons">
                                    <div class="row">
                                        <div class="col s6">
                                            <button class="btn waves-effect waves-light" type="submit" name="esubmit" id="esubmit" >Guardar
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
    
    echo $edit_form;// se muestra el form
    //se abre el modal en automático con jquery
    
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
    //si no se sobreponen los labels con el texto y se ve muy feo
    
} else { // si el query no funciono
    
    //Caso de Prueba: al editar una cuenta contable no se manda el id correcto, ya no existe esa cuenta en la tabla 
    //o no se pudo conectar con la base de datos.
    
    $_SESSION['error_cuenta']="No encontramos la cuenta especificado, inténtalo más tarde";
    mostrar_alerta_error_modal_editar();
}


function mostrar_alerta_error_modal_editar()
{ //No vuelvo a recargar la página porque recordemos que estoy usando ajax jaja

    $alerta = '
    <div id="_form_alerta_error" class="modal  my_modal">
        <div class="row my_modal_header_row">
            <div class="my_modal_header_eliminar z-depth-2 col s12">
                <h4 class="my_modal_header">Lo sentimos <i class="medium material-icons my_title_icon_middle">sentiment_very_dissatisfied</i></h4>
            </div>
        </div>
        <br><br>
        <div class="modal-content my_modal_content">
            <br><br>
            <h5 class="my_modal_description2">Detectamos algunos pequeños errores: </h5>
            <div class="row">
                <div class="col s12">
                        <h5>' . $_SESSION['error_cuenta'] . '<h5>
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

    echo $alerta;
    
    echo
    "<script type='text/javascript'>
            jQuery(document).ready(function(){
                  jQuery('#_form_alerta_error').modal();
                  jQuery(document).ready(function(){
                      jQuery('#_form_alerta_error').modal('open');
                  });
            });
    </script>";
}

?>