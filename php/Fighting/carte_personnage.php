<?php

$vierge = ['Nom' => 'Entité Non Répertoriée',
'Image' => 'Image/Serena.jpg',
'QdF' => 1,
'Sante' => 1,
'Endurance' => 1,
'Maitrise' => 0,
'Strength' => 0,
'Defense' => 0,
'Accuracy' => 0,
'Vitesse' => 0,
'Perception' => 0,
'Furtivite' => 0,
'Charisme' => 0,
'Eloquence' => 0,
'SexAbility' => 0];

include_once '../bdd.php';
include_once '../Profil_Elements/Profil-Function.php';

$table = $_POST['table'];
$id = $_POST['id'];
$pointer = $_POST['pointer'];

if($table == 'new'){
    $informations_card = $vierge;
}
else{
    $informations_card = fetchRow($table, $id);
    $informations_card = $informations_card[0];
}

$bonus = getPassivesChanges($informations_card, get_passif($informations_card));

créer_carte($informations_card, $bonus, $pointer);



?>




<?php

function créer_carte($row, $bonus = [
    'QdF' => 0,
    'Sante' => 0,
    'Endurance' => 0,
    'Maitrise' => 0,
    'Strength' => 0,
    'Defense' => 0,
    'Accuracy' => 0,
    'Vitesse' => 0,
    'Perception' => 0,
    'Furtivite' => 0,
    'Charisme' => 0,
    'Eloquence' => 0,
    'SexAbility' => 0
], $pointer){

    echo "   
    <div class='cartes_personnage-carte'>
            <div class='row'>
                    <input class='cartes_personnage-legend' type='text' value='".$row['Nom']."'>
                    <div class='cartes_personnage-carte-column column-1'>
                        <img src='".$row['Image']."' alt='Image du Personnage' class='cartes_personnage-carte-img' onload='loadArmor(".$pointer.")'>
                        <div class='cartes_personnage-carte-stat stats-1'>
                            <div>
                                <p class='label-qdf'>QDF :</p>
                                <input type='text' value='".$row['QdF']."' class='quantité'>
                                <input type='text' value='".$bonus['QDF']."' class='bonus-stats hidden'>
                                <input type='text' value='0' class='bonus-armure hidden'>
                                <input type='hidden' class='max-qdf' value='".$row['QdF']."'>
                                <input type='hidden' class='state-qdf' value='0'>
                            </div>
                            <div class='cartes_personnage-carte-stat-buttons'>
                                <button onclick='reduceStats(0, -100, $pointer)'>-100</button>
                                <button onclick='reduceStats(0, -200, $pointer)'>-200</button>
                                <button onclick='reduceStats(0, -300, $pointer)'>-300</button>
                                <button onclick='reduceStats(0, -400, $pointer)'>-400</button>
                            </div>
                        </div>
                        <div class='cartes_personnage-carte-stat stats-1'>
                            <div>
                                <p class='label-hp'>HP :</p>
                                <input type='text' value='".$row['Sante']."' class='santé'>
                                <input type='text' value='".$bonus['HP']."' class='bonus-stats hidden'>
                                <input type='text' value='0' class='bonus-armure hidden'>
                                <input type='hidden' value='0' class='state-hp'>
                            </div>
                            <div class='cartes_personnage-carte-stat-buttons'>
                                <input type='text' value='-250'>
                                <button class='cartes_personnage-carte-stat-buttons-apply' onclick='reduceHP($pointer)'>Apply</button>
                            </div>
                        </div>
                        <div class='cartes_personnage-carte-stat stats-1'>
                            <div>
                                <p class='label-end'>END :</p>
                                <input type='text' value='".$row['Endurance']."' class='endurance'>
                                <input type='text' value='".$bonus['END']."' class='bonus-stats hidden'>
                                <input type='text' value='0' class='bonus-armure hidden'>
                                <input type='hidden' class='max-end' value='".$row['Endurance']."'>
                                <input type='hidden' class='state-end' value='0'>
                            </div>
                            <div class='cartes_personnage-carte-stat-buttons'>
                                <button onclick='reduceStats(2, -25, $pointer)'>-25</button>
                                <button onclick='reduceStats(2, -50, $pointer)'>-50</button>
                                <button onclick='reduceStats(2, -75, $pointer)'>-75</button>
                                <button onclick='reduceStats(2, -100, $pointer)'>-100</button>
                            </div>
                        </div>
                    </div>
                    <div class='cartes_personnage-carte-column column-2'>
                        <div class='cartes_personnage-carte-stat'>
                            <p>MDF :</p>
                            <input type='text' value='".$row['Maitrise']."'>
                            <input type='text' value='".$bonus['MDF']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                        <div class='cartes_personnage-carte-stat'>
                            <p>FOR :</p>
                            <input type='text' value='".$row['Strength']."'>
                            <input type='text' value='".$bonus['FOR']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                        <div class='cartes_personnage-carte-stat'>
                            <p>DEF :</p>
                            <input type='text' value='".$row['Defense']."'>
                            <input type='text' value='".$bonus['DEF']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                        <div class='cartes_personnage-carte-stat'>
                            <p>ACC :</p>
                            <input type='text' value='".$row['Accuracy']."'>
                            <input type='text' value='".$bonus['ACC']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                        <div class='cartes_personnage-carte-stat'>
                            <p>VIT :</p>
                            <input type='text' value='".$row['Vitesse']."'>
                            <input type='text' value='".$bonus['VIT']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                    </div>
                    <div class='cartes_personnage-carte-column column-3'>
                        <div class='cartes_personnage-carte-stat'>
                            <p>PER :</p>
                            <input type='text' value='".$row['Perception']."'>
                            <input type='text' value='".$bonus['PER']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                        <div class='cartes_personnage-carte-stat'>
                            <p>FUR :</p>
                            <input type='text' value='".$row['Furtivite']."'>
                            <input type='text' value='".$bonus['FUR']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                        <div class='cartes_personnage-carte-stat'>
                            <p>CHA :</p>
                            <input type='text' value='".$row['Charisme']."'>
                            <input type='text' value='".$bonus['CHA']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                        <div class='cartes_personnage-carte-stat'>
                            <p>ELO :</p>
                            <input type='text' value='".$row['Eloquence']."'>
                            <input type='text' value='".$bonus['ELO']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                        <div class='cartes_personnage-carte-stat'>
                            <p>INT :</p>
                            <input type='text' value='".$row['SexAbility']."'>
                            <input type='text' value='".$bonus['INT']."' class='bonus-stats'>
                            <input type='text' value='0' class='bonus-armure'>
                        </div>
                    </div>
                </div>

                <div class='row' style='margin-top: 2em;'>
                    <div class='armure'>";
                    if(isset($row['Casque'])){
                        créer_div_armure($row);    
                    }
                    else{
                        créer_div_armure();
                    }
                  echo "</div>
                </div>
        </div>
    ";
    echo "<script>console.log(";
    print_r($casques);
    echo ")</script>";
}

