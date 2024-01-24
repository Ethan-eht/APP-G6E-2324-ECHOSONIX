<?php 
session_start();
include 'header.php'; ?>
<!DOCTYPE html>
<html>
<title>Paris</title>
<link rel="stylesheet" href="PageParis.css">

<body>
    <form id="myform" action="traitementparis.php" method="post">
        <fieldset class="fieldset1" form="myform">
            <legend>Paris</legend>
            <?php
            include 'dbconnect.php';
            $id_element = 1;
            $requete_select = $bdd->prepare("SELECT argent FROM utilisateurs WHERE idutilisateurs = :id_element");
            $requete_select1 = $bdd->prepare("SELECT pseudo FROM utilisateurs WHERE idutilisateurs = :id_element");
            $requete_select->execute(array('id_element' => $id_element));
            $requete_select1->execute(array('id_element' => $id_element));
            $resultat = $requete_select->fetch(PDO::FETCH_ASSOC);
            $resultat1 = $requete_select1->fetch(PDO::FETCH_ASSOC);
            if ($resultat1) {
                // Affichez la valeur de l'attribut
                echo "<h1>Nom du compte :</h1>" . $resultat1['pseudo'];
            } else {
                echo "Erreur lors de la récupération de la valeur.";
            }
            if ($resultat) {
                // Affichez la valeur de l'attribut
                echo "<h2>Solde :</h2>" . $resultat['argent'];
            } else {
                echo "Erreur lors de la récupération de la valeur.";
            }
            ?>
            <br><br>
            <button> <a href="Echo_Sonix_Statistiques_FR_AR.php" style="text-decoration: none; color: white;"> Accéder aux statistiques</a></button>
            <br>

            <h4>Choisissez l'équipe sur lequel vous voulez parier :</h4>
            <select name="Paripays">
                <option value="">Choix de l'équipe</option>
                <?php
                include 'dbconnect.php';
                $id_element = $_SESSION['user_id'];
                $requete_select = $bdd->prepare("SELECT equipe_1 FROM evenement WHERE idEvenement = :id_element");
                $requete_select->execute(array('id_element' => $id_element));
                $resultat = $requete_select->fetch(PDO::FETCH_ASSOC);
                if ($resultat) {
                    // Affichez la valeur de l'attribut
                    echo "<option value=\"{$resultat['equipe_1']}\">{$resultat['equipe_1']}</option>";
                } else {
                    echo "Erreur lors de la récupération de la valeur.";
                }
                $requete_select1 = $bdd->prepare("SELECT equipe_2 FROM evenement WHERE idEvenement = :id_element");
                $requete_select1->execute(array('id_element' => $id_element));
                $resultat1 = $requete_select1->fetch(PDO::FETCH_ASSOC);
                if ($resultat1) {
                    // Affichez la valeur de l'attribut
                    echo "<option value=\"{$resultat1['equipe_2']}\">{$resultat1['equipe_2']}</option>";
                } else {
                    echo "Erreur lors de la récupération de la valeur.";
                }
                ?>
            </select>
            <br>

            <h4>Donner une mise de départ :</h4>
            <input type="number" id="mise" name="mise" min="10" placeholder="Mise de départ" size="50" />
            <br>

            <h4>Et donner un pourcentage :</h4>
            <input type="range" id="pourcentage" min="1" max="100" value="50" name="pourcentage" />
            <output for="pourcentage" name="pourcentage" id="outputPourcentage">50</output>
            <br>

            <h4>Ainsi qu'une durée :</h4>
            <input type="range" id="minutes" min="1" max="90" name="minutes" value="45" />
            <output for="minutes" id="outputMinutes">45</output>
            <br>

            <h4>Cliquez sur ce bouton :</h4>
            <button type="button" onclick="calculerGains()">Calculer le total</button>
            <br>

            <h4>Et voici la totalité de la somme que vous gagnerez en cas de victoire.</h4>
            <label for="gainsPotentiels">Total récupéré :</label>
            <input id="gainsPotentiels" name="gain" class="gain" />
            <br><br>

            <button>Valider la transaction</button>

            <script>
                function updateOutput(elementId, value) {
                    document.getElementById(elementId).value = value;
                }

                function calculerGains() {
                    var pourcentage = parseFloat(document.getElementById("pourcentage").value);
                    var miseDepart = parseFloat(document.getElementById("mise").value);
                    var minutes = parseFloat(document.getElementById("minutes").value);
                    var gainsPotentiels = ((pourcentage / 100) * minutes) * (miseDepart + miseDepart) * 0.02;
                    document.getElementById("gainsPotentiels").value = gainsPotentiels.toFixed(2);
                    document.getElementById("gainsPotentiels").textContent = gainsPotentiels.toFixed(2) + " euros";
                }

                document.getElementById("pourcentage").addEventListener("input", function () {
                    updateOutput("outputPourcentage", this.value);
                });

                document.getElementById("minutes").addEventListener("input", function () {
                    updateOutput("outputMinutes", this.value);
                });
            </script>
        </fieldset>
    </form>
</body>

</html>