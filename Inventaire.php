<?php
    /* On récupère nos dépendances */
    include_once "php/bdd.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inventaire.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Inventaire</title>
</head>
<header>
    <?php include_once 'php/header.php';?>
</header>
    <?php
    /* On vérifie la connexion */

    if(isset($_SESSION['connexion'])){
        $_SESSION['connexion'] = true;
    }
    else{
        header('Location: ../Connexion.php');
    }
    ?>

    <?php
    /* On importe la table du joueur ainsi que son inventaire */

    $nomJoueur = $_SESSION['name'];
    $tableJoueur = executerSQL("SELECT * FROM joueurs WHERE Nom = '$nomJoueur'");
    $tableJoueur = $tableJoueur[0];
    
    $objetsPorte = executerSQL("SELECT * FROM objets WHERE appartenance = '$nomJoueur' INTERSECT SELECT * FROM objets WHERE localisation = 'Porté'");
    $objetsCoffre = executerSQL("SELECT * FROM objets WHERE appartenance = '$nomJoueur' INTERSECT SELECT * FROM objets WHERE localisation = 'Coffre'");
    $objetsCheval = executerSQL("SELECT * FROM objets WHERE appartenance = '$nomJoueur' INTERSECT SELECT * FROM objets WHERE localisation = 'Cheval'");
    $objetsSac = executerSQL("SELECT * FROM objets WHERE appartenance = '$nomJoueur' INTERSECT SELECT * FROM objets WHERE localisation = 'Sac'");
    $objetsCommun = executerSQL("SELECT * FROM objets WHERE localisation = 'Commun'");
    /* Création de la classe "Conteneur" qui est un des conteneur de l'inventaire, que ce soit le coffre ou le joueur */

    $etat = executerSQL('SELECT * FROM etat WHERE id = 1')[0];
    class Conteneur {
        public $nom;
        /* Array extrait de la base de donnée */
        public $tableau;
        /* Taille maximal du conteneur */
        public $capacite;
        /* Poids actuel du conteneur */
        public $poids;
        /* Etat actuel du conteneur */
        public $etat;

        public function __construct($nom, $tableau, $capacite){
            $this->nom = $nom;
            $this->tableau = $tableau;
            $this->capacite = $capacite;
            $this->poids = $this->calculPoids();
            $this->etat = $this->checkEtat();
        }

        /* Calcul le poids total du conteneur */
        public function calculPoids(){
            $poids = 0;
            foreach($this->tableau as $value){
                $poids += $value['poids'];
            }

            return $poids;
        }

        /* Vérifie l'état du conteneur, s'il est rempli (plein) ou s'il y a des
        emplacement disponible (vide) */
        public function checkEtat(){
            if($this->poids > $this->capacite){
                return 'plein';
            }
            else{
                return 'vide';
            }
        }

        /* Outil de teste qui affiche le nom d'un objet en fonction de son numéro dans
        l'inventaire
        $nombre = numéro dans l'inventaire */

        public function afficherObjet($nombre){
            echo $this->tableau[$nombre]['nom'];
        }

        /* Créer l'HTML pour afficher l'intégralité du contenu du conteneur */

        public function affichage($side){
            echo "
            <div class='conteneur' id='Conteneur-".$this->nom."-$side'>
            <p class='nom-conteneur'>".$this->nom."</p>
            <p class='emplacements-disponibles'>Nombre d'emplacement :&nbsp<span class='".$this->etat."'>".$this->poids."/".$this->capacite."</span></p>
                <div class='conteneur-objets'>";
                    foreach($this->tableau as $value){
                        echo "
                        <div class='conteneur-objet'>
                            <input type='checkbox' name='objet' id='$side-".$value['id']."' class='objet-checkbox'>
                            <label class='objet-label' for='$side-".$value['id']."'></label>
                            <p class='objet-nom'>
                                ".$value['nom']."
                            </p>
                            <img alt='Objet-de-categorie-".$value['type']."' src='Image/Objets/Categorie/".$value['type'].".svg' class='objet-image image-rarity-".$value['rarete']."'>
                            <div class='objet-pop-up'>
                                <p class='pop-up-nom'>".$value['nom']."</p>
                                <p class='pop-up-poids'> Poids : ".$value['poids']."</p>
                                <p class='rarity-".$value['rarete']." rarete-pop-up'>".getRarity($value['rarete'])."</p>
                                <p class='objet-description'></p>
                                <script>$('p').last().load('".$value['description']."')</script>
                            </div>
                            <div class='objet-poids'>";
                        
                        for($ii = 0; $ii < $value['poids']; $ii++){
                            echo "<img alt='indicateur-de-poids' src='Image/Objets/Cercle.svg' class='poids-indicateur'>'";
                        }
                        
                        echo "</div>
                        </div>";
                    }
            echo"</div>
            </div>
            ";
        }
    }


    /* On tri les variables */

    $capacite = calculCapacite($tableJoueur);

    $Inventaire = [
        "Porté"=> new Conteneur('Porté', $objetsPorte, $capacite),
        "Coffre"=> new Conteneur('Coffre', $objetsCoffre, 1024),
        "Cheval"=> new Conteneur('Monture', $objetsCheval, 3),
        "Sac"=> new Conteneur('Sac', $objetsSac, $capacite),
        "Commun"=> new Conteneur('Coffre Commun', $objetsCommun, 1024)
    ];



    

    /* 
    ---------------------------------------------------------------------
    ------------------------------Fonctions------------------------------
    --------------------------------------------------------------------- */

    /* Calculer la capacité que peut porter un joueur 
    
    $tableJoueur = La ligne du joueur dans la table joueur
    */


    function calculCapacite($tableJoueur){
        return floor($tableJoueur['Strength']/20)+3;
    }

    /* Renvoi la traduction du nombre à son étiquette de rareté
    $nombre = la rareté prononcé en chiffre */

    function getRarity($nombre){
        switch($nombre){
            case 1: return "Commun";
            break;
            case 2: return "Singulier";
            break;
            case 3: return "Rare";
            break;
            case 4: return "Légendaire";
            break;
            case 5: return "Unique";
            break;
            default: return "Erreur sur la rareté";
        }
    }

    /* Création des boutons de changement de stat */

    function afficherBoutonChangement($id, $checked, $etat){

        echo "<div class='boutons'>";
            echo "<label for='Porte-$id'";
            
            if($etat['Porte'] == false){
                echo "style='display: none'";
            }

            echo ">";
            echo "<input type='radio' name='bouton-$id' id='Porte-$id'";

            if($checked == 1){
                echo 'checked';
            }

            echo ">
            <img src='Image/Objets/Categorie/Main.svg'>
            </label>";

            echo "<label for='Sac-$id'";
            
            if($etat['Sac'] == false){
                echo "style='display: none'";
            }

            echo ">";
            echo "<input type='radio' name='bouton-$id' id='Sac-$id'";

            if($checked != 1){
                echo 'checked';
            }

            echo ">
            <img src='Image/Objets/Categorie/Sac.svg'>
            </label>";

            echo "<label for='Coffre-$id'";
            
            if($etat['Coffre'] == false){
                echo "style='display: none'";
            }

            echo ">
            <input type='radio' name='bouton-$id' id='Coffre-$id'>
            <img src='Image/Objets/Categorie/Coffre.svg'>
            </label>";


            echo "<label for='Cheval-$id'";
            
            if($etat['Cheval'] == false){
                echo "style='display: none'";
            }

            echo ">
            <input type='radio' name='bouton-$id' id='Cheval-$id'>
            <img src='Image/Objets/Categorie/Monture.svg'>
            </label>";


            echo "<label for='Commun-$id'";
            if($etat['Commun'] == false){
                echo "style='display: none'";
            }
            echo ">
            <input type='radio' name='bouton-$id' id='Commun-$id'>
            <img src='Image/Objets/Categorie/Partage.svg'>
            </label>";

        echo "</div>";
    }
    ?>
