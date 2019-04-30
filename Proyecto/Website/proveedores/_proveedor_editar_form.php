<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
  require_once("_util_proveedor.php");
  require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
  session_start();
  $_SESSION['id_proveedor'] = $_POST['id'];
  $_POST['id'] = htmlentities($_POST['id']);
  $result = obtener_proveedor_id($_POST['id']);
  $edit_form = '';

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['rfc2'] = $row['rfc'];
        $edit_form = '
                 <!-- Modal Structure -->
                    <div id="_form_editar_proveedor" class="modal my_modal modal1  my_big_modal" name="modal1">
                        <div class="row my_modal_header_row">

                            <div class="my_modal_header1">
                                <div class="col s11 my_form_title">
                                    Editar Proveedor
                                    <i class="material-icons my_title_icon">supervisor_account</i>
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
                            <p>Aquí puede editar un nuevo Proveedor</p>

                            <form class="col s12" action="_registro_editar_proveedor.php" method="POST" id="proveedor_form2">
                               <div class="row">
                                    <div class="input-field col s4">
                                        <i class="material-icons prefix">face</i>
                                        <input  maxlength="13" type="text" class="validate ubuntu-text" name="rfc2" id="rfc2" required value="'.$row['rfc'].'" >
                                        <label for="rfc">RFC</label>
                                       <span id="error_rfc2"></span>
                                    </div>

                                    <div class="input-field col s4">
                                        <i class="material-icons prefix">attach_money</i>
                                        <input maxlength="20" type="text" class="validate ubuntu-text" id="alias2" name="alias2" required value="'.$row['alias'].'">
                                        <label for="alias">Alias</label>
                                        <span id="error_alias2"></span>
                                    </div>

                                    <div class="input-field col s4">
                                        <i class="material-icons prefix">home</i>
                                        <input maxlength="30" type="text" class="validate ubuntu-text" name="razon_social2" id="razon_social2" required value="'.$row['razon_social'].'">
                                        <label for="razon_social">Razon social</label>
                                        <span id="error_razon2"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">domain</i>
                                        <input maxlength="40" type="text" class="validate ubuntu-text" name="nombre_contacto2" id="nombre_contacto2" required value="'.$row['nombre_contacto'].'" >
                                        <label for="contacto">Nombre contacto</label>
                                        <span id="error_nombre2"></span>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">perm_phone_msg</i>
                                        <input maxlength="20" type="text" class="validate ubuntu-text" name="telefono_proveedor2" id="telefono_proveedor2" required value="'.$row['telefono_contacto'].'" >
                                        <label for="telefono_proveedor">Telefono</label>
                                        <span id="error_telefono2"></span>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">account_balance</i>
                                        <input maxlength="40" type="text" class="validate ubuntu-text" id="banco2" name="banco2" required value="'.$row['banco'].'">
                                        <label for="banco">Banco</label>
                                        <span id="error_banco2"></span>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">attach_money</i>
                                        <input maxlength="18" type="text" class="validate ubuntu-text" id="cuenta_bancaria2" name="cuenta_bancaria2" required value="'.$row['cuenta_bancaria'].'">
                                        <label for="cuenta_bancaria">Cuenta bancaria</label>
                                        <span id="error_cuenta2"></span>
                                    </div>


                                </div>


                                <div class="my_modal_buttons">
                                    <div class="row">
                                        <div class="col s6 center">
                                            <button class="btn waves-effect waves-light" type="submit" name="submit">Guardar
                                                <i class="material-icons right">check_circle_outline</i>
                                            </button>
                                        </div>
                                        <div class="col s6 center">
                                            <button class="btn waves-effect waves-light red modal-close">Cancelar
                                                <i class="material-icons right">highlight_off</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>';

    }
    
    echo $edit_form;
    echo
    "<script type='text/javascript'>
                            jQuery(document).ready(function(){
                                  jQuery('#_form_editar_proveedor').modal();
                                  jQuery(document).ready(function(){
                                      jQuery('#_form_editar_proveedor').modal('open');
                                      M.updateTextFields(); 
                                  });
                            });
                    </script>";
    echo '<script type="text/javascript" src="../js/validation_proveedor.js"></script>';

                    
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