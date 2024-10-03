<?php
include_once 'php/cookieParam.php';
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="js/header.js" defer></script>
</head>
<body>
    <div class='burger'>
        <button onclick = "burgerMenu()"><img src="Image/Objets/Burger.svg" alt="Menu"></button>
    </div>
    <div class='header' id='header'>

        <a href="index" class='link-mobile-logo'>
            <img src="Image/Objets/Logo.svg" alt="" class='mobile-logo'>
        </a>

        <a href="index" class='link-logo'>
            <img src="Image/Objets/Logo.svg" alt="" class='logo'>
        </a>

<!--         <a href="index" class='link-logo'>
            <img src="Image/Objets/FFTitre.png" alt="Last Fragment" class='titre'>
        </a> -->

        <div class='panneau'>
            <a href="index" class="liens">
                <span class="material-symbols-outlined header-help" data-tooltip='Accueil'>home</span>
                <span class='mobile-link'> Accueil </span> 
            </a>
            <a href="Histoire" class="liens">
                <span class="material-symbols-outlined header-help" data-tooltip='Histoires'>menu_book</span>
                <span class='mobile-link'> Histoires </span>
            </a>
            <a href="Personnages" class="liens">
                <span class="material-symbols-outlined header-help" data-tooltip='Personnages'>Groups</span>
                <span class='mobile-link'> Personnages </span>
            </a>
            <a href="Outils" class="liens">
                <span class="material-symbols-outlined header-help" data-tooltip='Outils'>build</span>
                <span class='mobile-link'> Outils </span> 
            </a>

            <a href="Connexion.php" class="liens" id='Profil_2'>
                <span class="material-symbols-outlined header-help" data-tooltip='<?php if(isset($_SESSION['connexion'])){echo 'Profil';} else{echo 'Connexion';}?>'>person</span>
                <span class='mobile-link'> Profil </span>
            </a>
            <?php
                if(isset($_SESSION['connexion'])){
                    if($_SESSION['droit'] == 1){
                        echo "
            <a href='Office' class='liens'>
                <span class='material-symbols-outlined header-help' data-tooltip='Back-Office'>precision_manufacturing</span>
                <span class='mobile-link'> Back-Office</span>
            </a>
            <a href='admin_profil' class='liens'>
                <span class='material-symbols-outlined header-help' data-tooltip='Profils'>groups</span>
                <span class='mobile-link'> Profils </span>
            </a>
                        ";
                    }
                    echo "<a href='#' class='liens' id='disconnected'>
                    <span class='material-symbols-outlined header-help' data-tooltip='Déconnexion'>signal_disconnected</span>
                    <span class='mobile-link'> Déconnexion </span>
                    </a>";
                }
            ?>
            <button class="close" onclick = 'closeMenu()'><img src="Image/Objets/Cross.svg" alt=""></button>
        </div>
    </div>
</body>
</html>