<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
  require_once("../proveedores/_util_proveedor.php");
  require_once("../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
  session_start();
  //$_SESSION['id_proveedor'] = $_POST['id'];
  $_POST['id'] = htmlentities($_POST['id']);
  //echo $_POST['id'];

  //obtener valires del egreso editado
  $result = obtener_egreso_folio($_POST['id']);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['folio_anterior'] = $row['folio_factura'];
        $concepto = $row['concepto'];
        $importe = $row['importe'];
        $fecha = $row['fecha'];
        $cuenta_bancaria = $row['cuenta_bancaria'];
        $rfc = $row['rfc'];
        $cuenta_contable = $row['id_cuentacontable'];
        $observaciones = $row['observaciones'];

      }
  }



  //obtener el drop de proveedor y seleccionar el del egreso
  $proveedores = obtenerProveedor();
  $drop_proveedores = "<div class='input-field col s3'><select required name='rfc2' id='selected_proveedor2' onchange='validar_drop_proveedor()'>
        <option value='0' '>Selecciona el proveedor</option>";
   
  if(mysqli_num_rows($proveedores)>0){
        while($row = mysqli_fetch_assoc($proveedores)){
             if($row['rfc']==$rfc){
                $drop_proveedores.="<option selected value='".$row['rfc']."'>".$row['razon_social']."</option>";   
             }else{
                $drop_proveedores.="<option value='".$row['rfc']."'>".$row['razon_social']."</option>"; 
             }
	           
        }
  }
  
  $drop_proveedores.="</select><label style='font-size:0.8em'>Proveedor</label><span id='error_proveedor_egreso2'></span></div>";
  //echo $drop_proveedores;
  
  //obtener el drop de cuenta contable y seleccionar el del egresp
  $cuenta = obtenerCuentas();
  $drop_cuenta ="<div class='input-field col s3'><select required name='id_cuentacontable2' id='selected_cuenta2' onchange='validar_drop_cuenta()'>
    <option value='0'>Selecciona la cuenta contable</option>";
  if(mysqli_num_rows($cuenta)>0){
        while($row = mysqli_fetch_assoc($cuenta)){
            if($row['id_cuentacontable']==$cuenta_contable){
                $drop_cuenta.="<option selected value='".$row['id_cuentacontable']."'>".$row['nombre']."</option>" ;    
            }else{
                $drop_cuenta.="<option value='".$row['id_cuentacontable']."'>".$row['nombre']."</option>" ;  
            }
            
        }
   }
  $drop_cuenta.="</select><label style='font-size:0.8em'>Cuenta contable</label><span id='error_cuenta_egreso2'></span></div>";
  //echo $drop_cuenta;
  
  

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
                          
                           
                          <form class="col s12" id="form_egreso2" action="_registro_editar_egreso.php" method="post" onsubmit=" return validar_form();" >

                              <div class="row">
                                  <div class="input-field col s4">
                                      <i class="material-icons prefix">clear_all</i>
                                      <input  type="text" class="validate" id="folio_factura2" name="folio_factura2" required value="'.$_SESSION['folio_anterior'].'" maxlength="30" onkeyup="validar_folio()">
                                      <label for="folio_factura2">Folio Factura</label>
                                      <span id="error_folio2"></span> 
                                      
                                  </div>
                                  <div class="input-field col s3">
                                      <i class="material-icons prefix">library_books</i>
                                      <input  type="text" class="validate" id="concepto2" name="concepto2" required value="'.$concepto.'" maxlength="50" onkeyup="validar_concepto()">
                                      <label for="icon_prefix">Concepto</label>
                                      <span id="error_concepto2"></span> 
                                  </div>
                                  <div class="input-field col s3">
                                      <i class="material-icons prefix">attach_money</i>
                                      <input  type="text" class="validate" id="importe2" name="importe2" required value="'.$importe.'" maxlength="30" onkeyup="validar_importe()">
                                      <label for="importe2">Importe</label>
                                      <span id="error_importe2"></span> 
                                  </div>
                              </div>
                          
                              <div class="row">
                                  <div class="input-field col s3">
                                    <i class="material-icons prefix">calendar_today</i>
                                    <input type="date" name="fecha_egreso2" id="fecha_egreso2" required value="'.$fecha.'">
                                  </div>
                                  <div class="input-field col s3">
                                      <i class="material-icons prefix">account_balance</i>
                                        <input  type="text" class="validate" id="cuenta_bancaria_egreso2" name="cuenta_bancaria_egreso2" required value="'.$cuenta_bancaria.'" maxlength="20" onkeyup="validar_cuenta_bancaria()">
                                        <label for="cuenta_bancaria_egreso2">Cuenta/Tarjeta</label>
                                        <span id="error_cuenta_bancaria_egreso2"></span> 
                                  </div>'.$drop_proveedores.$drop_cuenta.'

                                      
                              </div>
                              <div></div>
                         
                              <div class="row center-align">
                                
                              
                                  <div class="input-field col s6">
                                      <i class="material-icons prefix">description</i>
                                      <input  type="text" class="validate" id="observaciones2" name="observaciones2" required value="'.$observaciones.'" maxlength="100" onkeyup="validar_observaciones()">
                                      <label for="observaciones">Observaciones</label>
                                      <span id="error_observaciones2"></span> 

                                  </div>
                              </div>

                              <div class="my_modal_buttons">
                                  <div class="row">
                                      <div class="col s6">
                                            <button class="btn waves-effect waves-light" type="submit" name="submit2" >Guardar
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
                  </div>
              </div>';

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
  
   
   

?>