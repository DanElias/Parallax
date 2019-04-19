
/*
    Autor: Daniel Elias
        Este archivo js tiene funciones de ajax que mandan llamar distintos php
        Estas funciones js se mandan llamar desde la tabla de eventos registrados: _controller_tabla_eventos.php
        también se manda llamar la funcion valida_campo_evento desde el form de editar y el form de registrar evento con onkeyup()
*/
    
    //Esta función abre el modal de más información con ajax cuando el usuario da click en mas informacion en la tabla de eventos registrados
    function mostrar_informacion_evento(id_evento){
         $.post('_controller_modal_mas_informacion_evento.php', { id : id_evento } )
        .done(function(data){
            $('#modal_informacion_evento_ajax').html(data);
            M.AutoInit();
        });
    }
    
    //Esta función abre el modal con el form de editar evento cuando el usuario da click en editar en la tabla de eventos registrados
    function mostrar_editar_evento(id_evento){
         $.post('_eventos_editar_form.php', { id : id_evento } )
        .done(function(data){
            $('#modal_editar_evento_ajax').html(data);
            M.AutoInit();
        });
    }
    
    //Esta función se manda llamar con onkeyup() desde el form de editar evento y el form de registrar evento
    //la función recibe el id del text input donde esta escribiendo el usuario y el id de donde aparecerá la respuesta
    //en este caso la respues puede ser un error que aparecerá debajo del input en color rojo, si el campo está bien llenado no aparecerá nada
    //entonces esta función es parte de la validación de campos del lado del cliente.
    function validar_campo_evento(id_input,id_respuesta){ //Aqui le envio el id de donde aparecerá la respuesta, ese mismo id es con el que llamare la funcion
        var input=document.getElementById(id_input).value; //guardo lo que el usuario está escribiendo
        var json;
        
        $.post('_validaciones_evento.php', { id_respuesta : id_respuesta, input : input} )
        .done(function(data){ //Descubrí que html(data) literalmente inserta un archivo json en el html
            
            json=JSON.stringify(data); //por eso hay que cambiar ese json a un string
            json = json.replace('\\',''); //el string se guarda con un /n y comillas ""
            json = json.replace('"','');//por eso con .replace quito estos caracteres que no me sirven
            json = json.replace('"','');
            json = json.replace('n','');
            $(id_respuesta).html(json);//ahora si en vez de solo insertar el json en el html, inserto un string :)
            
            //como se insertó un string puedo usar .text() y comparar con string
            //lo que estoy haciendo aqui es ver si no hay errores desplegados en rojo debajo de los text inputs
            //si no hay errores se muestra el boton de submit o guardar, en caso contrario no se muestra y el usuario no puede mandar un form con errores
            if($('#validar_nombre_evento').text()=="" && $('#validar_lugar_evento').text()=="" && $('#validar_descripcion_evento').text()==""){
                $('#submit').show();
            }else{
                 $('#submit').hide();
            }

        });
    }
    
    
    
    
    
    