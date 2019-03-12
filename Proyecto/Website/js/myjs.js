
        // Ok entonces... tenemos la parte del cliente que es HTML y JS, y tenemos la parte del servidor que es PHP, para poder enviar mensajes entre la parte del cliente hacia la parte del servidor y viceversa necesitamos de AJAX que funciona usando JQUERY.

        //Lo que hace esta siguiente función es utilizar ajax para que cuando el usuario de click en el boton se despliegue en el html un resultado generado por una funcion php
        $(document).ready(function(){
            $("#boton_cuadrados_cubos").click(function(){ //cuando se de click en el boton
                $.ajax({// uso ajax
                    type: "POST", //tipo post para no mostrar informacion importante 
                    url: 'logical_functions.php', //encuentra el archivo php 
                    data:{function_name:'cuadrados_cubos'}, //le digo la funcion que estoy buscando
                    success: function(result){ //si no hubo errores en el request, el servidor envía un resultado
                $("#cuadrados_cubos").html(result);//con esto despliego el resultado en la sección con id cuadrados cubos
            }});
            });
            
            $("#boton_array_average").click(function(){ //cuando se de click en el boton
                $.ajax({// uso ajax
                    type: "POST", //tipo post para no mostrar informacion importante 
                    url: 'logical_functions.php', //encuentra el archivo php 
                    data:{function_name:'array_average'}, //le digo la funcion que estoy buscando
                    success: function(result){ //si no hubo errores en el request, el servidor envía un resultado
                $("#array_average").html(result);//con esto despliego el resultado en la sección con id cuadrados cubos
            }});
            });
            
            $("#boton_array_median").click(function(){ //cuando se de click en el boton
                $.ajax({// uso ajax
                    type: "POST", //tipo post para no mostrar informacion importante 
                    url: 'logical_functions.php', //encuentra el archivo php 
                    data:{function_name:'array_median'}, //le digo la funcion que estoy buscando
                    success: function(result){ //si no hubo errores en el request, el servidor envía un resultado
                $("#array_median").html(result);//con esto despliego el resultado en la sección con id cuadrados cubos
            }});
            });
            
             $("#boton_array_analisis").click(function(){ //cuando se de click en el boton
                $.ajax({// uso ajax
                    type: "POST", //tipo post para no mostrar informacion importante 
                    url: 'logical_functions.php', //encuentra el archivo php 
                    data:{function_name:'array_analisis'}, //le digo la funcion que estoy buscando
                    success: function(result){ //si no hubo errores en el request, el servidor envía un resultado
                $("#array_analisis").html(result);//con esto despliego el resultado en la sección con id cuadrados cubos
            }});
            });
            
            $("#boton_acmproblem").click(function(){ //cuando se de click en el boton
                $.ajax({// uso ajax
                    type: "POST", //tipo post para no mostrar informacion importante 
                    url: 'logical_functions.php', //encuentra el archivo php 
                    data:{function_name:'acmproblem'}, //le digo la funcion que estoy buscando
                    success: function(result){ //si no hubo errores en el request, el servidor envía un resultado
                $("#acmproblem").html(result);//con esto despliego el resultado en la sección con id cuadrados cubos
            }});
            });
            
        });

$('#modal1').openModal({dismissible:false});  