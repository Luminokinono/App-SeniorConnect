<?php
$host = 'localhost';      // serveur local
$user = 'root';           // utilisateur par défaut WAMP/XAMPP
$password = '';           // mot de passe vide par défaut
$dbname = 'seniorconnect'; // nom de ta base de données

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $dbname);

// Vérifie si la connexion a échoué
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
