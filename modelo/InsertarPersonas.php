<?php
    //Vamos a crear las instrucciones de código para grabar datos en 
    //la tabla persona.

  //Vamos a invocar las cabeceras para dar permisos
    //de ejecución a los llamados de la API desde cualquier
    //Aplicación.
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    //Ahora vamos a crear el método consultar para listas todos los registros.
    include '../Conexion/ParametrosDB.php';

    //Vamos a abrir la conexión.
    $conn= new mysqli($HostName,$HostUser,$HostPass, $DataBaseName);
    //Ahora validemos si la conexión es correcta o no.
    $json = file_get_contents('php://input');

    ////Decodificando los datos formato JSON en la variable $obj
    $obj = json_decode($json, true);

    //Vamos a crear las variables para enviar los datos de los campos de la
    //tabla de la siguiente manera:

    $id = $obj['id'];
    $nif = $obj['nif'];
    $nombre = $obj['nombre'];
    $apellido1 = $obj['apellido1'];
    $apellido2 = $obj['apellido2'];   
    $ciudad = $obj['ciudad']; 
    $clave = $obj['Clave']; 
    $direccion = $obj['direccion']; 
    $fecha_nacimiento = $obj['fecha_nacimiento']; 
    $sexo = $obj['sexo'];
    $telefono = $obj['telefono'];
    $tipo = $obj['tipo'];  
 

     //Ahora agreguemos la instrucción SQL para insertar
    $sql_query = "insert into persona(
                nif, nombre, apellido1, apellido2, ciudad, 
                Clave,  direccion, fecha_nacimiento, sexo, telefono, tipo)
          values('$nif', '$nombre', '$apellido1', '$apellido2', 
                '$ciudad', '$clave', '$direccion', '$fecha_nacimiento',
                '$sexo', '$telefono', '$tipo')      
    ";
    //Ahora vamos a ejecutar la instrucción SQL anterior
    if(mysqli_query($conn,$sql_query))
    {
        $Mensaje = "GRABADO";
        $json = json_encode($Mensaje);
        echo $json;
    }
    else
    {
        echo "ERROR";
    }
    //Cerremos la conexión
    mysqli_close($conn);
?>