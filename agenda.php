<?php
session_start();
if (!isset($_SESSION['nom'])) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Agenda - SeniorLife</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom, #f8cdda, #f88e8e);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .header {
      width: 100%;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      padding: 20px;
    }

    .boutonretour {
      background-color: #a3b18a;
      color: white;
      padding: 20px 50px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 28px;
      text-decoration: none;
      border: none;
    }

    h1 {
      text-align: center;
      font-size: 45px;
      margin: 0 0 20px 0;
      color: #333;
    }

    #calendar {
      width: 95%;
      max-width: 1200px;
      background: white;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
      margin-bottom: 40px;
    }

    @media screen and (max-width: 768px) {
      .boutonretour {
        font-size: 22px;
        padding: 15px 30px;
      }

      h1 {
        font-size: 32px;
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <a href="rencontres.php" class="boutonretour">← Retour</a>
  </div>

  <h1>Mon Agenda</h1>
  <div id="calendar"></div>

  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const calendarEl = document.getElementById('calendar');

      function saveEvents(events) {
        localStorage.setItem('events', JSON.stringify(events));
      }

      function loadEvents() {
        const saved = localStorage.getItem('events');
        return saved ? JSON.parse(saved) : [];
      }

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        editable: true,
        selectable: true,
        headerToolbar: {
          start: 'prev,next today',
          center: 'title',
          end: 'dayGridMonth,timeGridWeek'
        },
        events: loadEvents(),

        select: function(info) {
          const title = prompt("Nouvel évènement pour le " + info.startStr + " ?");
          if (title) {
            const newEvent = {
              title: title,
              start: info.startStr,
              end: info.endStr,
              allDay: true
            };
            calendar.addEvent(newEvent);

            const events = calendar.getEvents().map(e => ({
              title: e.title,
              start: e.startStr,
              end: e.endStr,
              allDay: e.allDay
            }));
            saveEvents(events);
          }
          calendar.unselect();
        },

        eventClick: function(info) {
          if (confirm("Supprimer cet événement ?")) {
            info.event.remove();
            const events = calendar.getEvents().map(e => ({
              title: e.title,
              start: e.startStr,
              end: e.endStr,
              allDay: e.allDay
            }));
            saveEvents(events);
          }
        }
      });

      calendar.render();
    });
  </script>
</body>
</html>

