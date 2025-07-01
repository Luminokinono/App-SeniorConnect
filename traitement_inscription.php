<?php
require 'connexion.php'; // on se connecte à la BDD

$nom = $_POST['nom'];
$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT); // on chiffre le mot de passe

// Vérifie si l'email existe déjà
$check = $conn->prepare("SELECT id FROM utilisateurs WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "Cet email est déjà utilisé.";
} else {
    // On insère le nouvel utilisateur
    $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nom, $email, $mot_de_passe);

    if ($stmt->execute()) {
        header("Location: index.php"); // retour à la page login
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
