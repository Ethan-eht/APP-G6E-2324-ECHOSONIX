<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styleadmin.css">
    <?php 
        session_start();
        $bdd = new PDO( 'mysql:host=localhost;dbname=mydb;', 'root', '');
        if(!$_SESSION['mdp']){
            header('Location: connexion_admin.php');
        }
    ?>
</head>
<body>
    <div class="header">
        <img src="logoadmin.jpg" alt="Logo">
        <h1>Dashboard</h1>
        <a href="Accueil.php" class="echo-sonix-button">Lien vers Echo-Sonix</a>
    </div>
    <div class="dashboard-button manage-users" onclick="window.location.href='manage_users.php'">Manage Users</div>
    <div class="dashboard-button manage-events" onclick="window.location.href='manage_events.php'">Manage Events</div>
    <div class="dashboard-button manage-chat" onclick="window.location.href='manage_chat.php'">Manage Chat</div>
    <div class="dashboard-button manage-faq" onclick="window.location.href='manage_faq.php'">Manage FAQ</div>
    <div class="dashboard-button manage-bet" onclick="window.location.href='manage_bet.php'">Manage Bets</div>
    <div class="dashboard-button manage-infos" onclick="window.location.href='manage_ml.php'">Manage Website</div>
    <div class="logout-button-dashboard">
        <button onclick="window.location.href='deco_admin.php'">D&eacute;connexion</button>
    </div>
</body>
</html>

