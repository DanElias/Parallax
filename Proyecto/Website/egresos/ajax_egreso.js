

    function mostrar_informacion_egreso(folio){
        $.post('_controller_modal_mas_informacion_egreso.php', { id : folio })
        .done(function(data){
            $('#modal_informacion_egreso_ajax').html(data);
            M.AutoInit();
        });
    }
    
    function mostrar_editar_egreso(folio,rfc,cuenta){
        
   
        $.post('_egreso_editar_form.php', { id : folio } )
        .done(function(data){
            //console.log(data);
            $.post('mostrar_cuentacontable2.php', { id : folio } )
            .done(function(data){
                $('#drop_cuenta2').html(data);
                $('#drop_cuenta2 option[value='+cuenta+']').attr('selected',true);
                M.AutoInit();
               
            });

            $.post('mostrar_proveedor2.php', { id : folio } )
            .done(function(data){
                $('#drop_proveedor2').html(data);
                $('#drop_proveedor2 option[value='+rfc+']').attr('selected',true);
                M.AutoInit();
            });
            //aqui debo mostrar los drop
            $('#modal_editar_egreso_ajax').html(data);
            
            M.AutoInit();
        });

        
    }

    
    