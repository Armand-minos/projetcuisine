<?php
// Connexion à la base de données
$host = 'localhost';
$db = 'recette';
$user = 'root';
$password = '';
$port = 3306; 
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Récupérer la recette de spaghetti à la bolognaise
    $stmt = $pdo->prepare("SELECT * FROM recettes WHERE id_recettes = :id_recettes");
    $stmt->bindParam(':id_recettes', $id_recette);
    $id_recette = 1; // Remplacez par l'ID de votre recette
    $stmt->execute();
    $recette = $stmt->fetch(); // Ajoutez le point-virgule ici

    // Variables pour messages
    $success = '';
    $error = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Traitement du formulaire "contact"
        if (isset($_POST['mail'], $_POST['commentaire']) && !isset($_POST['mdp'], $_POST['nom_utilisateurs'], $_POST['role'], $_POST['etoiles'])) {
            $mail = $_POST['mail'];
            $commentaire = $_POST['commentaire'];

            if (empty($mail) || empty($commentaire)) {
                $error = "Tous les champs du formulaire contact sont requis.";
            } else {
                $stmt = $pdo->prepare("INSERT INTO contact (mail, commentaire) VALUES (:mail, :commentaire)");
                $stmt->bindParam(':mail', $mail);
                $stmt->bindParam(':commentaire', $commentaire);

                try {
                    $stmt->execute();
                    $success = "Votre message a été envoyé avec succès.";
                } catch (PDOException $e) {
                    $error = "Erreur lors de l'envoi du message : " . $e->getMessage();
                }
            }
        }
        // Traitement du formulaire "utilisateurs"
        elseif (isset($_POST['mail'], $_POST['mdp'], $_POST['nom_utilisateurs'], $_POST['role'])) {
            $mail = $_POST['mail'];
            $mdp = $_POST['mdp'];
            $nom_utilisateurs = $_POST['nom_utilisateurs'];
            $role = $_POST['role'];

            if (empty($mail) || empty($mdp) || empty($nom_utilisateurs) || empty($role)) {
                $error = "Tous les champs du formulaire utilisateurs sont requis.";
            } else {
                // Vérification de l'existence de l'email
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE mail = :mail");
                $stmt->bindParam(':mail', $mail);
                $stmt->execute();
                $count = $stmt->fetchColumn();

                if ($count > 0) {
                    $error = "Cette adresse email est déjà utilisée. Veuillez en choisir une autre.";
                } else {
                    // Hachage du mot de passe
                    $hashedPassword = password_hash($mdp, PASSWORD_BCRYPT);

                    // Insertion dans la table utilisateurs
                    $stmt = $pdo->prepare("INSERT INTO utilisateurs (mail, mdp, nom_utilisateurs, role) 
                                           VALUES (:mail, :mdp, :nom_utilisateurs, :role)");
                    $stmt->bindParam(':mail', $mail);
                    $stmt->bindParam(':mdp', $hashedPassword);
                    $stmt->bindParam(':nom_utilisateurs', $nom_utilisateurs);
                    $stmt->bindParam(':role', $role);

                    try {
                        $stmt->execute();
                        $success = "Compte utilisateur créé avec succès.";
                    } catch ( PDOException $e) {
                        $error = "Erreur lors de la création de l'utilisateur : " . $e->getMessage();
                    }
                }
            }
        }
        // Traitement du formulaire "commentaires"
        elseif (isset($_POST['id_recettes'], $_POST['mail'], $_POST['commentaire'], $_POST['etoiles'])) {
            $id_recette = $_POST['id_recettes'];
            $mail = $_POST['mail'];
            $commentaire = $_POST['commentaire'];
            $etoiles = $_POST['etoiles'];

            if (empty($id_recette) || empty($mail) || empty($commentaire) || empty($etoiles)) {
                $error = "Tous les champs du formulaire commentaire sont requis.";
            } else {
                // Préparez et exécutez l'insertion
                $stmt = $pdo->prepare("INSERT INTO commentaires (id_recettes, mail, commentaire, etoiles) VALUES (:id_recette, :mail, :commentaire, :etoiles)");
                $stmt->bindParam(':id_recette', $id_recette);
                $stmt->bindParam(':mail', $mail);
                $stmt->bindParam(':commentaire', $commentaire);
                $stmt->bindParam(':etoiles', $etoiles);

                try {
                    $stmt->execute();
                    $success = "Votre commentaire a été soumis avec succès.";
                } catch (PDOException $e) {
                    $error = "Erreur lors de l'envoi du commentaire : " . $e->getMessage();
                }
            }
        }
    }
} catch (PDOException $e) {
    die("Erreur lors de la connexion à la base de données : " . $e->getMessage());
}
?>