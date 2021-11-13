<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

include '../conexion/parametrosDB.php';

$conn= mysqli_connect($HostName,$HostUser,$HostPass,$dataBaseName);
if ($conn->connect_error) {
 die("Conexión fallida: " . $conn->connect_error);
}
$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);
 
$id= $obj['id'];

$sql = "SELECT * FROM persona WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row[] = $result->fetch_assoc()) {
        $item = $row;
        $json = json_encode($item);
    }
}
else
{
 echo "No hay estudiantes para mostrar";
}
echo $json;
$conn->close();
?>