function créer_select_armure($armor_list, $equipé = false){
    echo "<select>";

    if($equipé){
        foreach($armor_list as $key => $value){
            if($equipé == $value['Nom']){
                 echo "<option value = '".$value['Stats']."|".$value['Valeurs']."'>".$value['Nom']."</option>";
                 unset($armor_list[$key]);
            }
        }
    }

    echo "<option value='DEF|0'>Rien</option>";
        foreach($armor_list as $value){
            echo "<option value = '".$value['Stats']."|".$value['Valeurs']."'>".$value['Nom']."</option>";
        }
    echo"</select>";
}

function créer_div_armure($equiped = false){
    $casques = executerSQL("SELECT * FROM armure WHERE Emplacement = 1");
    $torses = executerSQL("SELECT * FROM armure WHERE Emplacement = 2");
    $gantelets = executerSQL("SELECT * FROM armure WHERE Emplacement = 3");
    $jambieres = executerSQL("SELECT * FROM armure WHERE Emplacement = 4");

    if($equiped){
        créer_select_armure($casques, $equiped['Casque']);
        créer_select_armure($torses, $equiped['Plastron']);
        créer_select_armure($gantelets, $equiped['Gantelets']);
        créer_select_armure($jambieres, $equiped['Jambieres']);
    }
    else{
        créer_select_armure($casques);
        créer_select_armure($torses);
        créer_select_armure($gantelets);
        créer_select_armure($jambieres);
    }
}

