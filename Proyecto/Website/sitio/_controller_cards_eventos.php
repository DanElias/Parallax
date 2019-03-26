
<?php
    require_once("../basesdedatos/_conection_queries_db.php");
    require_once("_util_sitio.php");
    
    $result=obtenerEventos();
    
    $cards="";
    
    if(mysqli_num_rows($result)>0){
        //output data of each row;
        while($row = mysqli_fetch_assoc($result)){
            $row_date=explode('-',$row["fecha"]);
            $cards.='
                <div class="row" style="width: 80%;">
                    <div class="col s12 m12">
                        <div class="card horizontal" >
                            <div class="card-image">
                                <img src="'.$row["imagen"].'" class="" style="object-fit:cover">
                            </div>
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <p style="font-family: Staatliches; color: #0d3d63; font-size: 1.2em;">
                                            <i class="material-icons prefix">event</i>
                                            '.$row["nombre"].'
                                            <hr>
                                        </p>
        
                                    <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                        <div class="col m12 s12">
                                            <div>
                                                <i class="material-icons prefix">calendar_today</i>
                                                Fecha: '.$row_date[2].'/'.$row_date[1].'/'.$row_date[0].'
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                        <div class="col m12 s12">
                                            <div>
                                                <i class="material-icons prefix">access_time</i>
                                                Hora: '.$row["hora"].'
                                            </div>
                                        </div>
                                    </div>
                                  
                                  
                                    <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                        <div class="col s12">
                                            <div>
                                                <i class="material-icons prefix">place</i>
                                                Lugar: '.$row["lugar"].'
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="row" style="font-family: Ubuntu; color: #0d3d63; font-size: 1em; text-align:left;">
                                        <div class="col s12">
                                            <div>
                                                <i class="material-icons prefix">description</i>
                                                Descripcion: '.$row["descripcion"].'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>';
        }
        
         echo '
            <div class="parallax-container my_parallax_container" id="about">
            <div class="my_table">
            <br><br><br>
        
        '.$cards.'
            </div>
            <div class="parallax"><img src="../images/f4.jpg" width="100%">
            </div>
            </div>
        ';
        
    }
    else{ // si no hay eventos registrados en la tabla
        echo "no encontramos eventos registrados";
    }
    
    
    
            

        
       

?>