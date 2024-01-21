<?php
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexion_admin.php');
}
$bdd = new PDO( 'mysql:host=localhost;dbname=mydb;', 'root', '');
if(isset($_GET['idutilisateurs']) AND !empty($_GET['idutilisateurs'])){
    $getid = $_GET['idutilisateurs'];
    $_recupUsers = $bdd->prepare('SELECT * FROM utilisateurs WHERE idutilisateurs = ?');
    $_recupUsers->execute(array($getid));
    if($_recupUsers->rowCount() > 0){
        $deleteUser = $bdd->prepare('DELETE FROM utilisateurs WHERE idutilisateurs = ?');
        $deleteUser->execute(array($getid));
        header('Location: manage_users.php');
    }else{
        echo "Cet utilisateur n'existe pas";
    }
}else{
    echo "Aucun utilisateur n'a été sélectionné";
}
