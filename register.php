<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Formulaire Contact et Inscription</title>
</head>
<body>
<a href="don.php" class="don-btn">
        <button>Faire un Don</button>
    </a>
    
    <img src="./assets/images/pngegg.png" alt="logo" class="logo"><h1>1-Recette</h1>
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
    <div class="container">
    <form method="post">
        <label>Email : <input type="email" name="mail" required></label><br>
        <label>Mot de passe : <input type="password" name="mdp" required></label><br>
        <label>Nom utilisateur : <input type="text" name="nom_utilisateurs" required></label><br>
        <button type="submit">Créer un compte</button>
    </form>
    </div>
    <?php include 'footer.php'?>
</body>
</html>