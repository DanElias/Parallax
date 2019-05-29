<?php

require_once("../basesdedatos/_conection_queries_db.php");

$rfc;
$id_cuenta;
$observaciones;
$_POST['id'] = htmlentities($_POST['id']);
if (isset($_POST['id']) && $_POST['id'] != "") {
    $result = obtener_egreso_folio($_POST['id']);
    $cards = "";

    if (mysqli_num_rows($result) > 0) {
        //output data of each row;
        while ($row = mysqli_fetch_assoc($result)) {
            $cards .= '
                        <div class="row" style="width: 80%;">
                            <div class="col s12 m12">
                                <div class="card horizontal" >
                                    <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                            <div class="col m12 s12">
                                                <div>
                                                    <i class="material-icons prefix">clear_all</i>
                                                    <p class="mi_titulo s6">Folio Factura:</p>&nbsp;&nbsp;
                                                    <p class="mi_parrafo s6">'. $row["folio_factura"] .'</p>
                                                    <br><br>
                                                </div>
                                                <div>
                                                    <i class="material-icons prefix">library_books</i>
                                                    <p class="mi_titulo s6">Concepto:</p>&nbsp;&nbsp;
                                                    <p class="mi_parrafo s6">'. $row["concepto"] .'</p>
                                                    <br><br>
                                                </div>
                                                <div>
                                                    <i class="material-icons prefix">attach_money</i>
                                                    <p class="mi_titulo s6">Importe:</p>&nbsp;&nbsp;
                                                    <p class="mi_parrafo s6">'. $row["importe"] .'</p>
                                                    <br><br>
                                                </div>
                                                <div>
                                                    <i class="material-icons prefix">calendar_today</i>
                                                    <p class="mi_titulo s6">Fecha:</p>&nbsp;&nbsp;
                                                    <p class="mi_parrafo s6">'. $row["fecha"] .'</p>

                                                    <br><br>
                                                </div>
                                                <div>
                                                     <i class="material-icons prefix">account_balance</i>
                                                    <p class="mi_titulo s6">Cuenta Bancaria:</p>&nbsp;&nbsp;
                                                    <p class="mi_parrafo s6">'. $row["cuenta_bancaria"] .'</p>
                                                    <br><br>
                                                </div>
                                             



                      ';

                        //$cards.=                     .variable de razon con base a rfc y cuenta con su id.';
            $rfc = $row['rfc'];
            $id_cuenta = $row['id_cuentacontable'];
            $observaciones = $row['observaciones'];
            
          
        }
        

        $result_razon  = obtener_razon($rfc);
        $result_cuenta = obtener_nombre_cuenta($id_cuenta);

        
        if (mysqli_num_rows($result_razon) > 0){
            while ($row = mysqli_fetch_assoc($result_razon)){
                $cards.=    '<div>
                                <i class="material-icons prefix">face</i>
                                <p class="mi_titulo s6">Razon Social del proveedor:</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $row["razon_social"] .'</p>
                                <br><br>
                            </div>';
            }
        }

        
        if (mysqli_num_rows($result_cuenta) > 0) {
            while ($row = mysqli_fetch_assoc($result_cuenta)) {
                $cards.=    '<div>
                                <i class="material-icons">receipt</i>
                                <p class="mi_titulo s6">Cuenta contable:</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $row["nombre"] .'</p>
                                <br><br>
                            </div>';
            }
        }


        $cards.=            '<div>
                                <i class="material-icons prefix">description</i>
                                <p class="mi_titulo s6">Observaciones</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $observaciones .'</p>
                                <br><br>
                            </div>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>                
                    ';
    } else { // si no hay eventos registrados en la tabla
        $_SESSION['error_proveedor']="No encontramos el proveedor solcitado. Inténtalo más tarde.";
        //mostrar_alerta_error_modal_mas_informacion();
    }

   
    
    echo '
            <!-- Modal Structure -->
            <div id="_modal_mas_informacion_proveedor" class="modal modal-fixed-footer my_modal  my_big_modal">
                <div class="row my_modal_header_row">
                    <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
            
                    <div class="my_modal_header1">
                        <div class="col s11 my_form_title">
                            Informacion del Egreso
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
                 '.$cards.'
                    </div>
                 </div>
            </div>
            
            <script type=\'text/javascript\'>
                    jQuery(document).ready(function(){
                          jQuery(\'#_modal_mas_informacion_proveedor\').modal();
                          jQuery(document).ready(function(){
                              jQuery(\'#_modal_mas_informacion_proveedor\').modal(\'open\');
                          });
                    });
            </script>
            
            ';
    //footer_html();

}



?>