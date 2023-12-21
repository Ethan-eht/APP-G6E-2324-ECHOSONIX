<?php
session_start();
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        $pseudo_par_defaut = "admin";
        $mdp_par_defaut = "admin123";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if($pseudo_saisi == $pseudo_par_defaut && $mdp_saisi == $mdp_par_defaut){
            $_SESSION['pseudo'] = $pseudo_saisi;
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location: dashboard.html');
        }else{
            echo "Votre mot de passe ou pseudo est incorrect";
        }
    }else{
        echo "Veuillez remplir tous les champs";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Espace de connexion admin</title>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Espace de connexion admin</h1>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo" placeholder="Nom d'utilisateur" autocomplete="off">
        <br><br>
        <input type="password" name="mdp" placeholder="Mot de passe">
        <br><br>
        <input type="submit" name="valider" value="Se connecter">
    </form>
    <?php
    if(isset($_POST['valider']) && (empty($_POST['pseudo']) || empty($_POST['mdp']))){
        echo '<p class="error-message">Veuillez remplir tous les champs</p>';
    }
    ?>
</body>
</html>