<body>
    <div class="loading-screen">
        <p>
            Chargement en cours...
        </p>
    </div>
    <div class='display'>
        <div class='gauche'>
            <?php afficherBoutonChangement('Gauche', 1, $etat);?>
            <div class='objet-gauche'>
                <?php
                    $Inventaire['Porté']->affichage('Gauche');
                    $Inventaire['Sac']->affichage('Gauche');
                    $Inventaire['Coffre']->affichage('Gauche');
                    $Inventaire['Cheval']->affichage('Gauche');
                    $Inventaire['Commun']->affichage('Gauche');
                ?>
            </div>
        </div>

        <div class='transferer'>
            <button id='transferer-a-droite' onclick='envoyerInformations("gauche")'>
                <img src="Image/Objets/Categorie/Flèche Droite.svg" alt=">">
            </button>
            <button id='transferer-a-gauche' onclick='envoyerInformations("droite")'>
                <img src="Image/Objets/Categorie/Flèche Gauche.svg" alt="<">
            </button>
        </div>

        <div class='droite'>
        <div class='objet-droite'>
            <?php
                $Inventaire['Porté']->affichage('Droite');
                $Inventaire['Sac']->affichage('Droite');
                $Inventaire['Coffre']->affichage('Droite');
                $Inventaire['Cheval']->affichage('Droite');
                $Inventaire['Commun']->affichage('Droite');
            ?>
        </div>
            <?php afficherBoutonChangement('Droite', 2, $etat); ?>
        </div>
    </div>
<!--     <div id='resultat-ajax' style='color: floralwhite;'>

    </div> -->

    <script src="js/Inventaire/Fonction.js"></script>
    <script src="js/Inventaire/Inventaire.js"></script>
</body>
</html>