<?php

session_start();

include 'dbconnect.php';

 

    if(isset($_POST['ok'])){

        $nom = $_POST['nom'];

        $prenom = $_POST['prenom'];

        $pseudo = $_POST['pseudo'];

        $mdp = $_POST['mdp'];

        $email= $_POST['email'];

        $id= $_SESSION['id'];



            $requete = $bdd->prepare("UPDATE user SET pseudo = :pseudo, nom = :nom, prenom = :prenom, mdp = :mdp, email = :email WHERE id = :id");

            $requete->execute (
    
                array(
    
                    "pseudo"=> $pseudo,
    
                    "nom"=> $nom,
    
                    "prenom"=> $prenom,
    
                    "mdp"=> $mdp,
    
                    "email"=> $email,

                    "id"=> $id,
     
    
                )
    
            );



       header("Location: pageprofil.php");

    }

 

?>