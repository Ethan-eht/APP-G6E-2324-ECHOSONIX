<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styleadmin.css">
    <?php 
        session_start();
        $bdd = new PDO( 'mysql:host=localhost;dbname=espace-admin;', 'root', '');
        if(!$_SESSION['mdp']){
            header('Location: connexion_admin.php');
        }
    ?>

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

    <h1>Manage Chat</h1>

</body>
