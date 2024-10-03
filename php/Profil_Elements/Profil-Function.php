<?php
function convertStatsNotation($stats){
    if($stats == 'QDF'){
        return 'QdF';
    }
    else if($stats == 'MDF'){
        return 'Maitrise';
    }
    else if($stats == 'FOR'){
        return 'Strength';
    }
    else if ($stats == 'DEF'){
        return 'Defense';
    }
    else if ($stats == 'HP'){
        return 'Sante';
    }
    else if ($stats == 'END'){
        return 'Endurance';
    }
    else if ($stats == 'VIT'){
        return 'Vitesse';
    }
    else if ($stats == 'ACC'){
        return 'Accuracy';
    }
    else if ($stats == 'PER'){
        return 'Perception';
    }
    else if ($stats == 'FUR'){
        return 'Furtivite';
    }
    else if ($stats == 'CHA'){
        return 'Charisme';
    }
    else if ($stats == 'ELO'){
        return 'Eloquence';
    }
    else if ($stats == 'INT'){
        return 'SexAbility';
    }
}
function convertStatsAffichage($stats){
    if($stats == 'QDF'){
        return 'QdF';
    }
    else if($stats == 'MDF'){
        return 'Maîtrise';
    }
    else if($stats == 'FOR'){
        return 'Force';
    }
    else if ($stats == 'DEF'){
        return 'Défense';
    }
    else if ($stats == 'HP'){
        return 'PV';
    }
    else if ($stats == 'END'){
        return 'Endurance';
    }
    else if ($stats == 'VIT'){
        return 'Vitesse';
    }
    else if ($stats == 'ACC'){
        return 'Précision';
    }
    else if ($stats == 'PER'){
        return 'Perception';
    }
    else if ($stats == 'FUR'){
        return 'Furtivité';
    }
    else if ($stats == 'CHA'){
        return 'Charisme';
    }
    else if ($stats == 'ELO'){
        return 'Éloquence';
    }
    else if ($stats == 'INT'){
        return 'Intelligence';
    }
}

//Obtenir une tableau avec toutes les compétences d'une stats demandé
function getCompOf($stats, $competences){
    //$competences = table "competences"
    //$stats = string de la stats voulu (QDF, MDF etc...)
    $return = [];
    foreach($competences as $key){
        if($key['Statistique'] == $stats){
            array_push($return, $key);
        }
    }
    return $return;
}

//Ranger un tableau associatif
function trier_tableau_assoc($tableau, $cle_tri) {
    usort($tableau, function ($a, $b) use ($cle_tri) {
        return strnatcmp($a[$cle_tri], $b[$cle_tri]);
    });
    return $tableau;
}

//Obtenir le width d'un élément en fonction de la progression de la stats
function getWidth($statsInfo, $size){
    //$size = taille total de la barre en width
    //$statsInfo = Tableau contenant toutes les compétences d'une stats précise

    $return = [];
    $multiplier = $size/100;

    if($statsInfo[0]['Statistique'] == 'END'){
        for($ii = 0; $ii < count($statsInfo); $ii++){
            $statsInfo[$ii]['Level'] *= 0.05; 
        }
    }
    
    foreach($statsInfo as $key){
        $key2 = next($statsInfo);
        if($key2){
            $Ecart = $key2['Level'] -  $key['Level'];
        }
        else{
            $Ecart = 100 - $key['Level'];
        }

        $width = $multiplier*$Ecart;
        array_push($return, $width);
    }
    $return[0] = $statsInfo[0]['Level'] * $multiplier;
    return $return;
}

//Vérifier si le joueur à débloquer la capacité

function isItLocked($character, $statsKey){
    $stats = $statsKey['Statistique'];
    $stats = convertStatsNotation($stats);

    if($character[$stats] >= $statsKey['Level']){
        return false;
    }
    else{
        return true;
    }
}

//Afficher la barre

function printBar($stats, $character, $competences){
    //$stats = stats demandé (QDF, MDF)
    //$character permet d'obtenir toutes les infos d'un personnage
    //$competences = table "competences"

    $statsInfo = getCompOf($stats, $competences);
    $statsInfo = trier_tableau_assoc($statsInfo, 'Level');

    
    
    //$size = largeur en vw de la barre total
    $size = 100;

    $max = count($statsInfo);
    $max--;
    if(count($statsInfo) == 1){
        if(isItLocked($character, $statsInfo[0])){
            echo "<div onmouseover='lockedDescription()' class='comp-bar'><div class='comp-solo-bar comp-locked' style='width: ".$size."vw;'><div></div>";
        }
        else{
            echo "<form id='comp-form-bar-0' onmouseover='afficherCompDescription(0)'><div class='comp-bar'><div class='comp-solo-bar' style='width: ".$size."vw;'></div>
            <input type='hidden' name='stats' value='".$stats."-0'>
            </form></div>";
        }
    }

    ////////////////////////////////////////////////
    else{
        $margin = 0.8*(count($statsInfo)+1); 
        $size -= $margin;
        $sizeSlice = getWidth($statsInfo, $size);

        echo "<div class='comp-bar'>";
        if(isItLocked($character, $statsInfo[0])){
            echo "<div onmouseover='lockedDescription()' class='comp-parallelogramme comp-first comp-locked comp-locked-first' style='width: ".$sizeSlice[0]."vw;'></div>";
        }
        else{
            echo "<form id='comp-form-bar-0' onmouseover='afficherCompDescription(0)' class='comp-parallelogramme comp-first comp-unlocked-first' style='width: ".$sizeSlice[0]."vw;'>
            <input type='hidden' name='stats' value='".$stats."-0'>
            </form>";
        }
        for($ii = 2; $ii < count($statsInfo); $ii++){
            $index = $ii-1;

            if(isItLocked($character, $statsInfo[$index])){
                echo "<div onmouseover='lockedDescription()' class='comp-parallelogramme comp-middle comp-locked' style='width: ".$sizeSlice[$index]."vw;'></div>";
            }
            else{
                echo "<form id='comp-form-bar-".$index."' onmouseover='afficherCompDescription(".$index.")' class='comp-parallelogramme comp-middle' style='width: ".$sizeSlice[$index]."vw;'>
                <input type='hidden' name='stats' value='".$stats."-".$index."'>
                </form>";
            }
        }
        if(isItLocked($character, $statsInfo[$max])){
            echo "<div onmouseover='lockedDescription()' class='comp-parallelogramme comp-last comp-locked-last comp-locked' style = 'width: ".$sizeSlice[$max]."vw;'></div>
            </div>";
        } 
        else{
            echo "<form id='comp-form-bar-".$max."' onmouseover='afficherCompDescription(".$max.")' class='comp-parallelogramme comp-last comp-unlocked-last' style = 'width: ".$sizeSlice[$max]."vw;'>
            <input type='hidden' name='stats' value='".$stats."-".$max."'>
            </form>
            </div>";
        }
    }
}


//Transformer un tableau PHP en string pour l'envoyer via AJAX

function arrayToAjax($array){
    $return = '{';
    foreach ($array as $key => $value){
        if($key == 'MotDePasse' || $key == 'Identifiant'){
            $return .= '"HIDDEN" : "HIDDEN",'; 
        }
        else{
            $return .= '"'.$key.'" : "'.$value.'",';
        }
    }
    $return .= '}';
    return $return;
}
?>