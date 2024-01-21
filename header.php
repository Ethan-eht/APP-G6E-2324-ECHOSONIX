<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <link rel="stylesheet" href="styleheader.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li class="logo"><a href="accueil.php"><img src="logo.jpg"></a></li>
                <li><a href="match.html">Evènements</a></li>
                <li><a href="pageinfo.php">Informations</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="PageML.php">CGU</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                session_start();
                $bdd = new PDO('mysql:host=localhost;dbname=mydb;', 'root', '');
                if (!$_SESSION['mdp']) {
                    echo '<li><a href="inscription.php" class="inscription">Inscription</a></li>';
                    echo '<li><a href="connexion.php" class="connexion">Connexion</a></li>';
                } else {
                    echo '<li><a href="pageprofil.php" class="profil">Profil</a></li>';
                    echo '<li><a href="deconnexion.php" class="deconnexion">Déconnexion</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
</body>