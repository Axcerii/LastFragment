<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/certificate.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=REM:wght@100;800&family=Yusei+Magic&display=swap" rel="stylesheet">
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
    include_once 'php/fluxDescriptions.php';

    /* Variable : 
    $nombreQuestions = nombre de questions;
    */
    $nombreQuestions = count($_POST);
    $table = compterPoints($_POST);
    $resultats = choisirFlux($table);

    $resultat_1 = letterTraductor($resultats[0]);
    $resultat_2 = letterTraductor($resultats[1]);

    $stats = calculerStats($table);

/*     echo($fluxDescriptions[$resultat_1][$resultat_2]['Nom']);
    echo($fluxDescriptions[$resultat_1][$resultat_2]['Description']); */
    ?>

    <style>
        .filtrer{
            <?php echo $couleurs[$resultat_1]['Filter'];?>
        }
    </style>

    <div id='blackscreen'></div>

    <div class="citation">
        <p id='citation-p'>
            <?php
            echo $citations[$resultat_1];
            ?>
        </p>
    </div>
    <div class="page">
        <div class='colonne_gauche'>
            <div class="ligne_1">
                <div class='trivia'>
                    <p class='descendance'>Bénédiction : <a href = 'Lores/<?php echo($resultat_1)?>' target='_blank' class='dragon' style='color : <?php echo $couleurs[$resultat_1]['Couleur'] ?>'><?php echo($resultat_1)?></a> </p>
                    <p class='prenoms_possibles'> Prénoms possibles : </p>
                    <ul class="names">
                        <?php
                        foreach($fluxDescriptions[$resultat_1][$resultat_2]['Prénom'] as $value){
                            echo "<li>$value</li>";
                        };
                        ?>
                </ul>
                </div>
                <div class="potentiel">
                    <svg width="150" height="150" viewBox="0 0 100 100" class='pentagone'>
                        <?php
                            $values = calculPotentiel($stats);

                            echo '<polygon stroke = "'.$couleurs[$resultat_2]['Couleur'].'" stroke-width = "2" stroke-opacity = "0.8" fill = "'.$couleurs[$resultat_1]['Couleur'].'" fill-opacity = "0.6" points="' . generatePentagonPoints($values) . '" id="points"></polygon>';
                        ?>
                    </svg>
                    <img src="Image/Objets/Potentiel.png" alt="" class='potentiel_background'>
                </div>
            </div>
        
            
            <div class="stats">
                <?php
                createTable();
                ?>
            </div>
        </div>
        
        <div class="colonne_droite">
            <div class='certificate'>
                    <img class='flux_logo_certificate logo_front filtrer' src='Image/Objets/Triskel.svg' style='z-index: -1;'>
                    <img class='flux_logo_certificate filtrer' src='Image/Objets/Triskel2.svg' style='z-index: -2;'>

                    <p class='flux' style='border : solid 3px <?php echo $couleurs[$resultat_1]['Couleur'] ?>'><?php echo $fluxDescriptions[$resultat_1][$resultat_2]['Nom'] ?></p>
                    <p class="flux_description"><?php echo $fluxDescriptions[$resultat_1][$resultat_2]['Description'] ?></p>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <?php
       echo(convertPhpArrayToJs($stats, "stats"));
    ?>

    <script src='js/certificate.js'></script>
    <script>console.log(<?php echo($table[''])?>)</script>
</body>
</html>

