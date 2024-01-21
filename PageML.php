<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PageML.css">
    <title>Mentions Légales</title>
    <header>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    $conn = new mysqli($servername, $username, $password, $dbname);

$query = "SELECT nomsite, adresse, tel, hebergeurname, hebergeuradresse, condititions, mail FROM infos";
$result = mysqli_query($conn, $query);

if ($result) {
    $info = mysqli_fetch_assoc($result);
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
    <nav>
        <ul>
            <li class="logo"><a href="Accueil.html"><img src="logo.jpg" href="Accueil.html" width="30%" height="30%"></a></li>
            <li><a href="match.html">Evènements</a></li>
            <li><a href="pageinfo.html">Informations</a></li>
            <li><a href="FAQ.html">FAQ</a></li>
            <li><a href="PageML.html">CGU</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="inscription.php" class="inscription">Inscription</a></li>
            <li><a href="connexion.php" class="connexion">Connexion</a></li>
        </ul>
    </nav>
    </header>
</head>
<body>
    <section>
        <h2>Informations générales</h2>
        <p>Raison sociale : <?php echo $info['nomsite']; ?></p>
        <p>Adresse : <?php echo $info['adresse']; ?></p>
        <p>Téléphone : <?php echo $info['tel']; ?></p>
    </section>

    <section>
        <h2>Hébergement du site</h2>
        <p>Nom de l'hébergeur : <?php echo $info['hebergeurname'];?></p>
        <p>Adresse de l'hébergeur : <?php echo $info['hebergeuradresse'];?> </p>
    </section>

    <section>
        <h2>Conditions d'utilisation</h2>
        <p><?php echo $info['condititions']; ?></p>
    </section>

    <footer>
        <p>&copy; 2023 Sonixap. Tous droits réservés.</p>
    </footer>

</body>
</html>
