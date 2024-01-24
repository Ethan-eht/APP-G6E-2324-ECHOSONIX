<?php

include "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICATIONS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1> MODIFICATIONS</h1>
    <form method="POST" action="traitement.php">
        <label for="nom">Votre nom </label>
        <input type="text" id="nom" name="nom" placeholder="<?php echo $_SESSION['nom'] ?>" >
        <br>
        <label for="prenom">Votre prenom </label>
        <input type="text" id="prenom" name="prenom" placeholder="<?php echo $_SESSION['prenom'] ?>" >
        <br>
        <label for="pseudo">Votre pseudo </label>
        <input type="text" id="pseudo" name="pseudo" placeholder="<?php echo $_SESSION['pseudo'] ?>">
        <br>
        <label for="email">Votre email</label>
        <input type="text" id="email" name="email" placeholder="<?php echo $_SESSION['mail'] ?>">
        <br>
        <label for="mdp">Votre mdp </label>
        <input type="password" id="mdp" name="mdp" placeholder="<?php echo $_SESSION['mdp'] ?>">
        <br>
        <input type="submit" value="Enregister" name="ok">

        
    </form>

</body>
</html>
