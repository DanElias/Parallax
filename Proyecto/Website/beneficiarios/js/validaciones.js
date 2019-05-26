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
      $('#erroCol').html("");
    } else {
      $('#erroCol').html('*Caracter inválido en la colonia');
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
    if(validar_calle(this.value) && this.value.lenth <= 100){
      $('#errorEnf').html("");
    } else {
      $('#errorEnf').html('*Caracter inválido en la cuota');
    }
  });
});

$(document).ready(function(){
  $('#status').change(function(){
    if(validar_grupo(this.value)){
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
    if(validar_nom(this.value)){
      $('#errorTelTut').html("");
    } else {
      $('#errorTelTut').html('*Caracter inválido en el teléfono');
    }
  });
});

$(document).ready(function(){
  $('#ocupacion').keyup(function(){
    if(validar_calle(this.value) && this.value.lenth <= 50){
      $('#errorOcuTut').html("");
    } else {
      $('#errorOcuTut').html('*Caracter inválido en la ocupación');
    }
  });
});

$(document).ready(function(){
  $('#empresa').keyup(function(){
    if(validar_calle(this.value) && this.value.lenth <= 100){
      $('#errorEmpTut').html("");
    } else {
      $('#errorEmpTut').html('*Caracter inválido en la empresa');
    }
  });
});

$(document).ready(function(){
  $('#titulo').keyup(function(){
    if(validar_calle(this.value) && this.value.lenth <= 100){
      $('#errorTitTut').html("");
    } else {
      $('#errorTitTut').html('*Caracter inválido en el título');
    }
  });
});

$(document).on('click', '.editarBen', function(){
  $('#efecha_nacimiento').focusout(function(){
    var today = new Date();
    var fecha= $('#efecha_nacimiento').val();
    var f = fecha.split("-");
    if(f[0] > today.getFullYear()){
      $('#eerrorFecha').html("Fecha no válida");
    } else if(f[0] == today.getFullYear()){
      if(f[1] > today.getMonth() + 1){
        $('#eerrorFecha').html("Fecha no válida");
      } else if(f[1] == today.getMonth() + 1){
        if(f[2] > today.getDate()){
          $('#eerrorFecha').html("Fecha no válida");
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

function validar_nom(nombre){
  //var regex = new RegExp("/[^A-Za-záéíóúüñÑÁÉÍÓÚ ]/");
  if(nombre.length <= 40){
    return !/[^A-Za-záéíóúüñÑÁÉÍÓÚ ]/.test(nombre);
  }
  return false;
}

function validar_sexo(sexo){
  //var regex = new RegExp("/[^A-Za-záéíóúüñÑÁÉÍÓÚ ]/");
  if(sexo.length == 1){
    return /(H|M)$/.test(sexo);
  }
  return false;
}

function validar_calle(calle){
  return !/[^A-Za-záéíóúüñÑÁÉÍÓÚ0-9\.# ]/.test(calle);
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

function checar_tutor(id, nombre, elem){
  $.post('controladores/validTutor.php', { id : id, nombre : nombre } )
  .done(function(data){
    elem.html(data);
   })
}

function validar_telefono(tel){
  return !/[^0-9+()\-  ]/.test(tel);
}
