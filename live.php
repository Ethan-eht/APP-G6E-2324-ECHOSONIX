<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "mydb";

try {

    $bdd = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql0 = "SELECT valeur FROM capteur_tribune_exte ";
    $sql1 = "SELECT valeur FROM capteur_tribune_dom ";
    $sql2 = "SELECT valeur FROM capteurs_arbitre ";
    $stmt = $bdd->prepare($sql0);
    $stmt->execute();
    $tribute_exte = $stmt->fetchAll();
    $stmt = $bdd->prepare($sql1);
    $stmt->execute();
    $tribute_dom = $stmt->fetchAll();
    $stmt = $bdd->prepare($sql2);
    $stmt->execute();
    $tribute_arbitre = $stmt->fetchAll();


    /*var_dump ($tribute_exte) ;
    var_dump ($tribute_dom) ;
    var_dump ($tribute_arbitre) ;
    var_dump($tribute_exte[0]['valeur']);*/
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Video Player with Live Microphone Data</title>
    <link rel="stylesheet" href="live.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li class="logo"><a href="accueil"><img src="logo.jpeg" href="accueil.html" width="30%" height="30%"></a></li>
            <li><a href="#">Evènements</a></li>
            <li><a href="#">Informations</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">CGU</a></li>
            <li><a href="#" class="inscription">Inscription</a></li>
            <li><a href="#" class="connexion">Connexion</a></li>
        </ul>

    </nav>
</header>
<div class="video-list">
    <a href="lien_vers_1_match" class="video-item" onclick="changeVideo('match.mp4', 'France - Argentine')">France - Argentine</a>
    <a href="lien_vers_2_match" class="video-item" onclick="changeVideo('match2.mp4', 'France - Uruguay')">France - Uruguay</a>
    <a href="lien_vers_3_match" class="video-item" onclick="changeVideo('matche3.mp4', 'France - Croatie')">France - Croatie</a>
</div>



<div>
    <h3>Microphone Tribune Exterieur: <span> <?php echo $tribute_exte[0]['valeur'];?></span></h3>
    <h3>Microphone Tribune Domestique: <span> <?php echo $tribute_dom[0]['valeur']?></span></h3>
    <h3>Microphone Arbitre: <span> <?php echo $tribute_arbitre[0]['valeur']?></span></h3>
</div>



<div class="video-container">
    <a href="cyriaqueetsamerde.html">
        <button>Statistique</button>
    </a>
    <video id="videoPlayer" controls>
        <source src="match.mp4" type="video/mp4">
    </video>
    <h2 id="videoTitle">France - Argentine</h2>

    <audio id="audioPlayer" controls style="display: none;">
        <source src="audio1.mp3" type="audio/mpeg">
    </audio>
    <h3> Micro du live</h3>
    <input type="range" min="0" max="1" step="0.1" value="1" id="volumeSlider" onchange="changeVolume()">

    <audio id="audioPlayer" controls style="display: none;">
        <source src="audio2.mp3" type="audio/mpeg">
    </audio>
    <h4>Micro des supporters à domicile</h4>
    <input type="range" min="0" max="1" step="0.1" value="1" id="volumeSlider" onchange="changeVolume()">

    <audio id="audioPlayer" controls style="display: none;">
        <source src="audio3.mp3" type="audio/mpeg">
    </audio>
    <h5>Micro des supporters exterieurs</h5>
    <input type="range" min="0" max="1" step="0.1" value="1" id="volumeSlider" onchange="changeVolume()">

    <audio id="audioPlayer" controls style="display: none;">
        <source src="audio4.mp3" type="audio/mpeg">
    </audio>
    <h6>Micro de l'arbitre</h6>
    <input type="range" min="0" max="1" step="0.1" value="1" id="volumeSlider" onchange="changeVolume()">
</div>


<script>
    function changeVideo(videoSrc, videoTitle, audioSrc) {
        var videoPlayer = document.getElementById('videoPlayer');
        var audioPlayer = document.getElementById('audioPlayer');
        var videoTitleElement = document.getElementById('videoTitle');

        videoPlayer.src = videoSrc;
        videoTitleElement.innerText = videoTitle;
        videoPlayer.load();
        videoPlayer.play();

        audioPlayer.src = audioSrc;
        audioPlayer.load();
        audioPlayer.play();

    }
    function changeVolume() {
        var videoPlayer = document.getElementById('videoPlayer');
        var volumeSlider = document.getElementById('volumeSlider');

        videoPlayer.volume = volumeSlider.value;
    }
</script>


<script>
    function fetchMicrophoneData() {
        fetch('getMicrophoneData.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('capteur_tribune_exte').innerText = data.capteur_tribune_exte;
                document.getElementById('capteur_tribune_dom').innerText = data.capteur_tribune_dom;
                document.getElementById('capteurs_arbitre').innerText = data.capteurs_arbitre;
            })
            .catch(error => console.error('Error:', error));
    }

    setInterval(fetchMicrophoneData, 5000);
</script>
</body>
</html>

