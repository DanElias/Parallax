<?php
  session_start();
  require_once('../basesdedatos/_conection_queries_db.php');
  require_once('_util_beneficiarios.php');
  $opcion = $_POST['opcion'];
  if($opcion == 1){
      //modalEstado(getInfoBeneficiarios());
      //modalesBeneficiario(getInfoBeneficiarios());
      tablaBeneficiario(getInfoBeneficiarios());

  } else if($opcion == 2){
      //modalEstado(getInfoBeneficiarios());
      //modalesBeneficiario(getInfoBeneficiarios());
      tablaBeneficiario(getBeneficiariosActivos());

  }


?>
