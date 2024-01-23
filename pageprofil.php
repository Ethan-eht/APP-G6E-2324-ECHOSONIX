<?php 
include 'dbconnect.php';

session_start();

try {
    $stmt = $bdd->prepare("SELECT nom, prenom, pseudo,email,mdp,id FROM user");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(isset($result)){
        $_SESSION['nom'] = $result['nom'];
        $_SESSION['email']= $result['email'];
        $_SESSION['mdp']= $result['mdp'];
        $_SESSION['prenom']=$result['prenom'];
        $_SESSION['pseudo']=$result['pseudo']; 
        $_SESSION['id']=$result['id']; 

    }
  } catch(PDOException $e) {
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
<br>
<h1> Mon Profil</h1>
<form method="get" action="traitement.php">
    <label for="">Nom</label>
    <div required disabled=true><?php echo $_SESSION['nom']?></div>
    <br>
    <label for="pseudo">Pseudo</label>
    <div required disabled=true><?php echo $_SESSION['pseudo']?></div>
    <br>
    <label for="prenom">Prénom</label>
    <div required disabled=true><?php echo $_SESSION['prenom']?></div>
    <br>
    <label for="email">Email</label>
    <div required disabled=true><?php echo $_SESSION['email']?></div>
    <br>
    <label for="mdp">Mot de passe </label>
    <div required disabled=true><?php echo $_SESSION['mdp']?></div>
    <br>
    <a href="modifications.php">Modifier</a>
</form>
    
</body>
</html>

    
</body>
</html>