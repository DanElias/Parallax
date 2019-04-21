<?php

/*
    Autor: Daniel Elias
        Este archivo php se encarga de realizar validaciones de campos del form de registrar cuenta contable  y de editar cuenta contable
        Se manda llamar a gtravés del ajax_cuentas_contables.js 
        utiliza echoes porque es mandado llamar a través de ajax con llamadas asíncronas
*/

//con esta parte de código php recibo requests de la parte del cliente y dependiendo de las acciones que han hecho en el front-end,
//con ajax se valida lo que se ha escrito en los campos del lado del servidor
    
    if(isset($_POST['id_respuesta'])){ 
        switch ($_POST['id_respuesta']) { // con este switch veo a que funciones llamar dependiendo de donde el usuario esta escribiendo
            
            case '#validar_nombre_cuenta':
                echo validar_nombre_cuenta();
            break;
            
            case '#evalidar_nombre_cuenta':
                echo validar_nombre_cuenta();
            break;
            
            case '#validar_descripcion_cuenta':
                echo validar_descripcion_cuenta();
            break;
            
            case '#evalidar_descripcion_cuenta':
                echo validar_descripcion_cuenta();
            break;
        }
    }
    
    //Casos de Prueba Nombre Cuenta: 
    //1) Validar que no esté vacío o que tenga puros espacios
    //2) Validar que no tenga caracteres especiales
    //3) Validar que no tenga sólo números
    function validar_nombre_cuenta(){
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
    
    
    //Casos de Prueba Descripcion Cuenta: 
    //1) Validar que no esté vacío o que tenga puros espacios
    //2) Validar que no tenga caracteres especiales
    //3) Validar que no tenga sólo números
    function validar_descripcion_cuenta(){
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