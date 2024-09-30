<?php include "agregar.php"; ?>

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
        body {
            background: linear-gradient(70deg,crimson,#fff,#fff,#fff,crimson);
            margin-bottom:20%;
        }
        h2{
            margin-top:5%;
        }
        table th {
            background: crimson;
            color: white;
        }

        table, th, td {
            border: .7px solid #333;
            padding: 8px;

        }
        table{
            border-collapse: collapse;
            text-align: center;
            width: 100%;
        }
        h5{
            justify-content: center;
            text-align:center;
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

        a {
            text-decoration: none;
            font-weight: bolder;
            color:black;
        }

        .s {
            padding-top: 50px;
            text-align: center;
            
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
            <h2 style="text-align: center;">Buscar Caso</h2><br>

            <br>
            <div>
                <h5>Aquí podrás encontrar la información básica de cada caso, pudiendo filtrar por los valores los cuales te interesen.</h5><br><br>

                <form action="" method="post">
                    <label for="campo">Buscar: </label>
                    <input type="text" name="campo" id="campo">
                </form>
                
                <table>
                    <thead>
                        <th>Id Caso</th>
                        <th>Nombre</th>
                        <th>Juzgado</th>
                        <th>Tipo de Caso</th>
                        <th>Abogado</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody id="content">

                    </tbody>
                </table>
            </div>            
            <br>
    
            

           
        </div>

        <script>
            buscar();

            document.getElementById('campo').addEventListener('keyup', buscar);

            function buscar() {
                let input = document.getElementById('campo').value;
                let content = document.getElementById('content');
                let url = "load_case.php";
                let formaData = new FormData();
                formaData.append('campo', input);

                fetch(url, {
                    method: 'POST',
                    body: formaData
                })
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    if (data.length > 0) {
                        data.forEach(row => {
                            html += '<tr>';
                            html += '<td>' + row.id_caso + '</td>';
                            html += '<td>' + row.nombre + '</td>';
                            html += '<td>' + row.juzgado + '</td>';
                            html += '<td>' + row.tipo_caso + '</td>';
                            html += '<td>' + row.id_abogado + '</td>';
                            html += '<td>' + row.estado + '</td>';
                            html += '<td>' + row.descripcion + '</td>';
                            html += '<td><button class="btn btn-danger delete-btn" data-id="' + row.id_caso + '">Eliminar</button></td>';
                            html += '</tr>';
                        });
                    } else {
                        html += '<tr>';
                        html += '<td colspan="8">No se encontraron resultados</td>';
                        html += '</tr>';
                    }
                    content.innerHTML = html;
                })
                .catch(err => console.log(err));
            }  
            document.getElementById('content').addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-btn')) {
                let idCaso = e.target.getAttribute('data-id');
                console.log('ID del caso a eliminar:', idCaso);
                if (confirm('¿Estás seguro de que quieres eliminar este caso?')) {
                    // Comprobar si el ID del caso es válido
                    if (!idCaso || isNaN(idCaso)) {
                        console.error('ID del caso inválido.');
                        return;
                    }

                    fetch('eliminar_caso.php', {
                        method: 'POST',
                        body: JSON.stringify({ id: idCaso }), // Cambiar id_caso a id
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);
                        // Comprobar si hay errores en la respuesta
                        if (data.startsWith('Error:')) {
                            console.error('Error al eliminar el caso:', data);
                        } else {
                            console.log('Caso eliminado correctamente.');
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            }
        });
        </script>
            
    <p><a href="admin_page.php">Volver</a></p>

</body>


<footer>
<?php
    include 'components/footer.php';
?>
</footer>


</html>
