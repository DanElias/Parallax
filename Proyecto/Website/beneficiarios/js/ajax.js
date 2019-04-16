$(document).ready(imprimeTutorExterno());

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
    $('#tablaBen').html(data);
    $('#tablaComBen').pageMe({
      pagerSelector:'#myPager',
      activeColor: 'blue',
      prevText:'Anterior',
      nextText:'Siguiente',
      showPrevNext:true,
      hidePageNumbers:false,
      perPage:10
    });
  });
}

function infoTutor(){
  $.post('tutorController.php', { opcion : 2 } )
  .done(function(data){
    console.log("Funciono");
    $('#tablaExternaTutor').html(data);
  });
}

$(document).ready(imprimeNombreBeneficiario());
