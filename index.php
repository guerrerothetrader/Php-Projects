<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="ruta_al_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Abogados</title>

</head>
<body>
   
    <header>
        <?php
        include 'components/nav.php';
        ?>
    </header>
    <main>
        <section class="section1">
            <h1>¿Buscas al mejor abogado de accidente de coche?</h1>
            <h3>Si has sido víctima de un accidente de coche, no dudes. Contacta con los mejores.</h3>
            <div class="botons">
                <button><a href="aboutus.php" class="bton">Saber más</a></button>
                <button><a href="register_form.php" class="btonReg">Regístrate</a></button>
            </div>
            <img src="src/building.jpg" alt="fondo">
        </section>
        <section class="section2">
            <h1>Aseguramos los mejores precios y resultados gracias a nuestra experiencia en el sector</h1>
            <div class="conten">
                <p>Nuestra compañía está dedicada a <b>proveer asistencia a aquellas personas que necesitan una guía de actuación frente a siniestros y accidentes de coche en lo que se han visto implicados.</b> Nuestra misión, es guiar, asesorar y hacer accesible toda la información que necesitan para resolver su caso. </p>
                <div class="botons">
                    <button><a href="aboutus.php" class="bton">Saber más</a></button>
                    <button><a href="register_form.php" class="bton">Regístrate</a></button>
                </div>
            </div>
        </section>
        <section class="section3">
            <img src="src/logo.jpg" alt="icono">
            <h3>"¡Increíble servicio! Después de mi accidente de coche, estaba perdido y confundido. Gracias a este sitio web, pude obtener ayuda legal de manera rápida y sencilla. Los abogados fueron muy profesionales y me guiaron en cada paso del proceso. ¡Altamente recomendado!"</h3>
            <h2>Alberto Gómez</h2>
            <p>Former VIP of ads at Company</p>
        </section>
        <section class="section4">
            <div class="cont">
            <p>Nuestra compañía está dedicada a proveer asistencia <b>24 horas</b> a aquellas personas que necesitan una guía de actuación frente a siniestros y accidentes de coche en lo que se han visto implicados. Nuestra misión, es guiar, asesorar y hacer accesible toda la información que necesitan para resolver su caso.</p>
            <button>
                    <img src="src/telefono.png" alt="telefono" style="width:15px; height:15px;">
                    <a href="#">628292945</a>
            </button>
            </div>
            <img src="src/hoja.jpg" alt="">
        </section>
        <section class="section5">
            <div class="contain">
                <p>Simplificado</p>
                <h1>Proceso de Resolución de accidentes de coche</h1>
                <div class="btn">
                    <button><a href="register_form.php">Regístrate</a></button>
                </div>
            </div>
            <div class="contain">
                <h3>Paso uno</h3>
                <p>Crea una cuenta y proporciona los detalles necesarios sobre tu accidente. </p>
                <h3>Paso dos</h3>
                <p>Contacta con un abogado profesional que esté especializado en casos de accidentes de coche. </p>
                <h3>Paso tres</h3>
                <p>Colabora con tu abogado para proporcionar los documentos y evidencias necesarias. </p>
                <h3>Paso cuatro</h3>
                <p>Mantente informado de los avances de tu caso. </p>
                <h3>Paso cinco</h3>
                <p>Trabaje para llegar a una resolución y reciba la compensación que se merece. </p>
            </div>
        </section>

        <section class="section6">
            <h1>Preguntas Frecuentes</h1>
            <h3>Encuentra respuestas a las preguntas más frecuentes sobre accidentes de tráfico y procedeimientos legales que te ayuden a entender el proceso.</h3>
            <hr>
            <div class="contain">
                <h3>¿Qué debo hacer?</h3>
                <p>Si ha tenido un accidente de coche, asegúrese de priorizar su seguridad y la de los demás involucrados. Llame a las autoridades, intercambie información con la otra parte y busque atención médica si es necesario.</p>
            </div>
            <hr>
            <div class="contain">
                <h3>¿Cómo puedo reclamar una indemnización?</h3>
                <p>Para reclamar una indemnización por un accidente de coche, reúna pruebas como fotografías, declaraciones de testigos y registros médicos. Póngase en contacto con un abogado profesional que se especialice en estos casos para que lo guíe a través del proceso legal. </p>
            </div>
            <hr>
            <div class="contain">
                <h3>¿Cuáles son mis derechos?</h3>
                <p>Como víctima de un accidente automovilístico, tiene derecho a solicitar una compensación por gastos médicos, daños a la propiedad, salarios perdidos y dolor y sufrimiento. Consulte con un abogado para comprender sus derechos específicos según su situación.</p>
            </div>
            <hr>
            <div class="contain">
                <h3>¿Cuánto tiempo se tarda?</h3>
                <p>La duración de un caso de accidente automovilístico puede variar dependiendo de varios factores, como la complejidad del caso, la voluntad de las partes de negociar y el cronograma del tribunal. Su abogado puede proporcionarle un presupuesto basado en sus circunstancias.</p>
            </div>
            <hr>
            <div class="contain">
                <h3>¿Puedo llegar a un acuerdo extrajudicial?</h3>
                <p>Sí, es posible resolver un caso de accidente automovilístico fuera de los tribunales mediante negociaciones con la compañía de seguros de la otra parte. Sin embargo, es importante consultar con un abogado para asegurarse de recibir un acuerdo justo que cubra todos sus daños.</p>
            </div>

            <div class="more_questions">
                <h3>¿Tienes más preguntas?</h3>
                <p>Contacta con nuestro equipo para más información.</p>
                <button><a href="contacta.php">Contacta</a></button>
            </div>
        </section>
    </main>
    <?php
    include 'components/footer.php';
    ?>
</body>
</html>