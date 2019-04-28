$(document).ready(function(){
   
    let flag = 1;
    //console.log('hola hola');
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

/*
$(document).ready(function(){
    $('#form_egreso').submit(function(ev){
        ev.preventDefault();
        let a = 1;
        //console.log(a);
        //console.log($("#selected_proveedor").val());
        let selected_proveedor = $("#selected_proveedor").val(); ///PENDIENTE
        let selected_cuenta = $("#selected_cuenta").val();
        console.log(selected_proveedor);
        console.log(selected_cuenta);
    })
        /*
        $.ajax({
            type: 'POST',
            url: 'registrar_incidente.php',
            data:{selected_lugar:selected_lugar,selected_tipo:selected_tipo}
        })
        .done(function(data){
            //$('#selected_tipo').val("0");
            //$('#selected_lugar').val("0");
            //$('#tabla').html("");
            //$('#tabla').html(data);
        })
        .fail(function(){
            console.log('error');
        })*/
        
/*   
});*/



