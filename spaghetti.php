<?php
include 'db.php';

$id_recette = isset($_GET['id']) ? (int) $_GET['id'] : 1; 

try {
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<a href="don.php" class="don-btn">
        <button>Faire un Don</button>
    </a>   
    <img src="./assets/images/pngegg.png" alt="logo" class="logo"><h1>1-Recette</h1>
    <?php include 'header.php'; ?>
<br>
    <div class="recette">
        <?php if ($recette): ?>
            <h1><?php echo htmlspecialchars($recette['nom']); ?></h1>
            <br>
            <br>
            <img src="./assets/images/spaghetti.jpg" alt="" class="spag">
            <p>Recette numéro : <?php echo nl2br(htmlspecialchars($recette['id_recettes'])); ?></p>
            <?php 
    $sql = "SELECT id_ingredient, nom FROM ingredients";
    $result = $pdo->query($sql); 

    if ($result->rowCount() > 0) {
        echo "<h2>Liste des Ingrédients</h2>";
        echo "<ul>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . htmlspecialchars($row['nom']) . " (ID: " . $row['id_ingredient'] . ")</li>";
        }
        echo "</ul>";
    } else {
        echo "Aucun ingrédient trouvé.";
    }
            ?>
        <?php else: ?>
            <p>Recette non trouvée.</p>
        <?php endif; ?>
    </div>
    <label for="etoiles">Évaluation (1 à 5 étoiles):</label>
        <select name="etoiles" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scrypt.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>