<?php include "agregar.php"; 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUBIR WORD & PDF</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        h2 {
            margin-top:5%;
        }

        body{
            background:linear-gradient(45deg, crimson, #fff, #fff, crimson);
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
        nav{
            height:60px;
            margin-top:20px;
        }

    </style>
</head>
<nav>
<?php
    include 'views/nav2.php';
?>
</nav>

<body>
    
    <br>

    <div class="container">
        <div class="col-sm-12">
            <h2 style="text-align: center;">Documentos Importantes</h2>
            <br>
            <div>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#agregar"> Agregar Documento</button>

            </div>
            <br>
            <br>
            <br>


            <div class="container">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Descripcion</th>
                            <th>Archivo</th>
                            <th>Descargar</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php

                        

                        include "docdb.php";
                        
                        
                        // Verificar si el usuario es un administrador o un usuario normal
                        $user_type = $_SESSION['user_type'];

                        if ($user_type == 'admin') {
                            // Si el usuario es un administrador, mostrar todos los archivos
                            $consulta = mysqli_query($conn, "SELECT * FROM documento");
                        } else {
                            // Si el usuario es un usuario normal, mostrar solo los archivos asociados a ese usuario
                            
                            $consulta = mysqli_query($conn, "SELECT * FROM documento WHERE user_type = '$user_type'");

                        }
                       while ($fila = mysqli_fetch_assoc($consulta)):
                    

                       ?>
                            <tr>
                            <td><?php echo $fila['id_documento'] ;?></td>
                            <td><?php echo $fila['nombre'] ;?></td>
                            <td><?php echo $fila['descripcion'] ;?></td>
                            <td><?php echo $fila['archivo'] ;?></td>
                                <td>
                                    <a href="download.php?id= <?php echo $fila['id_documento'] ;?>" class="btn btn-danger">
                                  <i class="fas fa-download"></i> Descargar</a>
                                </td>
                                
                                <?php endwhile ;?>

                            </tr>
                    </tbody>

                </table>
                <?php         
                    if ($user_type == 'admin') {
                        echo '<a href="admin_page.php" class="btn">Volver</a>';
                    } else {
                        echo '<a href="user_page.php" class="btn">Volver</a>';
                    }
                ?>


            </div>
        </div>

</body>
<style>
    a {
        text-decoration: none;
    }

    .s {
        padding-top: 50px;
        text-align: center;
    }
</style>
<footer>
<?php
    include 'components/footer.php';
?>
</footer>


</html>










