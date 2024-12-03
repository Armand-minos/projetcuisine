<?php
include 'db.php'; 
$sql = "SELECT r.nom AS recette_nom, i.nom AS ingredient_nom, img.image_url
        FROM recettes r
        JOIN ingredients i ON r.id_ingredient = i.id_ingredient
        JOIN images img ON r.id_images = img.id_images
        WHERE r.nom = 'Coucous'"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        echo "<h1>" . $row['recette_nom'] . "</h1>";
        echo "<img src='" . $row['image_url'] . "' alt='" . $row['recette_nom'] . "' style='width:300px;height:auto;'><br>";
        echo "<h2>Ingrédients :</h2>";
        echo "<ul>";
        echo "<li>" . $row['ingredient_nom'] . "</li>";
        echo "</ul>";
    }
} else {
    echo "Aucune recette trouvée.";
}


$conn->close();
?>