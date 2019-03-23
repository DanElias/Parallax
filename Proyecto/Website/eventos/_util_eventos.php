<?php

function header_html($titulo = "MS - Admin")
{
    include("../views/_header_admin.html");
}

function sidenav_html()
{
    include("../views/_sidenav_admin.html");
}

function footer_html()
{
    include("../views/_footer_admin.html");
}

function evento_html()
{
    include("eventos.html");
}

function form_evento_html()
{
    include("_form_evento.html");
}

function modal_informacion_evento_html()
{
    include("_modal_informacion_evento.html");
}

function form_eliminar_evento_html()
{
    include("_form_eliminar_evento.html");
}

function alerta_error(){
    $alerta=
    <div id="_form_eliminar_evento" class="modal  my_modal">
        <div class="row my_modal_header_row">
            <div class="my_modal_header_eliminar z-depth-2 col s12">
                <h4 class="my_modal_header">Eliminar</h4>
            </div>
        </div>
        <br><br>
        <div class="modal-content my_modal_content">
            <br><br>
            <h5 class="my_modal_description2">¿Quieres eliminar este elemento de manera permanente, nunca volverlo a
                ver?</h5>
            <br>
            <br>
    
            <div class="my_modal_buttons">
                <div class="row">
    
                    <div class="col s12 m6">
                        <button class="modal-close btn waves-effect waves-light modal-close">Cancelar
                            <i class="material-icons right">highlight_off</i>
                        </button>
                    </div>
                    <div class="col s12 m6">
                        <button class="modal-close btn waves-effect red waves-light" type="submit" name="action">Estoy
                            seguro
                            de Eliminar<i class="material-icons right">check_circle_outline</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    echo $alerta;
    
}

?>