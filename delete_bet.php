<?php
include 'dbconnect.php';

if(isset($_GET['idparis'])) {
    $id = $_GET['idparis'];

    // Prepare a delete statement
    $sql = "DELETE FROM bets WHERE idparis = :idparis";

    // Prepare your SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':idparis', $id, PDO::PARAM_INT);

    // Execute the statement
    if($stmt->execute()) {
        
        // Redirect to manage_bet.php after deleting the bet
        header("Location: manage_bet.php");
    } else {
        echo "Error deleting record";
    }
} else {
    echo "No id provided to delete";
}
?>