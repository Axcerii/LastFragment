<link rel="stylesheet" href="css/profil/badges.css">
<script src="js/Elements/badges.js"></script>
<?php



function afficherBadges($character, $argent){
    $table50 = verifStats($character, 50);
    $table70 = verifStats($character, 70);

    $informationBadges = verifUsed($table50, $table70, $argent);

    $tableBadges = fetchEverything('badges');
    
    echo 
    '<div class="fieldset-badges">
        <label for="badge-50">
            50
            <input type="radio" id="badge-50" value="50" name="stats" onchange="gestionnaireRadio()" checked />
            <div class="green-screen"></div>
        </label>
        <label for="badge-70">
            70
            <input type="radio" id="badge-70" value="70" name="stats" onchange="gestionnaireRadio()">
            <div class="green-screen"></div>
        </label>
        <label for="badge-comp">
        Compétences
        <input type="radio" id="badge-comp" value="70" name="stats" onchange="gestionnaireRadio()">
        <div class="green-screen"></div>
    </label>
    </div>';

    echo '<div class="badges table50" id="table-50">';
    afficherDivBadge($informationBadges['table50']);
    echo '</div>';
    echo '<div class="badges table70" id="table-70">';
    afficherDivBadge($informationBadges['table70']);
    echo '</div>';
    echo '<div class="badges table70" id="table-comp">';
    if($informationBadges['competences'][0]){
        afficherCompetences($informationBadges['competences'], $tableBadges);
    }
    else{
        echo "<p class='comp-unlocked'> Il semblerait que vous n'ayez aucune compétence liée aux badges débloquée, veuillez contacter le MJ pour en obtenir.</p>";
    }
    echo '</div>';
}


function verifStats($character, $nombre){
    $stats = ['Maitrise', 'Strength', 'Defense', 'Endurance', 'Vitesse', 'Accuracy', 'Perception', 'Furtivite', 'Charisme', 'Eloquence', 'SexAbility'];
    $return = [];
    for($ii = 0; $ii < 11; $ii++){
        $selecteurStat = $stats[$ii];
        $valeurStats = $character[$selecteurStat];

        if($selecteurStat == 'Endurance' ){
            if($valeurStats >= $nombre*20){
                array_push($return, 'Débloqué');
            }
            else{
                array_push($return, 'Bloqué');
            }
        }
        else{
            if($valeurStats >= $nombre){
                array_push($return, 'Débloqué');
            }
            else{
                array_push($return, 'Bloqué');
            }
        }
    }

    return $return;
}

function verifUsed($table50, $table70 , $argent){
    $stats = ['MDF', 'FOR', 'DEF', 'END', 'VIT', 'ACC', 'PER', 'FUR', 'CHA', 'ELO', 'INT'];

    $string = $argent;
    $competences = explode(',', $string);
    
    foreach($competences as $competencesValue){
        $badgeUsed = explode(':', $competencesValue);
        foreach($badgeUsed as $badgeValue){
            foreach($stats as $key => $statsValue){

                /* Check fonction en dessous */
                if($statsValue == strtoupper($badgeValue)){
                    if($table50[$key] == 'Débloqué'){
                        $table50[$key] = 'Utilisé';
                    }
                    else if($table50[$key] == 'Utilisé'){
                        if($table70[$key] == 'Débloqué'){
                            $table70[$key] = 'Utilisé';
                        }
                        else if($table70[$key] == 'Bloqué'){
                            echo "<script>console.error('Utilisation du Token $key en double alors qu il n est pas débloqué')</script>";
                        }
                        else if($table70[$key] == 'Utilisé'){
                            echo "<script>console.error('Utilisation du Token $key en triple ou plus')</script>";
                        }
                    }
            
                    else if($table50[$key] == 'Bloqué'){
                        echo "<script>console.error('Utilisation du Token $key alors qu il n est pas débloqué')</script>";
                    }
                }
            }
        }
    }

    $return = ['table50' => $table50, 'table70' => $table70, 'competences' => $competences];
    return $return;
}


