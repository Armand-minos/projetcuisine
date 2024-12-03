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

<main>
    <h1>Liste des recettes</h1>
    <?php if ($recettes): ?>
        <ul>
            <?php foreach ($recettes as $recette): ?>
                <li>
                    <h2><?php echo htmlspecialchars($recette['nom']); ?></h2>
                    <?php if ($recette['./images']): ?>
                        <img src="<?php echo htmlspecialchars($recette['./images']); ?>" alt="<?php echo htmlspecialchars($recette['nom']); ?>">
                    <?php endif; ?>
                    <p>Difficulté: <?php echo htmlspecialchars($recette['id_difficulte']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune recette trouvée.</p>
    <?php endif; ?>
</main>

