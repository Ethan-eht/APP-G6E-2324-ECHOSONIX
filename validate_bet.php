<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parisId = $_POST['id'];

    // Assurez-vous de valider et filtrer les entrées utilisateur pour des raisons de sécurité.
    // Par exemple, utilisez filter_input() ou d'autres méthodes appropriées.

    // Récupérez la valeur de l'attribut "gain" dans la table "paris".
    $requeteGain = $bdd->prepare("SELECT gain FROM paris WHERE idparis = :paris_id");
    $requeteGain->execute(array("paris_id" => $parisId));
    $resultatGain = $requeteGain->fetch(PDO::FETCH_ASSOC);

    if ($resultatGain) {
        // Mettez à jour l'attribut "solde" dans la table "utilisateurs".
        $requeteMiseAJourSolde = $bdd->prepare("UPDATE utilisateurs SET solde = solde + :gain WHERE idutilisateur = :utilisateur_id");
        $requeteMiseAJourSolde->execute(
            array(
                "gain" => $resultatGain['gain'],
                "utilisateur_id" => $_SESSION['id_utilisateur'], // Utilisez l'identifiant de l'utilisateur approprié
            )
        );

        // Après la mise à jour réussie, vous pouvez rediriger l'utilisateur ou afficher un message de succès.
        // Par exemple, vous pouvez utiliser header('Location: manage_bet.php') pour rediriger l'utilisateur vers la liste des paris.
        header('Location: manage_bet.php');
        exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection.
    } else {
        echo "Erreur : Impossible de récupérer la valeur de gain.";
    }
} else {
    echo "Erreur : La requête n'est pas de type POST.";
}
?>
