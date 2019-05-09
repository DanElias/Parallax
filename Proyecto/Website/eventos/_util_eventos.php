<?php

/*
    Autor: Daniel Elias
        Este archivo php se utiliza para mandar llamar secciones de html
        Tambien se utiliza para mandar llamar otros archivos php de manera más rápida
        Al final incluye una función de alerta que es usada por los archivos registro_evento.php y registro_editar_evento.php
*/

function header_html($titulo = "Eventos")
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

function controller_modal_informacion_evento_php()
{
    include("_controller_modal_informacion_evento.php");
}

function controller_modal_mas_informacion_evento_php()
{
    include("c_controller_modal_mas_informacion_evento.php");
}

function controller_tabla_eventos_php()
{
    include("_controller_tabla_eventos.php");
}

function alerta_error($error) //alerta de error que se utiliza en caso de error
{
    $alerta = '
    <div id="_form_alerta_error" class="modal  my_modal">
        <div class="row my_modal_header_row">
            <div class="my_modal_header_eliminar z-depth-2 col s12">
                <h4 class="my_modal_header">Lo sentimos <i class="medium material-icons my_title_icon_middle">sentiment_very_dissatisfied</i></h4>
            </div>
        </div>
        <br><br>
        <div class="modal-content my_modal_content">
            <br><br>
            <h5 class="my_modal_description2">Detectamos algunos pequeños errores: </h5>
            <div class="row">
                <div class="col s12">
                        <h5>' . $error . '<h5>
                </div>
            <div>
            <br>
            <br>

            <div class="my_modal_buttons">
                <div class="row">

                    <div class="col s12 m12">
                        <button class="modal-close btn waves-effect waves-light modal-close">Ok, estoy enterado.
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>';

    echo $alerta;

}


?>
