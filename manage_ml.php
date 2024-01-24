<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Modifier les informations</title>
    <link rel="stylesheet" href="styleadmin.css">
    <?php 
        session_start();
        $bdd = new PDO( 'mysql:host=localhost;dbname=mydb;', 'root', '');
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
<div>
    <h2>Modifier les informations</h2>
    
    <?php
        // Retrieve the current values from the database
        $query = $bdd->query("SELECT * FROM infos");
        $infos = $query->fetch(PDO::FETCH_ASSOC);
    ?>
    
    <form action="update_infos.php" method="POST">
        <label for="nomsite">Nom du site:</label>
        <input type="text" name="nomsite" value="<?php echo $infos['nomsite']; ?>"><br>
        
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" value="<?php echo $infos['adresse']; ?>"><br>
        
        <label for="tel">Téléphone:</label>
        <input type="text" name="tel" value="<?php echo $infos['tel']; ?>"><br>
        
        <label for="hebergeurname">Nom de l'hébergeur:</label>
        <input type="text" name="hebergeurname" value="<?php echo $infos['hebergeurname']; ?>"><br>
        
        <label for="hebergeuradresse">Adresse de l'hébergeur:</label>
        <input type="text" name="hebergeuradresse" value="<?php echo $infos['hebergeuradresse']; ?>"><br>

        <label for="mail">Mail:</label>
        <input type="text" name="mail" value="<?php echo $infos['mail']; ?>"><br>
                
        <label for="conditions">Conditions:</label>
        <input type="text" name="conditions" value="<?php echo $infos['condititions']; ?>"><br>

        <input type="submit" value="Modifier">
    </form>
</div>
</body>
</html>