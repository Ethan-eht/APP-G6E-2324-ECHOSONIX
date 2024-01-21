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
    <?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=mydb;', 'root', '');
    if (!$_SESSION['mdp']) {
        header('Location: connexion_admin.php');
    }
    ?>

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
        <h1>Gérer les utilisateurs</h1><br>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Rechercher par pseudo">
            <input type="submit" value="Rechercher">
            <input type="button" value="Réinitialiser" onclick="window.location.href='manage_users.php'" class="reset-button">
        </form>
        <h2>Liste des utilisateurs :</h2>
        <div class="user-list">
            <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $_recupUsers = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo LIKE :search');
                $_recupUsers->execute(array('search' => '%' . $search . '%'));
            } else {
                $_recupUsers = $bdd->query('SELECT * FROM utilisateurs');
            }

            while ($user = $_recupUsers->fetch()) {
                ?>
                <div class="user-box">
                    <p>
                        <?= $user['pseudo']; ?>
                        <a class='delete' href="delete_user.php?idutilisateurs=<?= $user['idutilisateurs'] ?>" >Supprimer</a>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>