<?php
include 'db.php'; 
$error = ''; 
$success = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_utilisateurs = htmlspecialchars(trim($_POST['nom_utilisateurs']));
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
    $mdp = trim($_POST['mdp']);
    $terms = isset($_POST['terms']); 

   
    if (empty($nom_utilisateurs) || empty($mail) || empty($mdp)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error = "Adresse e-mail invalide.";
    } elseif (!$terms) { 
        $error = "Vous devez accepter les termes et conditions.";
    } else {
        
        $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);

        
        $query = "INSERT INTO utilisateurs (mdp, mail, nom_utilisateurs, role) VALUES (:mdp, :mail, :nom_utilisateurs, 'user')";
        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute(['nom_utilisateurs' => $nom_utilisateurs, 'mail' => $mail, 'mdp' => $hashed_password]);
            $success = "Inscription réussie!";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { 
                $error = "Cette adresse e-mail est déjà utilisée.";
            } else {
                $error = "Erreur lors de l'inscription.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Inscription</title>
</head>
<body>
    <header>
        <h1>Inscription</h1>
    </header>

    <main>
        <form action="" method="POST"> 
            <label for="nom_utilisateurs">Nom</label>
            <input type="text" name="nom_utilisateurs" id="nom_utilisateurs" required>

            <label for="mail">Adresse e-mail</label>
            <input type="email" name="mail" id="mail" required>

            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" required>

                <label>
                    <input type="checkbox" name="terms" required> J'accepte les termes et conditions
                    <a href="">Mentions légales</a>
                </label>

                <button type="submit">S'inscrire</button>
            </form>
        </main>
    </header>
</body>
</html>