$(document).ready(imprimeTutorExterno());

$(document).ready(imprimeNombreBeneficiario());
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
    console.log("Funciono");
    $('#beneficiarioshtml').append(data);
  });
}

function infoTutor(){
  $.post('tutorController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
  });
}
