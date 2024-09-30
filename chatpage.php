<?php 
session_start();

// Verificar si hay una sesión activa
if(isset($_SESSION['user_name']) || isset($_SESSION['admin_name'])) {
    // Incluir archivo de configuración de la base de datos
    include "config.php"; 

    // Verificar si el usuario en sesión es un administrador o un usuario normal
    if(isset($_SESSION['user_name'])) {
        // Si es un usuario normal, el user_id será el ID del usuario en sesión
        $userId = $_SESSION['user_id'];
    } elseif(isset($_SESSION['admin_name'])) {
        // Si es un administrador, el user_id será el ID del administrador
        $userId = $_SESSION['admin_id'];

    } else {
        echo "Error: el ID de usuario no está definido.";
        exit;
    }
    
    $sql="SELECT * FROM `mensajes`";

    $query = mysqli_query($conn,$sql);
}
else {
    header('location:index.php');
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Page</title>
    <style>
        .box{
          height:40vh;
          width:100vw;
          display: flex;
          flex-direction: row;
          gap:50px;
        }

        .box ul{
            text-decoration:none;
            justify-content:center;
            color:white;
            font-size:large;
            list-style: none;
            padding:0;
        }

        .box h3{
            font-size: larger;
            font-weight:bolder;
        }

        ul li a{
            text-decoration:none;
            color:white;
        }
        ul li a:hover{
            text-decoration:none;
            color:black;
            font-weight:bolder;
        }

        .user-list{
          display: flex;
          flex-direction:column;
          margin-left: 10vw;
          width: 12vw;
          background: crimson;
          justify-content:center;
          place-items:center;
          border-radius:8px;
          align-items: center;
        }
        .boxinside{
          height:40vh;
          width:70vw;
          overflow-y: auto;
          overflow-x: hidden;
        }
        .form-inline{
          display: flex;
          justify-content:center;
          place-items:center;
          margin-top:1vh;
          align-items: center;
          width: 100%;
          height: 15vh;
          place-items: right;
          margin-bottom:10vh;
        }
        textarea{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin-top:50px;
            width: 50vw;
            height: 100px;
        }

        /* Estilos para los mensajes */
        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
            max-width: 30%;
        }

        .message.sent {
            background-color: crimson; 
            color: white;
            border-radius: 10px;
            padding: 10px;
            margin: 5px 0 0 20vw;
            max-width: 40%;
            align-self: flex-end;
        }

        .message.received {
            background-color: #f1f1f1; 
            color: black;
            border-radius: 10px;
            padding: 10px;
            margin: 5px 0;
            max-width: 40%;
            align-self: flex-end;
        }

        .sender {
            background-color: crimson; 
            color: white;
            border-radius: 10px;
            padding: 10px;
            margin: 5px 0 0 20vw;
            max-width: 40%;
            align-self: flex-end;
        }

        .receiver {
            background-color: #f1f1f1; 
            color: black;
            border-radius: 10px;
            padding: 10px;
            margin: 5px 0;
            max-width: 40%;
            align-self: flex-end;
        }
    </style>
