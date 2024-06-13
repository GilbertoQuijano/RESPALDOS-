<?php
$servername = "nexusgrhub.cxnchtdj9k1t.us-east-2.rds.amazonaws.com:3306";
$username = "automaticos";
$password = "Proc#sosautomaticos234";
$database = "Banners_Web";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realiza una consulta a la base de datos
$sql = "SELECT * FROM tours_cards";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $products = array();

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Establece las cabeceras para descargar el archivo JSON
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="productos.json"');

    // Imprime el JSON en la respuesta
    echo json_encode($products);
} else {
    echo json_encode(array('error' => 'No se encontraron productos en la base de datos.'));
}

// Cierra la conexión a la base de datos
$conn->close();
?>