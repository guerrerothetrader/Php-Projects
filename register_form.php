<?php
    @include 'config.php';

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['nombre']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

        $select_user = " SELECT * FROM user_form WHERE email = '$email' && password= '$password' ";
        $result = mysqli_query($conn, $select_user);

        if(mysqli_num_rows($result) > 0){
            $message[] = 'User already exist!';
        }else{
            if($password != $cpassword){
                $message[] = 'Confirm password not matched!';
            }else{
                $insert = "INSERT INTO user_form(nombre, email, password, user_type) VALUES ('$name', '$email', '$password', '$user_type')";
                mysqli_query($conn, $insert);
                header('location:login_form.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

            <div class="form-container">
            <a href="index.php"><img src="src/logo.png" alt="computer" style="width:30vw; height:30vh; object-fit: scale-down; margin-right:5rem; margin-left:10vw;"></a>
                <form action="" method="post">
                    <h3>Regístrate</h3>
                    <?php
                    if(isset($message)){
                        foreach($message as $msg){
                            echo '<span class="error-msg">'.$msg.'</span>';
                        };
                    };
                    ?>
                    <input type="text" name="nombre" required placeholder="Introduce tu nombre">
                    <input type="email" name="email" required placeholder="Introduce tu email">
                    <input type="password" name="password" required placeholder="Introduce tu contraseña">
                    <input type="password" name="cpassword" required placeholder="Confirma tu contraseña">
                    <select name="user_type" id="">
                        <option value="user">Usuario</option>
                        
                    </select>
                    <input type="submit" name="submit" value="Resgístrate Ya" class="form-btn">
                    <p>¿Ya tienes una cuenta? <a href="login_form.php">Entra aquí</a></p>
                </form>   
            </div>       


</body>
</html>