/* function checkBadgeStatut($statsValue, $badgeValue, $table50, $table70, $key){
    if($statsValue == strtoupper($badgeValue)){
        if($table50[$key] == 'Débloqué'){
            $table50[$key] = 'Utilisé';
        }
        else if($table50[$key] == 'Utilisé'){
            if($table70[$key] == 'Débloqué'){
                $table70[$key] = 'Utilisé';
            }
            else if($table70[$key] == 'Bloqué'){
                echo "<script>console.error('Utilisation du Token $key en double alors qu il n est pas débloqué')</script>";
            }
            else if($table70[$key] == 'Utilisé'){
                echo "<script>console.error('Utilisation du Token $key en triple ou plus')</script>";
            }
        }

        else if($table50[$key] == 'Bloqué'){
            echo "<script>console.error('Utilisation du Token $key alors qu il n est pas débloqué')</script>";
        }
    }
} */

function afficherDivBadge($tableN){
    $stats = ['Maîtrise', 'Force', 'Défense', 'Endurance', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence'];


    echo '<div class="row-1-badges">';
    for($ii = 0; $ii < 6; $ii++){
        $style = $tableN[$ii];
        $help = $stats[$ii];

        echo '<div class="bulle-help">';


            if($style == 'Bloqué'){
                echo "<img src='Image/Objets/Badges/Locked.png' alt ='Badge $help' class='img-badge $style'>";
            }
            else{
                echo "<img src='Image/Objets/Badges/$help.png' alt ='Badge $help' class='img-badge $style'>";
            }

        echo "
            <div class='aide'>$help</div> </div>
        ";
    }
    echo '</div>';

    echo '<div class="row-1-badges">';

    for($ii = 6; $ii < 11; $ii++){
        $style = $tableN[$ii];
        $help = $stats[$ii];

        echo '<div class="bulle-help">';

            if($style == 'Bloqué'){
                echo "<img src='Image/Objets/Badges/Locked.png' alt ='Badge $help' class='img-badge-2 $style'>";
            }
            else{
                echo "<img src='Image/Objets/Badges/$help.png' alt ='Badge $help' class='img-badge-2 $style'>";
            }

        echo "
            <div class='aide'>$help</div></div>
        ";

        
    }

    echo '</div>';
}

function afficherCompetences($competences, $tableBadges){
    echo "<table class='badge-competences'>
    <tbody>";    

    foreach($competences as $value){
        foreach($tableBadges as $value2){
            if($value2['stats'] == $value){
                $description = $value2['description'];
                break;
            }
        }

        $badgeUtilise = explode(':', $value);
        
        usort($badgeUtilise, "comparerOrdre");

        $nomStat1 = traduireStats($badgeUtilise[0]);
        $nomStat2 = traduireStats($badgeUtilise[1]);

        echo "
        <tr>
            <td>
                <div class='comp-img'>
                    <div class='bulle-help'>
                        <img src='Image/Objets/Badges/$nomStat1.png' alt='Badge ".$badgeUtilise[0]."' class='badge-img-comp'>
                        <div class='aide'>$nomStat1</div>
                    </div>
                    <div class='bulle-help'>
                        <img src='Image/Objets/Badges/$nomStat2.png' alt='Badge ".$badgeUtilise[1]."' class='badge-img-comp'>
                        <div class='aide'>$nomStat2</div>
                    </div>
                </div>
            </td>";

        echo "
            <td class='badge-td-description'>
                <p>".$description."</p>
            </td>
        </tr>";
    }
        

    echo "
    </tbody>
    </table>";
}

function comparerOrdre($a, $b) {
        $ordre = ["MDF", "FOR", "DEF", "END", "VIT", "ACC", "PER", "FUR", "CHA", "ELO", "INT"];
        $indexA = array_search($a, $ordre);
        $indexB = array_search($b, $ordre);
    
        if ($indexA === false && $indexB === false) {
            return 0; // Si les éléments ne sont pas trouvés, l'ordre est inchangé
        } elseif ($indexA === false) {
            return 1; // Si $a n'est pas trouvé, $b est considéré comme plus grand
        } elseif ($indexB === false) {
            return -1; // Si $b n'est pas trouvé, $a est considéré comme plus grand
        }
    
        return $indexA - $indexB; // Comparaison des indices dans l'ordre
}

function traduireStats($string){
    $stats = ['MDF' => 'Maîtrise', 'FOR' => 'Force', 'DEF' => 'Défense', "END" => "Endurance", 'VIT' => 'Vitesse', 'ACC' => 'Précision', 'PER' => 'Perception',
    'FUR' => 'Furtivité', 'CHA' => 'Charisme', 'ELO' => 'Éloquence', 'INT' => 'Intelligence'];

    $string = strtoupper($string);

    if(isset($stats[$string])){
        return $stats[$string];
    }
    else{
        return "Locked";
    }
}

?>