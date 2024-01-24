<?php

include 'dbconnect.php';

if(isset($_POST['ok'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $email = htmlspecialchars($_POST['email']);

    $requete = $bdd->prepare("INSERT INTO utilisateurs (idutilisateurs, mail, mdp, pseudo, nom, prenom) VALUES (:idutilisateurs, :mail, :mdp, :pseudo, :nom, :prenom)");
    $requete->execute(array(
        "idutilisateurs" => null,
        "mail" => $email,
        "mdp" => $mdp,
        "pseudo" => $pseudo,
        "nom" => $nom,
        "prenom" => $prenom
    ));

    echo "Inscription réussie!";
    header("Location: connexion.php");
}
