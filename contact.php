<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
<style>
    body{
        font-family: Arial, sans-serif;
    }
    </style>
</head>

<body>
    <h1>Pour nous contacter :</h1>

    <div style="display: flex; align-items: center; justify-content: center;"></div>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <img src="telephone.png" alt="Tel" width="60" height="60">
        <p style="margin-left: 10px;">Num&eacute;ro de T&eacute;l&eacute;phone : 03 XX XX XX XX</p>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center;">
        <img src="mail.png" alt="Email" width="60" height="60">
        <p style="margin-left: 10px;">Nous contacter par email : echosonix@sonixap.fr</p>
    </div>
    </div>

    <div style="display: flex; flex-direction: column; align-items: center;">
        <img src="localisation.png" alt="Localisation :" width="60" height="60">
        <p style="margin-left: 10px; cursor: pointer;" onclick="copyAddress()">10 Rue de Vanves, 92170
            Issy-les-Moulineaux</p>
    </div>


    <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.7656859836816!2d2.2787669120662937!3d48.82453200448649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670797935962f%3A0xa2a4098b11eb5c09!2s10%20Rue%20de%20Vanves%2C%2092170%20Issy-les-Moulineaux!5e0!3m2!1sfr!2sfr!4v1702483187296!5m2!1sfr!2sfr"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


    <div style="display: flex; justify-content: center; align-items: center; margin: 40px;">
        <a href="https://www.instagram.com/" target="_blank">
            <img src="follow.png" alt="Follow us on Instagram" width="105.5" height="70">
        </a>
        <a href="contact_us.html"
            style="background-color: #f0f0f0; padding: 10px 20px; border-radius: 5px; text-decoration: none; color: #333; margin-left: 10px;">Formulaire
            de contact</a>
    </div>

    <script>
        function copyAddress() {
            const address = "10 Rue de Vanves, 92170 Issy-les-Moulineaux";
            navigator.clipboard.writeText(address);
            alert("Addresse copiée !");
        }
    </script>