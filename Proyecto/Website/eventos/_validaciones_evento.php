
<?php

/*
    Autor: Daniel Elias
        Este archivo php se encarga de realizar validaciones de campos del form de registrar evento y de editar evento
        Se manda llamar a gtravés del ajax_eventos.js 
        utiliza echoes porque es mandado llamar a través de ajax con llamadas asíncronas
*/

//con esta parte de código php recibo requests de la parte del cliente y dependiendo de las acciones que han hecho en el front-end,
//con ajax se valida lo que se ha escrito en los campos del lado del servidor
    
    if(isset($_POST['id_respuesta'])){ 
        switch ($_POST['id_respuesta']) { // con este switch veo a que funciones llamar dependiendo de donde el usuario esta escribiendo
            
            case '#validar_nombre_evento':
                echo validar_nombre_evento();
            break;
            
            case '#evalidar_nombre_evento':
                echo validar_nombre_evento();
            break;
            
            case '#validar_lugar_evento':
                echo validar_lugar_evento();
            break;
            
            case '#evalidar_lugar_evento':
                echo validar_lugar_evento();
            break;
            
            case '#validar_descripcion_evento':
                echo validar_descripcion_evento();
            break;
            
            case '#evalidar_descripcion_evento':
                echo validar_descripcion_evento();
            break;
        }
    }
    
    //Casos de Prueba Nombre Evento: 
    //1) Validar que no esté vacío o que tenga puros espacios
    //2) Validar que no tenga caracteres especiales
    //3) Validar que no tenga sólo números
    function validar_nombre_evento(){
         if(isset($_POST['input'])){
             
            if(ctype_space($_POST['input']) || $_POST['input']==""){
                echo "*Campo obligatorio";
            }
            
            else if (!(preg_match('/^[a-záéíóúüñÑÁÉÍÓÚü0-9 .\-]+$/i',$_POST['input']))){
                 echo "*El nombre no puede contener caracteres especiales (*&_/-%#)";
            }
             
            else if(is_numeric($_POST['input'])){
                echo "*El nombre no puede contener solo números";
            }
           
            else{
                echo "";
            }  
         }
    }
    
    //Casos de Prueba Fecha Evento: Validados por Materialize: no se pueden introducir fechas que no existan, se cambian a la más cercana válida
    
    //Casos de Prueba Hora Evento: Validados por Materialize: no se pueden introducir horasque no existan, se cambian a la más cercana válida
     
    //Casos de Prueba Lugar Evento: 
    //1) Validar que no esté vacío o que tenga puros espacios
    //2) Validar que no tenga caracteres especiales
    //3) Validar que no tenga sólo números
    function validar_lugar_evento(){
         if(isset($_POST['input'])){
             
            if(ctype_space($_POST['input']) || $_POST['input']==""){
                echo "*Campo obligatorio";
            }
            
            else if (!(preg_match('/^[a-záéíóúüñÑÁÉÍÓÚü0-9 .\-]+$/i',$_POST['input']))){
                 echo "*El lugar no puede contener caracteres especiales (*&_/-%#)";
            }
             
            else if(is_numeric($_POST['input'])){
                echo "*El lugar no puede contener solo números";
            }
           
            else{
                echo "";
            }  
         }
    }
    
    
    //Casos de Prueba Descripcion Evento: 
    //1) Validar que no esté vacío o que tenga puros espacios
    //2) Validar que no tenga caracteres especiales
    //3) Validar que no tenga sólo números
    function validar_descripcion_evento(){
         if(isset($_POST['input'])){
             
            if(ctype_space($_POST['input']) || $_POST['input']==""){
                echo "*Campo obligatorio";
            }
            
            else if (!(preg_match('/^[a-záéíóúüñÑÁÉÍÓÚü0-9 .\-]+$/i',$_POST['input']))){
                 echo "*La descripción no puede contener caracteres especiales (*&_/-%#)";
            }
             
            else if(is_numeric($_POST['input'])){
                echo "*La descripción no puede contener solo números";
            }
           
            else{
                echo "";
            }  
         }
    }
    
    
?>