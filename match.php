<?php
include 'dbconnect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (!$conn) {
        die("La connexion à la base de données a échoué.");
    }

    $sql = "INSERT INTO evenement (idEvenement,equipe_1, equipe_2, heure_de_debut) VALUES (:idEvenement,:equipeA, :equipeB, :heure)";

      
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>MatchEnDirect</title>
  <link rel="stylesheet" href="match.css">
  <?php include 'header.php'; ?>
</head>
<body>

  <main>
  <section class="live">
      <h2>Matchs en direct</h2>
      <div class="match">
        <div class="match1">
          <div class="team">France</div>
          <a href="live.html" class="score">1 - 1</a>
          <div class="team">Argentine</div>
        </div>
        <div class="match2">
          <div class="team">France</div>
          <a href="live.html" class="score">2 - 0</a>
          <div class="team">Croatie</div>
        </div>
        <div class="match3">
          <div class="team">France</div>
          <a href="live.html" class="score">1 - 0</a>
          <div class="team">Uruguay</div>
        </div>
      </div>      
    </section>


    <section class="recent-results">
      <h2>Match à venir</h2>
      <?php
        // Récupération des matchs à venir depuis la base de données
        $sql = "SELECT * FROM evenement ORDER BY heure_de_debut LIMIT 3";
        $querry = $bdd->prepare($sql);
        $querry->execute();
        $result = $querry->fetchAll();
        if (count($result) > 0) {
            
            foreach($result as &$event){
                echo "<div class='result'>";
                echo "<div class='team'>" . $event['equipe_1'] . "</div>";
                echo "<div class='heure'>" . $event['heure_de_debut'] . "</div>";
                echo "<div class='team'>" . $event['equipe_2'] . "</div>";
                echo "</div>";
            }
        } else {
            echo "Aucun match à venir.";
        }
      ?>
    </section>
    </main>

</body>
</html>

