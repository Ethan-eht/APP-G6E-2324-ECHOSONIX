<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICATIONS</title>
    <link rel="stylesheet" href="style.css">
    <header>
        <nav>
            <ul>
                <li class="logo"><a href="accueil"><img src="header.jpg" alt="" width="250" height="50" ></a></li>
                <li><a href="#">Evènements</a></li>
                <li><a href="#">Informations</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">CGU</a></li>
                <li><a href="#" class="inscription">Inscription</a></li>
                <li><a href="#" class="connexion">Connexion</a></li>
            </ul>
        </nav>
        </header>
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
        <input type="text" id="email" name="email" placeholder="<?php echo $_SESSION['email'] ?>">
        <br>
        <label for="mdp">Votre mdp </label>
        <input type="password" id="mdp" name="mdp" placeholder="<?php echo $_SESSION['mdp'] ?>">
        <br>
        <input type="submit" value="Enregister" name="ok">

        
    </form>

</body>
</html>