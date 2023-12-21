<?php

$servername = "localhost";

$username = "root";

$password = "";

 

    try {

        $bdd = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    catch(PDOException $e){

        echo "Erreur : ". $e->getMessage();

    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST["email"];

        $password = $_POST["password"];

      

        if ($email !=""&& $password != "") {

            $requete = $bdd->query("SELECT * FROM user WHERE email = '$email' AND mdp = '$password'");

            $reponse = $requete->fetch();

          

            if($reponse["id"] != false) {

                 echo " VOus ètes connecté !";

                 header("Location:Accueil.html");

                 exit();

 

            }

                else {

                    $error_msg = "Email ou mdp incorrect !";

 

        }

    }

}

?>

<?php

if ($error_msg){

    ?>

    <p> <?php echo $error_msg; ?></p>

    <?php

}

?>
