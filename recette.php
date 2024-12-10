<?php 
include 'db.php'; 

$search = trim(isset($_GET['search']) ? $_GET['search'] : '');

try {
    $query = "SELECT r.*, i.image_url FROM recettes r LEFT JOIN images i ON r.id_images = i.id_images WHERE r.nom LIKE :search";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['search' => "%$search%"]);
    $recettes = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $recettes = []; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<a href="don.php" class="don-btn">
        <button>Faire un Don</button>
    </a>
    
    <img src="./assets/images/pngegg.png" alt="logo" class="logo"><h1>1-Recette</h1>
    <?php include 'header.php'?>
<main>
    <h1>Liste des recettes</h1>
    <?php if ($recettes): ?>
        <ul>
            <?php foreach ($recettes as $recette): ?>
                <li>
                    <h2><?php echo htmlspecialchars($recette['recette_nom']); ?></h2>
                    <?php if (!empty($recette['image_url'])): ?>
                        <img src="\projet-1\recette php\projetcuisine\assets\images\<?php echo htmlspecialchars($recette['image_url']); ?>" alt="<?php echo htmlspecialchars($recette['nom']); ?>">
                    <?php endif; ?>
                    <p>Difficulté: <?php echo htmlspecialchars($recette['id_difficulte']); ?></p>
                    
                    <p>Iingrédients: <?php echo htmlspecialchars($recette['id_ingredient']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune recette trouvée.</p>
    <?php endif; ?>
</main>
<?php include 'footer.php'?>


</body>
</html>