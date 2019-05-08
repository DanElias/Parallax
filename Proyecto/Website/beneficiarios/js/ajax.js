$(document).ready(moreInfo());

$(document).ready(infoTutor());

$(document).ready(genEstado(41));

$(document).ready(listaTutor());

function genEstado(numero){
  $.post('controladores/modalEstado.php', { id : numero } )
  .done(function(data){
    console.log("genEstado");
    $('#modEst').html(data);
    M.AutoInit();
  });
}

function llenarEdit(number){
  $.post('controladores/genEdit.php', { id : number } )
  .done(function(data){
    console.log(data);
    $('#editarBeneficiario').html(data);
    M.AutoInit();
    M.updateTextFields();
  });
}


function listaTutor(){
  $.post('controladores/listaTutor.php', { opcion : 1 } )
  .done(function(data){
    //console.log(data);
    $('#tutor1').html(data);
    $('#tutor2').html(data);
    M.AutoInit();
  })
  .fail(function(){
    alert('Error: no se pudo cambiar el estado');
    console.log('Error');
  })
}

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

function infoTutor(){
  $.post('tutorController.php', { opcion : 1 } )
  .done(function(data){
    console.log("Funciono");
    $('#todosTutores').html(data);
  });
  M.AutoInit();
}


$(document).ready(function(){
  $('#tutor1').change(function() {
    var ide = this.value;
    var num = 1;
    var newURL = "#modal_informacion_tutor_" + ide;
    $('#info1').attr("href", newURL);
  });
});

$(document).ready(function(){
  $('#tutor2').change(function() {
    var ide = this.value;
    var num = 1;
    var newURL = "#modal_informacion_tutor_" + ide;
    $('#info2').attr("href", newURL);
  });
})

$(document).ready(function(){
  $('#botonCambiarEstado').click(function (){
     var id = $("#id_ben").val();
     var estado = -1;
     if($('#palancaEstado').prop("checked")){
       estado = 1;
     } else{
       estado = 0;
     }
     //alert(estado);
     //console.log("id = " + id);
     //console.log("estado = " + estado);
     $.post('controladores/estadoController.php', { id : id, estado : estado } )
     .done(function(data){
       alert('Estado modificado!');
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
       infoTutor();
       listaTutor();
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
     var apellido_pat= $('#apellido_paterno').val();
     var apellido_mat = $('#apellido_materno').val();
     var fecha= $('#fecha_nacimiento').val();
     var sexo= $('#sexo').val();
     var numero= $('#numero_domicilio').val();
     var calle = $('#calle').val();
     var colonia = $('#colonia').val();
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
     $.post('controladores/registrarBeneficiario.php', { nombre : nombre, apellido_paterno : apellido_pat, apellido_materno : apellido_mat, sexo : sexo, fecha : fecha, numero : numero, calle : calle, colonia : colonia, escuela : escuela, grado : grado, grupo : grupo, estado : estado, nivel : status, cuota : cuota, alergias : enfermedades, par1 : parentesco1, idtut1 : tut1, par2 : parentesco2, idtut2 : tut2  } )
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
       alert('Beneficiario registrado!');
       location.reload(true);
      })
      .fail(function(){
        alert('Error en registro, verifique datos de entrada');

        console.log('Error');
      })
    });
});
