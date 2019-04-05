$(document).ready(imprimeTutorExterno());

$(document).ready(console.log("Holaaaaa"));

function imprimeTutorExterno(){
  $.post('tutorController.php', { opcion : 1 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
  });
}

function imprimeNombreBeneficiario(){
  $.post('tutorController.php', { opcion : 1 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
  });
}

function infoTutor(){
  $.post('tutorController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
  });
}
