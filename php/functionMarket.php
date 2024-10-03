<?php
///FUNCTION


function getEveryBag($character, $objets, $sacs){
    //$character = tableau du joueur
    //$objets = tableau des objets
    
    $selectedBag = [];

    foreach($objets as $key){
        $explodedKey = explode(' ', $key['nom']);
        if(count($explodedKey) == 4){
            if(strtolower($explodedKey[0]) == 'sac' && strtolower($explodedKey[1]) == 'de' && strtolower($explodedKey[2]) == 'nourriture'){
                if($key['appartenance'] == $character['Nom']){
                    array_push($selectedBag, $key);
                }
            }
        }
    }
    
    $return = [];

    foreach($selectedBag as $key){
        foreach($sacs as $key2){
            if(strtolower($key2['Nom']) == strtolower($key['nom'])){
                array_push($return, $key2);
            }
        }
    }

    return $return;
}

function printFoodBags($sacs, $aliments){
    $nourritures = [];
    foreach($sacs as $key){
        array_push($nourritures, $key['Contenu']);    
    }

    $sacID = 0;
    echo "<div class='bags'>";
    foreach($nourritures as $key){
        $foodmultiplier = [];

        $foods = explode('-', $key);
        if($key){
            foreach($foods as $key){
                $nom = $aliments[$key-1]['Nom'];
                if(isset($foodmultiplier[$nom])){
                    $foodmultiplier[$nom]++;
                }
                else{
                    $foodmultiplier[$nom] = 1;
                }
        }
        }
        echo "<p class='bag-title'>".$sacs[$sacID]['Nom']."</p>";
        echo "<ul class='bag-list'>";
        echo "<li class='bag-count'>";
        if($foods[0]){
           echo(count($foods));
        }
        else{
            echo 0;
        }
        echo "</li>";
        foreach($foodmultiplier as $key2 => $value){
            echo "<li>".$key2." ×".$value."</li>";
        }
        echo '</ul>';
        $sacID++;
    }
    echo "</div>";
}

function getSelledFood($aliments, $etat){
    $viande = $etat[0]['Viande'];
    $poisson = $etat[0]['Poisson'];

    $return = $aliments;

    if($viande == 0){
        $count = count($aliments);
        for($ii = 0; $ii < $count; $ii++){
            if(strtolower($aliments[$ii]['Type']) == 'viande'){
                unset($return[$ii]);
            }
        }
    }

    if($poisson == 0){
        $count = count($aliments);
        for($ii = 0; $ii < $count; $ii++){
            if(strtolower($aliments[$ii]['Type']) == 'poisson'){
                unset($return[$ii]);
            }
        }
    }

    return $return;
}

function argent($argent, $qui){
    if($qui == 'Ryry'){
        echo $argent;
    }
    else{
        $arrondit = '';

        if($argent > 1000){
            $argent /= 1000;
            $arrondit .= round($argent);
            $arrondit .= 'k';
        }
        else{
            $arrondit = $argent;
        }
        echo $arrondit;
    }
}

function getInventorySpaces($array){
    $return = 0;

    foreach($array as $key){
        $return +=20;
    }

    return $return;
}

function getBagSpaces($array){
    $return = 0;
    foreach($array as $key){
        $foods = explode('-', $key['Contenu']);
        if($foods[0]){
            $return += count($foods);
        }
    }
    return $return;
}

?>