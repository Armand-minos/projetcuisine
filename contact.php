<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contact</title>
</head>
<body>
    <h1>Contactez-nous</h1>
    <?php if (!empty($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php elseif (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="mail">Email :</label>
        <input type="email" name="mail" id="mail" required>
        <br>
        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire" required></textarea>
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>