
	//MUESTRA EL MODAL CON MAS INFORMACION
    function mostrar_informacion_egreso(folio){
        $.post('_controller_modal_mas_informacion_egreso.php', { id : folio })
        .done(function(data){
            $('#modal_informacion_egreso_ajax').html(data);
            M.AutoInit();
        });
    }
    
    //MUESTRA EL FORM DE EDITAR CON SUS VALORES Y LOS DROPS CON SU OPCION SELECCIONADA
    function mostrar_editar_egreso(folio,rfc,cuenta){
    
   	$.post('_egreso_editar_form.php', { id : folio } )
        .done(function(data){
            //console.log(data);
            $('#modal_editar_egreso_ajax').html(data);
            M.AutoInit();
        });

        
    }



    
    