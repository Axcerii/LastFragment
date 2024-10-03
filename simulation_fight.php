<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulateur de combat</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fight.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
</head>
<header style = 'display:none;'>
<?php
include_once "php/header.php";
include_once "php/Redirecteur.php";
include_once "php/bdd.php";
?>
</header>


<?php
    $Personnages_table = fetchEverything('fiche');
    $Joueurs_table = fetchEverything('joueurs');
    $Bestiaire_table = fetchEverything('bestiaire');
    
    $nombre_carte = 24;
?>


<div class="droite_menu">
    <button class="droite_menu_button" id="ouvrirModal">
        <img src="Image/Objets/Attaque.svg" alt="Attaquer" class="droite_menu_svg golden_svg_filter">
    </button>
    <button class="droite_menu_button" id='dice'>
        <img src="Image/Objets/Dice.svg" alt="Dé" class="droite_menu_svg golden_svg_filter">
    </button>
    <button class="droite_menu_button" id='obs-window-button'>
        <img src="Image/Objets/mini-screen.svg" alt="Dé" class="droite_menu_svg golden_svg_filter">
    </button>
</div>

<div class='obs-window' id='obs-window'>

</div>

<body>
    <div class="ajouter_personnage">
        <?php
            for($ii = 1; $ii <= $nombre_carte; $ii++){
                echo "<div class='ajouter_personnage-div-image' id='image-$ii'></div>";
            } 
        ?>
        <button class="ajouter_personnage-button" onclick="créer_carte()"> <p>+</p> </button>
        <div class="options">
            <select name="personnage" id="personnageAAjouter" class="ajouter_personnage-select">
                <optgroup label = "Nouveau">
                    <option value="new-0">Nouveau</option>
                </optgroup>
                <optgroup label = "Joueurs">
                    <?php
                        foreach($Joueurs_table as $key => $value){
                            echo "<option value='joueurs-".$value['id']."'>".$value['Nom']."(Joueur)</option>";
                        }
                    ?>
                </optgroup>
                <optgroup label = "Personnages">
                    <?php
                    foreach($Personnages_table as $key => $value){
                        echo "<option value='fiche-".$value['id']."'>".$value['Nom']."</option>";
                    }
                    ?>
                </optgroup>
                <optgroup label = "Bestiaire">
                    <?php
                    foreach($Bestiaire_table as $key => $value){
                        echo "<option value='bestiaire-".$value['id']."'>".$value['Nom']."</option>";
                    }
                    ?>
                </optgroup>
            </select>
            <label for="hide_stats" class="cacher_statistiques">
                <input type="checkbox" name="cacher" id="hide_stats">
                <p style="margin-left: 1em"> Cacher les stats </p>
            </label>
        </div>
    </div>

    <div class="cartes_personnage">
        <?php
            for($ii = 1; $ii <= $nombre_carte; $ii++){
                echo "<div class='carte-id hidden-card' id='carte-$ii'></div>";
            } 
        ?>
    </div>


    <div id="modal" class="modal">
        <div class="modal-contenu">
            <button id="fermerModal" class="fermer-modal">&times;</button>
            <p>Attaquer</p>

            <div class='radio-select'>
                <label for="attaque-force" class='radio_attaque'>
                    <input type="radio" name="attaque" id="attaque-force" checked>
                    <div class="green-screen"></div>
                    Force
                </label>
                <label for="attaque-maitrise" class='radio_attaque'>
                    <input type="radio" name="attaque" id="attaque-maitrise">
                    <div class="green-screen"></div>
                    Maîtrise
                </label>
            </div>
            <div class='modal_attaque_joueur'>
                <div class='attaquant modal_attaque_joueur_colonne' style='border-right: 2px var(--mypurple) solid'>
                    <div class='div-role'>
                        <label for="">Attaquant :</label>
                            <select name="" id="attaquant-select" class='modal_select'>
                            
                            </select>
                        </div>
                    <div class='div-stat'>
                        <p>Stat :</p>
                        <input type="text" value="" id='attaquant-stat'>
                        <input type="text" value="0" id='attaquant-bonus' class='bonus'>
                    </div>
                    <div class='div-stat'>
                        <button class='roll-button' id='roll-button' onclick="roll20()">Roll :</button>
                        <input type="text" value="10" id='attaquant-roll'>
                        <input type="text" value="1" id='attaquant-puissance' class='bonus'>
                    </div>
                    <div class='div-calcul'>
                        <p>
                            Stats consommée : <span id='stats_consommée'>0</span>
                        </p>
                    </div>
                </div>
                <div class='defenseur modal_attaque_joueur_colonne'>
                    <div class='div-role'>
                        <label for="">Défenseur :</label>
                        <select name="" id="defenseur-select" class='modal_select'>
                            
                            </select>
                        </div>
                    <div class='div-stat'>
                        <p>Stat :</p>
                        <input type="text" value="" id='defenseur-stat'>
                        <input type="text" value="0" id='defenseur-bonus' class='bonus'>
                    </div>
                    <div class='div-stat'>
                        <p>Bonus :</p>
                        <input type="text" value="1" id='multiplier'>
                    </div>
                    <div class='div-calcul'>
                        <p>
                            Dégâts Reçus : <span id='degats_recus'>0</span>
                        </p>
                    </div>
                </div>
            </div>
            <button class="bouton-classique" onclick="validerAttaque()">Valider</button>
        </div>
    </div>
    <div class='modal' id='modal-2'>
        <div class='modal-contenu' id="modal-contenu-dice">
            <p>Dice</p>
            <button id="fermerModal-2" class="fermer-modal">&times;</button>
            <div class='modal_attaque_joueur'>
                <div class='attaquant modal_attaque_joueur_colonne' style='border-right: 2px var(--mypurple) solid'>
                    <div class='div-role'>
                        <label for="">Executeur :</label>
                            <select name="" id="dice-select-1" class='modal_select'>
                            
                            </select>
                    </div>
                    <div class='div-role'>
                        <label for="">Stats: </label>
                        <select name="" id="dice-exe-select" class='modal_select'>
                            <option value="QDF">QDF</option>
                            <option value="HP">HP</option>
                            <option value="END">END</option>
                            <option value="MDF">MDF</option>
                            <option value="FOR">FOR</option>
                            <option value="DEF">DEF</option>
                            <option value="ACC">ACC</option>
                            <option value="VIT">VIT</option>
                            <option value="PER">PER</option>
                            <option value="FUR">FUR</option>
                            <option value="CHA">CHA</option>
                            <option value="ELO">ELO</option>
                            <option value="INT">INT</option>
                        </select>
                    </div>
                        
                    <div class='div-stat'>
                        <p>Stat :</p>
                        <input type="text" value="" id='exe-stat'>
                        <input type="text" value="0" id='exe-bonus' class='bonus'>
                    </div>

                    <div class='div-stat'>
                        <button id='roll-button-dice'  class='roll-button' onclick="roll100()">Roll :</button>
                        <input type="text" value="50" id='exe-roll'>
                    </div>
                </div>
                <div class='defenseur modal_attaque_joueur_colonne'>
                    <div class='div-role'>
                        <label for="">Cible :</label>
                        <select name="" id="dice-select-2" class='modal_select'>
                            
                        </select>
                    </div>
                    <div class='div-role'>
                        <label for="">Stats: </label>
                        <select name="" id="dice-cible-select" class='modal_select'>
                            <option value="QDF">QDF</option>
                            <option value="HP">HP</option>
                            <option value="END">END</option>
                            <option value="MDF">MDF</option>
                            <option value="FOR">FOR</option>
                            <option value="DEF">DEF</option>
                            <option value="ACC">ACC</option>
                            <option value="VIT">VIT</option>
                            <option value="PER">PER</option>
                            <option value="FUR">FUR</option>
                            <option value="CHA">CHA</option>
                            <option value="ELO">ELO</option>
                            <option value="INT">INT</option>
                        </select>
                    </div>
                    <div class='div-stat'>
                        <p>Stat :</p>
                        <input type="text" value="" id='cible-stat'>
                        <input type="text" value="0" id='cible-bonus' class='bonus'>
                    </div>
                </div>
            </div>
            <button class="bouton-classique" onclick="validerDice()" style="margin-top: 5%;">Valider</button>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/fight/obs_window.js"></script>
    <script src="js/fight/carte.js"></script>
    <script src="js/fight/attack_modal.js"></script>
    <script src="js/fight/dice_modal.js"></script>
</body>
</html>