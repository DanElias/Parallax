$(document).ready(function(){
  $('#fecha_nacimiento').focusout(function(){
    var today = new Date();
    var fecha= $('#fecha_nacimiento').val();
    var f = fecha.split("-");
    if(f[0] > today.getFullYear()){
      $('#errorFecha').html("*Fecha no válida");
    } else if(f[0] == today.getFullYear()){
      if(f[1] > today.getMonth() + 1){
        $('#errorFecha').html("*Fecha no válida");
      } else if(f[1] == today.getMonth() + 1){
        if(f[2] > today.getDate()){
          $('#errorFecha').html("*Fecha no válida");
        } else{
          $('#errorFecha').html("");
        }
      } else{
        $('#errorFecha').html("");
      }
    } else{
      $('#errorFecha').html("");
    }
  });
});

$(document).ready(function(){
  $('#fecha_nacimiento_tutor').focusout(function(){
    var today = new Date();
    var fecha= $('#fecha_nacimiento_tutor').val();
    var f = fecha.split("-");
    if(f[0] > today.getFullYear()){
      $('#errorFechaTut').html("*Fecha no válida");
    } else if(f[0] == today.getFullYear()){
      if(f[1] > today.getMonth() + 1){
        $('#errorFechaTut').html("*Fecha no válida");
      } else if(f[1] == today.getMonth() + 1){
        if(f[2] > today.getDate()){
          $('#errorFechaTut').html("*Fecha no válida");
        } else{
          $('#errorFechaTut').html("");
        }
      } else{
        $('#errorFechaTut').html("");
      }
    } else{
      $('#errorFechaTut').html("");
    }
  });
});

//Validacion agregar beneficiario
$(document).ready(function(){
  $('#nombre').keyup(function(){
    if(validar_nom(this.value)){
      $('#errorNombre').html("");
    } else {
      $('#errorNombre').html('*Caracter inválido en el nombre');
    }
  });
});

$(document).ready(function(){
  $('#apellido_paterno').keyup(function(){
    if(validar_nom(this.value)){
      $('#errorApPat').html("");
    } else {
      $('#errorApPat').html('*Caracter inválido en el apellido');
    }
  });
});

$(document).ready(function(){
  $('#apellido_materno').keyup(function(){
    if(validar_nom(this.value)){
      $('#errorApMat').html("");
    } else {
      $('#errorApMat').html('*Caracter inválido en el apellido');
    }
  });
});

$(document).ready(function(){
  $('#sexo').change(function(){
    if(validar_sexo(this.value)){
      $('#errorSexo').html("");
    } else {
      $('#errorSexo').html('*Hay un error, favor de recargar la página');
      alert('El valor del sexo no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).ready(function(){
  $('#numero_domicilio').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 20){
      $('#errorNum').html("");
    } else {
      $('#errorNum').html('*Caracter inválido en el número');
    }
  });
});

$(document).ready(function(){
  $('#calle').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 40){
      $('#errorCalle').html("");
    } else {
      $('#errorCalle').html('*Caracter inválido en la calle');
    }
  });
});

$(document).ready(function(){
  $('#colonia').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 40){
      $('#errorCol').html("");
    } else {
      $('#errorCol').html('*Caracter inválido en la colonia');
    }
  });
});

