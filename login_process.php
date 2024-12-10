<?php
session_start();
include 'db.php'; 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = trim($_POST['mail']);
    $mdp = $_POST['mdp'];

    if (empty($mail) || empty($mdp)) {
        die("Veuillez remplir tous les champs.");
    }

    $sql = "SELECT * FROM utilisateurs WHERE mail = :mail";
    $stmt = $pdo->prepare($sql);

    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $pdo->errorInfo()[2]);
    }

    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if (password_verify($mdp, $result['mdp'])) {
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['role'] = $result['role'];
            $_SESSION['nom_utilisateurs'] = $result['nom_utilisateurs'];

            header("Location: contact.php");
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