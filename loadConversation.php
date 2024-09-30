<?php
session_start();

// Verificar si se ha recibido el ID del usuario
if (isset($_POST['userId'])) {
    // Incluir archivo de configuración de la base de datos
    include "config.php";

    // Obtener el ID del usuario
    $userId = $_POST['userId'];


    $sql = "SELECT * FROM mensajes WHERE (user_id = ? AND receptor_id = ?) OR (user_id = ? AND receptor_id = ?) ORDER BY fecha_hora";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $_SESSION['id_usuario'], $userId, $userId, $_SESSION['id_usuario']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontraron mensajes
    if ($result->num_rows > 0) {
        // Crear un array para almacenar los mensajes
        $messages = [];
        while ($row = $result->fetch_assoc()) {
            

            $messages[] = $row;
        }

        // Devolver los mensajes como JSON
        echo json_encode(["success" => true, "messages" => $messages]);
    } else {
        echo json_encode(["success" => false, "message" => "No hay mensajes"]);
    }

    $conn->close();
} else {
    // No se recibió el ID del usuario
    echo json_encode(["success" => false, "message" => "ID de usuario no proporcionado"]);
}
?>
