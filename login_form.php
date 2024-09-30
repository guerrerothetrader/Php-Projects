<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select_user = " SELECT id, nombre, user_type, edad, apellido FROM user_form WHERE email = '$email' && password = '$password' ";
    $result = mysqli_query($conn, $select_user);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        $_SESSION['id_usuario'] = $row['id'];

        if($row['user_type'] == 'admin'){
            $_SESSION['admin_name'] = $row['nombre'];
            $_SESSION['user_type'] = 'admin';
            $_SESSION['admin_id'] = $row['id'];

            header('location:admin_page.php');
        } elseif($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['nombre'];
            $_SESSION['user_type'] = 'user';
            $_SESSION['user_id'] = $row['id']; 
            header('location:user_page.php');
        }

    } else {
        $message[] = 'Correo electrónico o contraseña incorrectos.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-contenedor">
        <div class="form-container">
            <a href="index.php"><img src="src/logo.png" alt="computer" style="width:30vw; height:30vh; object-fit: scale-down; margin-right:5rem; margin-left:10vw;"></a>
            <form action="" method="post">
                <h3>Accede a tu cuenta</h3>
                <?php
                if(isset($message)){
                    foreach($message as $msg){
                        echo '<span class="error-msg">'.$msg.'</span>';
                    };
                };
                ?>
                <input type="email" name="email" required placeholder="Introduce tu email">
                <input type="password" name="password" required placeholder="Introduce tu contraseña">
                <input type="submit" name="submit" value="Entrar Ya" class="form-btn">
                <p>¿Todavía no tienes cuenta? <a href="register_form.php">Registrate </a></p>
            </form>   
        </div> 
    </div>   
</body>
</html>
