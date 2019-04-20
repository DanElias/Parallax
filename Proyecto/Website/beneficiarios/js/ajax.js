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
  $.post('tutorController.php', { opcion : 1 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
  });
}

function imprimeNombreBeneficiario(){
  $.post('beneficiarioController.php', { opcion : 1 } )
  .done(function(data){
    console.log("Todos");
    $('#cuerpoTablaBeneficiarios').html(data);
    actualizaPagina();
  });
}

function imprimeNombreBeneficiarioActivo(){
  $.post('beneficiarioController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Solo activos");
    $('#cuerpoTablaBeneficiarios').html(data);
    actualizaPagina();
  });
}

function infoTutor(){
  $.post('tutorController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
  });
}

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
  
}
