<?php

$servername = "localhost";
$username = "usuario"; //
$password = ""; 
$dbname = "users_lawyers";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


$sql = "INSERT INTO contacto (nombre, correo, mensaje) VALUES ('$name', '$email', '$message')";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    header('location:mensaje_enviado.php');
} else {
    echo "Error al enviar el mensaje: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
