

    function mostrar_informacion_egreso(folio){
        //console.log("el valor de id: ");
        //console.log(rfc);
        
        $.post('_controller_modal_mas_informacion_egreso.php', { id : folio })
        .done(function(data){
            $('#modal_informacion_egreso_ajax').html(data);
            M.AutoInit();
        });
    }


    /*
    function mostrar_editar_proveedor(rfc){
		
        $.post('_proveedor_editar_form.php', { id : rfc } )
        .done(function(data){
            $('#modal_editar_proveedor_ajax').html(data);
            M.AutoInit();
        });
    }*/

    
    