<?php
  /*Function :

    compterPoints($tableReponse) = Compter les points finaux

    choisirFlux(compterPoints($tableReponse)) = Algorithme qui calcul le flux.

    letterTraductor($letter) = Renvoi le dragon lié à la lettre

    calculUnStat($nombre) = Renvoi la puissance globale d'une statistique

    */

    function compterPoints($POST){

        $reponse = 
        ['A' => 0,
        'B' => 0,
        'C' => 0,
        'D' => 0,
        'E' => 0,
        'F' => 0,
        'G' => 0,
        'H' => 0,
        'I' => 0,
        'J' => 0,
        'K' => 0,
        'L' => 0,
        'M' => 0,
        'N' => 0,
        'O' => 0,
        'P' => 0,
        'Q' => 0];

        foreach($POST as $key => $value){
            foreach(str_split($value) as $character){
                foreach($reponse as $key => $value){
                    if($character == $key){
                        $reponse[$key]++;
                    }
                }
            }
        }

        return $reponse;
    }

    function choisirFlux($reponse){
        /* Elementaires = ADEGI 
           Neutre =  H
           Rares = CFJ
           
           Artrish = B
           Yinva = K
           
           Impossible = LMNOPQ */

           $elementaires = 2;
           $neutre = 1.8;
           $rares = 1.6;
           
           /* Vérification du statut d'invocateur */

        if($reponse['B'] <= ($reponse['K']/2)){
            $invocateur = true;
        }
        else{
            $invocateur = false;
        }

        

        foreach($reponse as $key => $value){
            if($key == 'A' || $key == 'D' || $key == 'E' || $key == 'G' || $key == 'I'){
                $reponse[$key] = ceil($reponse[$key]*$elementaires);
            }
            else if($key == 'H'){
                $reponse[$key] = ceil($reponse[$key]*$neutre);
            }
            else if($key == 'C' || $key == 'F' || $key == 'J'){
                $reponse[$key] = ceil($reponse[$key]*$rares);
            }
            else if($key == 'N' && $value == 25){
                return(['N', 'N', false]);
            }
            else{
                $reponse[$key] = 0;
            }
        }

        

        /* Check la première réponse */
        arsort($reponse);

        /* On créé un tableau pour pouvoir trouver le second */
        $reponseBis = $reponse;
        /* On récupère la valeur la plus élevé */        
        $first = reset($reponse);

        /* On créé le tableau qui contiendra les informations s'il y en a plusieurs */

        $firstExaequos = [];
        /* On vérifie s'il n'y en a pas d'autre */
        foreach($reponseBis as $key => $value){
            if($first == $value){
                array_push($firstExaequos, $key);
                unset($reponseBis[$key]);
            }
        }

        $return = [];

        if(count($firstExaequos) == 2){
            $return = $firstExaequos;
        }
        else if(count($firstExaequos) > 2){
            $random = rand(0, count($firstExaequos)-1);
            array_push($return, $firstExaequos[$random]);
            unset($firstExaequos[$random]);

            sort($firstExaequos);

            $random = rand(0, count($firstExaequos)-1);
            array_push($return, $firstExaequos[$random]);
        }
        else{
            /* Rebelote avec reponse Bis pour avoir la second uniquement s'il n'y en a pas 2 */
            if($reponse[$firstExaequos[0]]-reset($reponseBis) <= 5){
                $second =  reset($reponseBis);
                $secondExaequos = [];

                    /* On vérifie s'il n'y en a pas d'autre */
                foreach($reponseBis as $key => $value){
                    if($second == $value){
                        array_push($secondExaequos, $key);
                        unset($reponseBis[$key]);
                    }
                }

                    /* Faut retirer au sort les ex-aequos :*/

                    $random = rand(0, count($secondExaequos)-1);
                    
                    array_push($return, $firstExaequos[0]);
                    array_push($return, $secondExaequos[$random]);
            }
            else{
                array_push($return, $firstExaequos[0]);
                array_push($return, $firstExaequos[0]);
            }
        }

        array_push($return, $invocateur);

        return($return);
    }

    function calculerStats($table){
        $stats = [
            'Maîtrise' => $table['C']*5,
            'Force' => $table['I']*5,
            'Défense' => $table['A']*5,
            'Vitesse' => $table['G']*5,
            'Précision' => $table['D']*5,
            'Perception' => $table['H']*5,
            'Furtivité' => $table['J']*5,
            'Charisme' => $table['B']*5,
            'Éloquence' => $table['K']*5,
            'Intelligence' => $table['G']*5,
            'QdF' => $table['F']*5,
            'Santé'  => $table['J']*5,
            'Endurance' => $table['E']*5
        ];

        if($table['N'] == 25){
            $stats = [
                'Maîtrise' => 78,
                'Force' => 194,
                'Défense' => 176,
                'Vitesse' => 52,
                'Précision' => 97,
                'Perception' => 114,
                'Furtivité' => 114,
                'Charisme' => 105,
                'Éloquence' => 118,
                'Intelligence' => 101,
                'QdF' => 7.5333333333333333333,
                'Santé'  => 4.266666666666666666,
                'Endurance' => 8.3
            ];

            return $stats;
        }

        foreach($stats as $key => $value){
            if($value > 60){
                $stats[$key] = 60;
            }
            else if($value < 20){
                $stats[$key] = 20;
            } 
        }

        $keys = array_keys($stats);

        if(calculerGlobaleStats($stats) > 355){
            while(calculerGlobaleStats($stats) > 355){
                $random = rand(0, 12);
                if($stats[$keys[$random]] > 20){
                    $stats[$keys[$random]] -= 1;
                }

            }
        }
        else{
            while(calculerGlobaleStats($stats) < 345){
                $random = rand(0, 12);
                if($stats[$keys[$random]] < 60){
                    $stats[$keys[$random]] += 1;
                }
            }
        }

        return $stats;
    }



    function letterTraductor($letter){
        $traductor = [
            'A' => 'Aqua',
            'B' => 'Artrish',
            'C' => 'Chronos',
            'D' => 'Drii',
            'E' => 'Goliath',
            'F' => 'Guizamark',
            'G' => 'Lada',
            'H' => 'Pestia',
            'I' => 'Pura',
            'J' => 'Shizari',
            'K' => 'Yinva',
            'L' => 'Innocence',
            'M' => 'Émotions',
            'N' => 'Chaos',
            'O' => 'Sagesse',
            'P' => 'Destruction',
            'Q' => 'Conscience'
        ];

        return $traductor[$letter];
    }

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

    function calculerGlobaleStats($stats){
        $return = 0;
        foreach($stats as $key => $value){
            $return += calculUneStat($value);
        }
        return $return;
    }

    function createTable(){
        $statsName = ['Maîtrise', 'Force', 'Défense', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence', 'QdF', 'Santé', 'Endurance'];

        echo '<table class="label_combat">';
        for($ii = 0; $ii < 13; $ii++){
            if($ii == 5 || $ii == 10){
                echo '<tr><td><br></td></tr>';
            }
            echo '<tr><td class="label_combat_text">'.$statsName[$ii].'</td></tr>';
        }
        echo '</table>';

        echo '<table class="stats_combat">';
        for($ii = 0; $ii < 13; $ii++){
            if($ii == 5 || $ii == 10){
                echo '<tr><td><br></td></tr>';
            }
            echo '<tr><td class="stat_separe" id="'.$statsName[$ii].'">0</td></tr>';
        }
        echo '</table>';
        echo '<table class="stats_bars">';
        for($ii = 0; $ii < 13; $ii++){
            if($ii == 5 || $ii == 10){
                echo '<tr><td><br></td></tr>';
            }
            echo '<tr><td class="td-bar"><div id="'.$statsName[$ii].'-bar" class="bar" style="width: 50%;"></div></td></tr>';
        }
        echo '</table>';
    };

    function convertPhpArrayToJs($phpArray, $jsVarName) {
        $json = json_encode($phpArray);
        return "<script>{$jsVarName} = {$json};</script>";
    }


    function generatePentagonPoints($values) {
        $cx = 50;  // Coordonnées du centre
        $cy = 50;
        $radius = 50;  // Rayon du pentagone régulier
        $points = [];
        
        for ($i = 0; $i < 5; $i++) {
            $angle = (72 * $i - 90) * (pi() / 180);  // Conversion en radians, -90 pour commencer du sommet supérieur
            $x = $cx + $radius * cos($angle);
            $y = $cy + $radius * sin($angle);
            
            // Interpolez entre le centre et le sommet régulier
            $fx = $cx + ($x - $cx) * ($values[$i] / 100);
            $fy = $cy + ($y - $cy) * ($values[$i] / 100);
            
            $points[] = "{$fx},{$fy}";
        }
    
        return implode(" ", $points);
    }

    function calculPotentiel($stats){
        $leader = floor((100/60)*(($stats['Perception'] + $stats['Charisme'] + $stats['Éloquence'] + $stats['Intelligence'])/4));
        $brute = floor((100/60)*(($stats['Force'] + $stats['Endurance'])/2));
        $tank = floor((100/60)*(($stats['Santé'] + $stats['Défense'])/2));
        $assassin = floor((100/60)*(($stats['Précision'] + $stats['Vitesse'] + $stats['Furtivité'])/3));
        $mage = floor((100/60)*(($stats['Maîtrise'] + $stats['QdF'])/2));
        
        $return = [$leader,$brute,$tank,$assassin,$mage];

        return($return);
    }
    
?>