$(document).ready(imprimeTutorExterno());

$(document).ready(moreInfo());

$(document).ready(mEst());

$(document).ready(function() {
    $('#tablaB').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf', 'print', 'csv'
        ]

    } );
    $('.dt-buttons').append('<br><br><br><div class="row tooltipped" data-position="bottom" data-tooltip="Aquí puedes realizar una búsqueda de acuerdo a la palabra, cantidad, fecha o frase introducida"><div class="col s12 m12" style="color: #757575">  <i class="material-icons prefix my_search">search</i> Introduce una palabra clave: </div></div>')
    $('#tablaB_filter').append('<br><br>')
    $('.dataTables_filter').css("color", "#673ab7")
    M.AutoInit();

} );

function moreInfo(){
  $.post('controladores/_modales_beneficiarios.php', { id : 1 } )
  .done(function(data){
    console.log(data);
    $('#modBen').html(data);
    M.AutoInit();
  });
}

function mEst(){
  $.post('controladores/modalEstado.php', { id : 1 } )
  .done(function(data){
    console.log(data);
    $('#modEst').html(data);
    M.AutoInit();
  });
}


$(document).ready(function() {
    //set initial state.
    imprimeNombreBeneficiarioActivo();

    $('#botonActivos').change(function() {
        if(this.checked) {
          //renderizaTabla(1);
          //actualizaPagina();
          imprimeNombreBeneficiarioActivo();
          $(this).prop("checked");
        } else{
          //renderizaTabla(2);
          imprimeNombreBeneficiario();
          $(this).prop("checked");
        }

    });
});

function imprimeTutorExterno(){
  //modalEstado();
  $.post('tutorController.php', { opcion : 1 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
    M.AutoInit();
  });
}

function imprimeNombreBeneficiario(){
  //modalEstado();
  //renderizaTabla();
  $.post('beneficiarioController.php', { opcion : 1 } )
  .done(function(data){
    console.log("Todos");
    $('#cuerpoTablaBeneficiarios').html(data);
    //actualizaPagina();
    $.post('controladores/paginaController.php', { opcion : 2 } )
    .done(function(data){
      console.log("Funciono");
      $('#paginator').html(data);
    });
    M.AutoInit();
  });

}

function imprimeNombreBeneficiarioActivo(){
  //modalEstado();
  //renderizaTabla();
  $.post('beneficiarioController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Solo activos");
    $('#cuerpoTablaBeneficiarios').html(data);
    //modalEstado();
    //actualizaPagina();
    $.post('controladores/paginaController.php', { opcion : 2 } )
    .done(function(data){
      console.log("Funciono");
      $('#paginator').html(data);
    });
    M.AutoInit();
  });

}

function infoTutor(){
  $.post('tutorController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
  });
}

$(document).ready(function(){
  $("#formaEditarEstado").submit(function (ev){
    ev.preventDefault();
     var id = $("#id_ben").val();
     var estado = -1;
     if($("#palancaEstado").prop("checked")){
       estado = 1;
     } else{
       estado = 0;
     }
     $.post('estadoController.php', { id : id, estado : estado } )
     .done(function(data){
       alert('Estado modificado!');
       if($("#botonActivos").prop("checked")){
         imprimeNombreBeneficiarioActivo();
       } else{
         imprimeNombreBeneficiario();
       }
      })
      .fail(function(){
        alert('Error: no se pudo cambiar el estado');
        console.log('Error');
      })
    });
});

$(document).ready(function(){
  $("#registroTutor").submit(function (ev){
    ev.preventDefault();
     var nombre= $('#nombre_tutor').val();
     var apellido= $('#apellido_tutor').val();
     var fecha= $('#fecha_nacimiento_tutor').val();
     var telefono= $('#telefono').val();
     var ocupacion= $('#ocupacion').val();
     var empresa= $('#empresa').val();
     var grado= $('#grado_estudios_tutor').val();
     var titulo= $('#titulo').val();
     $.post('controladores/registrarTutor.php', { nombre : nombre, apellido : apellido, empresa : empresa, fecha : fecha, telefono : telefono, ocupacion : ocupacion, grado : grado, titulo : titulo } )
     .done(function(data){
       console.log('Insercion de tutor correcta');
       alert('Tutor registrado con éxito!');
       $('#nombre_tutor').val("");
       $('#apellido_tutor').val("");
       $('#fecha_nacimiento_tutor').val("");
       $('#telefono').val("");
       $('#ocupacion').val("");
       $('#empresa').val("");
       $('#grado_estudios_tutor').val("");
       $('#titulo').val("");
       imprimeTutorExterno();
      })
      .fail(function(){
        alert('Error en registro, verifique datos de entrada');

        console.log('Error');
      })
    });
});

function actualizaPagina(){
  $.post('controladores/paginaController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Funciono");
    $('#paginator').html(data);
  });
}

function imprimeModal(){
  $.post('tutorController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
  });
}
