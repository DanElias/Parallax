
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

    function cargar_drops(){
      
        let flag = 1;
        
        /************PARA EL FORM DE AGREGAR ***/
    
        $.ajax({
            type: 'POST',
            url: 'mostrar_proveedor.php',
            data:{flag:flag}
        })
        .done(function(data){
            $('#drop_proveedor').html(data);
            M.AutoInit();
           
        })
        .fail(function(){
            //console.log('EN EL PRIMERO error');
        })
    
        $.ajax({
            type: 'POST',
            url: 'mostrar_cuentacontable.php',
            data:{flag:flag}
        })
        .done(function(data){
            $('#drop_cuenta').html(data);
            M.AutoInit();
           
        })
        .fail(function(){
            //console.log('EN EL PRIMERO TAMBIEN error');
        })


    }

    
    