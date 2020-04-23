<?php

//database constants
define('DB_HOST','db4free.net');
define('DB_USER','adaptable');
define('DB_PASS', '1q2w3e4r');
define('DB_NAME','adaptable');

//connecting to database and getting the connection object

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Check si ocurre algÃºn error durante la conexiÃ³n con la BD

if(mysqli_connect_errno()){
echo "FallÃ³ al conectar con MySQL : " . mysqli_connect_error();
die();
}
//creating a query id,nombre,precio,imagen,
$stmt = $conn->prepare("SELECT id_producto, nombre_producto, precio_producto, imagen_producto FROM productos;");

//executing the query
$stmt-> execute();

//Vinculando resultados a la consulta
$stmt-> bind_result($id_producto, $nombre_producto,$precio_producto,$imagen_producto);

$aproductos = array();

//navegando a travÃ©s del resultset
while($stmt->fetch()){
$temp =array();
$temp['id_producto']= $id_producto;
$temp['nombre_producto']= $nombre_producto;
$temp['precio_producto']= $precio_producto;
$temp['imagen_producto']= $imagen_producto;
array_push($aproductos, $temp);
}
//displaying the result in json format
echo json_encode($aproductos);
?>
