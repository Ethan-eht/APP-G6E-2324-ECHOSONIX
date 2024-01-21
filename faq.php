<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FAQ Page</title>
    <link rel="stylesheet" href="karl.css">

    <?php include 'header.php'; ?>


</head>
<body>

<div class="container">
    <h2>Foire aux questions</h2><br>
    <?php
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "mydb");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch questions and answers from the database
    $sql = "SELECT question, answer FROM faq";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output each question and answer
        while ($row = $result->fetch_assoc()) {
            echo '<div class="question">' . $row["question"] . '</div>';
            echo '<div class="answer">' . $row["answer"] . '</div>';
        }
    } else {
        echo "No FAQ found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

<script>
    var acc = document.getElementsByClassName("question");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>

</body>
</html>
