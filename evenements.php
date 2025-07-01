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
  <meta charset="UTF-8">
  <title>Evénements - SeniorConnect</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom, #f8cdda, #f88e8e);
      margin: 0;
      padding: 0;
    }

    .bar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
    }

    .boutonretour {
      background-color: #a3b18a;
      color: white;
      padding: 15px 30px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 20px;
      text-decoration: none;
      border: none;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .evenement {
      background: white;
      margin: 30px auto;
      max-width: 600px;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .evenement img {
      max-width: 100%;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .btn-ajouter {
      background-color: #e2719d;
      color: white;
      padding: 10px 25px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="bar-header">
    <a href="rencontres.php" class="boutonretour">← Retour</a>
  </div>

  <h1>Événements à venir</h1>

  <div class="evenement">
    <img src="image/picnic.jpg" alt="Pique-nique au parc">
    <h2>Pique-nique au Parc</h2>
    <p>Vous inquieter pas les aliments ne seront pas empoisonés</p>
    <button class="btn-ajouter" onclick="ajouterEvenement('Pique-nique au Parc')">Ajouter à l'agenda</button>
  </div>

  <div class="evenement">
    <img src="image/fete.jpg" alt="Fête dansante">
    <h2>Fête dansante</h2>
    <p>Soirée dansante pour l'anniversaire de Jean. Ambiance assurée !</p>
    <button class="btn-ajouter" onclick="ajouterEvenement('Fête dansante')">Ajouter à l'agenda</button>
  </div>

  <script>
    function ajouterEvenement(titre) {
      const today = new Date();
      const dateStr = today.toISOString().split('T')[0];
      const events = JSON.parse(localStorage.getItem('events') || '[]');
      events.push({
        title: titre,
        start: dateStr,
        end: dateStr,
        allDay: true
      });
      localStorage.setItem('events', JSON.stringify(events));
      alert("Événement ajouté à l'agenda !");
    }
  </script>
</body>
</html>
