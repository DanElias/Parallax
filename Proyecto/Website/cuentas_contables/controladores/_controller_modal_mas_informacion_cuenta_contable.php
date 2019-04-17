<?php

require_once("../../basesdedatos/_conection_queries_db.php");
require_once("../_util_cuentas_contables.php");

$_POST['id'] = htmlentities($_POST['id']);
if (isset($_POST['id']) && $_POST['id'] != "") {
    $result = obtenerCuentaPorID($_POST['id']);
    $cards = "";
   

    if (mysqli_num_rows($result) > 0) {
        //output data of each row;
        while ($row = mysqli_fetch_assoc($result)) {
            $cards .= '
                        <div class="row" style="width: 80%;">
                            <div class="col s12 m12">
                                <div class="card horizontal" >
                                        <div class="card-stacked">
                                            <div class="card-content">
                                                <p style="font-family: Staatliches; color: #0d3d63; font-size:1.7em;">
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
        }
    } 

    echo '
            <!-- Modal Structure -->
            <div id="_modal_mas_informacion_cuenta_contable" class="modal modal-fixed-footer my_modal">
                <div class="row my_modal_header_row">
                    <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
            
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
            </div>
            
            <script type=\'text/javascript\'>
            
                    jQuery(document).ready(function(){
                          jQuery(\'#_modal_mas_informacion_cuenta_contable\').modal();
                          jQuery(document).ready(function(){
                              jQuery(\'#_modal_mas_informacion_cuenta_contable\').modal(\'open\');
                          });
                    });
            </script>
            
            ';

}

?>