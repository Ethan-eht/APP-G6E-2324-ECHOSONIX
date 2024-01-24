<?php
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexion_admin.php');
}

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
<html>
<head>
    <link rel="stylesheet" href="styleadmin.css">

<style>
        body {
            margin-top: 0px;
            margin-left: 220px;
        }
    </style>
    
</head>
<body>
    <div class="sidebar">
    <a href="dashboard.php" class="sidebar-button dashboard-button-link">Dashboard</a>
    <a href="manage_users.php" class="sidebar-button manage-users">Manage Users</a>
    <a href="manage_events.php" class="sidebar-button manage-events">Manage Events</a>
    <a href="manage_chat.php" class="sidebar-button manage-chat">Manage Chat</a>
    <a href="manage_bet.php" class="sidebar-button manage-bet">Manage Bet</a>
    <a href="manage_faq.php" class="sidebar-button manage-faq">Manage FAQ</a>
    <a href="manage_ml.php" class="sidebar-button manage-infos">Manage Website</a>
    <a href="deco_admin.php" class="sidebar-button logout-button">Logout</a>
    </div>

    <div>
    <h1>Manage Chat</h1>
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
    </div>
</body>
