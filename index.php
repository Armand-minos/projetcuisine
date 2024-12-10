<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Accueil - Site de Recettes</title>
</head>
<body>
<a href="don.php" class="don-btn">
        <button>Faire un Don</button>
    </a>
    
    <img src="./assets/images/pngegg.png" alt="logo" class="logo"><h1>1-Recette</h1>
    <?php include 'header.php'; ?>

    <header>
        <h2>Bienvenue sur notre site de recettes</h2>
        <form class="recherche" action="db.php" method="GET">
            <input type="text" name="query" placeholder="Rechercher une recette...">
            <button type="submit">Recherche</button>
        </form>
    </header>

    <main>
        <h2>Recettes Populaires</h2>
        <div class="carousel">
            <?php
            include 'db.php'; 

            
            $sql = "SELECT r.nom, r.id_recettes, d.nom AS description, i.image_url 
                    FROM recettes r 
                    JOIN description d ON r.id_difficulte = d.id_description 
                    JOIN images i ON r.id_images = i.id_images";

            try {
                
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='recipe'>";
                        echo "<h3>" . htmlspecialchars($row['nom']) . "</h3>"; 
                        echo "<p>" . htmlspecialchars($row['description']) . "</p>"; 

                        if (!empty($row['image_url'])) {
                            echo "<img src='./assets/images/"  . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['nom']) . "' />";
                        }

                        echo "<a href='recette.php?id=" . $row['id_recettes'] . "'>Voir la recette</a>";
                        echo "</div>";
                    }
                } else {
                    echo "Aucune recette trouvée.";
                }
            } catch (PDOException $e) {
                echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
            }
            ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
