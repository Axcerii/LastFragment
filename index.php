<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include_once 'php/bdd.php';
    include_once 'php/cookieParam.php';

    session_start();

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Fragment</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
</head>
<body>

    <div id='menu'>
        <div class='menu-choix'>
            <a href="Lore_page" class="menu-links">Lore</a>
            <a href="Outils" class="menu-links"> Outils </a>
            <?php
            if(isset($_SESSION['connexion'])){
                echo '<a href="Connexion.php" class="menu-links"> Profil </a>';
            }
            else{
                echo '<a href="Connexion.php" class="menu-links"> Connexion </a>';
            }
            ?>
        </div>
        <div id='background-pattern'>
        <div class="background-pattern-radial"></div>
        </div>
<!--         <div id="background-image">
        </div> -->
        <div id='carre'>
            <img src="Image/Objets/IndexIcon.svg" alt="image" id='fill-img'>
        </div>        
        <div id='text-descriptif'>
            <p id='paragraph'></p>
        </div>
    </div>
    <script src="js/index.js"></script>
    <?php
    if(isset($_SESSION['connexion'])){
        $qui = $_SESSION['qui'];

        $joueur = fetchEverything('joueurs');

        foreach($joueur as $key){
            if($qui == $key['id']){
                $src = $key['Nom'];
            }
        }

        echo '<script> link[2] = "Image/'.$src.'.jpg"</script>';
    }
    ?>
</body>
</html>