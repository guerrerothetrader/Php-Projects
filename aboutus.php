<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="ruta_al_favicon.ico" type="image/x-icon">

    <title>Sobre Nosotros</title>
    <style>
        *{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
            text-decoration: none;
            outline: none;
            border: none;
            box-sizing: border-box;
        }

        body nav{
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
            width: 100vw;
            height: 60px;
        }
        nav img {
            width: 55px;
            height: 55px;
        }

        nav ul{
            background-color: rgba(238, 104, 104, 0.021);
            justify-content: center;
            place-content: center;
            place-items: center;
            padding: 5px 10px 5px 10px;
            height: 60px;
            width: 100%;
            text-align: center;

        }


        nav .hovered:hover{
            padding: 5px 10px 5px 10px;
            background: crimson;
            border-radius: 5px;
        }


        nav a{
            text-decoration: none;
            color: #fff;
            font-size: 25px;
            font-weight: bolder;
        }

        nav a {
            color: black;
        }
        body {
            height: 100vh;
        }
        .contain {
            display: flex;
            flex-direction: column;
            justify-content: center;
            place-items: center;
            align-items: center;
            margin-top: 10vh;
        }
        .about-content {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin-left: 40px;

        }
        .about-text {
            margin-top: 50px;
            font-size: large;
            margin-left: 20vw;
            margin-right:20vw;
            margin-bottom:70px;
            border-bottom: 1px solid #e0e0e0;
        }
        img {
            width: 350px;
            height: 350px;
            object-fit: cover;
            object-position: center;
            filter: drop-shadow(0 0 2px grey);
            animation-name: scaleup;
            animation-duration: 3s;
            animation-fill-mode: forwards;

        }
        p{
            margin-top:30px;
        }
        .about-text img {
            display: block; 
            margin: auto; 
        }
        .lawyers-container {
            display: flex;
            flex-direction:row;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-items: center;
            align-items: center;
            margin-top: 30px;
            margin-bottom:20vh;
        }
        .lawyer-card {
            max-width: 250px;
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            text-align: center;
        }
        .lawyer-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 15px;
        }
        .lawyer-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .lawyer-name {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .lawyer-specialty {
            margin-bottom: 10px;
        }
        .lawyer-description {
            font-size: 14px;
        }
        .gallery {
            width: 100%;
            max-width: 700px;
            height: 200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 20px;
            height: 30vh;
            margin-right: 40vw;

        }


                
        @keyframes scaleup {
            from{
                scale: 0.7;
            }
            to {
                scale: 1;
            }
        }

    </style>
</head>
<body>
   
    <header>
        <nav class="nav" style="margin-top: 10px;">
            <ul><a href="index.php"><img src="src/logo.png" alt="logo" ></a></ul>
            <ul class="hovered"><a href="aboutus.php">Sobre Nosotros</a></ul>
            <ul class="hovered"><a href="contacta.php">Contacta</a></ul>
            <ul class="hovered"><a href="login_form.php">Ingresa</a></ul>    
            <ul class="register"><a href="register_form.php" style="color:crimson;">Regístrate</a></ul>   
        </nav>
    </header>
    <main>
        <section id="about-us">
            <div class="contain">
                <h1>Sobre Nosotros</h1>
                <div class="about-content">
                    
                    <div class="about-text">
                        <p>Somos un prestigioso despacho legal con una amplia experiencia en diversas áreas del derecho. Nuestro compromiso es proporcionar asesoramiento jurídico de calidad y soluciones efectivas para nuestros clientes. Nos especializamos en el ámbito de los siniestros de tráfico y somos profesionales en este sector, tratando de obtener los mayores beneficios para su caso. </p><br><br>

                        <p>Conocemos los desafíos y complejidades que pueden surgir en casos de accidentes de tráfico, y estamos comprometidos a ayudar a nuestros clientes a obtener la compensación y la justicia que merecen. Nuestro equipo de abogados está capacitado para abordar una amplia gama de problemas legales relacionados con accidentes de tráfico, desde lesiones personales hasta daños materiales y disputas de seguros.</p><br><br>


                        <p>En nuestro despacho, nos enorgullecemos de nuestro compromiso con la excelencia, la ética profesional y la satisfacción del cliente. Valoramos la confianza que nuestros clientes depositan en nosotros y nos esforzamos por superar sus expectativas en cada caso. Ya sea que necesite asesoramiento legal en materia civil, penal, laboral o de cualquier otra área, nuestro equipo de abogados está aquí para ayudarlo. Contáctenos hoy mismo para programar una consulta y discutir su caso.</p><br><br>

                        <p>Ya sea que necesite asesoramiento legal en materia civil, penal, laboral o de cualquier otra área, nuestro equipo de abogados está aquí para ayudarlo. Contáctenos hoy mismo para programar una consulta y discutir su caso.</p><br><br>
                    </div>
                </div>
                
            </div>
            <div class="gallery">
                <span style="--i:1;">
                    <img src="src/accidente.jpg" alt="imagen" class="image-wrap2">
                </span>
                <span style="--i:2;">
                    <img src="src/accidente2.jpg" alt="imagen" class="image-wrap2">
                </span>
                <span style="--i:3;">
                    <img src="src/abogados2.jpg" alt="imagen" class="image-wrap2">
                </span>
            </div>
        </section>
        <section id="lawyers">
            <div class="contain">
                <h1>Nuestros Abogados</h1>
                <div class="lawyers-container">
                <div class="lawyer-card">
                        <div class="lawyer-img">
                            <img src="src/abogado1.jpg" alt="Abogado 2">
                        </div>
                        <div class="lawyer-name">Juan García</div>
                        <div class="lawyer-specialty">Especialista en Derecho Civil</div>
                        <div class="lawyer-description">Juan García se especializa en litigios civiles, proporcionando representación experta en disputas contractuales y de propiedad.</div>
                    </div>
                    <div class="lawyer-card">
                        <div class="lawyer-img">
                            <img src="src/abogado2.jpg" alt="Abogado 2">
                        </div>
                        <div class="lawyer-name">Carlos Gómez</div>
                        <div class="lawyer-specialty">Especialista en Derecho Civil</div>
                        <div class="lawyer-description">Carlos Gómez se especializa en litigios civiles, proporcionando representación experta en casos de atropellos y daños físicos.</div>
                    </div>
                    <div class="lawyer-card">
                        <div class="lawyer-img">
                            <img src="src/abogada.jpg" alt="Abogado 2">
                        </div>
                        <div class="lawyer-name">Teresa Pérez</div>
                        <div class="lawyer-specialty">Especialista en Derecho Civil</div>
                        <div class="lawyer-description">Teresa Pérez se especializa en litigios civiles, proporcionando representación experta en casos de incidencias de tráfico.</div>
                    </div>
                </div>
               

            </div>
        </section>
    </main>

    <?php include 'components/footer.php'; ?>
</body>

</html>
