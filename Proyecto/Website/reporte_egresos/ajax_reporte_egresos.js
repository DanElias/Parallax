/*
    Autor: Daniel Elias
        
*/
    
    function mostrar_tabla_egreso_por_periodo(){
        
        var fecha_i=document.getElementById("fecha_inicial").value;
        var fecha_f=document.getElementById("fecha_final").value;
        
        
        if(fecha_i!="" && fecha_f!=""){
            $.post('_modelo_tabla_egresos_periodo.php', { fecha_inicial : fecha_i, fecha_final : fecha_f } )
            .done(function(data){
                $("#fechas_validar").html("");
                $('#tabla_egreso_ajax').html(data);
                datatables();
                grafica_proveedores_periodo();
                grafica_cuenta_periodo();
                alert("¡Su reporte ha sido generado exitosamente!");
                M.AutoInit();
                
            });
        }
        else{
            if(fecha_i=="" && fecha_f==""){
                $("#fechas_validar").html("&nbsp;&nbsp;&nbsp;*Necesitas especificar la fecha inicial y final");
            }
            else if(fecha_i==""){
                $("#fechas_validar").html("&nbsp;&nbsp;&nbsp;*Necesitas especificar la fecha inicial");
            }
            else if(fecha_f==""){
                $("#fechas_validar").html("&nbsp;&nbsp;&nbsp;*Necesitas especificar la fecha final");
            }
            
        }
    }
    
    function grafica_cuenta_periodo(){
        
        var fecha_i=document.getElementById("fecha_inicial").value;
        var fecha_f=document.getElementById("fecha_final").value;
        
        $.post('graficas/_grafica_cuenta_periodo.php', { fecha_inicial : fecha_i, fecha_final : fecha_f } )
        .done(function(data){
            $('#grafica_cuenta_periodo_ajax').html(data);
            M.AutoInit();
        });
        
    }
    
    function grafica_proveedores_periodo(){
        
        var fecha_i=document.getElementById("fecha_inicial").value;
        var fecha_f=document.getElementById("fecha_final").value;
        
        $.post('graficas/_grafica_proveedor_periodo.php', { fecha_inicial : fecha_i, fecha_final : fecha_f } )
        .done(function(data){
            $('#grafica_proveedores_periodo_ajax').html(data);
            M.AutoInit();
        });
        
    }
    
    
    /* queda pendiente*/
    //Esta función abre el modal de más información con ajax cuando el usuario da click en mas informacion en la tabla de egresos registrados
    function mostrar_informacion_egreso(id_egreso){
         console.log("el valor de id: ");
         console.log(id_evento);
         $.post('_controller_modal_mas_informacion_egreso.php', { id : id_egreso } )
        .done(function(data){
            $('#modal_informacion_egreso_ajax').html(data);
            M.AutoInit();
        });
    }
    
    
   
    
    
    
    
    
    