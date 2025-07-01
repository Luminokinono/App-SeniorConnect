<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inscription - SeniorConnect</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    body.fond-image {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      min-height: 100vh;
      padding: 20px;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      box-sizing: border-box;
    }

    .boutonretour {
      position: absolute;
      top: 20px;
      left: 20px;
      z-index: 10;
    }
  </style>
</head>
<body class="fond-image">
  <a href="index.php" class="boutonretour">← Retour à l'accueil</a>
  <main class="connexion-box">
    <h1>Créer un compte</h1>

    <!-- Formulaire modifié pour envoyer vers le backend -->
    <form action="traitement_inscription.php" method="POST" class="formulaire">
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required autocomplete="off">

      <label for="email">Adresse email :</label>
      <input type="email" id="email" name="email" required autocomplete="off">

      <label for="password">Mot de passe :</label>
      <input type="password" id="motdepasse" name="motdepasse" required autocomplete="off">

      <button type="submit" class="btn">S'inscrire</button>
    </form>
  </main>
</body>
</html>

