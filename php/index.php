<?php

// Esto es un archivo de prueba super simple.


$servername = "mariadb"; // Aqui hay que poner el nombre del servicio de MariaDB en docker-compose.yml
$username = "root";
$password = "example";
$dbname = "docker_php";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta SQL para obtener todos los clientes
$sql = "SELECT id, nombre FROM clientes ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Verificar si la consulta devuelve filas
if (mysqli_num_rows($result) > 0) {
    // Imprimir datos de cada fila
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. " - Nombre: " . $row["nombre"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
mysqli_close($conn);
?>
