<?php
    @include 'config.php';
    session_start();

    if(!isset($_SESSION['user_name'])){

        header('location:login_form.php');
    }

    $user_id = $_SESSION['id_usuario'];

    // Obtener información del caso del usuario
    $sql = "SELECT * FROM casos WHERE id_usuario = $user_id";
    $result = mysqli_query($conn, $sql);
    $caso = mysqli_fetch_assoc($result);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        button{
            padding: 4px 10px;
            background: #333;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 16px;
            color: #fff;
            font-weight: bold;
            margin-bottom: 40px;
            text-tranform: uppercase;
        }

        button:hover{
            padding: 4px 10px;
            background: crimson;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>

<div class="containernavbar">
        <div class="navbar admin-navbar">
            <div class="logo">
                <a href="admin_page.php"><img src="src/logo.png" alt=""></a>
                <h1>Página Usuario</h1>
                <a href="logout.php" class="logoutbtn">Salir</a>
            </div>
            <div class="admin-menu">
                <ul>
                    <a href="user_page.php"><li>Inicio</li></a>
                    <a href="expediente.php"><li>Ver mi Expediente</li></a>
                    <a href="chatpage.php"><li>Contactar con mi Abogado</li></a>
                    <a href="documents.php"><li>Documentos por firmar</li></a>
                    <a href="calendar.php"><li>Próximas Citas</li></a>
                </ul>        
            </div>       

            
        </div>

        <div class="container">
            <div class="content">
                <h3>Un placer tenerte de vuelta  <span>Usuario.</span></h3>
                <h1>Bienvenido <span><?php echo $_SESSION['user_name'] ?></span></h1>
                <p>Puedes acceder a tus datos aquí.</p>
                <p>Primero de todo:</p>  
                <h3>Contacta con un abogado</h3>
            </div>
        </div>

    </div> 

</body>
</html>