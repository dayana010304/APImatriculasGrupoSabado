<?php
//vamos a invocar las cabeceras (o Plugins) para dar permisos de ejecución a los llamados de la API
//Vamos a crear las instrucciones de codigo para insertar datos en la tabla personas 
header('Access-Control-Allow-Original: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Max-Age:1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');

// Ahora vamos a crear el metodo CONSULTAR para listar todos los registros
include '../conexion/ParametrosDB.php';

//Vamos a abrir la conexion 
$conn= new mysqli($HostName,$HostUser,$HostPass, $DataBaseName);
//Validación se la conexion es correacta o no 
$json = file_get_contents('php://input');

//Decodificando los datos en formato json 
$obj = json_decode($json, true);

//Crear variables para enviar los datos de los campos de la tabla 
$id = $obj['id'];
$nif = $obj['nif'];
$nombre = $obj['nombre'];
$apellido1 = $obj['apellido1'];
$apellidos2 = $obj['apellidos2'];
$ciudad = $obj['ciudad'];
$direccion = $obj['direccion'];
$telefono = $obj['telefono'];
$fecha_nacimiento = $obj['fecha_nacimiento'];
$sexo = $obj['sexo'];
$tipo = $obj['tipo'];
$Clave = $obj['Clave'];

// Instrucción SQL para agregar el estudiante.
$Sql_Query = "insert into persona (nif, nombre, apellido1, apellido2, ciudad, direccion, telefono, fecha_nacimiento, sexo, tipo, Clave) values ('$nif', '$nombre', '$apellido1',
'$apellidos2', '$ciudad', '$direccion',  '$telefono', '$fecha_nacimiento', '$sexo',  '$tipo','$Clave')";
//Ejecuta la instruccion SQL anterior 
if (mysqli_query($sql_query))
{
    $Mensaje = "La persona fue registrada con exito...";
    $json = json_encode();
    echo $json;
}
else
{
    echo "Error";
}

//Ceremos la conexion
mysqli_close($conn);
 
?>