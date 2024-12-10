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
            echo "<p style='color:red;'>Mot de passe incorrect.</p>";
        }
    } else {
        echo "<p style='color:red;'>Aucun utilisateur trouvé avec cet email.</p>";
    }
}

$pdo = null;
?>
<!DOCTYPE html>
<<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title></title>
</head>
<body>
<a href="don.php" class="don-btn">
        <button>Faire un Don</button>
    </a>
    
    <img src="./assets/images/pngegg.png" alt="logo" class="logo"><h1>1-Recette</h1>
<?php include 'header.php'; ?>

<h2>Connexion</h2>
<div class="container">
<form action="login_process.php" method="post">
    <label for="mail">Email:</label>
    <input type="email" name="mail" required>
    <br>
    <label for="mdp">Mot de passe:</label>
    <input type="password" name="mdp" required>
    <br>
    <input type="submit" value="Se connecter">
</form>
</div>




<p>Vous n'avez pas de compte ? <a href="register.php">Inscrivez-vous ici</a></p>
<!-- <p><a href="index.php">Retour à l'accueil</a></p> -->
    <?php include 'footer.php'?>
</body>
</html>