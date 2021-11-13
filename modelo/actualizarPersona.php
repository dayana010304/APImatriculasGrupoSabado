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
    $conn= mysqli_connect($HostName,$HostUser,$HostPass,$dataBaseName);
    // Ahora validamos la conexion si es correcta o no
    $json = file_get_contents('php://input');
    //Decodificando los datos del formato json  EN LA VARIABLE  $obj
    $obj = json_decode($json, true);

    // vamos a crear las variables para enviar los datos de los campos de la tabla de la siguiente manera:
    $id = $obj['id'];
    $nif = $obj['nif'];
    $nombre = $obj['nombre'];
    $apellido1 = $obj['apellido1'];
    $apellido2 = $obj['apellido2'];
    $ciudad = $obj['ciudad'];
    $clave= $obj['clave'];
    $direccion= $obj['direccion'];
    $fecha_nacimiento= $obj['fecha_nacimmiento'];
    $sexo= $obj['sexo'];
    $telefono= $obj['telefono'];
    $tipo= $obj['tipo'];

    // Ahora agregamos la instruccion para Actualizar
    $sql_query = "UPDATE persona SET
    nif = '$nif', 
    nombre = '$nombre', 
    apellido1 = '$apellido1', 
    apellido2 = '$apellido2', 
    ciudad = '$ciudad', 
    clave = '$clave', 
    direccion = '$direccion', 
    fecha_nacimiento = '$fecha_nacimiento', 
    sexo = '$sexo', 
    telefono = '$telefono', 
    tipo = '$tipo' 
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