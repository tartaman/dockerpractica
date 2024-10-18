<?php
$host = 'db'; // O la IP del servidor donde se ejecuta la base de datos
$port = 3306; // Puerto por defecto de MySQL
$dbname = 'miprimerachamba';
$username = 'admin';
$password = 'root';
// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} 
echo "Conexión exitosa a la base de datos.";

$i = 134;
echo "<h1> Valor de i=".$i."</h1>";
// Cerrar la conexión cuando ya no la necesites
// $conn->close();
// Consulta SQL
$sql = "SELECT id, name FROM miprimeratabla";
$result = mysqli_query($conn, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($result) > 0) {
    // Recorrer los resultados
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. " - Nombre: " . $row["name"]. "<br>";
    }
} else {
    echo "0 resultados";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>