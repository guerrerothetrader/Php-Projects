<?php

// Obtener el ID del evento a eliminar
$id = $_POST['id'];

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'usuario', 'contraseña', 'eventos');

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL para eliminar el evento
$sql = "DELETE FROM eventos WHERE id = $id";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    echo "Evento eliminado correctamente";
} else {
    echo "Error al eliminar el evento: " . $conexion->error;
}

// Cerrar conexión
$conexion->close();

?>