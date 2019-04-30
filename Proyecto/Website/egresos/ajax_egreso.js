

    function mostrar_informacion_egreso(folio){
        $.post('_controller_modal_mas_informacion_egreso.php', { id : folio })
        .done(function(data){
            $('#modal_informacion_egreso_ajax').html(data);
            M.AutoInit();
        });
    }


    
    function mostrar_editar_egreso(folio){
        //console.log("ENTRO A LA FUNCION");
        $.post('_egreso_editar_form.php', { id : folio } )
        .done(function(data){
            //$('#modal_editar_egreso_ajax').hide();
            $('#modal_editar_egreso_ajax').html(data);
            M.AutoInit();
        });
    }

    
    