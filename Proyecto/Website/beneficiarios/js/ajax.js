$(document).ready(moreInfo());

$(document).ready(infoTutor());

//$(document).ready(genEstado(41));

$(document).ready(listaTutor());

function genEstado(numero){
  var n = numero;
  $.post('controladores/modalEstado.php', { id : n} )
  .done(function(data){
    //console.log("genEstado");
    $('#formEstado').html(data);
    M.AutoInit();
  });
}

function genBorrarBen(numero){
  var n = numero;
  $.post('controladores/genDelBen.php', { id : n } )
  .done(function(data){
    //console.log("genEstado");
    $('#eliminarBen').html(data);
    M.AutoInit();
  });
}

function genBorrarTut(numero){
  var n = numero;
  $.post('controladores/genDelTut.php', { id : n } )
  .done(function(data){
    //console.log("genEstado");
    $('#eliminarTut').html(data);
    //M.AutoInit();
  });
}

function genBorrarTut2(numero){
  var n = numero;
  $.post('controladores/genDelTut2.php', { id : n } )
  .done(function(data){
    //console.log("genEstado");
    $('#eliminarTut2').html(data);
    //M.AutoInit();
  });
}

function llenarEdit(number){
  $.post('controladores/genEdit.php', { id : number } )
  .done(function(data){
    //console.log(data);
    $('#editarBeneficiario').html(data);
    M.AutoInit();
    M.updateTextFields();
  });
}

function llenarEditTutor(number){
  $.post('controladores/genEditTutor.php', { id : number } )
  .done(function(data){
    //console.log(data);
    $('#editarTutor').html(data);
    //M.AutoInit();
    $('#_form_editar_tutor').modal();
    M.updateTextFields();
    $('select').formSelect();
  });
}

function llenarEditTutor2(number){
  $.post('controladores/genEditTutor2.php', { id : number } )
  .done(function(data){
    //console.log(data);
    $('#editarTutor2').html(data);
    //M.AutoInit();
    $('#_form_editar_tutor_2').modal();
    M.updateTextFields();
    $('select').formSelect();
  });
}

function listaTutor(){
  $.post('controladores/listaTutor.php', { opcion : 1 } )
  .done(function(data){
    //console.log(data);
    $('#tutor1').html(data);
    $('#tutor2').html(data);
    //$('#etutor1').html(data);
    //$('#etutor2').html(data);
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
    //console.log("Funciono");
    $('#todosTutores').html(data);
  });
  M.AutoInit();
}


$(document).ready(function(){
  $('#tutor1').change(function() {
    var ide = this.value;
    var num = 1;
    var newURL = "#modal_informacion_tutor_" + ide;
    $('#idtutor1').html("&nbsp;&nbsp;" + ide + "&nbsp;&nbsp;");
    llenarEditTutor(ide);
    genBorrarTut(ide);
    $('#info1').attr("href", newURL);
  });
});

$(document).ready(function(){
  $('#tutor2').change(function() {
    var ide = this.value;
    var num = 1;
    var newURL = "#modal_informacion_tutor_" + ide;
    $('#idtutor2').html("&nbsp;&nbsp;" + ide + "&nbsp;&nbsp;");
    llenarEditTutor2(ide);
    genBorrarTut2(ide);
    $('#info2').attr("href", newURL);
  });
})

$(document).on('click', '.editarBen', function(){
  $('#etutor1').change(function() {
      //console.log("Cambio de valor etutor1");
      var ide = this.value;
      var num = 1;
      var newURL = "#modal_informacion_tutor_" + ide;
      $('#eidtutor1').html("&nbsp;&nbsp;" + ide + "&nbsp;&nbsp;");
      llenarEditTutor(ide);
      genBorrarTut(ide);
      $('#einfo1').attr("href", newURL);
  });
});

$(document).on('click', '.editarBen', function(){
  $('#etutor2').change(function() {
      //console.log("Cambio de valor etutor1");
      var ide = this.value;
      var num = 1;
      var newURL = "#modal_informacion_tutor_" + ide;
      $('#eidtutor2').html("&nbsp;&nbsp;" + ide + "&nbsp;&nbsp;");
      llenarEditTutor2(ide);
      genBorrarTut2(ide);
      $('#einfo2').attr("href", newURL);
  });
});

