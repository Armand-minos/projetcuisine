<?php
include 'db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
    $commentaire = htmlspecialchars(trim($_POST['commentaire']));

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error = "Adresse e-mail invalide.";
    } else {
        try {
            $query = "INSERT INTO contact (mail, commentaire) VALUES (:mail, :commentaire)";
            $stmt = $pdo->prepare($query);
        
            if ($stmt->execute(['mail' => $mail, 'commentaire' => $commentaire])) {
                $mailer = new PHPMailer(true);
                $mailer->SMTPDebug = 2; 
                try {
                    
                    $mailer->isSMTP();
                    $mailer->Host       = 'smtp.gmail.com';
                    $mailer->SMTPAuth   = true;
                    $mailer->Username   = 'votre_email@gmail.com';
                    $mailer->Password   = 'votre_mot_de_passe_application';
                    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mailer->Port       = 587;
        
                  
                    $mailer->setFrom('votre_email@gmail.com', 'Votre Nom');
                    $mailer->addAddress($mail, 'Nom du destinataire');
        
                    
                    $mailer->isHTML(true);
                    $mailer->Subject = 'Nouveau commentaire de contact';
                    $mailer->Body    = "Vous avez reçu un nouveau commentaire de contact.<br>Email: $mail<br>Commentaire: $commentaire";
        
                    $mailer->send();
                    $success = "Votre message a été envoyé avec succès ! Merci.";
                } catch (Exception $e) {
                    $error = "Le message n'a pas pu être envoyé. Erreur : " . $mailer->ErrorInfo;
                }
            } else {
                $errorInfo = $stmt->errorInfo();
                $error = "Une erreur s'est produite lors de l'enregistrement : " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            $error = "Erreur de base de données : " . $
         }
            } 
            else {
                $errorInfo = $stmt->errorInfo();
                $error = "Une erreur s'est produite lors de l'enregistrement : " . $errorInfo[2];
            }
        } 
        catch (Exception $e) {
            $error = "Erreur : " . $e->getMessage();
        }
    
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <h1>Contactez-nous</h1>

    
    <?php if (!empty($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php elseif (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

   
    <form method="post" action="">
        <label for="mail">Email :</label>
        <input type="email" name="mail" id="mail" required>
        <br>
        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire" required></textarea>
        
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
