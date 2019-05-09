<?php

// en este php mando llamar mis funciones de query y conexiones con la base de datos
require_once("../_util_usuarios.php");
require_once("../../basesdedatos/_conection_queries_db.php"); //Accedo a mi archivo de conection y queries con la base de datos
session_start();
$_SESSION['id'] = $_POST['id'];
$_POST['id'] = htmlentities($_POST['id']);
$result = obtenerRolPorId($_POST['id']);

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
                <form class="col s12" action="_registro_editar_rol.php" id="editar_rol" method="POST">

            <div class="row">
                <div class="input-field col s8">
                    <i class="material-icons prefix">account_box</i>
                    <input type="text" class="validate" name="nombre_rol" id="nombre_rol" value = "' . $row['descripcion'] . '" >
                    <label for="nombre_rol">Nombre del ROL</label>
                    <input id="id_rol" name ="id_rol" style="display:none;" value = "' . $row['id_rol'] . '">
                </div>

            </div>

            <div class="row">
                <label for="eBeneficiarios">
                    <input type="checkbox" id="eBeneficiarios" name = "eBeneficiarios"/>
                    <span>Beneficiarioz</span>
                </label>
            </div>

            <div class="row">
                <label for="eReporte_Beneficiarios">
                    <input type="checkbox" id="eReporte_Beneficiarios" name= "eReporte_Beneficiarios" value="2" />
                    <span>Reporte Beneficiarios</span>
                </label>
            </div>

            <div class="row">
                <label for ="eEgresos">
                    <input type="checkbox" id="eEgresos" name= "eEgresos" value ="3" />
                    <span>Egresos</span>
                </label>
            </div>

            <div class="row">
                <label for="eReporte_Egresos">
                    <input type="checkbox" id="eReporte_Egresos" name = "eReporte_Egresos" value ="4" />
                    <span>Reporte Egresos</span>
                </label>
            </div>

            <div class="row">
                <label for="eProveedores">
                    <input type="checkbox" id="eProveedores" name = "eProveedores" value ="5" />
                    <span>Proveedores</span>
                </label>
            </div>

            <div class="row">
                <label for ="eCuentas_contables">
                    <input type="checkbox" id="eCuentas_contables" name= "eCuentas_contables" value = "6"/>
                    <span>Cuentas contables</span>
                </label>
            </div>

            <div class="row">
                <label for="eEventos">
                    <input type="checkbox" id="eEventos" name = "eEventos" value = "7"/>
                    <span>Eventos</span>
                </label>
            </div>

            <div class="row">
                <label for="eUsuarios">
                    <input type="checkbox" id="eUsuarios" name = "eUsuarios" value = "8"/>
                    <span>Usuarios</span>
                </label>
            </div>

            <div class="my_modal_buttons">
                <div class="row">
                    <div class="col s6">
                        <button class="btn waves-effect waves-light" type="submit" name="submit">Guardar
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
