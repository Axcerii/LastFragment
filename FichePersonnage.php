<?php
include_once 'php/bdd.php';
?>
<!-- On récupère le personnage -->
<?php
    $id = $_GET['ID'];

    $character = executerSQL("SELECT * FROM fiche WHERE Nom = '$id'")[0];


 ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/FichePersonnageV2.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <title><?php echo $character['Nom'];?></title>
</head>
<header>
    <?php
    include_once "php/header.php";

    if(isset($_SESSION['connexion'])){
        $group = executerSQL("SELECT Groupe FROM joueurs WHERE id = '".$_SESSION['qui']."'")[0]['Groupe'];
    }
    else{
        $group = 2;
    }
    ?>
</header>
<body>
    <?php
            if($group != 1 && $group != $character['Groupe'] && $character['Groupe'] != 2){
                $character = censurer($character);
                echo '<div class="censor_pattern">
                    <p class="citation">'.$character['Citation'].'</p>
                    <div class="censor_neige"></div>
                </div>';
            }
    ?>
    <!-- Pour des effets de styles personnalisées -->
        <div class='background_pattern'></div>
        <div class="trainee"></div>
        <div class="circle"></div>

        <div class="background-pattern"></div>
        <div class="background-pattern-radial"></div>


    <h1><?php echo $character['Nom'];?></h1>
    <div class='fiche' id='fiche'>
        <div class='character'>
            <a href='<?php echo $character['Image'];?>' class='a_img' target="_blank"><img class='personnage_img'src='<?php echo $character['Image'];?>'></a>
            <div class='infos'>
                <table>
                    <caption> Informations </caption>
                    <tbody>
                        <tr>
                            <td class='titre_stat1'> Titre :</td>
                            <td> <?php echo $character['Titre'];?></td>
                        </tr>
                        <tr>
                            <td class='titre_stat1'> Theme :</td>
                            <td id='Theme'> <?php echo $character['Theme'];?></td>
                        </tr>
                        <tr>
                            <td class='titre_stat1'> Flux :</td>
                            <td> <?php echo $character['Flux'];?></td>
                        </tr>
                        <tr>
                            <td class='titre_stat1'> Âge :</td>
                            <td> <?php echo $character['Age'];?></td>
                        </tr>
                        <tr>
                            <td class='titre_stat1'> Sexe :</td>
                            <td> <?php echo $character['Sexe'];?></td>
                        </tr>
                        <tr>
                            <td class='titre_stat1'> Race :</td>
                            <td> <?php echo $character['Race'];?></td>
                        </tr>
                        <tr>
                            <td class='titre_stat1'> Éthnie :</td>
                            <td> <?php echo $character['Ethnie'];?></td>
                        </tr>
                        <tr>
                            </tr>
                        </tbody>
                    </table>
                    <div class='descendance-container'>
                        <?php descendance($character['Descendance']);?>
                    </div>
            </div>
        </div>


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

            ?>
        <?php
            if(isset($_SESSION['droit'])){
                if ($_SESSION['droit'] == 1){

                echo "
            
        <div class ='stats'>
            <div class='s-combat'>
                <table>
                    <caption>Statistiques de Combat</caption>
                    <tbody>
                        <tr>
                            <td class='titre_stat'> QdF </td>
                            <td class='valeur_stat'>".$character['QdF']." </td>
                            <td> <div class='barre' style='width :".$QdF2."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> MaÎtrise </td>
                            <td class='valeur_stat'>".$character['Maitrise']." </td>
                            <td> <div class='barre' style='width :".$Maitrise."%;'>
                            </div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Force </td>
                            <td class='valeur_stat'>".$character['Strength']." </td>
                            <td> <div class='barre' style='width :".$Force."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Défense </td>
                            <td class='valeur_stat'>".$character['Defense']." </td>
                            <td> <div class='barre' style='width :".$Defense."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Santé </td>
                            <td class='valeur_stat'>".$character['Sante']." </td>
                            <td> <div class='barre' style='width :".$Sante2."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Endurance </td>
                            <td class='valeur_stat'>".$character['Endurance']." </td>
                            <td> <div class='barre' style='width :".$Endurance2."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Vitesse </td>
                            <td class='valeur_stat'>".$character['Vitesse']." </td>
                            <td> <div class='barre' style='width :".$Vitesse."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Précision </td>
                            <td class='valeur_stat'>".$character['Accuracy']." </td>
                            <td> <div class='barre' style='width :".$Precision."%;'></div></td>
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
                            <td class='valeur_stat'>".$character['Perception']."</td>
                            <td> <div class='barre' style='width :".$Perception."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Furtivité </td>
                            <td class='valeur_stat'>".$character['Furtivite']."</td>
                            <td> <div class='barre' style='width :".$Furtivite."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Charisme </td>
                            <td class='valeur_stat'>".$character['Charisme']."</td>
                            <td> <div class='barre' style='width :".$Charisme."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Éloquence </td>
                            <td class='valeur_stat'>".$character['Eloquence']."</td>
                            <td> <div class='barre' style='width :".$Eloquence."%;'></div></td>
                        </tr>
                        <tr>
                            <td class='titre_stat'> Intelligence </td>
                            <td class='valeur_stat'>".$character['SexAbility']."</td>
                            <td> <div class='barre' style='width :".$SexAbl."%;'></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='s-globale'>
            <p>
            <span class='s-globale-titre'>Puissance Totale :</span>
                ".calculStatGlobale($character)."
            </p>
        </div>
        ";}}?>
            <?php
                if($character['Link'] != 'None'){
                       

                    echo '<div class="Link">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script> $(".Link").load("'.$character['Link'].'") </script>
                    </div>';
                }
            ?>
    </div>
    <script src='js/profil.js'></script>
    <?php
/*         echo '<link rel="stylesheet" href="css/spéciaux/'.$id.'.css">
    <script src="js/spéciaux/'.$id.'.js"></script>'; */
    ?>
</body>
</html>


<?php

//Calcul des stats globales

// Calcul les points théoriques
function calculUneStat($nombre){

    $result = 0;
    

    if($nombre <= 25 /* 0-25 */){
        return $nombre/2;
    }
    else if ($nombre > 25){
        $nombre -= 25;
        $result += 12.5;
    }

    if($nombre > 25 /* 25-50 */){
        $nombre -= 25;
        $result += 25;
    }    
    else{
        $result += $nombre;
        return $result;
    }

    if($nombre > 20 /* 50-70 */){
        $nombre -= 20;
        $result += 40;
    }
    else{
        $result += $nombre*2;
        return $result;
    }

    if($nombre > 10 /* 70-80 */){
        $nombre -= 10;
        $result += 40;
    }
    else{
        $result += $nombre*4;
        return $result;
    }

    /* 80+ */

    $result += $nombre*8;
    return $result;
}

function calculStatGlobale($character){
    $conteneur = $character;

    /* On convertit les stats qui ne sont pas à hauteur normale */

    $conteneur['QdF'] /= 30;
    $conteneur['Sante'] /= 30;
    $conteneur['Endurance'] /= 20;
    
    $statsNames = ['QdF', 'Maitrise', 'Strength', 'Defense', 'Sante', 'Endurance', 'Vitesse', 'Accuracy', 'Perception', 'Furtivite', 'Charisme','Eloquence', 'SexAbility'];

    $statGlobale = 0;

    foreach($statsNames as $value){
        $statGlobale += calculUneStat($conteneur[$value]);
    }

    return floor($statGlobale);
}

function descendance($descendance){
    $descendance = explode('-', $descendance);

    foreach($descendance as $value){
        if($value == 'Yinva'){
            echo "<img src='Image/Objets/$value.svg' alt='$value-logo' class='descendance-logo yinva'>";
        }
        else{
            echo "<img src='Image/Objets/$value.svg' alt='$value-logo' class='descendance-logo dragon'>";
        }
    }
}

function censurer($tableau){
    $tableau['Titre'] = 'Censor';
    $tableau['Theme'] = 'Censor';
    $tableau['Age'] = 'Censor';
    $tableau['Sexe'] = 'Censor';
    $tableau['Race'] = 'Censor';
    $tableau['Link'] = 'None';
    $tableau['Flux'] = 'Censor';

    return $tableau;
}
?>