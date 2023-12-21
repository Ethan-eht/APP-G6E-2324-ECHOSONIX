<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Connexion</title>

        <link rel="stylesheet" href="stylelucas.css"

        <?php

            include 'header.html';

        ?>
    </head>

 


    <body>

 
<div>
    <form method="post" action="connexion.php">

    <h4>CONNEXION</h4>

        <hr>

        <label for="email"> Email</label>

        <input type="email" placeholder="Entrer votre email..." name="email" id="email" required/>

        <label for="password">Mot de passe</label>

        <input type="password" placeholder="Entrer votre email..." name="password" id="password" required/>

        <button type="submit" value="se connecter" name="ok" class="btn" > Se connecter </button>

        <br>

        <p>Vous n'avez pas de compte ? <a href="inscription.php">S'inscrire</a></p>

    </form>

</div>

</body>

</html>
