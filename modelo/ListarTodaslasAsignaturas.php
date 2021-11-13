<?php

//vamos a invocar las cabeceras (o Plugins) para dar permisos de ejecución a los llamados de la API

header('Access-Control-Allow-Original: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age:1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');

// Ahora vamos a crear el metodo CONSULTAR para listar todos los registros

include '../Conexion/parametrosDB.php';
// Abrimos la conexion
$conn= new mysqli($HostName,$HostUser,$HostPass,$dataBaseName);
//ahora validamos la conexion
if ($conn -> connect_error)
{
    die("La conexion o se pudo realizar".$conn->connect_error);
}
else
{
    // ahora vamos a construir la consulta.
    $sql = "SELECT * FROM asignatura"; // Preparar la consulta
    $result = $conn -> query($sql);   // ejecutar la consulta
    // verificar si devuelve  datos o no.
    if ($result -> num_rows > 0)
    {
        // Con los registtross encontrados los llevamos a un arreglo a un vector
        while ($row[] = $result->fetch_assoc())
        {
            $item = $row;
            // Ahora vamos a convertir el dato a Json
            $json = json_encode($item);
        }
    }
    else
    {
        echo "No hay registros para mostrar";
    }
    echo $json;
    $conn-> close();
}
?>