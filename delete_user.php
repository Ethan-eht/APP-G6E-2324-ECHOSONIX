<?php
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexion_admin.php');
}
$bdd = new PDO( 'mysql:host=localhost;dbname=espace-admin;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $_recupUsers = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $_recupUsers->execute(array($getid));
    if($_recupUsers->rowCount() > 0){
        $deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
        $deleteUser->execute(array($getid));
        header('Location: manage_users.php');
    }else{
        echo "Cet utilisateur n'existe pas";
    }
}else{
    echo "Aucun utilisateur n'a été sélectionné";
}
?>