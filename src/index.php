<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica en la nube</title>
</head>
<body>
    <?php
    // Función para cargar variables de entorno desde un archivo .env
    function loadEnv($path) {
        if (!file_exists($path)) {
            throw new Exception("no env?");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            $_ENV[$key] = $value;
        }
    }

    // Cargar el archivo .env
    loadEnv( '../.env');

    // Variables de conexión desde el archivo .env
    $host = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $port = $_ENV['DB_PORT'];

    try {
        // Crear la conexión incluyendo el puerto
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para obtener los datos
        $query = 'SELECT * FROM data';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // Mostrar los resultados
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            echo 'Identificador: ' . $row['id'] . ' - Nombre: ' . $row['nombre'] . '<br>';
        }
    } catch (PDOException $e) {
        echo 'Error de conexión: ' . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
    ?>
</body>
<script>
    // window.alert("hola");
</script>
</html>