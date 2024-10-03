<?php
include "php/bdd.php";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/personnages.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <title>Profils</title>
</head>
<header>
    <?php
    include_once "php/header.php";
    ?>
</header>
<body>

    <?php
          include "php/Redirecteur.php"; ?>
    
    <h1> Personnages </h1>


    <?php
        $all = fetchEverything("joueurs");
    ?>

    <input type="text" id='search_bar' onkeyup="myFunction()" placeholder="Drii, Laiona...">

<div class="mainZoneCard" id='MainZoneCard'>
        <?php
        foreach($all as $value){
            echo "
            <div class='card ".$value['Nom']."'>
                <form action = 'Profil.php' method='POST'>
                <button type='submit'><img src='".$value['Image']."'> <img src='Image/Objets/".getEthnieSvg($value['Ethnie']).".svg' class='ethnie'> <div class='blackscreen'></div> <p class='Name'>".$value['Nom']."</p> </button>
                <input type='hidden' name='ID' value='".$value['Nom']."'></input>
                </form>
                <p class='mobile-name'>".$value['Nom']."</p>
            </div>";
        }
        ?>

<!--         <div class="card">
            <p>Nom</p>
            <a href='#'><img src='Test.jpg'></a>
        </div> -->

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/Personnages.js"></script>
</body>
</html>


<?php

function getEthnieSvg($ethnie){
    $ethnie = strtolower($ethnie);
    if($ethnie == 'mudois' ||$ethnie == 'mudoise'){
        return 'Mudois';
    }
    else if ($ethnie == 'augeois' || $ethnie == 'augeoise'){
        return 'Augeois';
    }
    else if ($ethnie == 'saxifranc' || $ethnie == 'saxifranche'){
        return 'Saxifranc';
    }
    else if ($ethnie == 'amarien'|| $ethnie == 'amarienne'){
        return 'Amarien';
    } 
    else if ($ethnie == 'céleste' || $ethnie == 'celeste'){
        return 'Celeste';
    }
    else{
        return 'Inconnu';
    }
}

?>