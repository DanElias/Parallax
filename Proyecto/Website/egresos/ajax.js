//MUESTRA LOS DROPS DE CUENTA CONTABLE Y PROVEEDOR, TANTO EN REGISTRAR COMO EN EDITAR

$(document).ready(function(){
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

	

});











