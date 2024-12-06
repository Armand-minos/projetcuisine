<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulaire Contact et Inscription</title>
</head>
<body>
    <?php include 'header.php'?>
    <!-- Affichage des messages -->
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>

    <!-- Formulaire Utilisateurs -->
    <h2>Formulaire d'inscription</h2>
    <form method="post">
        <label>Email : <input type="email" name="mail" required></label><br>
        <label>Mot de passe : <input type="password" name="mdp" required></label><br>
        <label>Nom utilisateur : <input type="text" name="nom_utilisateurs" required></label><br>
        <button type="submit">Créer un compte</button>
    </form>
    <?php include 'footer.php'?>
</body>
</html>