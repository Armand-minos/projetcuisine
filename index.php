<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Accueil - Site de Recettes</title>
</head>
<body>
    <h1>1-Recette</h1>
<img src="./images/pngegg.png" alt="logo">
<?php include 'header.php'?>

<header>
    <h2>Bienvenue sur notre site de recettes</h2>
    <form action="db.php" method="GET">
        <input type="text" name="query" placeholder="Rechercher une recette...">
        <button type="submit">Recherche</button>
    </form>
</header>

<main>
    <h2>Recettes Populaires</h2>
    <div class="carousel">
        <?php
        include 'db.php'; 
        $sql = "SELECT r.nom, r.id_recettes, d.nom AS description, i.id_images, i.image_url 
                FROM recettes r 
                JOIN description d ON r.id_difficulte = d.id_description 
                JOIN images i ON r.id_images = i.id_images";

$result = $conn->query($sql);

if ($result === false) {
    echo "Erreur lors de l'exécution de la requête: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='recipe'>";
            echo "<h3>" . htmlspecialchars($row['nom']) . "</h3>"; 
            echo "<p>" . htmlspecialchars($row['description']) . "</p>"; 

            if (!empty($row['image_url'])) {
                echo "<img src='\images/depositphotos_71739083-stock-photo-healthy-vegetarian-home-made-food.jpg" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['nom']) . "' />";
            }

            echo "<a href='recette.php?id=" . $row['id_recettes'] . "'>Voir la recette</a>";
            echo "</div>";
        }
    } else {
        echo "Aucune recette trouvée.";
    }
}
$conn->close();
?>
</div>
</main>

<?php include 'footer.php'?>