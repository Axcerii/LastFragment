<?php
include "php/bdd.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/personnages.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
    <title>Personnages</title>
</head>
<header>
    <?php
    include_once "php/header.php";
    ?>
</header>
<body>


    <div class="background-pattern"></div>
    <div class="background-pattern-radial"></div>

    <?php

        if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
            $all = fetchEverything("fiche");
            $bestiaire = fetchEverything('bestiaire');
        }
        else{
            $all = executerSQL("SELECT * FROM fiche WHERE visibilite = 1");
            $bestiaire = executerSQL("SELECT * FROM bestiaire WHERE visibilite = 1");
        }


        trierParCle($all, 'Nom');
        trierParCle($bestiaire, 'Nom');
        
    ?>

    <div class='partie-superieur'>
        <div class="info-option">
            <h1> Personnages </h1>
            <input type="text" id='search_bar' onkeyup="myFunction()" placeholder="Axra, Adam, Promo...">
        </div>
        
        <div class='info-option'>
            <div class='categorie'>
                <label for="personnages" class='label-categorie'>
                    <input type="radio" name='categorie' id='personnages'  class='radio-bouton' onchange='switchCategorie()' checked>
                    <img src="Image/Objets/Personnages Bouton.svg" alt="Personnages" class='radio-personnages-img'>
                </label>
                <label for="bestiaire" class='label-categorie'>
                    <input type="radio" name='categorie' id='bestiaire' class='radio-bouton' onchange='switchCategorie()'>
                    <img src="Image/Objets/Bestiaire.svg" alt="Bestiaire" class='bestiaire-img'>
                </label>
                <label for="arc" class='label-categorie' id='arc-label'>
                    <input type="checkbox" name='arc' id='arc' class='radio-bouton quest-checkbox'>
                    <img src="Image/Objets/Categorie/Important.svg" alt="Quest">
                </label>
                <span class='arc-tooltip'>Afficher les personnages de l'arc actuel</span>
            </div>
        </div>
    </div>

    <div class='mainZone'>
        <div class='descendance'>
            <label for="artrish" class="label-descendance">
                <input type="checkbox" name="descendance" id="artrish">
                <img src="Image/Objets/Artrish.svg" alt="">
            </label>
            <label for="aqua" class="label-descendance">
                <input type="checkbox" name="descendance" id="aqua">
                <img src="Image/Objets/Aqua.svg" alt="">
            </label>
            <label for="chronos" class="label-descendance">
                <input type="checkbox" name="descendance" id="chronos">
                <img src="Image/Objets/Chronos.svg" alt="">
            </label>
            <label for="drii"  class="label-descendance">
                <input type="checkbox" name="descendance" id="drii">
                <img src="Image/Objets/Drii.svg" alt="">
            </label>
            <label for="goliath"  class="label-descendance">
                <input type="checkbox" name="descendance" id="goliath">
                <img src="Image/Objets/Goliath.svg" alt="">
            </label>
            <label for="guizamark"  class="label-descendance">
                <input type="checkbox" name="descendance" id="guizamark">
                <img src="Image/Objets/Guizamark.svg" alt="">
            </label>
            <label for="lada"  class="label-descendance">
                <input type="checkbox" name="descendance" id="lada">
                <img src="Image/Objets/Lada.svg" alt="">
            </label>
            <label for="pestia"  class="label-descendance">
                <input type="checkbox" name="descendance" id="pestia">
                <img src="Image/Objets/Pestia.svg" alt="">
            </label>
            <label for="pura"  class="label-descendance">
                <input type="checkbox" name="descendance" id="pura">
                <img src="Image/Objets/Pura.svg" alt="">
            </label>
            <label for="shizari"  class="label-descendance">
                <input type="checkbox" name="descendance" id="shizari">
                <img src="Image/Objets/Shizari.svg" alt="">
            </label>
            <label for="yinva"  class="label-descendance">
                <input type="checkbox" name="descendance" id="yinva">
                <img src="Image/Objets/Yinva.svg" alt="">
            </label>
            <label for="aucun"  class="label-descendance">
                <input type="checkbox" name="descendance" id="aucun">
                <img src="Image/Objets/Inconnu.svg" alt="">
            </label>
        </div>
        <div class='cards'>
            <div class="mainZoneCard" id='MainZoneCard'>
                <?php
                    creerCartes($all);
                ?>
            </div>
        
            <div class="mainZoneCard" id="BestiaireZoneCard">
                <?php
                    creerCartesBestiaire($bestiaire);
                ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/Personnages.js"></script>
    <script src="js/scroll_auto.js"></script>
    <script src="js/Personnages-secret.js"></script>
