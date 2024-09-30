<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "users_lawyers";
$port = 3306; // Puerto personalizado en XAMPP

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database, $port);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}



?>