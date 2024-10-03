<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/quizz.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=REM:wght@100;800&family=Yusei+Magic&display=swap" rel="stylesheet">
    <title>Quizz Flux</title>
</head>
<header>
    <?php
    include_once "php/header.php";
    ?>
</header>
<body>

    <div class='content'>
        <p> Ceci est un test, répondez rapidement aux différentes questions et un algorithme vous dévoilera votre pouvoir. Aucune information ne sera gardée. N'hésitez pas à partager le résultat avec le MJ.</p>
        
        <button id='start_button'><p>START</p><img src="Image/Objets/Flux.png" alt="" class="logo_flux1"><img src="Image/Objets/Flux2.png" class="logo_flux2"></button>
    </div>
    <div id='quizz'>

    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/quizz.js"></script>
    </body>
</html>