$(document).ready(function(){
  $('#formEstado').submit(function (ev){
    ev.preventDefault();
     var id = $("#id_ben").val();
     var estado = -1;
     if($('#palancaEstado').prop("checked")){
       estado = 1;
     } else{
       estado = 0;
     }
     $.post('controladores/estadoController.php', { id : id, estado : estado } )
     .done(function(data){
       alert('Estado modificado!');
       location.reload(true);
      })
      .fail(function(){
        alert('Error: no se pudo cambiar el estado');
        console.log('Error');
      })
    });
});

$(document).ready(function(){
  $('#eliminarBen').submit(function (ev){
    ev.preventDefault();
     var id = $("#borrar_id").val();
     var name = $("#borrar_nomben").val();
     if(validar_nomcom(name) && $.isNumeric(id)){
       $.post('controladores/deleteBen.php', { id : id, nombre : name } )
       .done(function(data){
         alert(data);
         location.reload(true);
        })
        .fail(function(){
          alert('Error: no se pudo eliminar el beneficiario');
          console.log('Error');
        })
      } else {
        alert('El Beneficiario no pudo ser eliminado, intente más tarde');
      }
    });
});

$(document).ready(function(){
  $('#eliminarTut').submit(function (ev){
    ev.preventDefault();
     var id = $("#borrarTut_id").val();
     var name = $("#borrarTut_nombre").val();
     if(validar_nomcom(name) && $.isNumeric(id)){
       $.post('controladores/deleteTutor.php', { id : id, nombre : name } )
       .done(function(data){
         alert(data);
         infoTutor();
         listaTutor();
         location.reload(true);
        })
        .fail(function(){
          alert('Error: no se pudo eliminar el tutor');

        })
    } else {
      alert('El tutor no pudo ser eliminado, intente más tarde');
    }
  });
});

$(document).ready(function(){
  $('#eliminarTut2').submit(function (ev){
    ev.preventDefault();
     var id = $("#borrarTut2_id").val();
     var name = $("#borrarTut2_nombre").val();
     if(validar_nomcom(name) && $.isNumeric(id)){
       $.post('controladores/deleteTutor.php', { id : id, nombre : name } )
       .done(function(data){
         alert(data);
         infoTutor();
         listaTutor();
         location.reload(true);
        })
        .fail(function(){
          alert('Error: no se pudo eliminar el tutor');

        })
    } else {
      alert('El tutor no pudo ser eliminado, intente más tarde');
    }
  });
});

$(document).ready(function(){
  $("#registroTutor").submit(function (ev){
    ev.preventDefault();
    if(validate_registrar_tutor()){
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
         alert(data);
         if(data != 'Errores en los campos'){
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
         } else {
           // Do nothing
         }
         //console.log('Insercion de tutor correcta');
         //alert('Tutor registrado con éxito!');

        })
        .fail(function(){
          alert('Error en registro, verifique datos de entrada');

          //console.log('Error');
        })
      } else {
        alert('Todavía hay campos con errores');
      }
    });
});

$(document).ready(function(){
  $("#editarTutor").submit(function (ev){
    ev.preventDefault();
    if(validate_editar_tutor1()){
      var id = $('#eid_t').val();
       var nombre= $('#enombre_tutor').val();
       var apellido= $('#eapellido_tutor').val();
       var fecha= $('#efecha_nacimiento_tutor').val();
       var telefono= $('#etelefono').val();
       var ocupacion= $('#eocupacion').val();
       var empresa= $('#eempresa').val();
       var grado= $('#egrado_estudios_tutor').val();
       var titulo= $('#etitulo').val();
       $.post('controladores/editTutor.php', { id : id, nombre : nombre, apellido : apellido, empresa : empresa, fecha : fecha, telefono : telefono, ocupacion : ocupacion, grado : grado, titulo : titulo } )
       .done(function(data){
         //console.log('Tutor modificado correctmente');
         alert(data);
         infoTutor();
         listaTutor();

        })
        .fail(function(){
          alert('Error en edición, verifique datos de entrada');

          //console.log('Error');
        })
      } else {
        alert('Hay campos con errores');
      }
    });
});
$(document).ready(function(){
  $("#editarTutor2").submit(function (ev){
    ev.preventDefault();
    if(validate_editar_tutor2()){
      var id = $('#eeid_t').val();
       var nombre= $('#eenombre_tutor').val();
       var apellido= $('#eeapellido_tutor').val();
       var fecha= $('#eefecha_nacimiento_tutor').val();
       var telefono= $('#eetelefono').val();
       var ocupacion= $('#eeocupacion').val();
       var empresa= $('#eeempresa').val();
       var grado= $('#eegrado_estudios_tutor').val();
       var titulo= $('#eetitulo').val();
       $.post('controladores/editTutor.php', { id : id, nombre : nombre, apellido : apellido, empresa : empresa, fecha : fecha, telefono : telefono, ocupacion : ocupacion, grado : grado, titulo : titulo } )
       .done(function(data){
         //console.log('Tutor modificado correctmente');
         alert(data);
         infoTutor();
         listaTutor();
        })
        .fail(function(){
          alert('Error en edición, verifique datos de entrada');

          console.log('Error');
        })
      } else {
        alert('Hay campos con errores');
      }
    });
});

