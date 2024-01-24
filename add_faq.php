<?php
    // Database connection
    $conn = new mysqli("localhost", "root", "", "mydb");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the question and answer from POST data
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO faq (question, answer) VALUES (?, ?)");
    $stmt->bind_param("ss", $question, $answer);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New FAQ added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $conn->close();

    // Redirect to manage_faq.php
    header("Location: manage_faq.php");
    exit;
