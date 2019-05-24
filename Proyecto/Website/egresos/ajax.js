$(document).ready(function(){
   
    let flag = 1;
    //console.log('hola hola');
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
        console.log('EN EL PRIMERO error');
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
        console.log('EN EL PRIMERO TAMBIEN error');
    })

    /************PARA EL FORM DE EDITAR ***/
    
    $.ajax({
        type: 'POST',
        url: 'mostrar_proveedor2.php',
        data:{flag:flag}
    })
    .done(function(data){
        //console.log("ENTRO ");
        $('#drop_proveedor2').html(data);
        //console.log(data);
        M.AutoInit();

       
    })
    .fail(function(){
        console.log('error');
    })


    $.ajax({
        type: 'POST',
        url: 'mostrar_cuentacontable2.php',
        data:{flag:flag}
    })
    .done(function(data){
        $('#drop_cuenta2').html(data);
        M.AutoInit();
       
    })
    .fail(function(){
        console.log('error');
    })

/*
$('#edit_button').on('click', function () {
       	let flag = 1;
		$.ajax({
	        type: 'POST',
	        url: 'mostrar_proveedor2.php',
	        data:{flag:flag}
	    })
	    .done(function(data){
	        //console.log("ENTRO ");
	        $('#drop_proveedor2').html(data);
	        //console.log(data);
	        M.AutoInit();

	       
	    })
	    .fail(function(){
	        console.log('error');
	    })

	    $.ajax({
	        type: 'POST',
	        url: 'mostrar_cuentacontable2.php',
	        data:{flag:flag}
	    })
	    .done(function(data){
	        $('#drop_cuenta2').html(data);
	        M.AutoInit();
	       
	    })
	    .fail(function(){
	        console.log('error');
	    })
	    });*/

});










/*
$(document).ready(function(){
	let flag = 1;
	$.ajax({
        type: 'POST',
        url: 'mostrar_proveedor2.php',
        data:{flag:flag}
    })
    .done(function(data){
        //console.log("ENTRO ");
        $('#drop_proveedor2').html(data);
        //console.log(data);
        M.AutoInit();

       
    })
    .fail(function(){
        console.log('error');
    })

    $.ajax({
        type: 'POST',
        url: 'mostrar_cuentacontable2.php',
        data:{flag:flag}
    })
    .done(function(data){
        $('#drop_cuenta2').html(data);
        M.AutoInit();
       
    })
    .fail(function(){
        console.log('error');
    })
});
*/