function get_passif($row){
    $passifs = executerSQL('SELECT * FROM passif WHERE Joueur = "'.$row['Nom'].'"');
    return $passifs;
}

function getPassivesChanges($character, $playerPassives){
    $bonus = ['QDF' => 0, 'MDF' => 0, 'FOR' => 0, 'DEF' => 0, 'HP' => 0, 'END' => 0, 'VIT' => 0, 'ACC' => 0, 'PER' => 0, 'FUR' => 0, 'CHA' => 0, 'ELO' => 0, 'INT' => 0];
    
    foreach($playerPassives as $key){
        //On vérifie si le pasif est actif

            //On vérifie que le passif modifie bien des stats
            if($key['Stats'] != 'None'){
                
            //On vérifie que le passif n'est pas dans la liste.
            if(isItSpecial($key['Nom'])){
                if(strtolower($key['Nom']) == 'introverti' && $key['Activation']){
                    $converter = ceil($character['Eloquence']*0.3);
                    $bonus['ELO'] -= $converter;
                    $bonus['FUR'] += $converter;
                }
                else if(strtolower($key['Nom']) == 'alcoolique'){
                    if($key['Activation']){
                        $bonus['MDF'] += ceil($character[convertStatsNotation('MDF')] * 0.05);
                        $bonus['FOR'] += ceil($character[convertStatsNotation('FOR')] * 0.05);  
                        $bonus['DEF'] += ceil($character[convertStatsNotation('DEF')] * 0.05);  
                        $bonus['VIT'] += ceil($character[convertStatsNotation('VIT')] * 0.05);  
                        $bonus['ACC'] += ceil($character[convertStatsNotation('ACC')] * 0.05);  
                    }
                    else{
                        $bonus['MDF'] -= ceil($character[convertStatsNotation('MDF')] * 0.1);
                        $bonus['FOR'] -= ceil($character[convertStatsNotation('FOR')] * 0.1);  
                        $bonus['DEF'] -= ceil($character[convertStatsNotation('DEF')] * 0.1);  
                        $bonus['VIT'] -= ceil($character[convertStatsNotation('VIT')] * 0.1);  
                        $bonus['ACC'] -= ceil($character[convertStatsNotation('ACC')] * 0.1);  
                    }
                }
            }
            
            
            //Si le passif n'est pas spécial : 
                else{
                    if($key['Activation']){
                    $stats = getStats($key['Stats']);
                    $valeurs = getStats($key['Valeurs']);
                    
                    for($jj = 0; $jj < count($valeurs); $jj++){
                        $valeurs[$jj] -= 1;
                    }
                    
                    if(count($stats) == count($valeurs)){
                        for($ii = 0; $ii < count($valeurs); $ii++){
                            $bonus[$stats[$ii]] += ceil($valeurs[$ii] * $character[convertStatsNotation($stats[$ii])]); 
                        }
                    }
                    else{
                        echo 'Erreur dans le nombre de stats / valeurs de la table passif : '.$key['Nom'];
                    }
                }
            }
        }
    }

    return $bonus;
}

function isItSpecial($passif){
    $special = ['Alcoolique', 'Introverti'];
    
    foreach($special as $key){
        if(strtolower($key) == strtolower($passif)){
            return true;
        } 
    }
    return false;
}

function getStats($stats){
    return explode(',', $stats);
}



?>
