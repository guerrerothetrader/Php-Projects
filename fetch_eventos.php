<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "eventos";
$port = 3306; // Puerto personalizado en XAMPP

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database, $port);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

session_start();
$user_id = $_SESSION['id_usuario'];

$sql = "SELECT id, titulo, inicio, final, color, user FROM eventos WHERE user = $user_id";

$resultado = $conn->query($sql); // Usar $conn en lugar de $conexion

// Crear array para almacenar los eventos
$eventos = [];

// Si hay resultados, agregar los eventos al array
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $evento = [
            'id' => $fila['id'],
            'title' => $fila['titulo'],
            'start' => $fila['inicio'],
            'end' => $fila['final'],
            'color' => $fila['color']
        ];

        // Verificar si la clave 'user' existe antes de intentar acceder a ella
        if (isset($fila['user'])) {
            $evento['user'] = $fila['user'];
        }

        $eventos[] = $evento;
    }
}

// Devolver los eventos en formato JSON
echo json_encode($eventos);

// Cerrar conexión
$conn->close();

?>
