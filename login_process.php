<?php
session_start();
include 'db.php'; 

// Activer l'affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données de connexion
    $mail = trim($_POST['mail']);
    $mdp = $_POST['mdp'];

    // Vérifier si les champs sont remplis
    if (empty($mail) || empty($mdp)) {
        die("Veuillez remplir tous les champs.");
    }

    // Utilisation de PDO pour préparer la requête
    $sql = "SELECT * FROM utilisateurs WHERE mail = :mail";
    $stmt = $pdo->prepare($sql);

    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $pdo->errorInfo()[2]);
    }

    // Lier le paramètre et exécuter
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification des résultats
    if ($result) {
        // Vérification du mot de passe
        if (password_verify($mdp, $result['mdp'])) {
            // Authentification réussie
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['role'] = $result['role'];
            $_SESSION['nom_utilisateurs'] = $result['nom_utilisateurs'];

            // Redirection vers une page protégée
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
}

$pdo = null;
?>