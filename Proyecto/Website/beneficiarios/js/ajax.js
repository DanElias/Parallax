$(document).ready(imprimeTutorExterno());

$(document).ready(imprimeNombreBeneficiarioActivo());

$(document).ready(function() {
    //set initial state.
    $('#botonActivos').val(this.checked);

    $('#botonActivos').change(function() {
        if(this.checked) {
          imprimeNombreBeneficiarioActivo();
          //actualizaPagina();
          $(this).prop("checked");
        } else{
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
  });
}

function imprimeNombreBeneficiario(){
  //modalEstado();
  $.post('beneficiarioController.php', { opcion : 1 } )
  .done(function(data){
    console.log("Todos");
    $('#cuerpoTablaBeneficiarios').html(data);
    actualizaPagina();
    M.AutoInit();
  });
}

function imprimeNombreBeneficiarioActivo(){
  //modalEstado();
  $.post('beneficiarioController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Solo activos");
    $('#cuerpoTablaBeneficiarios').html(data);
    //modalEstado();
    actualizaPagina();
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
     var nombre= $('#nFruit').val();
     var unidades= $('#uFruit').val();
     var cantidad= $('#qFruit').val();
     var precio= $('#pFruit').val();
     var pais= $('#cFruit').val();
     $.post('fruit.php', { nameFruit : nombre, unitsFruit : unidades, quantityFruit : cantidad, priceFruit : precio, countryFruit : pais } )
     .done(function(data){
       console.log(nombre);
       imprimir();
      })
      .fail(function(){
        imprimir();
        $('#nFruit').val(" ");
        $('#uFruit').val(" ");
        $('#qFruit').val(" ");
        $('#pFruit').val(" ");
        $('#cFruit').val(" ");
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

function modalEstado(){
  $.post('beneficiarioController.php', { opcion : 1 } )
  .done(function(data){
    console.log("Modalees");
    $('#cuerpoTablaBeneficiarios').append(data);
    //M.AutoInit();
  });
}
