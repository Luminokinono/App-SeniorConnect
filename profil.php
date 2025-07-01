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
  <title>Mon Profil - SeniorLife</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom, #f8cdda, #f88e8e);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      min-height: 100vh;
    }

    .bar-header {
      width: 100%;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      margin-bottom: 20px;
    }

    .boutonretour {
      background-color: #a3b18a;
      color: white;
      padding: 20px 50px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 41px;
      text-decoration: none;
      border: none;
    }

    h1 {
      font-size: 74px;
      color: #333;
      margin-bottom: 20px;
    }

    form {
      background: white;
      padding: 90px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      width: 90%;
      max-width: 400px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input, textarea {
      font-size: 38px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    button {
      background-color: #e2719d;
      color: white;
      padding: 15px;
      border: none;
      border-radius: 10px;
      font-size: 47px;
      font-weight: bold;
      cursor: pointer;
    }

    #photo-preview {
      width: 100%;
      max-height: 200px;
      object-fit: cover;
      border-radius: 10px;
      display: none;
    }

    #recap {
      background: white;
      padding: 154px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      width: 90%;
      max-width: 400px;
      display: none;
      margin-top: 20px;
    }

    #recap p, #recap strong {
      font-size: 32px;
    }

    #recap img {
      max-width: 100%;
      max-height: 354px;
      border-radius: 10px;
      margin-bottom: 10px;
    }

    #no-photo-message {
      font-style: italic;
      color: #555;
      margin-bottom: 10px;
      display: none;
    }

    #supprimer {
      background-color: #ff4d4d;
    }
  </style>
</head>
<body>
  <div class="bar-header">
    <a href="rencontres.php" class="boutonretour">← Retour</a>
  </div>

  <h1>Mon Profil</h1>

  <form id="profilForm">
    <input type="text" id="nom" placeholder="Nom" required>
    <input type="number" id="age" placeholder="Âge" required>
    <input type="text" id="adresse" placeholder="Adresse (facultatif)">
    <textarea id="description" rows="4" placeholder="Décris-toi..."></textarea>

    <input type="file" id="photo" accept="image/*">
    <img id="photo-preview" src="#" alt="Prévisualisation photo">

    <button type="submit">Enregistrer</button>
  </form>

  <div id="recap">
    <img id="recap-photo" src="#" alt="Photo de profil">
    <p id="no-photo-message">Aucune photo de profil</p>
    <p><strong>Nom :</strong> <span id="recap-nom"></span></p>
    <p><strong>Âge :</strong> <span id="recap-age"></span></p>
    <p><strong>Adresse :</strong> <span id="recap-adresse"></span></p>
    <p><strong>Description :</strong> <span id="recap-description"></span></p>
    <button id="supprimer">Supprimer le profil</button>
  </div>

  <script>
    const form = document.getElementById("profilForm");
    const preview = document.getElementById("photo-preview");
    const recap = document.getElementById("recap");

    // Chargement des infos si elles existent
    window.onload = () => {
      const profil = JSON.parse(localStorage.getItem("profil"));
      if (profil) {
        form.style.display = "none";
        afficherRecap(profil);
      }
    };

    // Prévisualisation de la photo
    document.getElementById("photo").addEventListener("change", function () {
      const reader = new FileReader();
      reader.onload = function () {
        preview.src = reader.result;
        preview.style.display = "block";
      };
      reader.readAsDataURL(this.files[0]);
    });

    // Enregistrement
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      const profil = {
        nom: document.getElementById("nom").value,
        age: document.getElementById("age").value,
        adresse: document.getElementById("adresse").value,
        description: document.getElementById("description").value,
        photo: preview.src && preview.style.display !== "none" ? preview.src : null
      };
      localStorage.setItem("profil", JSON.stringify(profil));
      form.style.display = "none";
      afficherRecap(profil);
    });

    // Affichage du récap
    function afficherRecap(profil) {
      document.getElementById("recap-nom").textContent = profil.nom;
      document.getElementById("recap-age").textContent = profil.age;
      document.getElementById("recap-adresse").textContent = profil.adresse;
      document.getElementById("recap-description").textContent = profil.description;

      const photoEl = document.getElementById("recap-photo");
      const msgNoPhoto = document.getElementById("no-photo-message");

      if (profil.photo) {
        photoEl.src = profil.photo;
        photoEl.style.display = "block";
        msgNoPhoto.style.display = "none";
      } else {
        photoEl.style.display = "none";
        msgNoPhoto.style.display = "block";
      }

      recap.style.display = "block";
    }

    // Suppression
    document.getElementById("supprimer").addEventListener("click", function () {
      if (confirm("Supprimer ce profil ?")) {
        localStorage.removeItem("profil");
        recap.style.display = "none";
        form.reset();
        form.style.display = "flex";
        preview.style.display = "none";
      }
    });
  </script>
</body>
</html>

