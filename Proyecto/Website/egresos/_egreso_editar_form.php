<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
  require_once("../proveedores/_util_proveedor.php");
  require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
  session_start();
  //$_SESSION['id_proveedor'] = $_POST['id'];
  $_POST['id'] = htmlentities($_POST['id']);
  echo $_POST['id'];
  $result = obtener_egreso_folio($_POST['id']);
  $edit_form = '';


  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $edit_form = 

                  '<div id="_form_editar_egreso" class="modal modal-fixed-footer my_modal  my_big_modal">

                      <div class="row my_modal_header_row">
                              
                          <div class="my_modal_header1">
                              <div class="col s11 my_form_title">
                                 Editar Egreso
                                 <i class="material-icons my_title_icon ">attach_money</i>
                               </div>
                             
                              <div class="col s1">
                                   <br> 
                                  <a class="my_modal_buttons btn btn-medium waves-effect waves-light modal-close red accent-3 hoverable center" style="font-size:2em;font-family: Roboto;" href="#_form_eliminar_beneficiarios">
                                     ×
                                  </a>
                              </div>
                          </div>
                          
                         
                      </div>
                      <br><br><br>

                 
                      <div class="modal-content my_modal_content">
                          <p>Aquí puede editar un egreso</p>
                          
                           <!-- Inicio del form de beneficiarios-->
                          <form class="col s12" action="registrar_egreso.php" method="post" id="form_egreso">
                              

                              <div class="row">
                                  <div class="input-field col s4">
                                      <i class="material-icons prefix">clear_all</i>
                                      <input  type="text" class="validate" id="folio_factura" name="folio_factura" required value="'.$row['folio_factura'].'">
                                      <label for="folio_factura">Folio Factura</label>
                                  </div>
                                  <div class="input-field col s3">
                                      <i class="material-icons prefix">library_books</i>
                                      <input  type="text" class="validate" id="concepto" name="concepto" required value="'.$row['concepto'].'">
                                      <label for="icon_prefix">Concepto</label>
                                  </div>
                                  <div class="input-field col s3">
                                      <i class="material-icons prefix">attach_money</i>
                                      <input  type="text" class="validate" id="importe" name="importe" required value="'.$row['importe'].'">
                                      <label for="importe">Importe</label>
                                  </div>
                              </div>
                          
                              <div class="row">
                                  <div class="input-field col s3">
                            <i class="material-icons prefix">calendar_today</i>
                            <input type="date" name="fecha_egreso" id="fecha_egreso" required value="'.$row['fecha'].'">
                                  </div>
                                  <div class="input-field col s3">
                                      <i class="material-icons prefix">account_balance</i>
                                        <input  type="text" class="validate" id="cuenta_bancaria" name="cuenta_bancaria" required value="'.$row['cuenta_bancaria'].'">
                                        <label for="cuenta_bancaria">Cuenta Bancaria</label>
                                  </div>

                                  <div class="input-field col s3" id="drop_proveedor2">
                                  </div>
                                  
                                  
                                  <div class="input-field col s3" id="drop_cuenta2">
                                  </div>
                                      
                              </div>
                              <div></div>
                         
                              <div class="row center-align">
                                
                              
                                  <div class="input-field col s6">
                                      <i class="material-icons prefix">description</i>
                                      <input  type="text" class="validate" id="observaciones" name="observaciones" required value="'.$row['observaciones'].'">
                                      <label for="observaciones">Observaciones</label>
                                  </div>
                              </div>

                              <div class="my_modal_buttons">
                                  <div class="row">
                                      <div class="col s6">
                                      <button class="btn waves-effect waves-light" type="submit" name="submit">Guardar
                                          <i class="material-icons right">check_circle_outline</i>
                                      </button>
                                      </div>
                                      <div class="col s6">
                                          <button class="btn waves-effect waves-light red modal-close">Cancelar
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
    
    echo $edit_form;
    
    
    echo
    "<script type='text/javascript'>
                            jQuery(document).ready(function(){
                                  jQuery('#_form_editar_egreso').modal();
                                  jQuery(document).ready(function(){
                                      jQuery('#_form_editar_egreso').modal('open');
                                      M.updateTextFields(); 
                                  });
                            });
                    </script>";
  
    //echo '<script type="text/javascript" src="../js/validation_proveedor.js"></script>';

                    
    //M.updateTextFields() sirve para que se actualizen los text fields y se mueven los labels de los campos que ya estan llenos.}
    
} else { // si no hay eventos registrados en la tabla
    $_SESSION['error_proveedor']="No encontramos el evento especificado, inténtalo más tarde";
   // mostrar_alerta_error_modal_editar();
}

  /*
  function mostrar_alerta_error_modal_editar()
      header_html();
      sidenav_html();
      evento_html();
      form_evento_html();
      controller_tabla_eventos_php();
      form_eliminar_evento_html();
      alerta_error($_SESSION['error_evento']);
      modal_informacion_evento_html();
      echo
      "<script type='text/javascript'>
              jQuery(document).ready(function(){
                    jQuery('#_form_alerta_error').modal();
                    jQuery(document).ready(function(){
                        jQuery('#_form_alerta_error').modal('open');
                    });
              });
      </script>";
      footer_html();
      echo '<script type="text/javascript" src="ajax_eventos.js"></script>';
  }*/

?>