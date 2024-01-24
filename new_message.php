<?php
    $bdd=new PDO('mysql:host=localhost;dbname=mydb;charset=utf8;','root','');
    if(isset($_POST['envoyer'])){
        if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){
            $pseudo=htmlspecialchars($_POST['pseudo']);
            $message=nl2br(htmlspecialchars($_POST['message']));
            $evt=$_POST['evt'];
            $inserer_message= $bdd->prepare('INSERT INTO chat(username,contenu,Evenement_idEvenement) VALUES (?, ?,?)');
            $inserer_message->execute(array($pseudo, $message,$evt));
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Messagerie</title>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <form method="POST" action="">
            <select name="evt" id="evt">
                <option value="1">coupe</option>
                <option value="2">Saab</option>
                <option value="3">Mercedes</option>
                <option value="4">Audi</option>
            </select>
            <input type="text" name="pseudo">
            <br><br>
            <textarea name="message"></textarea>
            <br>
            <input type="submit" name="envoyer">

        </form>
        <section id="messages"></section>

        <script>
            setInterval('loadmessage()',500);
            function loadmessage(){
                $('#messages').load('load_message.php');
            }
        </script>
    </body>
</html>