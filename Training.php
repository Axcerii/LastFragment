<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/FichePersonnage.css">
    <link rel="stylesheet" href="css/training.css">

    <title>Entraînement</title>

</head>
<header>
    <?php
    include_once "php/header.php";
    ?>
</header>
<body>
    <div id='First-Page'>
    <?php
    include_once 'php/bdd.php';


    if(isset($_POST['ID'])){
        $id = $_POST['ID'];
    }
    else{
        $id = $_SESSION['qui'];
    }


    $id--;
    $all = fetchEverything('joueurs');
    
    $character = $all[$id];



    if(isset($_SESSION['connexion'])){}
    else{
        header('Location: Connexion.php');
    }
    ?>




<img src="Image/Pixel Art/<?php echo $character['Nom'] ?>.png" alt="" id='img-pa'>


<div class ='stats'>
            <div class='s-combat'>

            <?php

            function cap($stats){
                if($stats > 100){
                    $statsCap = 100;
                }
                else{
                    $statsCap = $stats;
                }
                return $statsCap;
            }
            
            $QdF = ($character['QdF'] / 3000)* 100;
            $Sante = ($character['Sante']/9000)*100;
            $Endurance = ($character['Endurance']/2000)*100;
            $Maitrise = cap($character['Maitrise']);
            $Force = cap($character['Strength']);
            $Defense = cap($character['Defense']);
            $QdF2 = cap($QdF);
            $Sante2 = cap($Sante);
            $Endurance2 = cap($Endurance);
            $Vitesse = cap($character['Vitesse']);
            $Precision = cap($character['Accuracy']);
            $Perception = cap($character['Perception']);
            $Furtivite = cap($character['Furtivite']);
            $Charisme = cap($character['Charisme']);
            $Eloquence = cap($character['Eloquence']);
            $SexAbl = cap($character['SexAbility']);
            $MaitriseAlt = cap($character['MaitriseAlternative']);

            ?>

                <table>
                    <caption>Statistiques de Combat</caption>
                    <tbody>
                        <tr>
                            <td class='titre_stat'> QdF </td>
                            <td class='valeur_stat'> <?php echo $character['QdF'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $QdF2;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> MaÎtrise </td>
                            <td class='valeur_stat'> <?php echo $character['Maitrise'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Maitrise;?>%;">
                            </div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> MaÎtrise Alt. </td>
                            <td class='valeur_stat'> <?php echo $character['MaitriseAlternative'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $MaitriseAlt;?>%;">
                            </div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Force </td>
                            <td class='valeur_stat'> <?php echo $character['Strength'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Force;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Défense </td>
                            <td class='valeur_stat'> <?php echo $character['Defense'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Defense;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Santé </td>
                            <td class='valeur_stat'> <?php echo $character['Sante'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Sante2;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Endurance </td>
                            <td class='valeur_stat'> <?php echo $character['Endurance'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Endurance2;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Vitesse </td>
                            <td class='valeur_stat'> <?php echo $character['Vitesse'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Vitesse;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Précision </td>
                            <td class='valeur_stat'> <?php echo $character['Accuracy'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Precision;?>%;"></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class='s-base'>
                <table>
                    <caption>Statistiques Hors-Combat</caption>
                    <tbody>
                        <tr>
                            <td class='titre_stat'> Perception </td>
                            <td class='valeur_stat'> <?php echo $character['Perception'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Perception;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Furtivité </td>
                            <td class='valeur_stat'> <?php echo $character['Furtivite'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Furtivite;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Charisme </td>
                            <td class='valeur_stat'> <?php echo $character['Charisme'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Charisme;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Éloquence </td>
                            <td class='valeur_stat'> <?php echo $character['Eloquence'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $Eloquence;?>%;"></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Sex Ability </td>
                            <td class='valeur_stat'> <?php echo $character['SexAbility'];?> </td>
                            <td> <div class='barre' style="width :<?php echo $SexAbl;?>%;"></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
            $token = fetcheverything('argent');
            foreach($token as $key){
                if($key['qui'] == $character['Nom']){
                    $tokens = $key['token'];
                }
            }
        ?>
        <h1>Token<?php if($tokens > 1){ echo 's';}?> : <?php
        echo $tokens;
        ?></h1>

        <div id='Statistiques-Training'>
            <div class='row'>
                <button class='button-jeu' onclick='RetirerFirstPage()'> <p> Quantité de Flux </p> <img src="Image/Objets/QdF.png" alt=""> </button>
                <button class='button-jeu' onclick='RetirerFirstPage()'> <p> Perception </p> <img src="Image/Objets/Perception.png" alt=""></button>
            </div>
            <div class="row">
                <button class="button-jeu" onclick='RetirerFirstPage()'><p> Maîtrise de Flux </p> <img src="Image/Objets/Flux.png" alt=""></button>
                <button class="button-jeu" onclick='RetirerFirstPage()'><p> Furtivité </p> <img src="Image/Objets/Furtivité.png" alt=""></button>
            </div>
            <div class="row">
                <button class="button-jeu" onclick='RetirerFirstPage()'><p> Force </p> <img src="Image/Objets/Force.png" alt=""></button>
                <button class="button-jeu" onclick='RetirerFirstPage()'><p> Charisme </p> <img src="Image/Objets/Charisme.png" alt=""></button>
            </div>
            <div class="row">
                <button class="button-jeu" onclick='RetirerFirstPage()'><p> Défense </p> <img src="Image/Objets/Armure.png" alt=""></button>
                <button class="button-jeu" onclick='RetirerFirstPage()'><p> Éloquence </p> <img src="Image/Objets/Eloquence.png" alt=""></button>
            </div>
            <div class="row">
                <button class="button-jeu button-solo" onclick='RetirerFirstPage()'><p> Santé </p> <img src="Image/Objets/Santé.png" alt=""></button>
            </div>
            <div class="row">
                <button class="button-jeu button-solo" onclick='RetirerFirstPage()'><p> Endurance </p> <img src="Image/Objets/Endurance.png" alt=""></button>
            </div>
            <div class="row">
                <button class="button-jeu button-solo" onclick='RetirerFirstPage(); vitesse()'><p> Vitesse </p> <img src="Image/Objets/Vitesse.png" alt=""></button>
            </div>
            <div class="row">
                <button class="button-jeu button-solo" onclick='RetirerFirstPage()'><p> Précision </p> <img src="Image/Objets/Accuracy.png" alt=""></button>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/training/training.js"></script>
    
    <script> var vitesse = <?php echo $character['Vitesse']?>;</script>


    <div id="game" style='display: none;'>

    </div>

</body>
</html>