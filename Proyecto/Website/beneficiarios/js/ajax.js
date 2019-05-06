$(document).ready(imprimeTutorExterno());

$(document).ready(moreInfo());

$(document).ready(genEstado(41));

function genEstado(numero){
  $.post('controladores/modalEstado.php', { id : numero } )
  .done(function(data){
    console.log(data);
    $('#modEst').html(data);
    M.AutoInit();
  });
}

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
    //console.log(data);
    $('#modBen').html(data);
    M.AutoInit();
  });
}

function mEst(){
  $.post('controladores/modalEstado.php', { id : 1 } )
  .done(function(data){
    //console.log(data);
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

$(document).ready(function() {
    //set initial state.
    //imprimeNombreBeneficiarioActivo();

    $('#palancaEstado').change(function() {
        if(this.checked) {
          //renderizaTabla(1);
          //actualizaPagina();
          //imprimeNombreBeneficiarioActivo();
          console.log(1);
          $(this).prop("checked");
        } else{
          console.log(0);
          //renderizaTabla(2);
          //imprimeNombreBeneficiario();
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
  M.AutoInit();
}

$(document).ready(function(){
  $('#tutor1').change(function() {
    var ide = this.value;
    var num = 1;
    $.post('controladores/_modales_tutor.php', { id : ide, numero : num } )
    .done(function(data){
      console.log("Funciono Tutor Modal");
      console.log(data);
      $('#modTut1').html(data);
      M.AutoInit();
    });
  });
});

$(document).ready(function(){
  $('#tutor2').change(function() {
    var ide = this.value;
    var num = 2;
    $.post('controladores/_modales_tutor.php', { id : ide, numero : num } )
    .done(function(data){
      console.log("Funciono Tutor Modal 2");
      console.log(data);
      $('#modTut2').html(data);
      M.AutoInit();
    });
  });
});

$(document).ready(function(){
  $('#formaEstado').submit(function (ev){
    ev.preventDefault();
     var id = $("#id_ben").val();
     var estado = -1;
     if($('#palancaEstado').prop("checked")){
       estado = 1;
     } else{
       estado = 0;
     }
     alert(estado);
     console.log("id = " + id);
     console.log("estado = " + estado);
     $.post('controladores/estadoController.php', { id : id, estado : estado } )
     .done(function(data){
       alert('Estado modificado!');
       if($('#botonActivos').prop("checked")){
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

$(document).ready(function(){
  $("#registrarBeneficiario").submit(function (ev){
    ev.preventDefault();
     var nombre= $('#nombre').val();
     var apellido= $('#apellido_paterno').val() + " " + $('#apellido_materno').val();
     var fecha= $('#fecha_nacimiento').val();
     var sexo= $('#sexo').val();
     var domicilio= $('#numero_domicilio').val() + " " + $('#calle').val() + ", Col. " + $('#colonia').val();
     var escuela= $('#escuela').val();
     var grado= $('#grado').val();
     var grupo= $('#grupo').val();
     var cuota= $('#cuota').val();
     var status = $('#status').val();
     var enfermedades= $('#enfermedades').val();
     var estado= -1;
     if($('#estado').prop("checked")){
       estado = 1;
     } else {
       estado = 0;
     }
     var parentesco1 = $('#parentesco1').val();
     var tut1 = $('#tutor1').val();
     var parentesco2 = $('#parentesco2').val();
     var tut2 = $('#tutor2').val();
     if(!$('#benTut2').prop("checked")){
       parentesco2 = "";
       tut2 = "";
     }
     $.post('controladores/registrarBeneficiario.php', { nombre : nombre, apellido : apellido, sexo : sexo, fecha : fecha, domicilio : domicilio, escuela : escuela, grado : grado, grupo : grupo, estado : estado, nivel : status, cuota : cuota, alergias : enfermedades, par1 : parentesco1, idtut1 : tut1, par2 : parentesco2, idtut2 : tut2  } )
     .done(function(data){
       $('#nombre').val("");
       $('#apellido_paterno').val("");
       $('#apellido_materno').val("");
       $('#fecha_nacimiento').val("");
       $('#sexo').val("");
       $('#numero_domicilio').val("");
       $('#calle').val("");
       $('#colonia').val("");
       $('#escuela').val("");
       $('#grado').val("");
       $('#grupo').val("");
       $('#cuota').val("");
       $('#status').val("");
       $('#enfermedades').val("");
       imprimeNombreBeneficiarioActivo();
       moreInfo();
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
