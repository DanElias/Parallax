

    function mostrar_informacion_evento(id_evento){
         console.log("el valor de id: ");
         console.log(id_evento);
         $.post('_controller_modal_mas_informacion_evento.php', { id : id_evento } )
        .done(function(data){
            $('#modal_informacion_evento_ajax').html(data);
            M.AutoInit();
        });
    }
    
    function mostrar_editar_evento(id_evento){
		
         $.post('_eventos_editar_form.php', { id : id_evento } )
        .done(function(data){
            $('#modal_editar_evento_ajax').html(data);
            M.AutoInit();
        });
    }
    
    
    