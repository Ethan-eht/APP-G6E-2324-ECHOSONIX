<?php

include 'dbconnect.php';

if(isset($_POST['ok'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $email = $_POST['email'];

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
