    //abre el modal con mas informacion del proveedor correspondiente
    function mostrar_informacion_proveedor(rfc){        
        $.post('_controller_modal_mas_informacion_proveedor.php', { id : rfc })
        .done(function(data){
            $('#modal_informacion_proveedor_ajax').html(data);
            M.AutoInit();
        });
    }

    //abre el modal de editar
    function mostrar_editar_proveedor(rfc){        
        $.post('_proveedor_editar_form.php', { id : rfc })
        .done(function(data){
            $('#modal_editar_proveedor_ajax').html(data);
            M.AutoInit();
        });
    }

    
    