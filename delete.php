<?php
    // Database connection
    $conn = new mysqli("localhost", "root", "", "mydb");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the id from POST data
    $id = $_GET['id_faq'];

    // Prepare an SQL statement
    $stmt = $conn->prepare("DELETE FROM faq WHERE id_faq = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "FAQ deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $conn->close();

    header("Location: manage_faq.php");
    exit;
?>