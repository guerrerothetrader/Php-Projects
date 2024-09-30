<?php
// Decodificar el cuerpo JSON para obtener el ID del caso
$data = json_decode(file_get_contents("php://input"), true);
$idCaso = $data['id'];

// Verificar si se recibió un ID válido del caso
if (!isset($idCaso) || !is_numeric($idCaso)) {
    echo 'Error: ID del caso inválido.';
    exit;
}

// Incluir el archivo de configuración de la base de datos
include "config.php";

// Comenzar una transacción
$conn->begin_transaction();

try {
    // Eliminar las filas relacionadas en la tabla expediente
    $stmt1 = $conn->prepare("DELETE FROM expediente WHERE id_caso = ?");
    $stmt1->bind_param("i", $idCaso);
    $stmt1->execute();
    $stmt1->close();

    // Eliminar el caso de la tabla casos
    $stmt2 = $conn->prepare("DELETE FROM casos WHERE id_caso = ?");
    $stmt2->bind_param("i", $idCaso);
    $stmt2->execute();
    $stmt2->close();

    // Confirmar la transacción
    $conn->commit();
    echo 'Caso eliminado correctamente.';
} catch (Exception $e) {
    // Revertir la transacción si ocurre algún error
    $conn->rollback();
    echo 'Error al eliminar el caso: ' . $e->getMessage();
}

// Cerrar la conexión
$conn->close();
?>
