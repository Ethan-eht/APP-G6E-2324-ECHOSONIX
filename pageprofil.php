<?php
include 'header.php';

include 'dbconnect.php';


try {
    $stmt = $bdd->prepare("SELECT nom, prenom, pseudo,mail,mdp,idutilisateurs FROM utilisateurs");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($result)) {
        $_SESSION['nom'] = $result['nom'];
        $_SESSION['mail'] = $result['mail'];
        $_SESSION['mdp'] = $result['mdp'];
        $_SESSION['prenom'] = $result['prenom'];
        $_SESSION['pseudo'] = $result['pseudo'];
        $_SESSION['idutilisateurs'] = $result['idutilisateurs'];

    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <br>
    <h1> Mon Profil</h1>
    <form method="get" action="traitement.php">
        <label for="">Nom</label>
        <div required disabled=true><?php echo $_SESSION['nom'] ?></div>
        <br>
        <label for="pseudo">Pseudo</label>
        <div required disabled=true><?php echo $_SESSION['pseudo'] ?></div>
        <br>
        <label for="prenom">Prénom</label>
        <div required disabled=true><?php echo $_SESSION['prenom'] ?></div>
        <br>
        <label for="email">Email</label>
        <div required disabled=true><?php echo $_SESSION['mail'] ?></div>
        <br>
        <a href="modifications.php">Modifier</a>
    </form>

</body>

</html>


</body>

</html>
