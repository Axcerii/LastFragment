<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/histoire.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <title>Histoire</title>
</head>
<header>
    <?php
    include_once 'php/header.php'
    ?>
</header>
<body>
    <div class="background-pattern"></div>
    <div class="background-pattern-radial"></div>

        <ul class='colonne' id='choix'>
            <li class="categorie" id='cat_dragons'>Dragons</li>
            <li class="categorie" id='cat_legendes'>Légendes</li>
            <li class="categorie" id='cat_lieux'>Lieux</li>
            <li class="categorie" id='cat_races'>Races</li>
        </ul>
    
        <ul class='colonne' id='dragons'>
            <li class="categorie"><a href='Lores/Artrish' target="_blank">Artrish</a></li>
            <li class="categorie"><a href='Lores/Aqua' target="_blank">Aqua</a></li>
            <li class="categorie"><a href='Lores/Chronos' target="_blank">Chronos</a></li>
            <li class="categorie"><a href='Lores/Drii' target="_blank">Drii</a></li>
            <li class="categorie"><a href='Lores/Goliath' target="_blank">Goliath</a></li>
            <li class="categorie"><a href='Lores/Guizamark' target="_blank">Guizamark</a></li>
            <li class="categorie"><a href='Lores/Lada' target="_blank">Lada</a></li>
            <li class="categorie"><a href='Lores/Pestia' target="_blank">Pestia</a></li>
            <li class="categorie"><a href='Lores/Pura' target="_blank">Pura</a></li>
            <li class="categorie"><a href='Lores/Shizari' target="_blank">Shizari</a></li>
            <li class="categorie"><a href='Lores/Yinva' target="_blank">Yinva</a></li>
        </ul>
        <ul class='colonne' id='legendes'>
            <li class='categorie'><a href='Lores/David' target="_blank">David</a></li>
            <li class='categorie'><a href='Lores/Diablesse' target="_blank">Diablesse</a></li>
            <li class='categorie'><a href='Lores/Armes' target="_blank">Les Doigts d'Artrish</a></li>
        </ul>
        <ul class='colonne' id='lieux'>
            <li class='categorie'><a href='Lores/Amari' target="_blank">Amari</a></li>
            <li class='categorie'><a href='Lores/Augeaime' target="_blank">Augeaime</a></li>
            <li class='categorie'><a href='Lores/Lucioles' target="_blank">Berceau des Lucioles</a></li>
            <li class='categorie'><a href='Lores/Edenia' target="_blank">Edenia</a></li>
            <li class='categorie'><a href='Lores/Irysia' target="_blank">Irysia</a></li>
            <li class='categorie'><a href='Lores/Mudan' target="_blank">Mudan</a></li>
            <li class='categorie'><a href='Lores/Saxifra' target="_blank">Saxifra</a></li>
            <li class='categorie'><a href='Lores/Vulcain' target="_blank">Vulcain</a></li>
        </ul>
        <ul class='colonne' id='races'>
            <li class='categorie'><a href='Lores/Dragons' target="_blank">Dragons</a></li>
            <li class='categorie'><a href='Lores/Eternelles' target="_blank">Éternelles</a></li>
            <li class='categorie'><a href='Lores/Geants' target="_blank">Géants</a></li>
            <li class='categorie'><a href='Lores/Humains' target="_blank">Humains</a></li>
        </ul>

        <div id='preview'>
        <div class="background_pattern"></div>
        <div class="silhouette"></div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src='js/Histoire.js'></script>
</body>
</html>