$(document).ready(function(){
  $("#registrarBeneficiario").submit(function (ev){
    ev.preventDefault();
    if(validate_registrar_ben()){
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
     if(parentesco1 === null){
       $('#errorPar1').html('*No puede dejarse vacío');
       return;
     } else {
       $('#errorPar1').html('');
     }
     if(tut1 === null){
       $('#errorTut1').html('*No puede dejarse vacío');
       return;
     } else {
       $('#errorTut1').html('');
     }
     var parentesco2 = $('#parentesco2').val();
     var tut2 = $('#tutor2').val();
     if(!$('#benTut2').prop("checked")){
       parentesco2 = "";
       tut2 = "";
       $('#errorPar2').html('');
       $('#errorTut2').html('');
     } else {
       if(parentesco2 === null){
         $('#errorPar2').html('*No puede dejarse vacío');
         return;
       } else {
         $('#errorPar2').html('');
       }
       if(tut2 === null){
         $('#errorTut2').html('*No puede dejarse vacío');
         return;
       } else {
         $('#errorTut2').html('');
       }
     }
     if(validate_registrar_ben()){
       $.post('controladores/registrarBeneficiario.php', { nombre : nombre, apellido_paterno : apellido_pat, apellido_materno : apellido_mat, sexo : sexo, fecha : fecha, numero : numero, calle : calle, colonia : colonia, escuela : escuela, grado : grado, grupo : grupo, estado : estado, nivel : status, cuota : cuota, alergias : enfermedades, par1 : parentesco1, idtut1 : tut1, par2 : parentesco2, idtut2 : tut2  } )
       .done(function(data){
         alert(data);
         if(data == 'Hay campos que presentan errores'){
           //
         } else {
           location.reload(true);
         }
         //location.reload(true);
        })
        .fail(function(){
          alert('Error en registro, verifique datos de entrada');
        })
      } else {
        alert('Hay errores en los campos');
      }
    } else {
      alert('Hay errores en los campos');
    }
  });
});

$(document).ready(function(){
  $("#_form_editar_beneficiarios").submit(function (ev){
    ev.preventDefault();
     var id = $('#eid_b').val();
     var nombre= $('#enombre').val();
     var apellido_pat= $('#eapellido_paterno').val();
     var apellido_mat = $('#eapellido_materno').val();
     var fecha= $('#efecha_nacimiento').val();
     var sexo= $('#esexo').val();
     var numero= $('#enumero_domicilio').val();
     var calle = $('#ecalle').val();
     var colonia = $('#ecolonia').val();
     var escuela= $('#eescuela').val();
     var grado= $('#egrado').val();
     var grupo= $('#egrupo').val();
     var cuota= $('#ecuota').val();
     var status = $('#estatus').val();
     var enfermedades= $('#eenfermedades').val();
     var estado= -1;
     if($('#eestado').prop("checked")){
       estado = 1;
     } else {
       estado = 0;
     }
     var par1 = $('#eparentesco1').val();
     var tutor1 = $('#etutor1').val();
     var par2 = $('#eparentesco2').val();
     var tutor2 = $('#etutor2').val();
     if(!$('#ebenTut2').prop("checked")){
       par2 = "";
       tutor2 = "";
     }
     $.post('controladores/editBen.php', { id : id, nombre : nombre, apellido_paterno : apellido_pat, apellido_materno : apellido_mat, sexo : sexo, fecha : fecha, numero : numero, calle : calle, colonia : colonia, escuela : escuela, grado : grado, grupo : grupo, estado : estado, nivel : status, cuota : cuota, alergias : enfermedades, par1 : par1, tutor1 : tutor1, par2 : par2, tutor2 : tutor2 } )
     .done(function(data){

       alert('Beneficiario editado!');
       location.reload(true);
      })
      .fail(function(){
        alert('Error en edición, verifique datos de entrada');

        console.log('Error');
      })
    });
});
