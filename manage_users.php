<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stylecontact.css">
</head>
<body>
    <?php 
        session_start();
        $bdd = new PDO( 'mysql:host=localhost;dbname=espace-admin;', 'root', '');
        if(!$_SESSION['mdp']){
            header('Location: connexion_admin.php');
        }
    ?>

    <div class="header">
        <img src="logo.jpg" alt="Logo">
        <h1>Gérer les utilisateurs</h1>
        <a href="accueil.html" class="echo-sonix-button">Lien vers Echo-Sonix</a>
    </div>
    
    <div class="sidebar">
        <a href="dashboard.html" class="sidebar-button dashboard-button-link">Dashboard</a>
        <a href="manage_users.php" class="sidebar-button manage-users">Manage Users</a>
        <a href="manage_events.html" class="sidebar-button manage-events">Manage Events</a>
        <a href="manage_chat.html" class="sidebar-button manage-chat">Manage Chat</a>
        <a href="manage_bet.html" class="sidebar-button manage-bet">Manage Bet</a>
        <a href="deco_admin.php" class="sidebar-button logout-button">Logout</a>
    </div>

    <div>
        <?php
            $_recupUsers = $bdd->query('SELECT * FROM users');
            while($user = $_recupUsers->fetch()){
        ?>
            <p><?= $user['pseudo']; ?>
            <a href="delete_user.php?id=<?= $user['id']; ?>" style="color:red; text-decoration: none;">Supprimer l'utilisateur</a>   
            </p>
        <?php
            }
        ?>
    </div>
</body>
</html>
