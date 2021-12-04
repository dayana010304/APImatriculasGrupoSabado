<?php
    //Vamos a crear las instrucciones de codigo para grabar los datos en la tabla persona
    header('Access-Control-Allow-Original: *');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
    header('Access-Control-Max-Age:1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');

    // Ahora vamos a crear el metodo CONSULTAR para listar todos los registros
    include '../conexion/parametrosDB.php';

    // Vamos a abrir la conexion
    // Abrimos la conexion
    $conn= mysqli_connect($HostName,$HostUser,$HostPass,$DataBaseName);
    // Ahora validamos la conexion si es correcta o no
    $json = file_get_contents('php://input');
    //Decodificando los datos del formato json  EN LA VARIABLE  $obj
    $obj = json_decode($json, true);

    // vamos a crear las variables para enviar los datos de los campos de la tabla de la siguiente manera:
    $id = $obj['id'];
    $nombre = $obj['nombre'];
    
    // Ahora agregamos la instruccion para Actualizar
    $sql_query = "UPDATE departamento SET
    nombre = '$nombre'
    WHERE id = $id";

    //Ahora vamosa a Ejecutar la instruccion SQL anterior
    if(mysqli_query($conn, $sql_query))
    {
        $mensaje = "Actualizado";
        $json = json_encode($Mensaje);
        echo $json;
    }
    else
    {
        echo "Error";
    }
    //cerramos la conexion
    mysqli_close($conn);

?>