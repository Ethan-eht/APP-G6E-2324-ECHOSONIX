<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (!$_SESSION['mdp']) {
        header('Location: connexion_admin.php');
    }
    include 'dbconnect.php';

    // Récup des données de la BDD
    $requete_select = $bdd->prepare("SELECT * FROM paris");
    $requete_select->execute();
    $resultats = $requete_select->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <link rel="stylesheet" href="styleadmin.css">

    <style>
        body {
            margin-top: 0px;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .delete {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;

        }

        .delete:hover {
            background-color: #cc0000;
            color: white;
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
        <h1>Liste des paris</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Mise de départ</th>
                <th>Temps de jeu</th>
                <th>Gain</th>
                <th>Équipe choisie</th>
                <th>Pourcentage</th>
                <th>Action</th>
            </tr>
            <?php foreach ($resultats as $resultat): ?>
                <tr>
                    <td>
                        <?php echo $resultat['idparis']; ?>
                    </td>
                    <td>
                        <?php echo $resultat['mise_de_depart']; ?>
                    </td>
                    <td>
                        <?php echo $resultat['temps_de_jeu']; ?>
                    </td>
                    <td>
                        <?php echo $resultat['gain']; ?>
                    </td>
                    <td>
                        <?php echo $resultat['equipe_choisie']; ?>
                    </td>
                    <td>
                        <?php echo $resultat['pourcentage']; ?>
                    </td>
                    <td>
                        <form action="delete_bet.php" method="get">
                            <input type="hidden" name="id" value="<?php echo $resultat['idparis']; ?>">
                            <input type="submit" value="Valider">
                        </form>
                        <form action="delete_bet.php" method="get">
                            <input type="hidden" name="idparis" value="<?php echo $resultat['idparis']; ?>">
                            <input type="submit" value="Supprimer" class="delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>