<?php

//con esta parte de código php recibo requests de la parte del cliente y dependiendo de las acciones que han hecho en el front-end, el back-end envía un mensaje al servidor, el mensaje en este caso es el nombre de la función que se debe de ejecutar en el php dependiendo de los movimientos o clicks que hizo el usuario en el front end.
if (isset($_POST['function_name'])) {
    switch ($_POST['function_name']) { // con este switch veo a que funciones llamar

        case 'array_average':
            echo array_average(array_generator());
            break;

        case 'array_median':
            echo array_median(array_generator());
            break;

        case 'array_analisis':
            echo array_analisis(array_generator());
            break;

        case 'cuadrados_cubos':
            echo cuadrados_cubos();
            break;

        case 'acmproblem':
            echo acmproblem();
            break;

    }
}

//función que genera la tabla de multiplicar del 1 al 10
function tabla_multiplicar()
{
    $tabla = "<table>";
    for ($i = 1; $i <= 10; $i++) {
        $tabla .= "<tr>";
        for ($j = 1; $j <= 10; $j++) {
            $tabla .= "<td>$i x $j = " . $i * $j . "</td>";
        }
        $tabla .= "</tr>";
    }
    $tabla .= "</table>";
    return $tabla;
}

//función que genera un array de 11 números aleatorios
function array_generator()
{
    $generated_array;
    for ($i = 0; $i <= 10; $i++) {
        $generated_array[$i] = rand(1, 20);
    }
    return $generated_array;
}

//función que devuelve el promedio de un array
function array_average($myarray)
{
    $res_table = '<table class="my_table">';
    $array_size = sizeof($myarray);
    $array_sum = 0;
    $array_average = 0;
    $array_toString = implode(" | ", $myarray);
    $res_table .= "<tr> <td> Array: $array_toString </td> </tr>";
    for ($i = 0; $i < $array_size; $i++) {
        $array_sum = $array_sum + $myarray[$i];
    }
    $array_average = $array_sum / $array_size;
    $res_table .= "<tr> <td> Average: " . $array_average . "</td> </tr>";
    return $res_table;
}

//función que devuelve la mediana de un array
function array_median($myarray)
{
    $res_table = '<table class="my_table">';
    sort($myarray);
    $array_size = sizeof($myarray);
    $array_median = 0;
    $array_toString = implode(" | ", $myarray);
    $res_table .= "<tr> <td> Ascending Sorted Array: $array_toString </td> </tr>";

    if ($array_size % 2 == 0) {
        $array_median = floor((($myarray[floor($array_size / 2)]) + ($myarray[ceil($array_size / 2)])) / 2);
    } else {
        $array_median = $myarray[$array_size / 2];
    }

    $res_table .= "<tr> <td> Median: " . $array_median . "</td> </tr>";
    return $res_table;
}

//Una función que reciba un arreglo de números y muestre la lista de números, y como ítems de una lista html muestre el promedio, la media, y el arreglo ordenado de menor a mayor, y posteriormente de mayor a menor

function array_analisis($myarray)
{
    $res_table = '<table class="my_table">';
    $array_toString = implode(" | ", $myarray);
    $res_table .= "<ul> <li>" . array_average($myarray) . "</li>";
    rsort($myarray);
    $array_toString = implode(" | ", $myarray);
    $res_table .= "<li> <tr> <td> Descending Sorted Array: $array_toString </td> </tr> </li>";
    $res_table .= "<li>" . array_median($myarray) . "</li> </ul>";
    return $res_table;
}

// función que genera una tabla de cuadrados y cubos del 1 hasta un número aleatorio mayor igual a 1 y menor igual a 20
function cuadrados_cubos()
{
    $tabla_cuadrados_cubos = '<table class="my_table">';
    $tabla_cuadrados_cubos .= "<tr> <td> Número </td> <td> Cuadrado</td> <td> Cubo</td> </tr>";
    for ($i = 1; $i <= rand(1, 20); $i++) {
        $tabla_cuadrados_cubos .= "<tr> <td> $i </td> <td>" . $i * $i . "</td> <td>" . $i * $i * $i . "</td> </tr>";
    }
    $tabla_cuadrados_cubos .= "</table>";
    return $tabla_cuadrados_cubos;
}

function acmproblem()
{
    $res_table = "HOLA";
    $num = rand(1, 1000);
    $a;
    $a[0] = 4;
    $a[1] = 7;
    $a[2] = 47;
    $a[3] = 74;
    $a[4] = 474;
    $a[5] = 447;
    $a[6] = 477;
    $a[7] = 744;
    $a[8] = 747;
    $a[9] = 774;
    $bandera = 0;
    for ($i = 0; $i < 10; $i++) {
        if (($num % ($a[$i])) == 0) {
            $bandera = 1;
        }
    }
    if ($bandera == 1) {
        $res_table = '<table class="my_table"><tr><td>The number is: ' . $num . ' -----YES IT IS NEARLY LUCKY </td></tr></table>';
    } else {
        $res_table = '<table class="my_table"><tr><td>The number is: ' . $num . ' -----IT IS NOT NEARLY LUCKY </td></tr></table>';
    }
    return $res_table;
}

?>