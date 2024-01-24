<?php
session_start();

include 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email !=""&& $password != "") {
        // Utilisation des requêtes préparées pour éviter les injections SQL
        $requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE mail = :email");
        $requete->execute(['email' => $email]);

        $reponse = $requete->fetch();

        if($reponse && password_verify($password, $reponse['mdp'])) {
            $_SESSION['user_id'] = $reponse["idutilisateurs"]; // Variable de session
            echo " VOus ètes connecté !";
            header("Location:accueil.php");
            exit();
        }
        else {
            $email = htmlspecialchars($email);
            echo "Email ou mdp incorrect !";
        }
    }
}