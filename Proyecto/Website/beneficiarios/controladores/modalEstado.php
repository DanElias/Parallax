<?php
require_once('../../basesdedatos/_conection_queries_db.php');
function editarEstado(){
  $result = getIDsBen();
  $script = "<script type='text/javascript'>";
  while($row = mysqli_fetch_assoc($result)){
    $script .= '$(document).ready(function(){
          $("#formaEditarEstado_'.$row['id_beneficiario'].'").submit(function (ev){
              ev.preventDefault();
              var est=-1;

              if($("#palancaEstado_'.$row['id_beneficiario'].'").prop("checked")){
                est = 1;
              } else{
                est = 0;
              }
              console.log("beneficiario = " + '.$row['id_beneficiario'].');
              console.log("estado = " + est);
              $.post("controladores/estadoController.php", { id : '.$row['id_beneficiario'].', estado : est } )
               .done(function(data){
                 console.log("Estado modificado");
                 alert("Estado del beneficiario modificado!");

                })
                .fail(function(){
                  alert("No se pudo modificar el estado");

                  console.log("Error");
                })
              });
            });';
        }
      $script .= '</script>';
}
 ?>
