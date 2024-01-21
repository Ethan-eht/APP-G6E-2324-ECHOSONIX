<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styleadmin.css">
    <?php 
        session_start();
        $bdd = new PDO( 'mysql:host=localhost;dbname=espace-admin;', 'root', '');
        if(!$_SESSION['mdp']){
            header('Location: connexion_admin.php');
        }
    ?>
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
      <div class="result">
        <div class="team">Équipe A</div>
        <div class="heure">21h</div>
        <div class="team">Équipe B</div>
      </div>
    </section>
    
    <form id="nouveauMatchForm">
      <label for="equipeA">Équipe A :</label>
      <input type="text" id="equipeA" name="equipeA">

      <label for="heure">Heure :</label>
      <input type="text" id="heure" name="heure">

      <label for="equipeB">Équipe B :</label>
      <input type="text" id="equipeB" name="equipeB">

      <button type="submit">Ajouter le match</button>
    </form>
  </main>

  <script>
    function afficherMatchsExistants() {
      const matchesExistants = JSON.parse(localStorage.getItem('matches')) || [];
      const sectionMatchAVenir = document.querySelector('.recent-results');

      sectionMatchAVenir.innerHTML = '';

      matchesExistants.forEach((match, index) => {
        const nouveauMatchDiv = document.createElement('div');
        nouveauMatchDiv.classList.add('result');

        const equipeADiv = document.createElement('div');
        equipeADiv.classList.add('team');
        equipeADiv.textContent = match.equipeA;

        const heureDiv = document.createElement('div');
        heureDiv.classList.add('heure');
        heureDiv.textContent = match.heure;

        const equipeBDiv = document.createElement('div');
        equipeBDiv.classList.add('team');
        equipeBDiv.textContent = match.equipeB;

        const supprimerBouton = document.createElement('button');
        supprimerBouton.textContent = 'Supprimer';
        supprimerBouton.addEventListener('click', function() {
          matchesExistants.splice(index, 1);
          localStorage.setItem('matches', JSON.stringify(matchesExistants));
          afficherMatchsExistants();
        });

        nouveauMatchDiv.appendChild(equipeADiv);
        nouveauMatchDiv.appendChild(heureDiv);
        nouveauMatchDiv.appendChild(equipeBDiv);
        nouveauMatchDiv.appendChild(supprimerBouton);

        sectionMatchAVenir.appendChild(nouveauMatchDiv);
      });
    }

    window.onload = function() {
      afficherMatchsExistants();
    };

    const nouveauMatchForm = document.getElementById('nouveauMatchForm');

    nouveauMatchForm.addEventListener('submit', function(event) {
      event.preventDefault(); 
      
      const equipeA = document.getElementById('equipeA').value;
      const heure = document.getElementById('heure').value;
      const equipeB = document.getElementById('equipeB').value;

      const nouveauMatch = {
        equipeA: equipeA,
        heure: heure,
        equipeB: equipeB
      };

      const matchesExistants = JSON.parse(localStorage.getItem('matches')) || [];

      matchesExistants.push(nouveauMatch);
      localStorage.setItem('matches', JSON.stringify(matchesExistants));

      afficherMatchsExistants();
    });
  </script>
</body>

