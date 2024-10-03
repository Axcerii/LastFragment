<?php
include_once 'php/bdd.php';
include_once 'php/Profil_Elements/Profil-Function.php';
include_once 'php/functionMarket.php';
?>
<!-- On récupère le personnage -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/FichePersonnage.css">
    <link rel="stylesheet" href="php/Profil_Elements/Competence.css">
    <link rel="stylesheet" href="css/profil/inventory.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php
include_once 'php/Profil_Elements/Badge.php';
?>

<!-- Pour des effets de styles personnalisées -->
    <div class='background_pattern'></div>
    <div class="trainee"></div>
    <div class="circle"></div>

    <div class="background-pattern"></div>
    <div class="background-pattern-radial"></div>

    <?php
    include_once "php/header.php";

    if($_SESSION['connexion']){

    }
    else{
        header('Location: Connexion.php');
    }
    ?>

    <?php
            $all = fetchEverything('joueurs');
            $armure = fetchEverything('armure');
            $passifs = fetchEverything('passif');
            $armorName = fetchcolonne('Nom', 'armure');
            $etat = executerSQL("SELECT Porte FROM etat WHERE id = 1")[0];

        if(isset($_POST['ID'])){
            $id = $_POST['ID'];
            for($ii = 0; $ii < count($all) ; $ii++){
                if($all[$ii]['Nom'] == $id){
                    $j = $ii; 
                }
            }
        }

        else{
            $id = $_SESSION['name'];

            for($ii = 0; $ii < count($all) ; $ii++){
                if($all[$ii]['Nom'] == $id){
                    $j = $ii; 
                }
            }
        }


        echo '<link rel="stylesheet" href="css/spéciaux/'.$id.'.css">
        <script src="js/spéciaux/'.$id.'.js"></script>';

        if($id == 'Gira'){  
        echo '
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=UnifrakturMaguntia">';
        }
        else if($id == 'Shuri'){  
            echo '
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">';
        }
        else if($id == 'Zayath'){  
            echo '
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">';
        }
        else if($id == 'Gora'){  
            echo '
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas Neue">';
        }
        
        //$id--;
        

        $character = $all[$j];
        $playerPassives = getPlayerPassives($character['Nom'], $passifs);
        $passivesBonus = getPassivesChanges($character, $playerPassives);
        $objets = fetchEverything('objets');
        $sacs = fetchEverything('sac_nourriture');
        $aliments = fetchEverything('aliments');


        $bags = getEveryBag($character, $objets, $sacs);

        printFoodBags($bags, $aliments);
    ?>
    
    

    <title><?php echo $character['Nom'];?></title>

    <h1><?php echo $character['Nom'];?></h1>
    <div class='fiche' id='fiche'>
        <div class='character'>
            <img class='personnage_img'src='<?php echo $character['Image'];?>'>
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
                            <td id="Theme"> <?php echo $character['Theme'];?></td>
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
                    </tbody>
                </table>
            </div>
        </div>

        
        
        <?php
            $armor = getArmor($character);
            $armor2 = getEquipedArmorInfo($armor, $armure);
            

            $armorBonus = getArmorBonus($armor2);
        ?>


        <div class='s-conso'>
            <table>
                <tbody>
                    <?php 
                        afficherStatsConso($character, $armorBonus, $passivesBonus);
                    ?>
                </tbody>
            </table>
        </div>

        <div class ='stats'>
            <div class='s-combat'>
                <table>
                    <caption>Statistiques de Combat</caption>
                    <tbody>
                        <?php
                            afficherStatsEC($character, $armorBonus, $passivesBonus);
                        ?>
                    </tbody>
                </table>
            </div>
            <div class='s-base'>
                <table>
                    <caption>Statistiques Hors-Combat</caption>
                    <tbody>
                        <?php
                            afficherStatsHC($character, $armorBonus, $passivesBonus);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class='s-globale'>
            <p>
                <span class='s-globale-titre'>Puissance Totale :</span>
            <?php echo calculStatGlobale($character);?><span class='s-globale-passif'><?php echo calculPassiveGlobale($passivesBonus)?></span>
            </p>
        </div>

        <div class='comp-arrow-container'>
            <div class='comp-arrow'></div>
        </div>
        <div id='Competences' class="competences">
        </div>

        <script>
            function afficherCompetence(){
                $(document).ready(function(){
			    var tableau = <?php echo(arrayToAjax($character))?>;
			$.ajax({
				type: "POST",
				url: "php/Profil_Elements/Competence.php",
				data: {tableau: tableau},
				success: function(data){
                    $('#Competences').html(data);
                }
			});
		});
            }

            afficherCompetence();

        </script>

        <?php
                if($character['Link'] != 'None'){
                    echo '
                    <div class="Link">
                    <div style="display:flex; flex-direction: row;">
                    <button id="toggleButton" class="arrow-down"></button>
                    <p class="afficher-lore"> Afficher Lore </p>
                    </div>
                    <div id="textContainer" class="hidden">
                        <p class="Link2"></p>
                    </div>
                    </div>
                    <script> $(".Link2").load("'.$character['Link'].'") </script>';
                }
        ?>
        <div class='Inventory'>
                    <?php
                        $who = fetchcolonne('appartenance', 'objets');
                        $appartenance = [];
                        $for = count($who);

                        for($ii = 0; $ii < $for; $ii++){
                            if($who[$ii] == $character['Nom']){
                                array_push($appartenance, $objets[$ii]);
                            }
                        }
                        
                        $argents = fetchEverything('argent');
                        
                        foreach($argents as $key){
                            if($key['qui'] == $character['Nom']){
                                $argent = $key['argent'];
                                $badge = $key['token'];
                            }
                        }

                        $appartenance = trierParPoids($appartenance);
                    ?>

                <?php afficherBadges($character, $badge)?>

                <div class="Coffre" id="Passif">
                    <table class="table_inventory">
                        <caption>Passifs</caption>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Description</td>
                                <td class="td-activation">Activation</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $idPassif = 0;
                            foreach($playerPassives as $key){
                                $idPassif++;
                                echo 
                                '<tr>
                                    <td style ="text-align: center;">'.$key['Nom'].'</td>
                                    <td id ="passif_'.$idPassif.'"></td>
                                    <td class="td-activation">';
                                    if($key['Activation']){
                                        echo '<form action ="php/deactivatePassif.php" method="post">
                                        <button class= "equip passif deactivate">Désactiver</button>
                                        <input type="hidden" name="id" value="'.$key['id'].'">
                                        </form>';
                                    }
                                    else{
                                        echo '<form action ="php/activatePassif.php" method="post">
                                        <button class= "equip passif activate">Activer</button>
                                        <input type="hidden" name="id" value="'.$key['id'].'">
                                        </form>';
                                    }
                                    
                                echo '</td>
                                </tr>
                                <script> $("#passif_'.$idPassif.'").load("'.$key['Link'].'")</script>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                            
                <h2 style='text-align: center; margin-top: 3em;'>
                    <?php
                    if($etat['Porte']){
                        echo "<a href='Inventaire' style='color: var(--mywhite)'>Inventaires</a>";
                    }
                    else{

                        echo "Inventaires";
                    }
                    ?>
                </h2>

                <div class='argents-emplacements'>
                    <p style='text-align: left; margin-right: 1em;' class='money'>Emplacements Totaux : <span id="Emplacement_totaux">0</span></p>
                    <p style='text-align: right; margin-right: 1em;' class='money'>Argent : <?php argentArrondit($argent, $character['Nom'])?> pièces d'Or</p>
                </div>
                
                <div class="fieldset-badges fieldset-inventaire">
                    <label for="Sac">
                        Main
                        <input type="radio" id="Sac" value="Sac" name="Inventaire" onchange="gestionnaireInventaire()" checked />
                        <div class="green-screen"></div>
                    </label>
                    <label for="Sacados">
                        Sac
                        <input type="radio" id="Sacados" value="Sacados" name="Inventaire" onchange="gestionnaireInventaire()" />
                        <div class="green-screen"></div>
                    </label>
                    <label for="Coffre">
                        Coffre
                        <input type="radio" id="Coffre" value="Coffre" name="Inventaire" onchange="gestionnaireInventaire()">
                        <div class="green-screen"></div>
                    </label>
                    <label for="Cheval-radio">
                        Cheval
                        <input type="radio" id="Cheval-radio" value="Cheval" name="Inventaire" onchange="gestionnaireInventaire()">
                        <div class="green-screen"></div>
                    </label>
                </div>


                <div class='Coffre' id='portée'>
                            <?php newAffichageInventaire($appartenance, 'Porté', $armorName, $armor, $armure, $character, true);?>
                </div>
                <div class='Coffre' id='Sacados-conteneur'>
                            <?php newAffichageInventaire($appartenance, 'Sac', $armorName, $armor, $armure, $character, false);?>
                </div>
                <div class='Coffre' id='Cheval'>
                            <?php newAffichageInventaire($appartenance, 'Cheval', $armorName, $armor, $armure, $character, false);?>
                </div>
                <div class='Coffre' id='Stockage'>
                            <?php newAffichageInventaire($appartenance, 'Coffre', $armorName, $armor, $armure, $character, false);?>
                </div>
            </div>
            <!--             <div class='passif'>
                <div class='hexagon'>
                    <div class='hexagon_1'></div>
                    <div class='hexagon_2'> <p class="passif_name"> Rat </p></div>
                    <div class='hexagon_3'></div>
                </div>
            </div> -->
        </div>
    </div>
    <div id="Modifier_Armure">
        <form action="php/fittingRoom.php" method="post">
            <input type="hidden" value="<?php echo $character['Nom'];?>" name="joueur">
            <?php
            echo '<h2 style = "text-align: center; font-size: 1.2em;">Armure</h2>';
            selectArmor($appartenance, $character, $armure, $armor);
            
            $ii = 0;

            echo '<input type="hidden" value="'.count($playerPassives).'" name="count"><h2 style = "text-align: center; font-size: 1.2em;">Passifs</h2><div class="passif-check">';
            foreach($playerPassives as $key){

                echo '
                <div>
                <label for="passif_'.$ii.'" class="label-passif">'.
                $key['Nom'].'</label>
                <label class="toggle-switch">
                <input name="passif_'.$ii.'" type="checkbox"';

                if($key['Activation']){
                    echo 'checked';
                }                        
                echo '>
                <span class="toggle-slider"></span>
                </label></div>
                <input type ="hidden" value ="'.$key['id'].'" name="id_'.$ii.'">';

                $ii++;
            }
            ?>
            <button type="submit" class="equip">Valider</button>
            </div>
        </form>
    </div>
    
    <div id="blackScreen" class="blackScreen">
    </div>

    <div id="blackScreen2" class="blackScreen">
    </div>

    <div id="blackscreen3" class="blackScreen">
    </div>

    <div id="arrow" class="arrow">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div id="arrow2" class="arrow">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div id='bag'>
        <img src="Image/Objets/Apple.svg" alt="">
    </div>

<!-- Function COMPETENCE JAVASCRIPT -->

<script>
    function afficherComp(val){
           var id = '#comp-form-'+val;
           var tableau = <?php echo arrayToAjax($character)?>;

            $.ajax({
            type: 'POST',
            url: 'php/Profil_Elements/Competence2.php',
            data: {
            stats: $(id).serialize(),
            tableau: tableau
        },
            success: function(data) {
                $('#comp-affichage').html(data);
            }
            });
    }

    var capacitePort = <?php echo(calculPoids($character['Strength']));?>;
</script>
<script src='js/profil.js'></script>
<script src='js/Elements/inventaire.js'></script>
</body>
</html>

<?php
//////////////////////////////////////////////////////////////////
/////////////////////////////Function/////////////////////////////
//////////////////////////////////////////////////////////////////

function getArmorSlot($armor, $table){
    foreach($table as $key){
        if(strtolower($key['Nom']) == strtolower($armor)){
            if($key['Emplacement'] == 1){
                return 'Casque';
            }
            else if ($key['Emplacement'] == 2){
                return 'Plastron';
            }
            else if ($key['Emplacement'] == 3){
                return 'Gantelets';
            }
            else if ($key['Emplacement'] == 4){
                return 'Jambieres';
            }
        }
    }
    return 0;
}

function cap($character, $stats){

    $stats = convertStatsNotation($stats);

    if($stats == 'QdF'){
        $statsCap = ($character[$stats]/3000)*100;
    }
    else if ($stats == 'Sante'){
        $statsCap = ($character[$stats]/9000)*100;
    }
    else if ($stats == 'Endurance'){
        $statsCap = ($character[$stats]/2000*100);
    }
    else{
        $statsCap = $character[$stats];
    }

    if($statsCap > 100){
        $statsCap = 100;
    }
    else{
        $statsCap = $statsCap;
    }
    return $statsCap;
}

function afficherStats($character, $stats, $armorBonus, $passivesBonus){


    //Afficher les compétences

    if($stats == 'VIT'){
        if($character['Strength'] >= 60 && $armorBonus < 0){
            $armorBonus = 0;            
        }
    }
    else if ($stats == 'ACC'){
        if($character['Accuracy'] >= 50 && $armorBonus < 0){
            $armorBonus = 0;
        }
    }

    $statsCap = cap($character, $stats);

    if($armorBonus > 0){
        $signe_armor = '+';
    }
    else{
        $signe_armor = '';
    }

    if($passivesBonus > 0){
        $signe_passif = '+';
    }
    else{
        $signe_passif = '';
    }

    $totalBonus = $armorBonus + $passivesBonus;


    if($totalBonus < 0){

        $afficherPassifBonus = $statsCap;

        $afficherBonus = $statsCap + $passivesBonus;

        $statsCap += $armorBonus + $passivesBonus;

        $color = '--darkflux';
        $passifColor = '--darkaltcolor';
    }
    else{
        $afficherBonus = $statsCap + $armorBonus + $passivesBonus;
        $afficherPassifBonus = $statsCap + $passivesBonus;
        $color = '--smoothflux';
        $passifColor = '--altcolor';
    }

    $finalStat = $totalBonus + $character[convertStatsNotation($stats)];


    echo " 
    <tr>
    <td class='titre_stat'>".convertStatsAffichage($stats)." </td>
    <td class='valeur_stat'>";

    if($totalBonus != 0){
        echo '<span class="stats-value" data-tooltip="'.$finalStat.'">'.$character[convertStatsNotation($stats)].'</span>';
    }
    else{
        echo $character[convertStatsNotation($stats)];
    }

    if($armorBonus != 0){
        echo "<span style ='color: var(".$color.");'>".$signe_armor.$armorBonus.'</span>';
    }

    if($passivesBonus != 0){
        echo "<span style = 'color: var(".$passifColor.");'>".$signe_passif.$passivesBonus."</span>";
    }

    



    
    echo "</td>
    <!-- Barre de statistiques -->
    <td class='barre-statistique'> 
        <div class='barre-statistique-background'>
            <div class='new-barre' data-progression=".$statsCap."%></div>
            <div class='new-barre armor-barre' style ='background-color:var(".$color.");' data-progression=".$afficherBonus."%></div>
            <div class='new-barre passif-barre' style= 'background-color:var(".$passifColor.");' data-progression=".$afficherPassifBonus."%></div>
        </div>
    </td>
    </tr>";
}

function afficherStatsConso($character, $armorBonus, $passivesBonus){

    $qdfWidth = $character['QdF']/30;
    if($qdfWidth > 100){
        $qdfWidth = 100;
    }

    $hpWidth = $character['Sante']/30;
    if($hpWidth > 100){
        $hpWidth = 100;
    }

    $endWidth = $character['Endurance']/30;
    if($endWidth > 100){
        $endWidth = 100;
    }

    echo "<tr class='ligne-conso'>
        <td class='titre_stat'> QDF </td>
        <td class='td-barre-conso'>
            <div class='barre-conso' id='QDF'></div> 
            <div class='barre-conso barre-conso-anim' style='width: $qdfWidth% ; background: rgba(150,255,150,1)'></div>
        </td>
        <td style='text-align: right;'>".$character['QdF']."/3000</td>
    </tr>";

    echo "<tr class='ligne-conso'>
        <td class='titre_stat'> HP </td>
        <td class='td-barre-conso'> 
            <div  class='barre-conso' id='HP'></div>
            <div class='barre-conso barre-conso-anim' style='width: $hpWidth% ; background: rgba(255,0,0,1)'></div>
        </td>
        <td style='text-align: right;'>".$character['Sante']."/3000</td>
    </tr>";

    echo "<tr class='ligne-conso'>
        <td class='titre_stat'> END </td>
        <td class='td-barre-conso'> 
            <div class='barre-conso' id='END'></div>
            <div class='barre-conso barre-conso-anim' style='width: $endWidth% ; background: rgba(255,255,150,1)'></div>
        </td>
        <td style='text-align: right;'>".$character['Endurance']."/2000</td>
    </tr>";
}

function afficherStatsEC($character, $armorBonus, $passivesBonus){
    $ECStats = ['MDF', 'FOR', 'DEF', 'VIT', 'ACC'];

    for($ii = 0; $ii < 5; $ii++){
        $abrv = $ECStats[$ii];
        afficherStats($character, $abrv, $armorBonus[$abrv], $passivesBonus[$abrv]);
    }
}

function afficherStatsHC($character, $armorBonus, $passivesBonus){
    $HCStats = ['PER', 'FUR', 'CHA', 'ELO', 'INT'];

    for($ii = 0; $ii < 5; $ii++){
        $abrv = $HCStats[$ii];
        afficherStats($character, $abrv, $armorBonus[$abrv], $passivesBonus[$abrv]);
    }
}

function getStats($stats){
    return explode(',', $stats);
}

function getArmorBonus($armorPlayer){
    $nombreEquipement = count($armorPlayer);
    $bonus = ['QDF' => 0, 'MDF' => 0, 'FOR' => 0, 'DEF' => 0, 'HP' => 0, 'END' => 0, 'VIT' => 0, 'ACC' => 0, 'PER' => 0, 'FUR' => 0, 'CHA' => 0, 'ELO' => 0, 'INT' => 0];
    for($ii = 0; $ii < $nombreEquipement; $ii++){
        // On récupère les statistiques à augmenter et la valeur à augmenter pour chaque stats
        $statistique = getStats($armorPlayer[$ii]['Stats']);
        $value = getStats($armorPlayer[$ii]['Valeurs']);
        // On check si le nombre de statistique et le nombre de valeur concorde
        if(count($statistique) == count($value)){
            // On créer dans un tableau le totale apporté par l'armure complète dans chaque statistique
            for($jj = 0; $jj < count($value); $jj++ ){
                if($statistique[$jj] == 'QDF'|| $statistique[$jj] == 'MDF' || $statistique[$jj] == 'FOR' || $statistique[$jj] == 'DEF' || $statistique[$jj] == 'HP' || $statistique[$jj] == 'END' || $statistique[$jj] == 'VIT' || $statistique[$jj] == 'ACC' || $statistique[$jj] == 'PER' || $statistique[$jj] == 'FUR' || $statistique[$jj] == 'CHA' || $statistique[$jj] == 'ELO' || $statistique[$jj] == 'INT'){
                    $bonus[$statistique[$jj]] += $value[$jj]; 
                }
                else{
                    echo 'Erreur dans l\'intitulté de la Statistique';
                }
            }
            
        } 
        else{
            echo 'Erreur dans les statistiques de l\'équipement.';
        }
    }
    return $bonus; 
};

function getArmor($joueur){
    $armor[0] = strtolower($joueur['Casque']);
    $armor[1] = strtolower($joueur['Plastron']);
    $armor[2] = strtolower($joueur['Gantelets']);
    $armor[3] = strtolower($joueur['Jambieres']);

    return $armor;
}

//Obtenir les informations du tableau Armure sur un nom de joueur précis

function getEquipedArmorInfo($playerArmor, $armorName){
    //$playerArmor = L'armure du joueur
    //$armorName = Le tableau contenant la table "Armure"

    $return = [];
    foreach($armorName as $key){
        for($ii = 0; $ii < count($playerArmor); $ii++){
            if(strtolower($key['Nom']) == strtolower($playerArmor[$ii])){
                array_push($return, $key);
            }
        }
    }

    return $return;
}

//Vérifier si quelque chose existe

function doesItExist($array, $stat){
    if(isset($array[$stat])){
        return $array[$stat];
    }
    else{
        return 0;
    }
}

//Afficher l'argent du joueur en arrondit

function argentArrondit($argent, $qui){
    if($qui == 'Maha' || $qui == 'Ryry'){
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

//Afficher la rareté avec un nom plutôt qu'un chiffre

function rarity($rarete){
    if ($rarete == 1){
        return 'Commun';
    }
    else if ($rarete == 2){
        return 'Singulier';
    }
    else if ($rarete == 3){
        return 'Rare';
    }
    else if ($rarete == 4){
        return 'Légendaire';
    }
    else if ($rarete == 5){
        return 'Unique';
    }
}

//Vérifier si l'objet est une armure

function isItAnArmor($objet, $array){
    for($ii = 0; $ii < count($array); $ii++){
        if(strtolower($objet) == strtolower($array[$ii])){
            return true;
        }
    }
}

//Vérifier si l'objet de type armure est équipée

function isItEquiped($objet, $equipedArmor){
    for($ii = 0; $ii < count($equipedArmor); $ii++){
        if(strtolower($objet) == strtolower($equipedArmor[$ii])){
            return true;
        }
    }
    return false;
}

//Obtenir tous les passifs d'un joueur en particulier

function getPlayerPassives($playerName, $passifTable){
    $return = [];
    foreach($passifTable as $key){
        if($playerName == $key['Joueur']){
            array_push($return, $key);
        } 
    }

    return $return;
}

//Return True si l'un des passifs est dans la liste des passifs "spéciaux"

function isItSpecial($passif){
    $special = ['Alcoolique', 'Introverti'];
    
    foreach($special as $key){
        if(strtolower($key) == strtolower($passif)){
            return true;
        } 
    }
    return false;
}

//Fonction qui return les changements de stats des passifs
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

function getEveryInventoryArmor($playerInventory, $armorName){
    $return = [];
    foreach($playerInventory as $key){
        if(isItAnArmor($key['nom'], $armorName)){
            array_push($return, $key);
        }
    }
    return $return;
}

//Fonction qui créer un input à choix multiple pour les armures
function selectArmor($playerInventory, $player, $armor, $playerEquipedArmor){
    //$playerInventory = Tableau contenant tous les objets du joueurs
    //$player = Tableau contenant toutes les infos du joueurs ($character)
    //$playerArmorInventory = Toutes les armures dans l'inventaire du joueur, y compris les non-équipée
    //$playerEquipedArmor = Toutes les armures équipées par le joueur
    //$armor = Table Armure

    $armorName = getArrayColumn($armor, 'Nom');

    $playerArmorInventory = getEveryInventoryArmor($playerInventory, $armorName);
    $playerArmorInventory = getArmorInfos($playerArmorInventory, $armor);
    

    $casques = [];
    $plastrons = [];
    $gantelets = [];
    $jambieres = [];
    
    foreach($playerArmorInventory as $key){
        if($key['Emplacement'] == 1){
            array_push($casques, $key);
        }
        else if ($key['Emplacement'] == 2){
            array_push($plastrons, $key);
        }
        else if ($key['Emplacement'] == 3){
            array_push($gantelets, $key);
        }
        else if ($key['Emplacement'] == 4){
            array_push($jambieres, $key);
        }
    }

    createInputSelectArmor($casques, $player, $armor, $playerEquipedArmor, 'Casque');
    createInputSelectArmor($plastrons, $player, $armor, $playerEquipedArmor, 'Plastron');
    createInputSelectArmor($gantelets, $player, $armor, $playerEquipedArmor, 'Gantelets');
    createInputSelectArmor($jambieres, $player, $armor, $playerEquipedArmor, 'Jambières');
}


function createInputSelectArmor($equipement, $player, $armor, $playerEquipedArmor, $label){
    echo '<div class="selection_armor_list"> <label for = "'.$label.'"> '.$label.'</label>';
    echo '<select name="'.$label.'" class="select-armor">';
    
    $ii = 0;
    $bool = true;
    foreach($equipement as $key){
        if(isItEquiped($key['Nom'], $playerEquipedArmor)){
            echo '<option value="'.$key['Nom'].'">'.$key['Nom'].'</option>';
            unset($equipement[$ii]);
            $bool = false;
        }
        $ii++;
    }

    if($bool){
        echo '<option value = "None"> Rien </option>';
    }

    foreach($equipement as $key){
        echo '<option value="'.$key['Nom'].'">'.$key['Nom'].'</option>';
    }

    if($bool == false){
        echo '<option value = "None"> Rien </option>';
    }
    echo '</select> </div>';
}

function getArrayColumn($array, $string){
    $return = [];

    foreach($array as $key){
        array_push($return, $key[$string]);
    }

    return $return;
}

function getArmorInfos($array ,$armor){
    $return = [];

    foreach($armor as $key){
        $return = [];
        foreach($armor as $key){
            for($ii = 0; $ii < count($array); $ii++){
                if(strtolower($key['Nom']) == strtolower($array[$ii]['nom'])){
                    array_push($return, $key);
                }
            }
        }
        return $return;
    }
}

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

function calculPassiveGlobale($passivesBonus){
    $conteneur = $passivesBonus;
    
    $conteneur['QDF'] /= 30;
    $conteneur['HP'] /= 30;
    $conteneur['END'] /= 20;

    $return = 0;

    foreach($conteneur as $value){
        $return += $value;
    }

    $return = floor($return);

    if($return < 0){
    }
    else{
        $return = '+'.$return;
    }

    return $return;
}

/* Calcul Capacité Maximal de Porté */

function calculPoids($FOR){
    return 3+floor($FOR/20);
}

/* Afficher Coffre & Canasson */

function afficherInventaireSecondaire($appartenance, $nom, $armorName, $armor, $armure, $character, $porte){
    echo(
        "<table class='table_inventory'>
        <caption>$nom</caption>
        <thead>
            <tr>
                <td>Type</td>
                <td>Nom</td>
                <td>Poids</td>
                <td class='rarete'>Rareté</td>
                <td>Description</td>
            </tr>
        </thead>"
    );

    $idCoffre = 0;
    foreach($appartenance as $key){
        if($key['localisation'] == $nom){                                  
            $idCoffre ++;
            echo '<tr> <td class="rarete_'.$key['rarete'].'"> <img src="Image/Objets/'.$key['type'].'_'.$key['rarete'].'.png"></td>';
            echo '<td style="text-align: center;">'.$key['nom'].'</td>';

            if($porte){
                if(isItAnArmor($key['nom'], $armorName)){
                    if(isItEquiped($key['nom'], $armor)){
                        echo '<td style="text-align: center; color:green" class="poids">0</td>';
                    }
                    else{
                        echo '<td style="text-align: center;" class="poids">'.$key['poids'].'</td>';
                    }
                }
                else{
                    echo '<td style="text-align: center;" class="poids">'.$key['poids'].'</td>';
                }
            }
            else{
                echo '<td style="text-align: center;">'.$key['poids'].'</td>';
            }

            echo '<td style="text-align: center;" class="rarete">'.rarity($key['rarete']).'</td>';
            echo '<td> <p  id="'.$nom.'_'.$idCoffre.'"></p>';

            if($porte){
                if(isItAnArmor($key['nom'], $armorName)){
                    if(isItEquiped($key['nom'], $armor)){
                        echo '<form action="php/unequip.php" method="post">';
                        echo '<button type ="submit" class="equip unequip"> Déséquiper </button>';
                        echo '<input type = "hidden" value="'.getArmorSlot($key['nom'], $armure).'" name="slot">';
                        echo '<input type = "hidden" value="'.$character['id'].'" name ="joueur">';
                        echo '<input type = "hidden" value ="'.$key['nom'].'" name ="nom">';
                    }
                    else{
                        echo '<form action="php/equip.php" method="post">';
                        echo '<button class="equip"> Équiper </button>';
                        
                            echo '<input type = "hidden" value="'.getArmorSlot($key['nom'], $armure).'" name="slot">';
                            echo '<input type = "hidden" value="'.$character['id'].'" name ="joueur">';
                            echo '<input type = "hidden" value ="'.$key['nom'].'" name ="nom">';
                        }
                        echo '</form>';
                }
            }

            echo '</td> </tr>';
            echo '<script> $("#'.$nom.'_'.$idCoffre.'").load("'.$key['description'].'") </script>';
        }
    }
    echo "<tbody>
    </tbody>
    </table>";
}

/* $appartenance = tableau contenant tous les objets d'un individu
$nom = Le nom afficher de l'inventaire
$armorName = tableau contenant la colonne des noms des armures existantes
$armor = armure porté par le joueur
$armure = tableau contenant toutes la table armure
$character = ligne du joueur dans la table joueur
$porte = booleen qui détermine si depuis ce menu on peut équiper les armures ou non. */

function newAffichageInventaire($appartenance, $nom, $armorName, $armor, $armure, $character, $porte = false){
    echo "<div class='newInventaire'>";

    foreach($appartenance as $key => $value){
        if($value['localisation'] == $nom){

            /* 
            $indicateur :
            0 = L'objet n'est pas dans la sacoche
            1 = L'objet est dans la sacoche
            2 = L'objet est une armure
            3 = L'objet est une armure équipé
            */
            if($porte){
                $indicateur = 1;
                if(isItAnArmor($value['nom'], $armorName)){
                    $indicateur = 2;
                    if(isItEquiped($value['nom'], $armor)){
                        $indicateur = 3;
                    }
                }
            }
            else{
                $indicateur = 0;
            }


            echo "
            <div class='newInventaire-Objet'>
                <div class='Objet-PopUpWindow'>
                    <p class='Objet-Nom'>".$value['nom']."</p>";

                    switch($indicateur){
                        case 0: echo "<p>Poids: <span>".$value['poids']."</span></p>";
                        break;
                        case 1: echo "<p>Poids: <span class='poids'>".$value['poids']."</span></p>";
                        break;
                        case 2: echo "<p>Poids: <span class='poids'>".$value['poids']."</span></p>";
                        break;
                        case 3:  echo "<p> Poids: <span class='poids' style='color: var(--smoothflux); font-weight: bold;'>0</span> (Équipé)</p>";
                        break;
                    }

                    echo "<p class='Objet-Rarete rareté-".$value['rarete']."'>".rarity($value['rarete'])."</p>
                    <p class='Objet-Description'>
                        <script>$('p').last().load('".$value['description']."')</script>
                    </p>
                ";

                switch($indicateur){
                    case 2: 
                        echo '<form action="php/equip.php" method="post">';
                        echo '<button class="equip"> Équiper </button>';
                        
                        echo '<input type = "hidden" value="'.getArmorSlot($value['nom'], $armure).'" name="slot">';
                        echo '<input type = "hidden" value="'.$character['id'].'" name ="joueur">';
                        echo '<input type = "hidden" value ="'.$value['nom'].'" name ="nom">';
                        echo '</form>';
                    break;

                    case 3:
                        echo '<form action="php/unequip.php" method="post">';
                        echo '<button type ="submit" class="equip unequip"> Retirer </button>';
                        echo '<input type = "hidden" value="'.getArmorSlot($value['nom'], $armure).'" name="slot">';
                        echo '<input type = "hidden" value="'.$character['id'].'" name ="joueur">';
                        echo '<input type = "hidden" value ="'.$value['nom'].'" name ="nom">';
                        echo '</form>';
                    break;
                }
                echo "
                </div>
                <div class='Objet-Image'>
                    <p class='objet-nom-image'>".$value['nom']."</p>
                    <img src='Image/Objets/Categorie/".$value['type'].".svg' class='icone-type image-rarity-".$value['rarete']."'>
                    <div class='container-indicateur-poids'>";
                
                if($indicateur == 3){
                    for($ii = 0; $ii < $value['poids']; $ii++){
                        echo "<img src='Image/Objets/Cercle.svg' class='indicateur-poids couleur-équipée'>";
                    }
                }
                else{
                    for($ii = 0; $ii < $value['poids']; $ii++){
                        echo "<img src='Image/Objets/Cercle.svg' class='indicateur-poids'>";
                    }
                }
                
                echo "
                    </div>
                </div>
            </div>
        ";
        }
    }

    echo "</div>";
}

function trierParPoids($tableau) {
    usort($tableau, function($a, $b) {
        return $b['poids'] <=> $a['poids'];
    });
    return $tableau;
}

?>