<?php
    // Start session
    session_start();

    // Database connection
    $bdd = new PDO('mysql:host=localhost;dbname=mydb;', 'root', '');

    // Check if session exists
    if(!isset($_SESSION['mdp'])){
        header('Location: connexion_admin.php');
        exit();
    }

    // Get POST data
    $nomsite = $_POST['nomsite'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];

    // Update query
    $sql = "UPDATE infos SET nomsite = :nomsite, adresse = :adresse, tel = :tel";

    // Prepare statement
    $stmt = $bdd->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':nomsite', $nomsite);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':tel', $tel);

    // Execute query and check for errors
    if ($stmt->execute()) {
        echo "<script>alert('Changement validé');</script>";
    } else {
        echo "Error updating record: " . $stmt->errorInfo()[2];
    }

    header("Location: manage_ml.php");
    exit();