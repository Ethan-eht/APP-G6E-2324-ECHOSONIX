<?php
$bdd=new mysqli("localhost","root","","mydb");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_message'])) {
    // Si un formulaire de suppression de message a été soumis
    $messageIdToDelete = $_POST['delete_message'];

    // Utilisez une requête DELETE pour supprimer le message de la base de données
    $deleteQuery = "DELETE FROM chat WHERE idchat = ?";
    $deleteStmt = $bdd->prepare($deleteQuery);
    $deleteStmt->bind_param("i", $messageIdToDelete);

    if ($deleteStmt->execute()) {
        echo "Message supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du message : " . $deleteStmt->error;
    }

    $deleteStmt->close();
}

// Récupérez tous les messages de la base de données
$selectQuery = "SELECT idchat, username, contenu FROM chat";
$selectResult = $bdd->query($selectQuery);

if ($selectResult) {
    $messages = $selectResult->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Erreur de requête : " . $bdd->error;
}

$bdd->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration des Messages</title>
    <link rel="stylesheet" href="admin_message.css">
</head>
<body>
    <h2>Administration des Messages</h2>

    <?php
    // Affichez la liste des messages avec des options pour supprimer
    if (!empty($messages)) {
        echo "<ul>";
        foreach ($messages as $message) {
            echo "<li>";
            echo "{$message['username']}: {$message['contenu']}";
            echo "<form method='post' action=''>
                    <input type='hidden' name='delete_message' value='{$message['idchat']}'>
                    <input type='submit' value='Supprimer'>
                    
                    
                   
                    <br><br>
                  </form>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "Aucun message trouvé.";
    }
    ?>
</body>
</html>
