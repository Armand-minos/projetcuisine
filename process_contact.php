<?php
$host = 'localhost';
$dbname = 'recette';
$username = 'root';
$password = '';


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $conn->real_escape_string($_POST['mail']);
    $message = $conn->real_escape_string($_POST['commentaire']);

   
    $sql = "INSERT INTO contact (mail, commentaire) VALUES ('$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message soumis avec succés!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
