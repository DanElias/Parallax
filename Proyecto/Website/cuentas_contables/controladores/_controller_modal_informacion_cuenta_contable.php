<?php

/*
    Autor: Daniel Elias
        Este controlador genera el modal de más información de la cuenta, se utiliza cuando se acaba de registrar o editar una cuenta con éxito
        Puede confundirse, pero este archivo es diferente a _controller_modal_mas_informacion_cuenta.php
        La diferencia es que este archivo usa $_SESSION para mandar el id del evento al query
        
*/

require_once("../basesdedatos/_conection_queries_db.php");//uso el archivo de queries de bases de datos sql
require_once("_util_cuentas_contables.php");//uso el archivo de las aprtes htmls y que llama a algunos controladores

$session_start();

$result = obtenerCuentaPorID($_SESSION['id_cuentacontable']);// Obtengo la cuenta por su id $_SESSION['id_cuentacontable']
$cards = "";//donde voy a guardar el card con la informacion del evento

if (mysqli_num_rows($result) > 0){ //voy generando las cards, que en realidad solo es una por el query que se mando llamar.
    
    while ($row = mysqli_fetch_assoc($result)) {
        $cards .= '
                <div class="row" style="width: 80%;">
                    <div class="col s12 m12">
                        <div class="card horizontal" >
                        
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <p style="font-family: Staatliches; color: #0d3d63; font-size: 1.7em;">
                                            <i class="material-icons prefix">event</i>
                                            ' . $row["nombre"] . '
                                            <hr>
                                        </p>
        
                                    <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1.5em; text-align:left;">
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
    }//find del while que recorre cada row del query generado
    
    echo '
    <!-- Modal Structure -->
    <div id="_modal_informacion_cuenta_contable" class="modal modal-fixed-footer my_modal">
        <div class="row my_modal_header_row">
    
            <div class="my_modal_header1">
                <div class="col s11 my_form_title">
                    Información de la Cuenta Contable
                </div>
    
                <div class="col s1">
                    <br>
                    <a class="my_modal_buttons btn btn-medium waves-effect waves-light modal-close red accent-3 hoverable center"
                       style="font-size:2em;font-family: Roboto;">
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
                alert(\"¡La cuenta se ha registrado de manera exitosa!\");
                jQuery(document).ready(function(){
                      jQuery('#_modal_informacion_cuenta_contable').modal();
                      jQuery(document).ready(function(){
                          jQuery('#_modal_informacion_cuenta_contable').modal('open');
                      });
                });
        </script>";
    
} else { // si no se encontró ninguan cuenta con el id que se mandó (caso poco probable) 
    $_SESSION['error_cuenta']="Se ha guardado la cuenta con éxito pero no logramos mostrarte retroalimentación de cómo es que se registró.
    Consulta la tabla de cuentas contables registradas y verás que la cuenta ya está guardada sin problemas!"; // se guarda un error
    mostrar_alerta_error_modal_informacion(); // se muestra el modal con una alerta
}

//Esta función manda llamar un modal que muestra si existió un error en el procesamiento del código anterior

//Caso de prueba: Si se registro una cuenta nueva pero no apareció la retroalimentación de cómo quedó guardada.
//Caso de prueba: Si se registro la edición de una cuenta  pero no apareció la retroalimentación de cómo quedó guardada.
function mostrar_alerta_error_modal_informacion()
{
    
    $error=$_SESSION['error_cuenta'];
   
    $alerta='
    <div id="_form_alerta_error" class="modal  my_modal">
        <div class="row my_modal_header_row">
            <div class="my_modal_header_eliminar z-depth-2 col s12">
                <h4 class="my_modal_header">¡La cuenta se ha guardado con éxito!, pero...</h4>
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
            alert(\"¡El evento se ha registrado de manera exitosa!\");
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