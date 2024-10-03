<?php
include_once 'http://lastfragment.alwaysdata.net/php/cookieParam.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
    <link rel="stylesheet" href="http://lastfragment.alwaysdata.net/css/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <div class='header' id='header'>

        <a href="index.php" class='link-mobile-logo'>
            <img src="http://lastfragment.alwaysdata.net/Image/Objets/Logo.svg" alt="" class='mobile-logo'>
        </a>

        <a href="index.php" class='link-logo'>
            <img src="http://lastfragment.alwaysdata.net/Image/Objets/Logo2.svg" alt="" class='logo'>
        </a>

        <a href="index.php" class='link-logo'>
            <img src="http://lastfragment.alwaysdata.net/Image/Objets/FFTitre.svg" alt="Last Fragment" class='titre'>
        </a>

        <div class='panneau'>
            <a href="http://lastfragment.alwaysdata.net/index.php" class="liens"><span class="material-symbols-outlined">home</span> <span class='mobile-link'> Accueil </span></a>
            <a href="http://lastfragment.alwaysdata.net/Lore.php" class="liens"><span class="material-symbols-outlined">menu_book</span><span class='mobile-link'> Lore </span></a>
            <a href="http://lastfragment.alwaysdata.net/Outils.php" class="liens"><span class="material-symbols-outlined">build</span><span class='mobile-link'> Outils </span></a>
            <a href="http://lastfragment.alwaysdata.net/Connexion.php" class="liens"><span class="material-symbols-outlined">person</span><span class='mobile-link'> Profil </span></a>
            <?php
                if(isset($_SESSION['connexion'])){
                    if($_SESSION['droit'] == 1){
                        echo "
            <a href='http://lastfragment.alwaysdata.net/Office.php' class='liens'><span class='material-symbols-outlined'>precision_manufacturing</span><span class='mobile-link'> Back-Office</span></a>                        
                        ";
                    }
                    echo "<a href='http://lastfragment.alwaysdata.net/php/Deconnexion.php' class='liens'><span class='material-symbols-outlined'>signal_disconnected</span><span class='mobile-link'> Déconnexion </span></a>";
                }
            ?>
            <button class="close" onclick = 'closeMenu()'><img src="http://lastfragment.alwaysdata.net/Image/Objets/Cross.svg" alt=""></button>
        </div>
    </div>
    <div class='burger'>
        <button onclick = "burgerMenu()"><img src="http://lastfragment.alwaysdata.net/Image/Objets/Burger.svg" alt="Menu"></button>
    </div>
<script src="http://lastfragment.alwaysdata.net/js/header.js"></script>
</body>
</html>