<?php

include "config.php";
session_start();
if ($_POST) {
    // Verificar si el nombre de administrador está definido en la sesión
    if (isset($_SESSION['admin_name'])) {
        // Obtener el ID del usuario actual desde la tabla user_form usando el nombre del administrador
        $user_name = $_SESSION['admin_name'];
        $user_id_query = mysqli_query($conn, "SELECT id FROM user_form WHERE nombre = '".$user_name."'");
        $user_id_row = mysqli_fetch_assoc($user_id_query);
        
        // Verificar si se encontró el usuario y si el ID no está vacío
        if ($user_id_row && !empty($user_id_row['id'])) {
            $user_id = $user_id_row['id'];
            
            $msg = $_POST['msg'];

            // Obtener el ID del usuario con el que se está comunicando
            $receptor_id = $_POST['receptor_id'];

            // Verificar si ya existe una conversación entre el emisor y el receptor
            $conversacion_existente_query = mysqli_query($conn, "SELECT conversacion_id FROM mensajes WHERE (id = $user_id AND receptor_id = $receptor_id) OR (id = $receptor_id AND receptor_id = $user_id)");
            $conversacion_existente_row = mysqli_fetch_assoc($conversacion_existente_query);
            
            if ($conversacion_existente_row) {
                // Si existe una conversación, obtener su ID
                $conversacion_id = $conversacion_existente_row['conversacion_id'];
            } else {

                $conversacion_id = generar_conversacion_id(); // Debes definir esta función
            }
            
            // Insertar el mensaje en la tabla mensajes y relacionarlo con la conversación
            $sql = "INSERT INTO mensajes (id, receptor_id, mensaje, name, conversacion_id) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iissi", $user_id, $receptor_id, $msg, $user_name, $conversacion_id);
            
            if ($stmt->execute()) {
                header('Location: chatpage.php');
            } else {
                echo "Algo salió mal";
            }
        } else {
            echo "Usuario no encontrado o ID vacío";
        }
    } else {
        // Si el nombre de administrador no está definido en la sesión, mostrar un mensaje de error
        echo "Nombre de administrador no encontrado en la sesión";
    }
}

function generar_conversacion_id() {

    return time();
}

?>
