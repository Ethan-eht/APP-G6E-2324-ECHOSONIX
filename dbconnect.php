<?php $servername="localhost";
$username="root";
$password='';
$dbname="mydb";


try {

    $bdd = new PDO("mysql:host=$servername; dbname=mydb", $username, $password);

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch(PDOException $e){

    echo "Erreur : ". $e->getMessage();

}
