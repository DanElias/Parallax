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
        $_SESSION['rfc_anterior'] = $row['rfc'];
        $edit_form = '
                 <!-- Modal Structure -->
                    <div id="_form_editar_proveedor" class="modal my_modal modal1  my_big_modal ubuntu-text" name="modal1">
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

                            <form class="col s12" action="_registro_editar_proveedor.php" method="post" enctype="multipart/form-data" onsubmit=" return validar_form();">
                               <div class="row">
                                    <div class="input-field col s4">
                                        <i class="material-icons prefix">face</i>
                                        <input  maxlength="13" type="text" class="validate ubuntu-text" name="rfc_editar" id="rfc_editar" required value="'.$row['rfc'].'" onkeyup="validar_rfc()">
                                        <label for="rfc_editar">RFC</label>
                                       <span id="error_rfc_editar"></span>
                                    </div>

                                    <div class="input-field col s4">
                                        <i class="material-icons prefix">attach_money</i>
                                        <input maxlength="20" type="text" class="validate ubuntu-text" id="alias_editar" name="alias_editar" required value="'.$row['alias'].'" onkeyup="validar_alias()">
                                        <label for="alias_editar">Alias</label>
                                        <span id="error_alias_editar"></span>
                                    </div>

                                    <div class="input-field col s4">
                                        <i class="material-icons prefix">home</i>
                                        <input maxlength="30" type="text" class="validate ubuntu-text" name="razon_social_editar" id="razon_social_editar" required value="'.$row['razon_social'].'" onkeyup="validar_razon()">
                                        <label for="razon_social_editar">Razon social</label>
                                        <span id="error_razon_editar"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">domain</i>
                                        <input maxlength="40" type="text" class="validate ubuntu-text" name="nombre_contacto_editar" id="nombre_contacto_editar" required value="'.$row['nombre_contacto'].'" onkeyup="validar_nombre()">
                                        <label for="nombre_contacto_editar">Nombre contacto</label>
                                        <span id="error_nombre_editar"></span>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">perm_phone_msg</i>
                                        <input maxlength="20" type="text" class="validate ubuntu-text" name="telefono_proveedor_editar" id="telefono_proveedor_editar" required value="'.$row['telefono_contacto'].'" onkeyup="validar_telefono()">
                                        <label for="telefono_proveedor_editar">Telefono</label>
                                        <span id="error_telefono_editar"></span>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">account_balance</i>
                                        <input maxlength="40" type="text" class="validate ubuntu-text" id="banco_editar" name="banco_editar" required value="'.$row['banco'].'" onkeyup="validar_banco()">
                                        <label for="banco_editar">Banco</label>
                                        <span id="error_banco_editar"></span>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">attach_money</i>
                                        <input maxlength="18" type="text" class="validate ubuntu-text" id="cuenta_bancaria_editar" name="cuenta_bancaria_editar" required value="'.$row['cuenta_bancaria'].'" onkeyup="validar_cuenta()">
                                        <label for="cuenta_bancaria_editar">Cuenta bancaria</label>
                                        <span id="error_cuenta_editar"></span>
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
                                            <button class="btn waves-effect waves-light red modal-close" type="button">Cancelar
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

                    
   
    
} else { 
    $_SESSION['error_proveedor']="No encontramos el proveedor especificado, inténtalo más tarde";
   
}

  

?>