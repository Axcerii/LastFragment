<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/quizz.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <title>Certificat de Flux</title>
</head>
<header>
    <?php
    include_once "php/header.php";
    ?>
</header>
<body>

<?php
    include_once 'php/bdd.php';





    if(isset($_SESSION['connexion'])){
        $_SESSION['connexion'] = true;
    }
    else{
        header('Location: ../Connexion.php');
    }


    $id = $_SESSION['qui'];

    $id--;

    $all = fetchEverything('joueurs');
    
    $character = $all[$id];


    ?>

<h1>Certificat de flux</h1>

<p class='certificat'>Ce certificat indique que la personne du nom de <?php echo $character['Nom']; ?> possède le flux <?php echo $character['Flux'];?>
 Si vous ne reconnaissez pas votre flux, le maître des lieux possèdent encore quelques doutes à son sujet à vous partager. N'hésitez pas à le contacter pour pouvoir découvrir de quoi il en retourne.</p>

</body>
</html>