</head>
<body>
<div class="container">
    <?php include 'views/nav2.php'; ?>
    <?php 
        $user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : 'user';
            
        if ($user_type == 'admin') {
            echo '<a href="admin_page.php" style="margin-left:10vw" >Volver</a>';
        } else {
            echo '<a href="user_page.php" style="margin-left:10vw" >Volver</a>';
        }
    ?>

    <?php 
        $user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : 'user';
            
        if ($user_type == 'admin') {
            echo '<center><h2 style="color: black;">Hola de nuevo, <span style="color: crimson;">' . $_SESSION['admin_name'] . '!</span></h2></center><br>';
            echo '<center><h3 style="color: black;">Aquí puedes comunicarte con el cliente</h3></center><br>';
        } else {
            echo '<center><h2 style="color: black;">Hola de nuevo, <span style="color: crimson;">' . $_SESSION['user_name'] . '!</span></h2></center><br>';
            echo '<center><h3 style="color: black;">Aquí puedes comunicarte con tu abogado</h3></center><br>';
        }
    ?>

    <div class="box">
    <div class="user-list">
    <h3>Lista de usuarios</h3>
            <ul>
                <?php
                // Verificar si la clave 'user_type' está definida en la sesión
                if (isset($_SESSION['user_type'])) {
                    // Consulta para obtener los nombres de usuario únicos basados en 'user_type'
                    if ($_SESSION['user_type'] == 'user') {
                        // Si el usuario en sesión es de tipo 'user', cargamos los abogados
                        $sql_users = "SELECT DISTINCT id, nombre, user_type FROM user_form WHERE user_type = 'admin'";
                    } else {
                        // Si el usuario en sesión es de tipo 'admin', cargamos todos los usuarios
                        $sql_users = "SELECT DISTINCT id, nombre, user_type FROM user_form";
                    }

                    $query_users = mysqli_query($conn, $sql_users);

                    if (mysqli_num_rows($query_users) > 0) {
                        while ($row_user = mysqli_fetch_assoc($query_users)) {
                            // Verificar si la clave 'id' existe en el array $row_user
                            if (isset($row_user['id'])) {
                                // Si existe, mostrar el nombre del usuario y su ID
                                echo '<li><a href="#" class="user-link" data-user-type="' . $row_user['user_type'] . '" data-user-id="' . $row_user['id'] . '">' . $row_user['nombre'] . '</a></li>';
                            } else {
                                // Si no existe, mostrar un mensaje de error
                                echo '<li>No se encontró la clave "id" en el array.</li>';
                            }
                        }
                    } else {
                        echo '<li>No hay usuarios disponibles.</li>';
                    }
                } else {
                    // Si 'user_type' no está definido en la sesión, mostrar un mensaje de error
                    echo '<li>El tipo de usuario no está definido en la sesión.</li>';
                }
                ?>
            </ul>
        </div>


        <div class="boxinside">
            <div class="display-chat" id="display-chat">
                <?php
                    if(mysqli_num_rows($query)>0) {
                        while($row = mysqli_fetch_assoc($query)) {
                            // Verificar si el mensaje fue enviado por el usuario en sesión
                            $messageClass = ($row['user_id'] == $_SESSION['id_usuario']) ? 'sent' : 'received';
                            echo '<div class="message ' . $messageClass . '"><p><span>' . $row['name'] . ' :</span>' . $row['mensaje'] . '</p></div>';
                        }
                    } else {
                        echo '<div class="message"><p>No hay ninguna conversación previa.</p></div>';
                    } 
                ?>
            </div>
        </div>
    </div>
    <form class="form-inline" method="post" action="sendMessage.php">
              <div class="form-group">
                  <div class="col-sm-10">
                      <textarea name="msg" class="form-control" placeholder="Ingresa tu mensaje aquí..."></textarea>

                      <input type="hidden" name="receptor_id" id="receptor_id" value="">
                  </div>
                      
                  <div class="col-sm-2">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
              </div>
          </form>
</div>

<footer>
    <?php     include 'components/footer.php'; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Variable global para almacenar la información del abogado seleccionado
var abogadoSeleccionado = {};

$(document).ready(function(){
    // Obtener el ID del usuario
    receptorId = <?php echo isset($_SESSION['receptor_id']) ? $_SESSION['receptor_id'] : 'null'; ?>;

    // Cargar la conversación al cargar la página si receptorId está definido
    if (receptorId) {
        cargarConversacion(receptorId);
    }

    $('.user-link').on('click', function(e){
        e.preventDefault();
        
        // Obtener la información del abogado del atributo data
        abogadoSeleccionado.nombre = $(this).text(); 
        abogadoSeleccionado.id = $(this).data('user-id'); 
        console.log("Abogado seleccionado:", abogadoSeleccionado);

        // Cargar la conversación del usuario seleccionado
        cargarConversacion(abogadoSeleccionado.id);
    });

    // Función para cargar la conversación entre el usuario actual y el usuario seleccionado
    function cargarConversacion(userId) {
        // Enviar una solicitud AJAX solo si userId no está vacío
        $.ajax({
            type: 'POST',
            url: 'loadConversation.php',
            data: { userId: userId },
            success: function(response) {
                // Parsear la respuesta JSON
                var data = JSON.parse(response);
                
                if (data.success) {
                    // Mostrar los mensajes en el elemento con id display-chat
                    var messagesHTML = '';
                    data.messages.forEach(function(message) {
                        // Determinar la clase del mensaje basado en el remitente
                        var messageClass = (message.user_id === <?php echo $_SESSION['id_usuario']; ?>) ? 'sender' : 'receiver';
                        messagesHTML += '<div class="message ' + messageClass + '"><p><span>' + message.name + ':</span>' + message.mensaje + '</p></div>';
                    });
                    $('#display-chat').html(messagesHTML);
                } else {
                    // Mostrar un mensaje si no hay mensajes
                    $('#display-chat').html('<div class="message"><p>' + data.message + '</p></div>');
                }
            },
            error: function(xhr, status, error) {
                var msg = "Error al cargar la conversación: ";
                $("#display-chat").html(msg + xhr.status + " " + xhr.statusText);
            }
        });
    }

    //envío del formulario
    $('form').submit(function(e) {
        e.preventDefault();

        // Obtener el mensaje del formulario
        var message = $(this).find('textarea[name="msg"]').val();

        // Verificar que la información del abogado esté definida
        if (abogadoSeleccionado.nombre && abogadoSeleccionado.id) {
            // Establecer el valor del campo receptor_id en el formulario
            $('#receptor_id').val(abogadoSeleccionado.id);

            this.submit();
        } else {
            // Mostrar un mensaje de error si la información del abogado no está definida
            console.error('La información del abogado no está definida.');
        }
    });
});

</script>



</body>
</html>
