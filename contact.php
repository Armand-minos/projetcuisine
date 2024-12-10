<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contact Us</title>
</head>
<body>
<a href="don.php" class="don-btn">
        <button>Faire un Don</button>
    </a>
    
    <img src="./assets/images/pngegg.png" alt="logo" class="logo"><h1>1-Recette</h1>
    <?php include 'header.php'?>
    <h1>Contact</h1>
    <div class="container">
    <form action="process_contact.php" method="POST">
        <label for="mail">Email:</label><br>
        <input type="mail" id="mail" name="mail" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="commentaire" name="commentaire" required></textarea><br><br>

        <button type="submit">Submit</button>
    </form>
    </div>
    <?php include 'footer.php'?>
</body>
</html>
