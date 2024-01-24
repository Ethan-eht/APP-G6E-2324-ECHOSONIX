<?php
session_start();

include 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email !=""&& $password != "") {
        // Utilisez des requêtes préparées pour éviter les injections SQL
        $requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE mail = :email AND mdp = :password");
        $requete->execute(['email' => $email, 'password' => $password]);

        $reponse = $requete->fetch();

        if($reponse["idutilisateurs"] != false) {
            $_SESSION['user_id'] = $reponse["idutilisateurs"]; // Set session variable
            echo " VOus ètes connecté !";
            header("Location:accueil.php");
            exit();
        }
        else {
            echo "Email ou mdp incorrect !";
        }
    }
}
?>
