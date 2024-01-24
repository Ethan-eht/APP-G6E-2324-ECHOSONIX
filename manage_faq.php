<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=mydb;', 'root', '');
    if (!$_SESSION['mdp']) {
        header('Location: connexion_admin.php');
    }
    ?>

    <title>Manage FAQ</title>


    <link rel="stylesheet" href="styleadmin.css">
    <style>
        body {
            margin-top: 0px;
            margin-left: 220px;
        }
    </style>

</head>

<body>
    <div class="sidebar">
        <a href="dashboard.php" class="sidebar-button dashboard-button-link">Dashboard</a>
        <a href="manage_users.php" class="sidebar-button manage-users">Manage Users</a>
        <a href="manage_events.php" class="sidebar-button manage-events">Manage Events</a>
        <a href="manage_chat.php" class="sidebar-button manage-chat">Manage Chat</a>
        <a href="manage_bet.php" class="sidebar-button manage-bet">Manage Bet</a>
        <a href="manage_faq.php" class="sidebar-button manage-faq">Manage FAQ</a>
        <a href="manage_ml.php" class="sidebar-button manage-infos">Manage Website</a>
        <a href="deco_admin.php" class="sidebar-button logout-button">Logout</a>
    </div>

    <div>
        <h1>Manage FAQ</h1>
        <?php
        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "mydb");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch questions and answers from the database
        $sql = "SELECT id_faq, question, answer FROM faq";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output each question and answer
            while ($row = $result->fetch_assoc()) {
                echo '<div class="question">' . $row["question"] . '    <a href="delete.php?id_faq=' . $row["id_faq"] . '" class = "delete"">Supprimer</a></div>';
                echo '<div class="answer">' . $row["answer"] . '</div>';
            }
        } else {
            echo "No FAQ found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
    
    <div class="container" style="margin-top: 20px;">
        <h2>Ajouter une question</h2><br>
        <form action="add_faq.php" method="post">
            <label for="question">Question:</label><br>
            <input type="text" id="question" name="question"><br><br>
            <label for="answer">Réponse:</label><br>
            <textarea id="answer" name="answer"></textarea><br><br>
            <input type="submit" value="Ajouter">
        </form>
    </div>

    <script>
        var acc = document.getElementsByClassName("question");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
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