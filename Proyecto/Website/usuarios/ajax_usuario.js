
$(document).ready(function(){

    $.ajax({type: 'POST',url: 'controladores/_tabla_roles.php', data:{'peticion': 'cargar_roles'}})
        .done(function(rol){
            $('#rol').html(rol);
            M.AutoInit();
        })
        .fail(function(){
            console.log('Error al sacar los roles');
        })

});


    function mostrar_editar_usuario(id_usuario){

         $.post('controladores/_controller_form_editar_usuario.php', { id : id_usuario } )
        .done(function(data){
            $('#modal_editar_usuario_ajax').html(data);
            M.AutoInit();
        });

        $(document).ready(function(){

            $.ajax({type: 'POST',url: 'controladores/_tabla_roles.php', data:{'peticion': 'cargar_roles'}})
                .done(function(editar_rol){
                    console.log('Todo en orden');
                    $('#editar_rol').html(editar_rol);
                    M.AutoInit();
                })
                .fail(function(){
                    console.log('Error al sacar los roles');
                })

        });
    }

function mostrar_editar_rol(id_rol){
    console.log("Editar usuarios");
    $.post('controladores/_controller_form_editar_rol.php', { id : id_rol } )
        .done(function(data){
            $('#modal_editar_rol_ajax').html(data);
            M.AutoInit();
        });

}

