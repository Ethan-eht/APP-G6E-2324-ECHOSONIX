<?php 

include 'dbconnect.php';

$equipeChoisie = htmlspecialchars($_POST['Paripays']);
$misededepart = htmlspecialchars($_POST['mise']);
$tempsdejeu = htmlspecialchars($_POST['minutes']);
$gain = htmlspecialchars($_POST['gain']);
$pourcentage = htmlspecialchars($_POST['pourcentage']);
$idparis = random_int(1,1000000 );

$requete = $bdd->prepare("INSERT INTO paris VALUES (NULL, :mise_de_depart, :temps_de_jeu, :gain, :equipe_choisie, :pourcentage)");


$requete->execute (
    array(
        "mise_de_depart"=> $misededepart,
        "temps_de_jeu"=> $tempsdejeu,
        "gain"=> $gain,
        "equipe_choisie"=> $equipeChoisie,
        "pourcentage"=> $pourcentage,
    )
);

header("Location: http://localhost/appsite/Paris.php");
exit;

?>
