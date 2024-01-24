<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription</title>

    <link rel="stylesheet" href="stylelucas.css">

    

    <?php

    include 'header.php';

    ?>

</head>
<style>
    .error {
    color: red;
    display: block;
    margin-top: 8px;
    display: none;
}

</style>

<body>


    <form method="POST" action="traitementlucas.php"  id="form">
        <h4>INSCRIPTION</h4>
        <hr>
        <div class="nomprenom">
            
                <label for="nom">Votre Nom </label>
                <input type="text" id="nom" name="nom" placeholder="Entrez votre nom..." >
                <span class="error" id="nomError"></span>
            
                <label class="nom" for="prenom">Votre Prenom </label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom..."  >
                <span class="error" id="prenomError"></span>
            
        </div>
        <br>
        <label for="pseudo">Votre Pseudo </label>
        <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo..." class="txt" >
        <span class="error" id="pseudoError"></span>
        <br>
        <label for="email">Votre Email</label>
        <input type="email" id="email" name="email" placeholder="Entrez votre email..." class="txt" requierd>
        <span class="error" id="emailError"></span>
        <br>
        <label for="mdp">Votre Mot de passe</label>
        <input type="password" id="mdp" name="mdp" placeholder="Entrez votre mdp..." class="txt" requierd>
        <span class="error" id="mdpError"></span>
        <br>
        <button type="submit" value="M'inscrire" name="ok" class="btn" > M'inscrire </button>
        <br>
        <p>Vous avez déjà un compte ? <a href="login.php">Se connecte </a></p>
    </form>
     
     

</body>
<script src="index.js"></script>
</html>

