<?php

/*
Autor: Daniel Elias
*/


require_once("../basesdedatos/_conection_queries_db.php"); 

$valores="";
$result=reporteCuenta();

while($row = mysqli_fetch_array($result)){ 
    $valores.="['".$row["nombre"]."',".$row["number"]."],";  
}  

echo '

<div id="_grafica_cuenta" class="modal my_modal modal1  my_big_modal" name="modal1">
    <div class="row my_modal_header_row">

        <div class="my_modal_header1">
            <div class="col s11 my_form_title">
                Reporte de Egresos - Cuentas Contables
                <i class=" material-icons my_title_icon_middle"></i>
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
                    \'width\':800,
                    \'height\':800,
                    pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById(\'_grafica_cuenta_div\'));  
                chart.draw(data, options);  
            }  
            </script> 
            
            <div id="_grafica_cuenta_div" style="display: block !important; margin: 0 auto; padding-left: 18em;"></div>      
    </div>
</div>';

?>