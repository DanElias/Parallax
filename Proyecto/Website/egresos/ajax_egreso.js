

    function mostrar_informacion_egreso(folio){
        $.post('_controller_modal_mas_informacion_egreso.php', { id : folio })
        .done(function(data){
            $('#modal_informacion_egreso_ajax').html(data);
            M.AutoInit();
        });
    }


    
    function mostrar_editar_egreso(folio,rfc,cuenta){
        
        console.log(folio);
        console.log(rfc);
        console.log(cuenta);

        $.post('_egreso_editar_form.php', { id : folio } )
        .done(function(data){
            $.post('mostrar_cuentacontable.php', { id : folio } )
            .done(function(data){
                $('#drop_cuenta2').html(data);
                //alert($('#drop_cuenta2 :selected').text());
                $('#drop_cuenta2 option[value='+cuenta+']').attr('selected',true);
                M.AutoInit();
               
            });

            $.post('mostrar_proveedor.php', { id : folio } )
            .done(function(data){
                $('#drop_proveedor2').html(data);
                //alert($('#drop_proveedor2 :selected').text());
                $('#drop_proveedor2 option[value='+rfc+']').attr('selected',true);
                M.AutoInit();
            });
            //aqui debo mostrar los drop
            $('#modal_editar_egreso_ajax').html(data);
            
            M.AutoInit();
        });
        /*

        $.post('_egreso_editar_form.php', { id : folio } )
        .done(function(data){
            $('#drop_proveedor2').text("<h1>SOME TEXT PROVEEDOR</h1>");
            $('#drop_cuenta2').text("<h1>SOME TEXT EN CUENTA</h1>");
            M.AutoInit();
        });

        $.post('_egreso_editar_form.php', { id : folio } )
        .done(function(data){
            $('#drop_proveedor2').text("<h1>SOME TEXT PROVEEDOR</h1>");
            $('#drop_cuenta2').text("<h1>SOME TEXT EN CUENTA</h1>");
            M.AutoInit();
        });*/





        
    }

    
    