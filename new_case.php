<?php
// Verificar si se ha enviado el formulario
if(isset($_POST['submit'])) {
    
    
    include 'config.php';

    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $dni = $_POST['dni'];
    $fecha = $_POST['fecha'];
    $tipo_caso = $_POST['tipo_caso'];
    $abogado = $_POST['abogado'];
    $descripcion = $_POST['descripcion'];


    $sql1 = "INSERT INTO user_form (nombre, apellido, edad, dni) 
             VALUES ('$nombre', '$apellido', '$edad', '$dni')";

    // Ejecutar la primera consulta para insertar los datos en "user_form"
    if(mysqli_query($conn, $sql1)) {
        // Si la inserción en "user_form" es exitosa, obtenemos el ID del usuario recién insertado
        $user_id = mysqli_insert_id($conn);

        $sql2 = "INSERT INTO casos (id_usuario, tipo_caso, id_abogado, fecha_accidente, descripcion) 
                 VALUES ('$user_id', '$tipo_caso', '$abogado', '$fecha', '$descripcion')";


        if(mysqli_query($conn, $sql2)) {
            // Redirigir a una página de éxito si se insertaron los datos correctamente
            header('Location: admin_page.php');
            exit;
        } else {
            // Mostrar un mensaje de error si la consulta no se ejecutó correctamente
            echo "Error al insertar en la tabla 'casos': " . mysqli_error($conn);
        }
    } else {
        // Mostrar un mensaje de error si la primera consulta no se ejecutó correctamente
        echo "Error al insertar en la tabla 'user_form': " . mysqli_error($conn);
    }
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Caso</title>
    <link rel="stylesheet" href="style.css">

    <style>
    
        body {
            background-color: #f1f1f1;
            display: flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
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

        .h3t {
            margin-top: 5%;
            font-size: larger;
        }

        form{
            margin-top: 0%;
            width: 500px;
            height: 90vh;
            display: flex;
            flex-direction: column;
            margin-bottom:20%;
        }

        .bottonss {
            width: 100%;
            display: flex;
            justify-content: center;
            place-items:center;
        }

        .bottonss a{
            text-decoration: none;
            border-radius: 5px;
            padding: 10px;
            margin: 5px;
            color: white;
            background-color: crimson;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
            justify-content: center;
        }

        button{
            text-decoration: none;
            border-radius: 5px;
            padding: 10px;
            margin: 5px;
            color: white;
            background-color: crimson;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
            justify-content: center;
        }
        
        label{
            width: 100%;
            height: 10px;
            font-weight: 700;
            font-size: medium;
        }

        input{
            border-radius: 5px;
            margin-top:20px;
            height: 40px;
        }
        
        textarea{
            border-radius: 5px;
            border: 1px solid #000000;
            margin-top:20px;
            width:100%;
            height:25%;
        }
        
        select{
            width: 100%;
            height: 10px;
            font-weight: 700;
            font-size: medium;
            height:40px;
            border-radius: 5px;
        }


    </style>
</head>
<nav>
<?php
    include 'views/nav2.php';
?>
</nav>
<body>


    <h3 class="h3t">Por favor, incluya los datos de su siniestro en esta ficha:</h3><br><br>    
    <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" require>
        <br>
        <label for="apellido">Apellidos:</label>
        <input type="text" name="apellido" id="apellido" require>
        <br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" >
        <br>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" require>
        <br>
        <label for="fecha">Fecha del accidente:</label>
        <input type="date" name="fecha" id="fecha" require>
        <br>
        <label for="hora">Hora:</label>
        <input type="time" name="hora" id="hora" require>
        <br>
        <select name="tipo_caso" id="">
            <option value="Accidente de tráfico">Accidente de tráfico</option>
            <option value="Pleito contra el seguro">Pleito contra el seguro</option>
            <option value="Atropello">Atropello</option>
        </select>
        <br>        
        <select name="abogado" id="">
            <option value="1">Abogado 1</option>
            <option value="8">Abogado 2</option>
            <option value="3">Abogado 3</option>
        </select>        <br>
        <label for="descripcion">Descripción de los hechos:</label>
        <textarea name="descripcion" id="descripcion" require></textarea>
        <br>
        <br>
        <div class="bottonss">
            <a href="admin_page.php">Volver</a>
            <a href="cases.php">Ver Casos</a>
            <button type="submit" name="submit">Añadir</button>
        </div>
    </form>
</body>
<footer>
<?php
    include 'components/footer.php';
?>
</footer>

</html>