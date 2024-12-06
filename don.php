<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Faire un Don</title>
</head>
<body>
    <h1>Faire un Don</h1>
    <form action="process_donation.php" method="post">
        <label for="amount">Montant du don (en €):</label>
        <input type="number" name="amount" id="amount" required>
        <br>
        <label for="email">Votre Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <input type="submit" value="Faire un Don">
    </form>
</body>
</html>