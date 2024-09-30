<?php
include "docdb.php";

// Obtener el ID del archivo desde la URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar el archivo en la base de datos
    $sql = "SELECT * FROM documento WHERE id_documento = '$id'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $archivo = $fila['archivo'];
        $ruta_archivo = "files/" . $archivo;
        var_dump($ruta_archivo);
        // Verificar que el archivo existe en el servidor
        if (file_exists($ruta_archivo)) {
            // Enviar el archivo al navegador
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $archivo . '"');
            readfile($ruta_archivo);
        } else {
            echo "El archivo no existe en el servidor.";
        }
    } else {
        echo "El archivo no se encontró en la base de datos.";
    }
} else {
    echo "ID de archivo no proporcionado.";
}
?>