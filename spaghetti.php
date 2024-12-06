<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Récupérer l'ID de la recette depuis l'URL ou utiliser un ID par défaut
$id_recette = isset($_GET['id']) ? (int) $_GET['id'] : 1; // ID par défaut = 1

try {
    // Récupérer la recette de spaghetti à la bolognaise
    $stmt = $pdo->prepare("SELECT * FROM recettes WHERE id_recettes = :id_recettes");
    $stmt->bindParam(':id_recettes', $id_recette);
    $stmt->execute();
    $recette = $stmt->fetch();
} catch (PDOException $e) {
    die("Erreur lors de la récupération de la recette : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Recette Spaghetti à la Bolognaise</title> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<a href="don.php" class="don-btn">
        <button>Faire un Don</button>
    </a>
    
    <img src="./assets/images/pngegg.png" alt="logo" class="logo"><h1>1-Recette</h1>
    <?php include 'header.php'; ?>

    <div class="recette">
        <?php if ($recette): ?>
            <h1><?php echo htmlspecialchars($recette['nom']); ?></h1>
            <p><?php echo nl2br(htmlspecialchars($recette['id_ingredients'])); // Assurez-vous que 'ingredients' est le bon nom de colonne ?></p>
        <?php else: ?>
            <p>Recette non trouvée.</p>
        <?php endif; ?>
    </div>

    <form action="submit_comment.php" method="POST">
        <input type="hidden" name="id_recettes" value="<?php echo isset($recette['id_recettes']) ? $recette['id_recettes'] : ''; ?>"> 
        <label for="mail">Votre Email:</label>
        <input type="email" name="mail" required>
        
        <label for="commentaire">Commentaire:</label>
        <textarea name="commentaire" required></textarea>
        
        <label for="etoiles">Évaluation (1 à 5 étoiles):</label>
        <select name="etoiles" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        
 <button type="submit">Soumettre</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scrypt.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>