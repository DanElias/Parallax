<?php

//Con esta función mando llamar al header
function _header()
{
    include("partials/_header.html");
}

function _header_user()
{
    include("partials/_header_user.html");
}

//Con esta función puedo crear todos los contenedores parallax que yo quiera solo llamando a la función y mandándole el url de la imagen, que comunmente estaran en /partials/images/
function _parallax($image_url)
{
    $parallax_container =
        '<div class="parallax-container z-depth-4">
            <header id="home_header"> 
            <section>
                <h3 class="my_header_text">Lab 14 DAW</h3>
            </section>
            </header>
            <div class="parallax ">';

    $parallax_container .= '<img src="' . $image_url . '"width="100%" >
            </div>
        </div>';
    echo $parallax_container;
}

function _parallax_simple($image_url)
{
    $parallax_container =
        '<div class="parallax-container z-depth-4">
            <header id="home_header"> 
            </header>
            <div class="parallax ">';
    $parallax_container .= '<img src="' . $image_url . '"width="100%" >
            </div>
        </div>';
    echo $parallax_container;
}

//Con esta función creo una sección en blanco simple con un título y descripción
function _simple_white_section($title, $description)
{
    $white_section =
        '<div class="section white z-depth-5">
            <div class="row container">
                <h2 class="header my_heading_text">' . $title . '</h2>
                <p class="grey-text text-darken-3 lighten-2 my_normal_text">' . $description . '</p>
                <br><br>
            </div>
        </div>';

    echo $white_section;
}

function _simple_white_section_table($title, $description)
{
    $white_section =
        '<div class="section white">
            <div class="row container">
                <h2 class="header my_heading_text">' . $title . '</h2>' . $description . '<br><br>
            </div>
        </div>';
    echo $white_section;
}


//Con esta función se crea una sección parallax pero con 3 columnas disponbles para información encima de la foto de fondo para un desplegado de información atractivo
function _parallax_three_columns()
{
    $parallax_3cols =
        '
        <div class="parallax-container my_parallax_container" id="about">
            <div class="my_table">
                <br><br>
                <div class="row">
                    <div class="col s12 my_table_title hoverable">Ejercicio! 😉</div>
                </div>
                <br>
                 <div class="row">
                    <div class="col s4">
                        Esta es la columna 1
                    </div>
                     
                    <div class="col s4">
                        Esta es la columna 2
                    </div>
                     
                    <div class="col s4">
                        Esta es la columna 3
                    </div>
                </div><br><br>
            </div>
            <div class="parallax"><img src="partials/images/si1.jpg" width="100%" ></div>
        </div>
        ';

    echo $parallax_3cols;
}

function _lab14cases()
{
    $parallax_3cols =
        '
        <div class="parallax-container my_parallax_container" id="about">
            <div class="my_table">
                <br><br>
                
                <div class="row">
                    <div class="col s12 my_table_title hoverable">¡Mostrar Eventos!</div>
                </div>
                <br>
                
                <form class="col s12" action="_eventos_todo_query.php" method="post">
                    <div class="my_modal_buttons">
                        <div class="row">
                            <div class="col s12">
                            <button class="btn waves-effect waves-light blue" type="submit" name="submit">Mostrar Eventos
                                <i class="material-icons right">check_circle_outline</i>
                            </button>
                            </div>
                        </div>
                    </div>
                </form><br>
                
                <div class="row">
                    <div class="col s12 my_table_title hoverable">¡Buscar Evento por Nombre!</div>
                </div>
                <br>
                
              
                <form class="col s12 center-align" action="_eventos_nombre_query.php" method="post">
                    <div class="row center-align">
                        <div class="input-field col s12 center-align">
                          <i class="material-icons prefix">event</i>
                          <input  type="text" class="validate" name="nombre_evento" required>
                          <label>Nombre del evento</label>
                        </div>
                    </div>
                            
                    <div class="my_modal_buttons center-align">
                        <div class="row center-align">
                            <div class="col s12 center-align">
                            <button class="btn waves-effect waves-light blue" type="submit" name="submit">Buscar Evento
                                <i class="material-icons right">check_circle_outline</i>
                            </button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                
                <div class="row">
                    <div class="col s12 my_table_title hoverable">¡Buscar Evento por Fecha Exacta!</div>
                </div>
                <br>
                
                <form class="col s12 center-align" action="_eventos_fecha_query.php" method="post">
                    <div class="row center-align">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">calendar_today</i>
                        <input type="date" name="fecha_evento" required>
                        </div> 
                    </div>
                            
                    <div class="my_modal_buttons center-align">
                        <div class="row center-align">
                            <div class="col s12 center-align">
                            <button class="btn waves-effect waves-light blue" type="submit" name="submit">Buscar Evento
                                <i class="material-icons right">check_circle_outline</i>
                            </button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>

                <!-- estas son las preguntas que se contestan en cada lab-->
                 <div class="row" id="preguntas"> 
                    <div class="col s12"> 
                    <strong>¿Qué es ODBC y para qué es útil?
                    </strong><br><br>Open Data Base Connectivity. Se utiliza cuando por ejemplo queremos comunicarnos con diferentes Bases de Datos basadas en diferentes DBMS como Access o SQL. El ODBC provee de unas caracteríisticas siempre homogéneas, y por el otro permite distintos controladores que aseguran la conectividad de la aplicación con diferentes bases de datos. Casi todas las DB actuales tienen un ODBC.[1]
                    </div>
                </div><br>
                
                 <div class="row"> 
                    <div class="col s12"> 
                    <strong>¿Qué es SQL Injection?
                    </strong><br><br>Es una vulnerabilidad que permite al atacante enviar o “inyectar” instrucciones SQL de forma maliciosa y malintencionada dentro del código SQL programado para la manipulación de bases de datos, de esta forma todos los datos almacenados estarían en peligro[2]
                    </div>
                </div><br>
                
                 <div class="row"> 
                    <div class="col s12"> 
                    <strong>¿Qué técnicas puedes utilizar para evitar ataques de SQL Injection?</strong><br><br>No utilizar las funciones de sql, si no las de sqli. Siempre checar que el texto ingresado sea del tipo que se espera. Poner restricciones para que no se puedan nunca realizar ciertas acciones como borrar una tabla completa. No mostrar al usuario información de error generada. Rechazar peticiones que tengan caracteres sospechosos como ; ‘ - /**/ xp_ [3]<br><br><br>[1]https://www.uv.es/jac/guia/gestion/gestion3.htm<br>[2]https://openwebinars.net/blog/que-es-sql-injection/<br>[3]https://geeks.ms/gtorres/2010/10/29/tips-para-evitar-sql-injection/
                    </div>
                </div><br>
                
            </div>
            <div class="parallax"><img src="partials/images/bg1.jpg" width="100%" ></div>
        </div>
        ';

    echo $parallax_3cols;
}

function _footer()
{
    include("partials/_footer.html");
}

function imprimir_titulo($titulo)
{
    echo "<h1>$titulo</h1>";
}

function _form_evento()
{
    include("partials/_form_evento.html");
}

function _form_sesion()
{
    include("partials/_form_sesion.html");
}

function _form_subir_imagen()
{
    include("partials/_form_subir_imagen.html");
}

function _modal_confirm()
{
    include("partials/_modal_confirm.html");
}


?>