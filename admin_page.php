<?php
@include 'config.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}

// Verificar si existe la sesión del ID de usuario y almacenarla en una variable local
if(isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
} else {
    // Si no existe la sesión del ID de usuario, redirigir al usuario al formulario de inicio de sesión
    header('location:login_form.php');
    exit(); // Asegurarse de salir del script después de redirigir
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="containernavbar">
        <div class="navbar admin-navbar">
            <div class="logo">
                <a href="admin_page.php"><img src="src/logo.png" alt=""></a>
                <h1>Página Administrador</h1>
                <a href="logout.php" class="logoutbtn">Salir</a>
            </div>
            <div class="admin-menu">
                <ul>
                    <a href="admin_page.php"><li>Inicio</li></a>
                    <a href="new_case.php"><li>Nuevo Caso</li></a>
                    <a href="chatpage.php"><li>Mensajes Pendientes</li></a>
                    <a href="documents.php"><li>Documentos</li></a>
                    <a href="calendar.php"><li>Próximas Citas</li></a>
                    <a href="register_lawyer.php"><li>Crear nuevo Usuario/Abogado</li></a>
                </ul>        
            </div>       

            
        </div>

        <div class="container">
            <div class="content">
                <h3>Hola <span>Abogado.</span></h3>
                <h1>Bienvenido <span><?php echo $_SESSION['admin_name'] ?></span></h1>
                <p>Puedes acceder a tus labores aquí.</p>
                <a href="new_case.php" class="btn">Añadir Nuevo Caso</a>
                <a href="searh_exp.php" class="btn">Buscar Caso</a>
            </div>
        </div>

    </div>    
</body>
</html>