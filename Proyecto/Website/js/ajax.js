$(document).ready(function(){
   
    let flag = 1;
    console.log('READY');
    $.ajax({
        type: 'POST',
        url: 'mostrar_proveedor.php',
        data:{flag:flag}
    })
    .done(function(data){
        $('#drop_proveedor').html(data)
        M.AutoInit();
       
    })
    .fail(function(){
        console.log('error');
    })

    $.ajax({
        type: 'POST',
        url: 'mostrar_cuentacontable.php',
        data:{flag:flag}
    })
    .done(function(data){
        $('#drop_cuenta').html(data)
        M.AutoInit();
       
    })
    .fail(function(){
        console.log('error');
    })
    
});