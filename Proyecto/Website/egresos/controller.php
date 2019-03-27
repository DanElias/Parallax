<?php

	//incluir funciones de la base de datos 
	require_once("../basesdedatos/_conection_queries_db.php");
	echo "<h1>HOLA, COMO ESTAS<h1>";
	$pattern = strtolower($_GET['pattern']);
	$words =  array();
	$result = obtener_nombre_contacto();
	$i=0;


	//se hace una consulta a la base de datos y se pasan los nombres a un arreglo
	if(mysqli_num_rows($result)>0){
		//echo "LA CONSULTA DEBIO HABER SIDO EXITOSA";
		while ($row = mysqli_fetch_assoc($result)) {				
				$words[$i] = $row['nombre_contacto'];
				$i = $i+1;

            }
	}
	
    
	$response="";
	$size=0;
	for($i=0; $i<count($words); $i++)
	{
	   $pos=stripos(strtolower($words[$i]),$pattern);
	   if(!($pos===false))
	   {
	     $size++;
	     $word=$words[$i];
	     $response.="<option value=\"$word\">$word</option>";
	   }
	}

	if($size>0)
	  echo "<select id=\"list\" size=$size onclick=\"selectValue()\">$response</select>";

?>