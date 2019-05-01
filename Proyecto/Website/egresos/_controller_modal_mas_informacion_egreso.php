<?php

require_once("../basesdedatos/_conection_queries_db.php");
//require_once("_util_eventos.php");
//echo "LLEGO AL OTRO DOCUMENTO";

//obtener razon con rfc
//obtener nombre de la cuenta cuenta con id
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
                        <div class="modal-content my_modal_content">

                        <div class="row">
                            <div class="col s4">
                                <p class="mi_titulo s6">Folio de factura:</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $row["folio_factura"] .'</p>
                            </div>

                            <div class="col s4">
                                <p class="mi_titulo s6">Concepto:</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $row["concepto"] .'</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s4">
                                <p class="mi_titulo s6">Fecha:</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $row["fecha"] .'</p>
                            </div>

                            <div class="col s4">
                                <p class="mi_titulo s6">Cuenta bancaria:</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $row["cuenta_bancaria"] .'</p>
                            </div>
                        </div>
                        <div class="row">';

                        //$cards.=                     .variable de razon con base a rfc y cuenta con su id.';
            $rfc = $row['rfc'];
            $id_cuenta = $row['id_cuentacontable'];
            $observaciones = $row['observaciones'];
            
            /*
            echo "RFC:".$rfc;
            echo "<br>Cuenta: ".$id_cuenta."<br>";
            echo $observaciones;*/
        }
        

        $result_razon  = obtener_razon($rfc);
        $result_cuenta = obtener_nombre_cuenta($id_cuenta);

        
        if (mysqli_num_rows($result_razon) > 0){
            while ($row = mysqli_fetch_assoc($result_razon)){
                $cards.=  '<div class="col s4">
                                <p class="mi_titulo s6">Razon Social del proveedor:</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $row["razon_social"] .'</p>
                            </div>';
            }
        }

        
        if (mysqli_num_rows($result_cuenta) > 0) {
            while ($row = mysqli_fetch_assoc($result_cuenta)) {
                $cards.=  '<div class="col s4">
                                <p class="mi_titulo s6">Cuenta contable:</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $row["nombre"] .'</p>
                            </div></div>';
            }
        }


        $cards.='<div class="col s4">
                                <p class="mi_titulo s6">Observaciones</p>&nbsp;&nbsp;
                                <p class="mi_parrafo s6">'. $observaciones .'</p>
                            </div>

                        </div>

                    </div>                
                    ';
    } else { // si no hay eventos registrados en la tabla
        $_SESSION['error_proveedor']="No encontramos el proveedor solcitado. Inténtalo más tarde.";
        //mostrar_alerta_error_modal_mas_informacion();
    }

    //Aqui habría que separar la vista del controladores
    
    //header_html();
    //sidenav_html();
    //evento_html();
    //form_evento_html();
    //form_eliminar_evento_html();
    //controller_tabla_eventos_php();
    
    echo '
            <!-- Modal Structure -->
            <div id="_modal_mas_informacion_proveedor" class="modal modal-fixed-footer my_modal  my_big_modal">
                <div class="row my_modal_header_row">
                    <!-- botones de guardar y eliminar del modal con el form de agregar beneficiarios-->
            
                    <div class="my_modal_header1">
                        <div class="col s11 my_form_title">
                            Informacion Egreso
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
/*

function mostrar_alerta_error_modal_mas_informacion()
{
    header_html();
    sidenav_html();
    evento_html();
    form_evento_html();
    controller_tabla_eventos_php();
    form_eliminar_evento_html();
    alerta_error($_SESSION['error_proveedor']);
    modal_informacion_evento_html();
    echo
    "<script type='text/javascript'>
            $(document).ready(function(){
                  $('#_form_alerta_error').modal();
                  $(document).ready(function(){
                      $('#_form_alerta_error').modal('open');
                  });
            });
    </script>";
    footer_html();
     echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
}*/


?>