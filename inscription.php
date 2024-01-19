<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription</title>

    <link rel="stylesheet" href="stylelucas.css">

   

</head>




<body>

 

   

    <form method="POST" action="traitementlucas.php">

        <h4>INSCRIPTION</h4>

        <hr>

        <div class="nomprenom">

           

                <label for="nom">Votre Nom </label>

                <input type="text" id="nom" name="nom" placeholder="Entrez votre nom..." required>

           

                <label class="nom" for="prenom">Votre Prenom </label>

                <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom..." required >

           

        </div>

        <br>

        <label for="pseudo">Votre Pseudo </label>

        <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo..." class="txt" required>

        <br>

        <label for="email">Votre Email</label>

        <input type="email" id="email" name="email" placeholder="Entrez votre email..." class="txt" required>

        <br>

        <label for="mdp">Votre Mot de passe</label>

        <input type="password" id="mdp" name="mdp" placeholder="Entrez votre mdp..." class="txt"required>

        <br>

        <button type="submit" value="M'inscrire" name="ok" class="btn" > M'inscrire </button>

        <br>

        <p>Vous avez déjà un compte ? <a href="login.php">Se connecte </a></p>

    </form>
 
    function validateForm() {
            var nom = document.getElementById('nom').value;
            var prenom = document.getElementById('prenom').value;
            var pseudo = document.getElementById('pseudo').value;
            var email = document.getElementById('email').value;
            var mdp = document.getElementById('mdp').value;

            if (nom == "" || prenom == "" || pseudo == "" || email == "" || mdp == "") {
                alert("Tous les champs doivent être remplis");
                return false;
            }

            if (!validateEmail(email)) {
                alert("Entrez une adresse email valide.");
                return false;
            }

            return true; 
        }
 

</body>

</html>