</body>
</html>

<?php

function creerCartes($all){
    foreach($all as $value){
        echo "
        <div class='card ".$value['Nom']."'>
            <form action = 'FichePersonnage.php' method='GET'>
            <button type='submit'><img src='".$value['Image']."' ".greyFilter($value['Age'])." class='group_".$value['Groupe']."'> ".isDead($value['Age'])."<img src='Image/Objets/".getEthnieSvg($value['Ethnie']).".svg' class='ethnie'> <div class='blackscreen'></div> <p class='Name'>".$value['Nom']." <span style='display: none;'>".$value['Categorie']."</span></p> </button>
        ";
          
        if($value['Arc']){
            echo "
                <div style='display:none;' class='descendance-value'>".$value['Descendance']."-Arc</div>
            ";
        }
        else{
            echo "
                <div style='display:none;' class='descendance-value'>".$value['Descendance']."</div>
            ";
        }
        
        echo    "<input type='hidden' name='ID' value='".$value['Nom']."'></input>
            </form>
            <p class='mobile-name'>".$value['Nom']."</p>
        </div>";
    }
}

function creerCartesBestiaire($all){
    foreach($all as $value){
        echo "
        <div class='card ".$value['Nom']."'>
            <form action = 'Bestiaire.php' method='GET'>
            <button type='submit'><img src='".$value['Image']."'> <img src='Image/Objets/".$value['Descendance'].".svg' class='ethnie'> <div class='blackscreen'></div> <p class='Name'>".$value['Nom']." <span style='display: none;'></span></p> </button>
            <input type='hidden' name='ID' value='".$value['Nom']."'></input>
            </form>
            <p class='mobile-name'>".$value['Nom']."</p>
            <p class='descendance-value' style='display:none;'>".$value['Descendance']."</p>
        </div>";
    }
}

function getEthnieSvg($ethnie){
    $ethnie = strtolower($ethnie);

    switch($ethnie){
        case "mudois" :
        case "mudoise" :            
            return "Mudois";
        break;

        case "augeois" :
        case "augeoise" :
            return "Augeois";
        break;

        case "saxifranc":
        case "saxifranche":
            return "Saxifranc";
        break;

        case "amarien":
        case "amarienne":
            return "Amarien";
        break;

        case "edenien":
        case "edenienne":
            return "Edenien";
        break;

        case "celeste":
        case "céleste":
            return "Celeste";
        break;

        case "irisien":
        case "irisienne":
            return "Irisien";
        break;

        default:
            return 'Inconnu';
        break;
    }
}

function addResearchWord($nom, $table){
/*     $table = ['gira' => 'Champs Bimbo',
     'art. drino ii' => 'Roi',
    'xianos' => 'Apollyon',
    'leest' => 'Steelah',
    'esra' => 'Abruti']; */
}

function isDead($age){
    $age = strtolower($age);
    if($age == 'mort' || $age == 'morte'){
        return " <div class='mortAssombrir'></div> <img src='Image/Objets/Shizari2.png' alt='' class='mortLogo'>";
    }
}

function greyFilter($age){
    $age = strtolower($age);
    if($age == "mort" || $age == 'morte'){
        return "style = 'filter: grayscale(1);'";
    }
}

function trierParCle(&$array, $cle) {
    usort($array, function($a, $b) use ($cle) {
        return strcmp($a[$cle], $b[$cle]);
    });
}

?>