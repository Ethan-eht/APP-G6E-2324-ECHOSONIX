<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PageML.css">
    <title>Mentions Légales</title>
        <?php 
        include 'header.php';
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
</head>

<body>
    <section>
        <h2>Informations générales</h2>
        <p>Raison sociale :
            <?php echo $info['nomsite']; ?>
        </p>
        <p>Adresse :
            <?php echo $info['adresse']; ?>
        </p>
        <p>Téléphone :
            <?php echo $info['tel']; ?>
        </p>
    </section>

    <section>
        <h2>Hébergement du site</h2>
        <p>Nom de l'hébergeur :
            <?php echo $info['hebergeurname']; ?>
        </p>
        <p>Adresse de l'hébergeur :
            <?php echo $info['hebergeuradresse']; ?>
        </p>
    </section>

    <section>
        <h2>Conditions d'utilisation</h2>
        <p>
            <?php echo $info['condititions']; ?>
        </p>
    </section>

    <footer>
        <p>&copy; 2023 Sonixap. Tous droits réservés.</p>
    </footer>

</body>

</html>