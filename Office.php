<?php
include_once "php/bdd.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/office.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <title>Back-Office</title>
</head>
<header>
    <?php
    include_once "php/header.php";
    ?>
</header>
<body>
    <?php
    include_once "php/Redirecteur.php";
    ?>
    <div style='margin-top : 2em;'>
        <button class='button_table' id='Personnages'> Personnages </button>
        <button class='button_table' id='Joueurs'> Joueurs </button>
        <button class='button_table' id='Bestiaire'> Bestiaire </button>
        <button class='button_table' id='Objets'> Objets </button>
        <button class='button_table' id='Argent'> Argent </button>
        <button class='button_table' id='Quizz'> Quizz </button>
        <button class='button_table' id='Armure'> Armure </button>
        <button class='button_table' id='Passif'> Passif </button>
        <button class='button_table' id='Competences'> Compétences </button>
        <button class='button_table' id='Sac_nourriture'> Sacs </button>
        <button class='button_table' id='Aliments'> Aliments </button>
        <button class='button_table' id='Badges'> Badges </button>
    </div>
    

    <input type="text" id="searchInput" placeholder="Rechercher..." style="margin-top: 2em;">
    <div id="tableau" style ="margin-top: 2em;"></div>
    

    <?php
        $player = fetchEverything('joueurs');
        $etat = fetchEverything('etat');
    ?>
<div class='Marché'>
    <form action="php/Backoffice/money.php" method="POST" enctype="multipart/form-data">
        <div class='argent_table'>
            <?php
            for($ii = 0; $ii < count($player); $ii++){
                echo '<div style="display: flex; width = 100%; border-bottom: 1px var(--mypurple) solid;" >';
                
                echo '<p class="argent_nom">';
                echo $player[$ii]['Nom'];
                echo '</p>';
                
                echo '<input type="text" style="width: 50%; height: 1em; margin: auto auto auto 1em" value = "0" name="'.$player[$ii]['Nom'].'">';
                echo '</div>';
            }
            ?>
            <select name="minus">
                <option value="true">+</option>
                <option value="false">-</option>
            </select>
            <button type="submit" class='market-button'> Envoyer ! </button>
        </div>
    </form>
        <form action ="php/Backoffice/marketState.php" method="POST" enctype="multipart/form-data" class='state'>
        <div>
            <div class="state-checkbox">
                <label for="Etat">Ouverture</label>
                <input type="checkbox" name="Etat" id="Etat" <?php if($etat[0]['Etat']){echo 'checked';}?>>
            </div>
            <select name="Saison" id="Saison">
                <?php
                $saison = ['Ete' => '<option value="Ete">Été</option>', 
                'Hiver' => '<option value="Hiver">Hiver</option>',
                'Printemps' => '<option value="Printemps">Printemps</option>',
                'Automne' => '<option value="Automne">Automne</option>'];
                
                echo($saison[$etat[0]['Saison']]);
                unset($saison[$etat[0]['Saison']]);

                foreach($saison as $key){
                    echo $key;
                }
                ?>
            </select>
            <div class='state-checkbox'>
                <label for="Porté">Porté</label>
                <input type="checkbox" name="Porté" id="Porté" <?php if($etat[0]['Porte']){echo 'checked';}?>>
            </div>
            <div class="state-checkbox">
                <label for="Sac">Sac</label>
                <input type="checkbox" name="Sac" id="Sac" <?php if($etat[0]['Sac']){echo 'checked';}?>>
            </div>
            <br>
            <div class="state-checkbox">
                <label for="Coffre">Coffre</label>
                <input type="checkbox" name="Coffre" id="Coffre" <?php if($etat[0]['Coffre']){echo 'checked';}?>>
            </div>
            <div class="state-checkbox">
                <label for="Cheval">Cheval</label>
                <input type="checkbox" name="Cheval" id="Cheval" <?php if($etat[0]['Cheval']){echo 'checked';}?>>
            </div>
            <div class="state-checkbox">
                <label for="Commun">Commun</label>
                <input type="checkbox" name="Commun" id="Commun" <?php if($etat[0]['Commun']){echo 'checked';}?>>
            </div>
            <div class="state-checkbox">
                <label for="Viande">Viande</label>
                <input type="checkbox" name="Viande" id="Viande" <?php if($etat[0]['Viande']){echo 'checked';}?>>
            </div>
            <div class="state-checkbox">
                <label for="Poisson">Poisson</label>
                <input type="checkbox" name="Poisson" id="Poisson" <?php if($etat[0]['Poisson']){echo 'checked';}?>>
            </div>
        </div>
        <button type="submit"  class='market-button'> Envoyer ! </button>
    </form>
</div>
<div>

    <div id='tableau_objets'>
        
    </div>
        
    <div id="ux_tableau_objets">
        <select name="" id="nom_objets">
            <?php
                    foreach($player as $key){
                        echo "<option value='".$key['Nom']."'>".$key['Nom']."</option>";
                    }
                    ?>
            </select>
        <button id="submit_objets" value="">
            Afficher Objets
        </button>   
    </div>
</div>

    
    <br>
    <br>

    <form class='form' action="php/Backoffice/image.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for='image'>Image :</label>
            <input type="file" name="imgUpload" accept="image/png, image/jpeg, image/webp" style='color: floralwhite;'>
        </div>
        <button type='submit' style='margin-top: 2em'>Submit Image</button>
    </form>


    <form action="php/Backoffice/text.php" method='POST'>
        <div style='display: flex; flex-direction: column;'>
            <label for="txtname">Nom :</label>
            <input type="text" class='text' name ='txtname' style='width: 20%; margin-top: 2em;' id='nom-description'>
            <label for="text">Description :</label>
            <textarea class='text desc' name='text' id='full-description'></textarea>
            <button type='submit' style='margin-top: 2em'>Submit Texte</button>
        </div>
    </form>

    <div style='display: flex; flex-direction: column;'>
        <label for='nomfichier'>Chemin :</label>
        <input name ='nomfichier' type="text" class='text' style='width: 20%; margin-top: 2em;' id='search-nom'>
        <button type='submit' style='margin-top: 2em' onclick="afficherDescription()">Submit Chemin</button>
    </div>

    <a href='simulation_fight' style='color: floralwhite; margin-top: 5em; font-size: 2em;'>Combat Simulateur</a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/Office.js"></script>
</body>
</html>

