<?php
// Configuration de la base de données
$host = '127.0.0.1';
$dbname = 'recette';
$user = 'root';
$password = ''; // Ajoutez le mot de passe de votre base de données si nécessaire

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification de la soumission du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $nom = $_POST['nom'];
        $preparation = $_POST['preparation'];
        $difficulte = !empty($_POST['difficulte']) ? $_POST['difficulte'] : null;
        $image = !empty($_POST['image']) ? $_POST['image'] : null;

        // Insertion dans la table `recettes`
        $sql = "INSERT INTO recettes (recette_nom, preparation, id_difficulte, id_images) VALUES (:nom, :preparation, :difficulte, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':preparation', $preparation);
        $stmt->bindParam(':difficulte', $difficulte, PDO::PARAM_INT);
        $stmt->bindParam(':image', $image, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "La recette a été ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'ajout de la recette.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
