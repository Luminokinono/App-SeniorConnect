<?php
require 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['motdepasse'] ?? ''; // le champ s'appelle "motdepasse" dans ton HTML

    $stmt = $conn->prepare("SELECT id, nom, mot_de_passe FROM utilisateurs WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $nom, $mot_de_passe_bdd);
        $stmt->fetch();

        if (password_verify($password, $mot_de_passe_bdd)) {
            session_start();
            $_SESSION['nom'] = $nom;

            header("Location: rencontres.php");
            exit();
        } else {
            header("Location: index.php?erreur=1");
            exit();
        }
    } else {
        header("Location: index.php?erreur=1");
        exit();
    }
}
?>

