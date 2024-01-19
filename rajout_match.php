<?php
include 'dbconnect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des données du formulaire
    $equipeA = $_POST['equipeA'];
    $heure = $_POST['heure'];
    $equipeB = $_POST['equipeB'];
    $idEvenement = random_int(0,1000000);
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification de la connexion
    if (!$conn) {
        die("La connexion à la base de données a échoué.");
    }

    $sql = "INSERT INTO evenement (idEvenement,equipe_1, equipe_2, heure_de_debut) VALUES (:idEvenement,:equipeA, :equipeB, :heure)";


    // Insertion dans la table Evenement
    try {
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':idEvenement', $idEvenement);
      $stmt->bindParam(':equipeA', $equipeA);
      $stmt->bindParam(':equipeB', $equipeB);
      $stmt->bindParam(':heure', $heure);

      if ($stmt->execute()) {
          $lastInsertId = $conn->lastInsertId();
          if ($lastInsertId) {
              echo "Le match a été ajouté avec succès à la base de données.";
          }else {
            echo "Aucune ligne n'a été insérée.";
          }
      } else {
        echo "Erreur lors de l'ajout du match.";
      }
    }catch (PDOException $e) {
      echo "Erreur d'exécution de la requête : " . $e->getMessage();
    }
      
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>MatchEnDirect</title>
  <link rel="stylesheet" href="match.css">
</head>
<body>

  <header>
    <nav>
      <ul>
        <li class="logo"><a href="Accueil.html"><img src="logo.jpg" href="accueil.html" width="30%" height="30%"></a></li>
        <li><a href="match.html">Évènements</a></li>
        <li><a href="pageinfo.html">Informations</a></li>
        <li><a href="FAQ.html">FAQ</a></li>
        <li><a href="PageML.html">CGU</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="inscription.php" class="inscription">Inscription</a></li>
        <li><a href="connexion.php" class="connexion">Connexion</a></li>
      </ul>
    </nav>
  </header>

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
        $querry = $conn->prepare($sql);
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

    <form id="nouveauMatchForm" method="post" action="rajout_match.php">
      <label for="equipeA">Équipe A :</label>
      <input type="text" id="equipeA" name="equipeA" required>

      <label for="heure">Heure :</label>
      <input type="text" id="heure" name="heure" required>

      <label for="equipeB">Équipe B :</label>
      <input type="text" id="equipeB" name="equipeB" required>

    
      <button type="submit">Ajouter le match</button>
    </form>
  </main>

</body>
</html>
