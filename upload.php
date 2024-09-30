<?php

// Comprobar si se ha cargado un archivo
if (isset($_FILES['archivo'])) {
    // Extraer los datos del formulario
    extract($_POST);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // carpeta de destino
    $carpeta_destino = "files/";

    // Obtener el nombre y la extensión del archivo
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    // Validar la extensión del archivo
    if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {
        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
            // Ruta completa del archivo
            $ruta_completa = $carpeta_destino . $nombre_archivo;

            
            include "docdb.php";
            
           // Obtener el tipo de usuario desde la sesión
           session_start();
           if (isset($_SESSION['user_type'])) {
               $user_type = $_SESSION['user_type']; 
               echo "Tipo de usuario: " . $user_type;
           } else {
            $user_type = $_SESSION['user_type']; 
            echo "Tipo de usuario: " . $user_type;
               exit;
           }

            // Consulta SQL condicional según el tipo de usuario
            $sql = "INSERT INTO documento (nombre, descripcion, archivo, user_type) 
                    VALUES ('$nombre', '$descripcion','$nombre_archivo', '$user_type')";
            
            $resultado = mysqli_query($conn, $sql);
            
            if ($resultado) {
                echo "Documento cargado con éxito.";
                header('Location: documents.php');
                exit;
            } else {
                echo "No se cargó el archivo en nuestra base de datos.";
                header('Location: documents.php');
                exit;
            }
        } else {
           echo "Lo sentimos no se pudo subir el archivo.";
            exit;
        }
    } else {
        echo "No es un archivo válido.";
        exit;
    }
}
?>
