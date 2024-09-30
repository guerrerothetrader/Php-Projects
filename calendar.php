<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='utf-8' />
  <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>

  <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css' rel='stylesheet' />

  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
  <style>
    body{
      display: flex;
      gap: 30px;
      justify-content: center;
      place-items: center;
      height: 100vh;
      background: linear-gradient(40deg, crimson, #fff, #fff, crimson);
    }

    #exampleModal{
      margin-left: 20%;
    }
    .back{
      display:flex;
      flex-direction:column;
      justify-content:center;
    }
  </style>
</head>
<body>


  <!-- Modal para agregar evento -->
  <div class='modal-header' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Agregar Evento</h5>
        </div>
        <div class='modal-body'>
          <form id='addEventForm'>
          <input type="hidden" id="eventId" name="eventId">
            <div class='mb-3'>
              <label for='title' class='form-label'>Título</label>
              <input type='text' class='form-control' id='title' required>
            </div>
            <div class='mb-3'>
              <label for='start' class='form-label'>Inicio</label>
              <input type='datetime-local' class='form-control' id='start' required>
            </div>
            <div class='mb-3'>
              <label for='end' class='form-label'>Fin</label>
              <input type='datetime-local' class='form-control' id='end' required>
            </div>
            <div class='mb-3'>
              <label for='color' class='form-label'>Color</label>
              <input type='color' class='form-control' id='color' value='#3788D8'>
            </div>
            <button type='submit' class='btn btn-primary'>Agregar</button>
            <input type="hidden" id="userId" name="userId" value="<?php echo $_SESSION['id_usuario']; ?>">
          </form>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Botón para eliminar evento -->
  <button id='deleteEventBtn' class='btn btn-danger' style='display: none;'>Eliminar Evento</button>
  <br><br>
  <div id='calendar'></div>

  <div class="back">
  <?php  
   session_start();  
   
   // Verificar si el usuario es un administrador o un usuario normal
   $user_type = $_SESSION['user_type'];

  if ($user_type == 'admin') {
    echo '<a href="admin_page.php" class="btn">Volver</a>';
  } else {
    echo '<a href="user_page.php" class="btn">Volver</a>';
  }
?>
  </div>
  <script>
    $(document).ready(function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
          today: 'Hoy',
          month: 'Mes',
          week: 'Semana',
          day: 'Día'
        },
        titleFormat: { year: 'numeric', month: 'long', day: 'numeric' },
        events: 'fetch_eventos.php',
        eventClick: function(info) {
          $('#exampleModal').modal('show');
          $('#deleteEventBtn').show(); // Mostrar el botón de eliminar evento
          $('#eventId').val(info.event.id); // Almacenar el ID del evento en el campo oculto
        }
      });
      calendar.render();

      // Agregar Nuevo Evento
      $('#addEventForm').submit(function(e) {
        e.preventDefault();
        var eventData = {
          title: $('#title').val(),
          start: $('#start').val(),
          end: $('#end').val(),
          color: $('#color').val()
        };
        $.ajax({
          url: 'guardar_evento.php',
          method: 'POST',
          data: eventData,
          success: function(response) {
            calendar.refetchEvents();
            $('#exampleModal').modal('hide');
          },
          error: function(xhr, status, error) {
            console.error('Error al agregar evento:', error);
          }
        });
      });

      // Eliminar Evento
      calendar.on('eventClick', function(info) {
      $('#exampleModal').modal('show');
      $('#deleteEventBtn').show(); // Mostrar el botón de eliminar evento
      $('#eventId').val(info.event.id); // Almacenar el ID del evento en el campo oculto
    });

    // Eliminar Evento
    $('#deleteEventBtn').click(function() {
      var eventId = $('#eventId').val(); // Obtener el ID del evento
      $.ajax({
        url: 'eliminar_evento.php',
        method: 'POST',
        data: { id: eventId }, // Enviar el ID del evento a eliminar
        success: function(response) {
          calendar.refetchEvents(); // Actualizar el calendario después de eliminar el evento
          $('#exampleModal').modal('hide'); // Cerrar el modal
        },
        error: function(xhr, status, error) {
          console.error('Error al eliminar evento:', error);
        }
      });
    });
    });

    
  </script>
</body>
</html>
