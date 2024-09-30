<?php
include "config.php";
session_start();

if ($_POST) {
    // Verificar si hay una sesión activa
    if (isset($_SESSION['user_name']) || isset($_SESSION['admin_name'])) {
        // Verificar si el usuario en sesión es un administrador o un usuario normal
        if (isset($_SESSION['user_name'])) {
            // Si es un usuario normal, el user_id será el ID del usuario en sesión
            $userId = $_SESSION['user_id'];
            // Si es un usuario normal, el nombre del remitente es $_SESSION['user_name']
            $sender_name = $_SESSION['user_name'];
        } elseif (isset($_SESSION['admin_name'])) {
            // Si es un administrador, el user_id será el ID del administrador
            $userId = $_SESSION['admin_id'];
            // Si es un administrador, el nombre del remitente es $_SESSION['admin_name']
            $sender_name = $_SESSION['admin_name'];
        } else {
            // Si no hay un usuario válido en sesión, redirigir al usuario a otra página
            header('location:index.php');
            exit; 
        }

        // Obtener el mensaje y el ID del receptor desde el formulario
        $msg = $_POST['msg'];
        $receptor_id = $_POST['receptor_id'];

        // Verificar si ya existe una conversación entre el emisor y el receptor
        $conversacion_existente_query = mysqli_query($conn, "SELECT conversacion_id FROM mensajes WHERE (user_id = '$userId' AND receptor_id = '$receptor_id') OR (user_id = '$receptor_id' AND receptor_id = '$userId')");
        $conversacion_existente_row = mysqli_fetch_assoc($conversacion_existente_query);

        if ($conversacion_existente_row) {
            // Si existe una conversación, obtener su ID
            $conversacion_id = $conversacion_existente_row['conversacion_id'];
        } else {
            // Si no existe una conversación, generar un nuevo ID para la conversación

            $conversacion_id = generar_conversacion_id(); 
        }

        // Insertar el mensaje en la tabla mensajes y relacionarlo con la conversación
        $sql = "INSERT INTO mensajes (user_id, receptor_id, mensaje, name, conversacion_id) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iissi", $userId, $receptor_id, $msg, $sender_name, $conversacion_id);

        if ($stmt->execute()) {
            header('Location: chatpage.php');
        } else {
            echo "Algo salió mal";
        }
    } else {
        // Si no hay una sesión activa, redirigir al usuario a la página de inicio de sesión
        header('location:index.php');
        exit; 
    }
}

function generar_conversacion_id() {
    // Obtener el timestamp actual
    $timestamp = time();

    // Construir un ID único concatenando el timestamp con un número aleatorio
    $conversacion_id = $timestamp . '_' . mt_rand(1000, 9999);

    return $conversacion_id;
}
?>
