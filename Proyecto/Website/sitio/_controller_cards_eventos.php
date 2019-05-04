<?php

require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_sitio.php");

$cards = "";
$fecha=date('Y-m-d', time());

$result = obtenerEventosSiguientes($fecha);
$result2 = obtenerEventosPasados($fecha);

$cards2 = "";

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    
     $cards.=' <br><div style="font-family: Fredoka One; color: white; font-size: 1.5em;">
                        Eventos Próximos :
                    </div>';
                    
    while ($row = mysqli_fetch_assoc($result)) {
        $row_date = explode('-', $row["fecha"]);
        $cards .= '<br>
                <div class="row" style="width: 80%;">
                    <div class="col s12 m12">
                    
                    <div class="card horizontal z-depth-5" style="padding-top:1em; ">
                        <div class="card-stacked">
                            <div class="card-content">
                                
                                <p style="font-family: Fredoka One; color: #00bfa5; font-size: 1.5em;">
                                    <i class="material-icons prefix">event</i>
                                    ' . $row["nombre"] . '
                                </p>
                                <hr>
                                
                                <div class ="row apoyanos blue-grey-text center" style="text-align:justify">
                                    
                                    <div class="col s12 m8">
                                        <br>
                                        <i class="material-icons prefix">calendar_today</i>
                                        Fecha: ' . $row_date[2] . '/' . $row_date[1] . '/' . $row_date[0] . '
                                        &nbsp; &nbsp; &nbsp;
                                   
                                        <i class="material-icons prefix">access_time</i>
                                        Hora: ' . $row["hora"] . ' hrs.
                                        <br><br>
                                    
                                        <i class="material-icons prefix">place</i>
                                        Lugar: ' . $row["lugar"] . '
                                        <br><br>
                                    
                                         <i class="material-icons prefix">description</i>
                                        Descripción: ' . $row["descripcion"] . '
                                        <br> <br>   
                                     </div>
                                    <br> 
                                
                                    <div class="col s12 m4">
                                   
                                        <img src="' . $row["imagen"] . '" class="z-depth-4 materialboxed" style="object-fit:cover" width=80%>
                                    </div>
                            
                                </div>

                            </div>
                        </div>
                    </div>
                        
                    </div>
                </div><br>';
    }

    

} else { // si no hay eventos registrados en la tabla
    $cards .= '
                <div class="row" style="width: 80%;">
                    <div class="col s12 m12">
                    
                    <p style="font-family: Fredoka One; color: white; font-size: 1.5em;">
                        Eventos Próximos :
                    </p>
        
                    <div class="card horizontal z-depth-5" style="padding-top:1em; ">
                        <div class="card-stacked">
                            <div class="card-content">
                                
                                <p style="font-family: Fredoka One; color: #00bfa5; font-size: 1.2em;">
                                    <i class="material-icons prefix">event</i>
                                    Por el momento no tenemos eventos próximos.
                                </p>
                            <br>
                            </div>
                        </div>
                    </div>
                        
                    </div>
                </div><br>';
}

if (mysqli_num_rows($result2) > 0) {
    //output data of each row;
    
    $cards2.=' <br><div style="font-family: Fredoka One; color: white; font-size: 1.5em;">
                        Eventos Pasados :
                    </div><br>' ;
                    
    while ($row = mysqli_fetch_assoc($result2)) {
        $row_date = explode('-', $row["fecha"]);
        $cards2 .= '
                <div class="row" style="width: 80%;">
                    <div class="col s12 m12">
                    
                    
                    <div class="card horizontal z-depth-5" style="padding-top:1em; ">
                        <div class="card-stacked">
                            <div class="card-content">
                                
                                
                                <p style="font-family: Fredoka One; color: #00bfa5; font-size: 1.5em;">
                                    <i class="material-icons prefix">event</i>
                                    ' . $row["nombre"] . '
                                </p>
                                <hr>
                                
                                <div class ="row apoyanos blue-grey-text center" style="text-align:justify">
                                    
                                    <div class="col s12 m8">
                                        <br>
                                        <i class="material-icons prefix">calendar_today</i>
                                        Fecha: ' . $row_date[2] . '/' . $row_date[1] . '/' . $row_date[0] . '
                                        &nbsp; &nbsp; &nbsp;
                                   
                                        <i class="material-icons prefix">access_time</i>
                                        Hora: ' . $row["hora"] . ' hrs.
                                        <br><br>
                                    
                                        <i class="material-icons prefix">place</i>
                                        Lugar: ' . $row["lugar"] . '
                                        <br><br>
                                    
                                         <i class="material-icons prefix">description</i>
                                        Descripción: ' . $row["descripcion"] . '
                                        <br> <br>   
                                     </div>
                                    <br> 
                                
                                    <div class="col s12 m4">
                                   
                                        <img src="' . $row["imagen"] . '" class="z-depth-4 materialboxed" style="object-fit:cover" width=80%>
                                    </div>
                            
                                </div>

                            </div>
                        </div>
                    </div>
                        
                    </div>
                </div>';
    }

    

} else { // si no hay eventos registrados en la tabla
    $cards2 .= '
                <div class="row" style="width: 80%;">
                    <div class="col s12 m12">
                    
                    <p style="font-family: Fredoka One; color: white; font-size: 1.5em;">
                        Eventos Pasados :
                    </p>
                    
                    <div class="card horizontal z-depth-5" style="padding-top:1em; ">
                        <div class="card-stacked">
                            <div class="card-content">
                                
                                <p style="font-family: Fredoka One; color: #00bfa5; font-size: 1.2em;">
                                    <i class="material-icons prefix">event</i>
                                    Por el momento no tenemos eventos pasados.
                                </p>
                            <br> 
                            </div>
                        </div>
                    </div>
                        
                    </div>
                </div><br>';
}

    echo '
        <div class="parallax-container my_parallax_container" id="about">
        <div class="my_table">
        <br>
    ' . $cards . '<br>
        </div>
        <div class="parallax"><img src="../images/wall.jpg" style="object-fit: cover;"></div>
        </div>
        </div>
    ';
    
    echo '
        <div class="parallax-container my_parallax_container" id="about">
        <div class="my_table">
        <br>
    ' . $cards2 . '<br>
        </div>
        <div class="parallax"><img src="../images/wall2.jpg" style="object-fit: cover;"></div>
        </div>
        </div>
    ';



?>