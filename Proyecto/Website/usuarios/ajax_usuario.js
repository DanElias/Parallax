
    function mostrar_informacion_cuenta(id_cuenta){
         $.post('controladores/_controller_modal_mas_informacion_usuario.php', { id : id_cuenta } )
        .done(function(data){
            $('#modal_informacion_cuenta_ajax').html(data);
            M.AutoInit();
        });
    }
    
    function mostrar_editar_cuenta(id_cuenta){
         $.post('controladores/_controller_form_editar_usuario.php', { id : id_cuenta } )
        .done(function(data){
            $('#modal_editar_cuenta_ajax').html(data);
            M.AutoInit();
        });
    }