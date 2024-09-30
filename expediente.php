<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])){
    header('Location: login_form.php');
    exit();
}

include 'config.php';

// Almacenar el ID del usuario de la sesión
$user_id = $_SESSION['id_usuario'];

// Consulta SQL para obtener la información del caso del usuario
$sql = "SELECT * FROM casos WHERE id_usuario = $user_id";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM expediente WHERE id_usuario = $user_id";
$result2 = mysqli_query($conn, $sql2);

// Verificar si se encontraron resultados
if(mysqli_num_rows($result) > 0){

    $caso = mysqli_fetch_assoc($result);
    $caso2 = mysqli_fetch_assoc($result2);

} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expediente</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body .exp{
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
            background: linear-gradient(70deg, crimson,#fff, #fff, #fff, crimson);

        }
        .exp h1 {
            margin-bottom: 40px;
            color: #333;
            font-size: 50px;
            filter: drop-shadow(0 0 2px grey);
        }
        .exp table {
            width:40%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background: #333;
            box-shadow: 1px 0 50px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            overflow: hidden;
            text-align: left;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            padding: 20px;           
        }

        .exp td {
            margin-left: 30px;
            color: #B7B7B7;
        }

        table th {
            width: 100px;
            padding: 10px;
            color: white;
        }

        table th:hover {
            width: 100px;
            padding: 10px;
            color:crimson;
            cursor: pointer;
        }

        .exp .btn {
            color: #333;
            font-weight: bold;
        }

        .exp .btn:hover {
            color: #333;
        }

        footer{
            position: fixed;
            bottom: 0;
            left:0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<nav>
<?php
    include 'views/nav2.php';
?>
</nav>
<body>

    <div class="exp">
        <h1>Estos son sus datos del siniestro.</h1>
        <table>
            <tr>
                <th>Fecha del accidente:</th>
                <td><?php 
                    if (!empty($caso['fecha_accidente'])) {
                        echo $caso['fecha_accidente'];
                    } else {
                        echo "No existen datos de este usuario.";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Tipo de caso:</th>
                <td>
                <?php 
                    if (!empty($caso['tipo_caso'])) {
                        echo $caso['tipo_caso'];
                    } else {
                        echo "No existen datos de este usuario.";
                    }
                ?>
                </td>
            </tr>
            <tr>
                <th>Estado del caso:</th>
                <td><?php 
                    if (!empty($caso['estado'])) {
                        echo $caso['estado'];
                    } else {
                        echo "No existen datos de este usuario.";
                    }
                ?>
                </td>
            </tr>
            <tr>
                <th>Juzgado:</th>
                <td>  <?php 
                    if (!empty($caso['juzgado'])) {
                        echo $caso['juzgado'];
                    } else {
                        echo "No existen datos de este usuario.";
                    }
                ?>
                </td>
            </tr>
            <tr>
                <th>Descripción:</th>
                <td>  <?php 
                    if (!empty($caso['descripcion'])) {
                        echo $caso['descripcion'];
                    } else {
                        echo "No existen datos de este usuario.";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Fecha de apertura:</th>
                <td> <?php 
                        if (!empty($caso2['fecha_apertura'])) {
                            echo $caso2['fecha_apertura'];
                        } else {
                            echo "No existen datos de este usuario.";
                        }
                        ?>
                    </td>
            </tr>
        </table>
        <a href="user_page.php" class="btn">Volver</a>


    </div>
</body>
<footer>
<?php
    include 'components/footer.php';
?>
</footer>
</html>