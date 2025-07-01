<?php
session_start();
if (!isset($_SESSION['nom'])) {
  header("Location: index.php");
  exit();
}
$nom = $_SESSION['nom'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Rencontres - SeniorLife</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: linear-gradient(to bottom, #f8cdda, #f88e8e);
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    .bar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
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

    #deconnexion {
      background-color: #ff4d4d;
      color: white;
      padding: 20px 50px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 28px;
      border: none;
      cursor: pointer;
    }

    .titre-profil {
      text-align: center;
      font-size: 48px;
      margin-top: 20px;
      color: #333;
    }

    .menu-onglets {
      display: flex;
      justify-content: center;
      margin: 20px 0;
      gap: 30px;
    }

    .btn1 {
      background-color: white;
      color: #e2719d;
      border: 2px solid #e2719d;
      padding: 18px 40px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      font-size: 20px;
      text-decoration: none;
    }

    #utilisateurConnecte {
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      margin-top: 10px;
      color: #333;
    }

    .cartes-container {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
      padding: 40px 20px;
      max-width: 1500px;
      margin: auto;
      box-sizing: border-box;
    }

    .card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: transform 0.3s ease;
      min-width: 280px;
      max-width: 280px;
      max-height: 460px;
      flex-shrink: 0;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: 240px;
      object-fit: cover;
      border-bottom: 1px solid #ddd;
    }

    .info {
      padding: 18px;
    }

    .info h3 {
      font-size: 24px;
      margin: 0 0 10px;
      color: #e2719d;
    }

    .info p {
      font-size: 16px;
      margin: 0;
    }
  </style>
</head>
<body>
  <div class="bar-header">
    <a href="index.php" class="boutonretour">← Accueil</a>
    <form action="deconnexion.php" method="post">
      <button type="submit" id="deconnexion">Déconnexion</button>
    </form>
  </div>

  <h2 class="titre-profil">Découvrez des profils</h2>

  <nav class="menu-onglets">
    <a href="messagerie.php" class="btn1">Messagerie</a>
    <a href="agenda.php" class="btn1">Agenda</a>
    <a href="profil.php" class="btn1">Profil</a>
    <a href="evenements.php" class="btn1">Événements</a>

  </nav>

  <p id="utilisateurConnecte">Connecté en tant que : <?php echo htmlspecialchars($nom); ?></p>

  <div class="cartes-container">
    <div class="card">
      <img src="image/lucie.JPG" alt="Lucie, 68 ans">
      <div class="info">
        <h3>Lucie, 68 ans</h3>
        <p>J'adore faire des petites folies hihihi. Mais j'adore surtout manger de la tarte au citron avec ma petite fille.</p>
      </div>
    </div>
    <div class="card">
      <img src="image/patrice.JPG" alt="Patrice, 78 ans">
      <div class="info">
        <h3>Patrice, 78 ans</h3>
        <p>Ancien militaire qui aimait faire des combats de rue. Actuellement à la retraite.</p>
      </div>
    </div>
    <div class="card">
      <img src="image/marie.JPG" alt="Marie, 82 ans">
      <div class="info">
        <h3>Marie, 82 ans</h3>
        <p>Adore rire et parler avec les gens.</p>
      </div>
    </div>
    <div class="card">
      <img src="image/john.JPG" alt="John, 68 ans">
      <div class="info">
        <h3>John, 68 ans</h3>
        <p>Aime le repos et manger avec les écureuils.</p>
      </div>
    </div>
    <div class="card">
      <img src="image/jack.JPG" alt="Jack, 62 ans">
      <div class="info">
        <h3>Jack, 62 ans</h3>
        <p>Fait beaucoup de sport, et a été addict aux danses Fortnite il y a 4 ans.</p>
      </div>
    </div>
  </div>
</body>
</html>

