<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<img src="./images/pngegg.png" alt="logo">
    <?php include 'header.php'?>
<h2>Connexion</h2>
    <form action="db.php"></form>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Se connecter</button>
<?php include 'footer.php'?>
</body>
</html>
