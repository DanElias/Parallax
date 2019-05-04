<?php
require_once("../basesdedatos/_conection_queries_db.php");
require_once("_util_sitio.php");

$result = obtenerEventos();

$cards = "";

if (mysqli_num_rows($result) > 0) {
    //output data of each row;
    while ($row = mysqli_fetch_assoc($result)) {
        $row_date = explode('-', $row["fecha"]);
        $cards .= '
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
                </div>
                <br><br>';
    }

    echo '
            <div class="parallax-container my_parallax_container" id="about">
            <div class="my_table">
            <br><br><br>
        
        ' . $cards . '
            </div>
            <div class="parallax"><img src="../images/wall.jpg" style="object-fit: cover;"></div>
            </div>
            </div>
        ';

} else { // si no hay eventos registrados en la tabla
    echo "no encontramos eventos registrados";
}


?>