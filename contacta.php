<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="ruta_al_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Contacta</title>
    <style>
        nav a{
            color:black;
        }
        body{
            height:100vh;
        }
        .contain{
            display:flex;
            flex-direction:column;
            justify-content:center;
            place-items: center;
            align-items:center;
            margin-top:50px;
        }
        .contact-form {
            max-width: 600px;
            width: 100%;
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }
        .contact-form textarea {
            height: 150px;
        }
        .contact-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: crimson;
            color: white;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: darkred;
        }
        h3{
            margin-top:40px;
            margin-bottom:40px;
        }
        .map{
            display:flex;
            flex-direction:column;
            justify-content:center;
            place-items:center;
        }
        iframe{
            margin-bottom:70px;
        }
    </style>
</head>
<body>
   
    <header>
        <nav class="nav">
            <ul><a href="index.php"><img src="src/logo.png" alt="logo" ></a></ul>
            <ul class="hovered"><a href="aboutus.php">Sobre Nosotros</a></ul>
            <ul class="hovered"><a href="contacta.php">Contacta</a></ul>
            <ul class="hovered"><a href="login_form.php">Ingresa</a></ul>    
            <ul class="register"><a href="register_form.php" style="color:crimson;">Regístrate</a></ul>   
        </nav>
    </header>
    <main>
        <section id="contact">
            <div class="contain">
                <h1>Contacta</h1>
                <h3>Puede dejarnos un mensaje con su urgencia y le responderemos en la mayor brevedad posible.</h3>
                <div class="contact-form">
                    <form action="process_contact.php" method="post">
                        <input type="text" name="name" placeholder="Nombre" required>
                        <input type="email" name="email" placeholder="Correo electrónico" required>
                        <textarea name="message" placeholder="Mensaje" required></textarea>
                        <button type="submit">Enviar mensaje</button>
                    </form>
                </div>
            </div>

            <div class="map">
                <h3>Si prefieres un trato más personal, puedes acudir a nuestro despacho en Madrid.</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d17182.542274144536!2d-3.701352186573042!3d40.42052320824724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1713980790276!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>

    <?php
    include 'components/footer.php';
    ?>
</body>
</html>