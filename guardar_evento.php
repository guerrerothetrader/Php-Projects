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
$userId = $_SESSION['id_usuario'];

var_dump($userId);
// Obtener datos del evento del cuerpo de la solicitud POST
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$color = $_POST['color'];



// Preparar la consulta SQL para insertar el evento en la base de datos
$sql = "INSERT INTO eventos (titulo, inicio, final, color, user) VALUES ('$title', '$start', '$end', '$color', '$userId')";

// Ejecutar la consulta SQL
if (mysqli_query($conn, $sql)) {
  echo 'Evento guardado correctamente';
} else {
  echo 'Error al guardar el evento: ' . mysqli_error($conn);
}




// Cerrar la conexión
mysqli_close($conn);
?>