$(document).ready(function(){
  $('#grado').change(function(){
    if(validar_grado(this.value)){
      $('#errorGrado').html("");
    } else {
      $('#errorGrado').html('*Hay un error, favor de recargar la página');
      alert('El valor del grado no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).ready(function(){
  $('#escuela').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 40){
      $('#errorEsc').html("");
    } else {
      $('#errorEsc').html('*Caracter inválido en la escuela');
    }
  });
});

$(document).ready(function(){
  $('#grupo').change(function(){
    if(validar_grupo(this.value)){
      $('#errorGrupo').html("");
    } else {
      $('#errorGrupo').html('*Hay un error, favor de recargar la página');
      alert('El valor del grupo no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).ready(function(){
  $('#cuota').keyup(function(){
    if(validar_cuota(this.value)){
      $('#errorCuota').html("");
    } else {
      $('#errorCuota').html('*Caracter inválido en la cuota');
    }
  });
});

$(document).ready(function(){
  $('#enfermedades').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 100){
      $('#errorEnf').html("");
    } else {
      $('#errorEnf').html('*Caracter inválido en las alergias');
    }
  });
});

$(document).ready(function(){
  $('#status').change(function(){
    if(validar_status(this.value)){
      $('#errorSta').html("");
    } else {
      $('#errorSta').html('*Hay un error, favor de recargar la página');
      alert('El valor del estado socioeconómico no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).ready(function(){
  $('#parentesco1').change(function(){
    if(validar_parentesco(this.value)){
      $('#errorPar1').html("");
    } else {
      $('#errorPar1').html('*Hay un error, favor de recargar la página');
      alert('El valor del parentesco no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).ready(function(){
  $('#parentesco2').change(function(){
    if(validar_parentesco(this.value)){
      $('#errorPar2').html("");
    } else {
      $('#errorPar2').html('*Hay un error, favor de recargar la página');
      alert('El valor del parentesco no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).ready(function(){
  $('#tutor1').change(function(){
    if(validar_cuota(this.value)){
      checar_tutor(this.value, $('#tutor1 option:selected').text(), $('#errorTut1'));
      var err = '*Los valores para ambos tutores son iguales, favor de cambiar';
      if(($('#errorTut1').html() == '' || $('#errorTut1').html() == err) && ($('#errorTut2').html() == '' || $('#errorTut2').html() == err )){
        if($('#tutor1').val() == $('#tutor2').val()){
          $('#errorTut2').html('*Los valores para ambos tutores son iguales, favor de cambiar');
        } else {
          $('#errorTut2').html('');
        }
      }
    } else {
      $('#errorTut1').html('*Hay un error, favor de recargar la página');
      alert('El valor del id del tutor no coincide con el tutor seleccionado, se recargara la página para restaurarlo');
      location.reload(true);
    }

  });
});

$(document).ready(function(){
  $('#tutor2').change(function(){
    if(validar_cuota(this.value)){
      checar_tutor(this.value, $('#tutor2 option:selected').text(), $('#errorTut2'));
      var err = '*Los valores para ambos tutores son iguales, favor de cambiar';
      if(($('#errorTut1').html() == '' || $('#errorTut1').html() == err) && ($('#errorTut2').html() == '' || $('#errorTut2').html() == err )){
        if($('#tutor1').val() == $('#tutor2').val()){
          $('#errorTut1').html('*Los valores para ambos tutores son iguales, favor de cambiar');
        } else {
          $('#errorTut1').html('');
        }
      }
    } else {
      $('#errorTut2').html('*Hay un error, favor de recargar la página');
      alert('El valor del id del tutor no coincide con el tutor seleccionado, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});
//Termina validacion agregar beneficiario

//Validacion agregar tutor
$(document).ready(function(){
  $('#nombre_tutor').keyup(function(){
    if(validar_nom(this.value)){
      $('#errorNombreTut').html("");
    } else {
      $('#errorNombreTut').html('*Caracter inválido en el nombre');
    }
  });
});

$(document).ready(function(){
  $('#apellido_tutor').keyup(function(){
    if(validar_nom(this.value)){
      $('#errorApellidoTut').html("");
    } else {
      $('#errorApellidoTut').html('*Caracter inválido en el apellido');
    }
  });
});

$(document).ready(function(){
  $('#telefono').keyup(function(){
    if(validar_telefono(this.value)){
      $('#errorTelTut').html("");
    } else {
      $('#errorTelTut').html('*Caracter inválido en el teléfono');
    }
  });
});

$(document).ready(function(){
  $('#ocupacion').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 50){
      $('#errorOcuTut').html("");
    } else {
      $('#errorOcuTut').html('*Caracter inválido en la ocupación');
    }
  });
});

$(document).ready(function(){
  $('#empresa').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 100){
      $('#errorEmpTut').html("");
    } else {
      $('#errorEmpTut').html('*Caracter inválido en la empresa');
    }
  });
});

$(document).ready(function(){
  $('#titulo').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 100){
      $('#errorTitTut').html("");
    } else {
      $('#errorTitTut').html('*Caracter inválido en el título');
    }
  });
});

$(document).ready(function(){
  $('#grado_estudios_tutor').change(function(){
    if(validar_grado_estudios(this.value)){
      $('#errorGraTut').html("");
    } else {
      $('#errorGraTut').html('*Hay un error, favor de recargar la página');
      alert('El valor del grado no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

// Termina validacion agregar tutor

// Validacion editar beneficiario
$(document).on('click', '.editarBen', function(){
  $('#efecha_nacimiento').focusout(function(){
    var today = new Date();
    var fecha= $('#efecha_nacimiento').val();
    var f = fecha.split("-");
    if(f[0] > today.getFullYear()){
      $('#eerrorFecha').html("*Fecha no válida");
    } else if(f[0] == today.getFullYear()){
      if(f[1] > today.getMonth() + 1){
        $('#eerrorFecha').html("*Fecha no válida");
      } else if(f[1] == today.getMonth() + 1){
        if(f[2] > today.getDate()){
          $('#eerrorFecha').html("*Fecha no válida");
        } else{
          $('#eerrorFecha').html("");
        }
      } else{
        $('#eerrorFecha').html("");
      }
    } else{
      $('#eerrorFecha').html("");
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#enombre').keyup(function(){
    if(validar_nom(this.value)){
      $('#eerrorNombre').html("");
    } else {
      $('#eerrorNombre').html('*Caracter inválido en el nombre');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#eapellido_paterno').keyup(function(){
    if(validar_nom(this.value)){
      $('#eerrorApPat').html("");
    } else {
      $('#eerrorApPat').html('*Caracter inválido en el apellido');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#eapellido_materno').keyup(function(){
    if(validar_nom(this.value)){
      $('#eerrorApMat').html("");
    } else {
      $('#eerrorApMat').html('*Caracter inválido en el apellido');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#esexo').change(function(){
    if(validar_sexo(this.value)){
      $('#eerrorSexo').html("");
    } else {
      $('#eerrorSexo').html('*Hay un error, favor de recargar la página');
      alert('El valor del sexo no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#enumero_domicilio').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 20){
      $('#eerrorNum').html("");
    } else {
      $('#eerrorNum').html('*Caracter inválido en el número');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#ecalle').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 40){
      $('#eerrorCalle').html("");
    } else {
      $('#eerrorCalle').html('*Caracter inválido en la calle');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#ecolonia').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 40){
      $('#eerrorCol').html("");
    } else {
      $('#eerrorCol').html('*Caracter inválido en la colonia');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#egrado').change(function(){
    if(validar_grado(this.value)){
      $('#eerrorGrado').html("");
    } else {
      $('#eerrorGrado').html('*Hay un error, favor de recargar la página');
      alert('El valor del grado no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#eescuela').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 40){
      $('#eerrorEsc').html("");
    } else {
      $('#eerrorEsc').html('*Caracter inválido en la escuela');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#egrupo').change(function(){
    if(validar_grupo(this.value)){
      $('#eerrorGrupo').html("");
    } else {
      $('#eerrorGrupo').html('*Hay un error, favor de recargar la página');
      alert('El valor del grupo no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#ecuota').keyup(function(){
    if(validar_cuota(this.value)){
      $('#eerrorCuota').html("");
    } else {
      $('#eerrorCuota').html('*Caracter inválido en la cuota');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#eenfermedades').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 100){
      $('#eerrorEnf').html("");
    } else {
      $('#eerrorEnf').html('*Caracter inválido en las alergias');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#estatus').change(function(){
    if(validar_status(this.value)){
      $('#eerrorSta').html("");
    } else {
      $('#eerrorSta').html('*Hay un error, favor de recargar la página');
      alert('El valor del estado socioeconómico no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#eparentesco1').change(function(){
    if(validar_parentesco(this.value)){
      $('#eerrorPar1').html("");
    } else {
      $('#eerrorPar1').html('*Hay un error, favor de recargar la página');
      alert('El valor del parentesco no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#eparentesco2').change(function(){
    if(validar_parentesco(this.value)){
      $('#eerrorPar2').html("");
    } else {
      $('#eerrorPar2').html('*Hay un error, favor de recargar la página');
      alert('El valor del parentesco no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#etutor1').change(function(){
    if(validar_cuota(this.value)){
      checar_tutor(this.value, $('#etutor1 option:selected').text(), $('#eerrorTut1'));
      var err = '*Los valores para ambos tutores son iguales, favor de cambiar';
      if(($('#eerrorTut1').html() == '' || $('#eerrorTut1').html() == err) && ($('#eerrorTut2').html() == '' || $('#eerrorTut2').html() == err )){
        if($('#etutor1').val() == $('#etutor2').val()){
          $('#eerrorTut2').html('*Los valores para ambos tutores son iguales, favor de cambiar');
        } else {
          $('#eerrorTut2').html('');
        }
      }
    } else {
      $('#eerrorTut1').html('*Hay un error, favor de recargar la página');
      alert('El valor del id del tutor no coincide con el tutor seleccionado, se recargara la página para restaurarlo');
      location.reload(true);
    }

  });
});

$(document).on('click', '.editarBen', function(){
  $('#etutor2').change(function(){
    if(validar_cuota(this.value)){
      checar_tutor(this.value, $('#etutor2 option:selected').text(), $('#eerrorTut2'));
      var err = '*Los valores para ambos tutores son iguales, favor de cambiar';
      if(($('#eerrorTut1').html() == '' || $('#eerrorTut1').html() == err) && ($('#eerrorTut2').html() == '' || $('#eerrorTut2').html() == err )){
        if($('#etutor1').val() == $('#etutor2').val()){
          $('#eerrorTut1').html('*Los valores para ambos tutores son iguales, favor de cambiar');
        } else {
          $('#eerrorTut1').html('');
        }
      }
    } else {
      $('#eerrorTut2').html('*Hay un error, favor de recargar la página');
      alert('El valor del id del tutor no coincide con el tutor seleccionado, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});

// Termina validacion editar beneficiario

//Validacion editar tutor 1
$(document).on('click', '.editarTut1', function(){
  $('#efecha_nacimiento_tutor').focusout(function(){
    var today = new Date();
    var fecha= $('#efecha_nacimiento_tutor').val();
    var f = fecha.split("-");
    if(f[0] > today.getFullYear()){
      $('#eerrorFechaTut').html("*Fecha no válida");
    } else if(f[0] == today.getFullYear()){
      if(f[1] > today.getMonth() + 1){
        $('#eerrorFechaTut').html("*Fecha no válida");
      } else if(f[1] == today.getMonth() + 1){
        if(f[2] > today.getDate()){
          $('#eerrorFechaTut').html("*Fecha no válida");
        } else{
          $('#eerrorFechaTut').html("");
        }
      } else{
        $('#eerrorFechaTut').html("");
      }
    } else{
      $('#eerrorFechaTut').html("");
    }
  });
});

$(document).on('click', '.editarTut1', function(){
  $('#enombre_tutor').keyup(function(){
    if(validar_nom(this.value)){
      $('#eerrorNombreTut').html("");
    } else {
      $('#eerrorNombreTut').html('*Caracter inválido en el nombre');
    }
  });
});

$(document).on('click', '.editarTut1', function(){
  $('#eapellido_tutor').keyup(function(){
    if(validar_nom(this.value)){
      $('#eerrorApellidoTut').html("");
    } else {
      $('#eerrorApellidoTut').html('*Caracter inválido en el apellido');
    }
  });
});

$(document).on('click', '.editarTut1', function(){
  $('#etelefono').keyup(function(){
    if(validar_telefono(this.value)){
      $('#eerrorTelTut').html("");
    } else {
      $('#eerrorTelTut').html('*Caracter inválido en el teléfono');
    }
  });
});

$(document).on('click', '.editarTut1', function(){
  $('#eocupacion').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 50){
      $('#eerrorOcuTut').html("");
    } else {
      $('#eerrorOcuTut').html('*Caracter inválido en la ocupación');
    }
  });
});

$(document).on('click', '.editarTut1', function(){
  $('#eempresa').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 100){
      $('#eerrorEmpTut').html("");
    } else {
      $('#eerrorEmpTut').html('*Caracter inválido en la empresa');
    }
  });
});

$(document).on('click', '.editarTut1', function(){
  $('#etitulo').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 100){
      $('#eerrorTitTut').html("");
    } else {
      $('#eerrorTitTut').html('*Caracter inválido en el título');
    }
  });
});

$(document).on('click', '.editarTut1', function(){
  $('#egrado_estudios_tutor').change(function(){
    if(validar_grado_estudios(this.value)){
      $('#eerrorGraTut').html("");
    } else {
      $('#eerrorGraTut').html('*Hay un error, favor de recargar la página');
      alert('El valor del grado no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});
//Termina valiacion editar tutor 1

//Validacion editar etutor2
$(document).on('click', '.editarTut2', function(){
  $('#eefecha_nacimiento_tutor').focusout(function(){
    var today = new Date();
    var fecha= $('#eefecha_nacimiento_tutor').val();
    var f = fecha.split("-");
    if(f[0] > today.getFullYear()){
      $('#eeerrorFechaTut').html("*Fecha no válida");
    } else if(f[0] == today.getFullYear()){
      if(f[1] > today.getMonth() + 1){
        $('#eeerrorFechaTut').html("*Fecha no válida");
      } else if(f[1] == today.getMonth() + 1){
        if(f[2] > today.getDate()){
          $('#eeerrorFechaTut').html("*Fecha no válida");
        } else{
          $('#eeerrorFechaTut').html("");
        }
      } else{
        $('#eeerrorFechaTut').html("");
      }
    } else{
      $('#eeerrorFechaTut').html("");
    }
  });
});

$(document).on('click', '.editarTut2', function(){
  $('#eenombre_tutor').keyup(function(){
    if(validar_nom(this.value)){
      $('#eeerrorNombreTut').html("");
    } else {
      $('#eeerrorNombreTut').html('*Caracter inválido en el nombre');
    }
  });
});

$(document).on('click', '.editarTut2', function(){
  $('#eeapellido_tutor').keyup(function(){
    if(validar_nom(this.value)){
      $('#eeerrorApellidoTut').html("");
    } else {
      $('#eeerrorApellidoTut').html('*Caracter inválido en el apellido');
    }
  });
});

$(document).on('click', '.editarTut2', function(){
  $('#eetelefono').keyup(function(){
    if(validar_telefono(this.value)){
      $('#eeerrorTelTut').html("");
    } else {
      $('#eeerrorTelTut').html('*Caracter inválido en el teléfono');
    }
  });
});

$(document).on('click', '.editarTut2', function(){
  $('#eeocupacion').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 50){
      $('#eeerrorOcuTut').html("");
    } else {
      $('#eeerrorOcuTut').html('*Caracter inválido en la ocupación');
    }
  });
});

$(document).on('click', '.editarTut2', function(){
  $('#eeempresa').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 100){
      $('#eeerrorEmpTut').html("");
    } else {
      $('#eeerrorEmpTut').html('*Caracter inválido en la empresa');
    }
  });
});

$(document).on('click', '.editarTut2', function(){
  $('#eetitulo').keyup(function(){
    if(validar_calle(this.value) && this.value.length <= 100){
      $('#eeerrorTitTut').html("");
    } else {
      $('#eeerrorTitTut').html('*Caracter inválido en el título');
    }
  });
});

$(document).on('click', '.editarTut2', function(){
  $('#eegrado_estudios_tutor').change(function(){
    if(validar_grado_estudios(this.value)){
      $('#eeerrorGraTut').html("");
    } else {
      $('#eeerrorGraTut').html('*Hay un error, favor de recargar la página');
      alert('El valor del grado no coincide con las opciones, se recargara la página para restaurarlo');
      location.reload(true);
    }
  });
});
//Termina validacion tutor2

//Validar input completo registrar beneficiarios
function validate_registrar_ben(){
  if($('#errorNombre').html() == ''
  && $('#errorApPat').html() == ''
  && $('#errorApMat').html() == ''
  && $('#errorFecha').html() == ''
  && $('#errorSexo').html() == ''
  && $('#errorNum').html() == ''
  && $('#errorCalle').html() == ''
  && $('#errorCol').html() == ''
  && $('#errorGrado').html() == ''
  && $('#errorEsc').html() == ''
  && $('#errorGrupo').html() == ''
  && $('#errorCuota').html() == ''
  && $('#errorEnf').html() == ''
  && $('#errorSta').html() == ''
  && $('#errorPar1').html() == ''
  && $('#errorTut1').html() == ''
  && $('#errorPar2').html() == ''
  && $('#errorTut2').html() == ''){
    return true;
  } else {
    return false;
  }
}
//Termina

//Validar input completo registrar tutor
function validate_registrar_tutor(){
  if($('#errorNombreTut').html() == ''
  && $('#errorApellidoTut').html() == ''
  && $('#errorFechaTut').html() == ''
  && $('#errorTelTut').html() == ''
  && $('#errorOcuTut').html() == ''
  && $('#errorEmpTut').html() == ''
  && $('#errorGraTut').html() == ''
  && $('#errorTitTut').html() == ''){
    return true;
  } else {
    return false;
  }
}
//Termina

//Validar input completo editar tutor1
function validate_editar_tutor1(){
  if($('#eerrorNombreTut').html() == ''
  && $('#eerrorApellidoTut').html() == ''
  && $('#eerrorFechaTut').html() == ''
  && $('#eerrorTelTut').html() == ''
  && $('#eerrorOcuTut').html() == ''
  && $('#eerrorEmpTut').html() == ''
  && $('#eerrorGraTut').html() == ''
  && $('#eerrorTitTut').html() == ''
  && validar_cuota($('#eid_t').val())){
    return true;
  } else {
    return false;
  }
}
//Termina

//Validar input completo editar tutor2
function validate_editar_tutor2(){
  if($('#eeerrorNombreTut').html() == ''
  && $('#eeerrorApellidoTut').html() == ''
  && $('#eeerrorFechaTut').html() == ''
  && $('#eeerrorTelTut').html() == ''
  && $('#eeerrorOcuTut').html() == ''
  && $('#eeerrorEmpTut').html() == ''
  && $('#eeerrorGraTut').html() == ''
  && $('#eeerrorTitTut').html() == ''
  && validar_cuota($('#eeid_t').val())){
    return true;
  } else {
    return false;
  }
}
//Termina

function validar_nom(nombre){
  //var regex = new RegExp("/[^A-Za-záéíóúüñÑÁÉÍÓÚ ]/");
  if(nombre.length <= 40){
    return !/[^A-Za-záéíóúüñÑÁÉÍÓÚ ]/.test(nombre);
  }
  return false;
}

function validar_nomcom(nombre){
    return !/[^A-Za-záéíóúüñÑÁÉÍÓÚ ]/.test(nombre);
}



function validar_sexo(sexo){
  //var regex = new RegExp("/[^A-Za-záéíóúüñÑÁÉÍÓÚ ]/");
  if(sexo.length == 1){
    return /(H|M)$/.test(sexo);
  }
  return false;
}

function validar_calle(calle){
  return !/[^A-Za-záéíóúüñÑÁÉÍÓÚ0-9\.#,\' ]/.test(calle);
}

function validar_grado(grado){
  switch (grado){
    case '1ro Preescolar':
      return true;

    case '2do Preescolar':
      return true;

    case '3ro Preescolar':
      return true;

    case '4to Preescolar':
      return true;

    case '1ro Primaria':
      return true;

    case '2do Primaria':
      return true;

    case '3ro Primaria':
      return true;

    case '4to Primaria':
      return true;

    case '5to Primaria':
      return true;

    case '6to Primaria':
      return true;

    case '1ro Secundaria':
      return true;

    case '2do Secundaria':
      return true;

    case '3ro Secundaria':
      return true;

    default:
      return false;
  }
}

function validar_grupo(grado){
  switch (grado){
    case 'Preescolar':
      return true;

    case 'Primaria Baja':
      return true;

    case 'Primaria Alta':
      return true;

    case 'Secundaria':
      return true;

    default:
      return false;
  }
}

function validar_status(grado){
  switch (grado){
    case 'Pobreza':
      return true;

    case 'Pobreza Extrema':
      return true;

    case 'Media Baja':
      return true;

    case 'Media Media':
      return true;

    case 'Media Alta':
      return true;

    default:
      return false;
  }
}

function validar_cuota(calle){
  return $.isNumeric(calle);
}

function validar_parentesco(grado){
  switch (grado){
    case 'Padre':
      return true;

    case 'Madre':
      return true;

    case 'Tutor':
      return true;

    default:
      return false;
  }
}

function validar_grado_estudios(grado){
  switch (grado){
    case 'Ninguno':
      return true;

    case 'Primaria':
      return true;

    case 'Secundaria':
      return true;

    case 'Bachillerato':
      return true;

    case 'Licenciatura':
      return true;

    case 'Posgrado':
      return true;

    default:
      return false;
  }
}

function checar_tutor(id, nombre, elem){
  $.post('controladores/validTutor.php', { id : id, nombre : nombre } )
  .done(function(data){
    elem.html(data);
   })
}


function validar_telefono(tel){
  return !/[^0-9+()\- ]/.test(tel);
}
