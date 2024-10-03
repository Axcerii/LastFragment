<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/outils.css">
    <title>Randomizer</title>
</head>
<header>
    <?php
    include_once "php/header.php";
    ?>
</header>
<body>

    <!-- <p class='explications'>
        La puissance globale représente le nombre de points d'entraînement nécéssaire pour atteindre les stats présentées. Le minimum est 0 et le max théorique est 3607.5.
        Pour des soucis d'optimisation, la génération ne peut se faire qu'entre 50 et 3500, de plus il doit y avoir minimum 50 d'écart entre le minimum et le maximum.
        Plus vous chercherez haut, plus la génération prendra du temps, pareil, plus vous chercherez bas, plus la génération prendra du temps.
    </p>
    -->
    <div class='inputs'>
        <div class='input-min-max'>
            <div>
                <label for="min"> Puissance globale minimum :</label>
                <input type="text" placeholder="100" id='min'>
            </div>

            <div>
                <label for="max"> Puissance globale maximum :</label>
                <input type="text" placeholder="500" id='max'>
            </div>
        </div>
        <div class='input-min-max'>
            <div>
                <label for="min-stats"> Minimum par statistique :</label>
                <input type="text" value='5' id='min-stats' name='min-stats'>
                <label style ='margin-left: 2em;' class='pgm'>Min théorique : <span id='min-theorique'> 25.5 </span></label>
            </div>
            <div>
                <label for="max-stats"> Maximum par statistique :</label>
                <input type="text" value='100' id='max-stats' name='max-stats'>
                <label style ='margin-left: 2em;' class='pgm'> Max théorique : <span id='max-theorique'> 3607.5 </span></label>
            </div>
        </div>
    </div>
    <button onclick='allStat()'> Générer </button>

    <div class='LesBoutons'>
        <button id='boss'> Boss </button>
        <button id='hard'> Hard </button>
        <button id='normal'> Normal </button>
        <button id='easy'> Easy </button>
        <!-- <button id='test'>Test</button> -->
    </div>

    <div class='stats' style='width: 60%;'>
        <?php
            createTable();
        ?>
    </div>
    <p class='puissance_totale'>Puissance Totale : <span id='pt'>0</span></p>
    <div class="div-checkbox">
        <label for="statsCheckbox" class='label-checkbox'>Éditer</label>
        <input type="checkbox" id="statsCheckbox" name="statsCheckbox">
    </div>

    <div class="random_name">
        <div>
            <div>
                <p id="name1">Artrish</p>
                <p id="name2">Guizamark</p>
                <p id="name3">Shizari</p>
                <p id="name4">Pestia</p>
                <p id="name5">Chronos</p>
            </div>
            <div>
                <p id="name6">Aqua</p>
                <p id="name7">Goliath</p>
                <p id="name8">Drii</p>
                <p id="name9">Lada</p>
                <p id="name10">Pura</p>
            </div>
        </div>
        <button onclick="generateRandomNames()">Générer</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/outil1.js"> </script>

    <?php
        function createTable(){
            $stats = ['Maîtrise', 'Force', 'Défense', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence', 'QdF', 'Santé', 'Endurance'];

            echo '<table class="label_combat">';
            for($ii = 0; $ii < 13; $ii++){
                if($ii == 5 || $ii == 10){
                    echo '<tr><td><br></td></tr>';
                }
                echo '<tr><td class="label_combat_text">'.$stats[$ii].'</td></tr>';
            }
            echo '</table>';

            echo '<table class="stats_combat">';
            for($ii = 0; $ii < 13; $ii++){
                if($ii == 5 || $ii == 10){
                    echo '<tr><td><br></td></tr>';
                }
                echo '<tr><td class="stat_separe"><input class="input-stat" type ="text" value="0"  id="'.$stats[$ii].'" ><span class="input-stat-p" id="'.$stats[$ii].'-p">0</span></td></tr>';
            }
            echo '</table>';
            echo '<table class="stats_bars">';
            for($ii = 0; $ii < 13; $ii++){
                if($ii == 5 || $ii == 10){
                    echo '<tr><td><br></td></tr>';
                }
                echo '<tr><td class="td-bar"><div id="'.$stats[$ii].'-bar" class="bar" style="width: 0%;"></div></td></tr>';
            }
            echo '</table>';
        };
    ?>


</body>
</html>