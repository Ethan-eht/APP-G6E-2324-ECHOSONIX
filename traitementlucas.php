<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur : ". $e->getMessage();
}

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
