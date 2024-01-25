<?php

session_start();

include 'dbconnect.php';

 

    if(isset($_POST['ok'])){

        $nom = $_POST['nom'];

        $prenom = $_POST['prenom'];

        $pseudo = $_POST['pseudo'];

        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        
        $mail= $_POST['mail'];

        $id= $_SESSION['idutilisateurs'];



            $requete = $bdd->prepare("UPDATE utilisateurs SET pseudo = :pseudo, nom = :nom, prenom = :prenom, mdp = :mdp, mail = :mail WHERE idutilisateurs = :id");

            $requete->execute (
    
                array(
    
                    "pseudo"=> $pseudo,
    
                    "nom"=> $nom,
    
                    "prenom"=> $prenom,
    
                    "mdp"=> $mdp,
    
                    "mail"=> $mail,

                    "id"=> $id,
     
    
                )
    
            );



       header("Location: pageprofil.php");

    }

 

?>