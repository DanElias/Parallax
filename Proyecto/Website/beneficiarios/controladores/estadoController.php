<?php
session_start();
require_once('../../basesdedatos/_conection_queries_db.php');
$estado = $_POST['estado'];
$opcion = $_POST['opcion'];
$id = $_POST['id'];
<div id="_form_estado_beneficiarios" class="modal  my_modal">
    <div class="row my_modal_header_row">
        <div class="my_modal_header_estado z-depth-2 col s12">
            <h4 class="my_modal_header">Estado Beneficiario</h4>
        </div>
    </div>
    <br><br>
    <div class="modal-content my_modal_content">
        <br><br><br>
        <h5 class="my_modal_description2">Cambiar el estado del beneficiario</h5>
        <br>
        <br>
        <br>
        <form id="formaEditarEstado">
        <div>
            <!-- Switch -->
            <div class="switch col s6 center vertical-align">
                <label>
                    Beneficiario Inactivo
                    <input type="checkbox" checked>
                    <span class="lever"></span>
                    Beneficiario Activo!
                </label>
            </div>
        </div>
        <br><br>

        <div class="my_modal_buttons">
            <div class="row">
                <div class="col s6">
                    <button class="modal-close btn waves-effect waves-light" type="submit" name="action">Cambiar
                        Estado<i class="material-icons right">check_circle_outline</i>
                    </button>
                </div>
                <div class="col s6">
                    <button class="modal-close btn waves-effect waves-light red" modal-close>NO Cambiar Estado
                        <i class="material-icons right">highlight_off</i>
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

?>
