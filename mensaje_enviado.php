<head>
    <link rel="stylesheet" href="style.css">
    <style>
        nav{
            display:flex;
            justify-content: space-evenly;
        }

        nav a{
            color:black;
            text-decoration:none;
            font-weight:bolder;
            font-size:larger;

        }
        body{
            height:100vh;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

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
        .site-footer {
            margin-top:5%%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }  
        .boxi{
            height:80vh;
            display:flex;
            flex-direction:column;
            justify-content:center;
            place-items:center;
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

<div class="boxi">
<h3>Mensaje enviado correctamente.</h3>
<h4>Espere a ser contactado por su abogado.</h4>
</div>


<footer class="site-footer">
        <p>© 2024 Abogados. Todos los derechos reservados.</p>
        <br>
        <p>Desarrollado por Alberto Gómez Guerrero</a></p>
</footer>
</body>