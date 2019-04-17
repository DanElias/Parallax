
    function mostrar_informacion_cuenta(id_cuenta){
         $.post('controladores/_controller_modal_mas_informacion_cuenta_contable.php', { id : id_cuenta } )
        .done(function(data){
            $('#modal_informacion_cuenta_ajax').html(data);
            M.AutoInit();
        });
    }
    
    function mostrar_editar_evento(id_evento){
         $.post('controladores/_cuenta_contable_editar_form.php', { id : id_cuenta } )
        .done(function(data){
            $('#modal_editar_cuenta_ajax').html(data);
            M.AutoInit();
        });
    }