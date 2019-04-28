<?php

/*
Autor: Daniel Elias
*/

require_once("../basesdedatos/_conection_queries_db.php"); 

$valores="";
$result=reporteCuenta("","");

while($row = mysqli_fetch_array($result)){ 
    $str=mb_convert_encoding($row["nombre"], "EUC-JP", "auto");
    $str=str_replace('&aacute;', 'á', $str);
    $str=str_replace('&eacute;', 'é', $str);
    $str=str_replace('&iacute;', 'í', $str);
    $str=str_replace('&oacute;', 'ó', $str);
    $str=str_replace('&uacute;', 'ú', $str);
    $str=str_replace('&Aacute;', 'Á', $str);
    $str=str_replace('&Eacute;', 'É', $str);
    $str=str_replace('&Iacute;', 'Í', $str);
    $str=str_replace('&Oacute;', 'Ó', $str);
    $str=str_replace('&Uacute;', 'Ú', $str);
    $str=str_replace('&Ntilde;', 'Ñ', $str);
    $str=str_replace('&ntilde;', 'ñ', $str);
    $valores.="['".$str."',".$row["number"]."],";  
}  

date_default_timezone_set('America/mexico_city');
$fecha=date('d/m/Y h:i a', time());

echo '
 
<div id="_grafica_cuenta" class="modal my_modal modal1  my_big_modal" name="modal1">
    <div class="row my_modal_header_row">

        <div class="my_modal_header1">
            <div class="col s11 my_form_title">
                Reporte de Egresos - Cuentas Contables
            </div>

            <div class="col s1">
                <br>
                <a class="my_modal_buttons btn btn-medium waves-effect waves-light modal-close red accent-3 hoverable center"
                   style="font-size:2em;font-family: Roboto;" href="#_grafica_cuenta">
                    ×
                </a>
            </div>
        </div>

    </div>

    <div class="modal-content my_modal_content">
    
        <script type="text/javascript">  
            google.charts.load(\'current\', {\'packages\':[\'corechart\']});  
            google.charts.setOnLoadCallback(drawChart);  
            function drawChart()  
            {  
                
                var data = google.visualization.arrayToDataTable([  
                          [\'Nombre\', \'Numero\'],'.$valores.'
                     ]);  
                var options = {
                    \'legend\':\'left\',
                    \'pieSliceText\':\'left\',
                    \'title\':\'Cuentas Contables presentes en los Egresos\',
                    \'titleTextStyle\': {
                    \'fontSize\': \'16\' },
                    \'width\':800,
                    \'height\':700,
                    pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById(\'_grafica_cuenta_div\'));  
                chart.draw(data, options);  
                
               
            }  
            </script> 
           
            <div class="row">
                <div class="col s2">
                    <br><br><br>
                    <img class="responsive-img" src="../images/logocolor.png">
                </div>    
                <div class="col s8">
                    <div id="_grafica_cuenta_div" style="margin: 0 auto;"></div> 
                </div>
                <div class="col s2" style="padding-right:4em;">
                        <br><br><br><br>
                    <div class="grey-text text-darken-1" style="z-index:999; font-family:Ubuntu;">
                        Fecha y hora de consulta:<br>'.$fecha.'
                    </div>
                </div>
            </div>
            
           
            
    </div>
</div>';

?>