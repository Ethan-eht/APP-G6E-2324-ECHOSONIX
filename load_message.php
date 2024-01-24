<?php
    $bdd=new PDO('mysql:host=localhost;dbname=mydb;charset=utf8;','root','');
    $recup_message=$bdd->query('SELECT * FROM chat');
    while ($message=$recup_message->fetch()){
        ?>
        <div class="message">
            <h4><?= $message['username'];?></h4>
            <p><?= $message['contenu'];?></p>
        </div>
        <?php 
    }
?>