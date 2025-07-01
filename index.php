<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion - SeniorConnect</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="fond-image">

  <main class="connexion-box">
    <h1>Bienvenue sur <span class="titre-accent">SeniorConnect</span></h1>

    <!-- Formulaire corrigé -->
    <form class="formulaire" action="traitement_connexion.php" method="POST">
      <label for="email">Adresse email :</label>
      <input type="email" id="email" name="email" required autocomplete="off">

      <label for="motdepasse">Mot de passe :</label>
      <input type="password" id="motdepasse" name="motdepasse" required autocomplete="off">

      <!-- On peut afficher les erreurs ici avec PHP si besoin -->
      <?php
        if (isset($_GET['erreur']) && $_GET['erreur'] == '1') {
          echo '<p class="message-erreur">Email ou mot de passe incorrect.</p>';
        }
      ?>

      <button type="submit" class="btn">Se connecter</button>
      <a href="inscription.php" class="lien-inscription">Pas encore de compte ? Inscrivez-vous</a>
    </form>
  </main>

</body>
</html>

