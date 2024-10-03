<?php
    /* On récupère nos dépendances */
    include_once "bdd.php";
    session_start();
?>

<?php
$validator = true;

$nom = $_SESSION['name'];
$items = $_POST['Items'];
$conteneurEnvoyeur = capitalizeFirstLetter($_POST['Envoyeur']);
$conteneurReceveur = capitalizeFirstLetter($_POST['Receveur']);
$etat = executerSQL("SELECT * FROM etat WHERE id = '1'")[0];

if($items == false){
    $validator = false;
}

$itemsID = explode('-', $items);

unset($itemsID[count($itemsID)-1]);

validerTransaction($etat, $conteneurEnvoyeur, $conteneurReceveur);

if($validator){
    foreach($itemsID as $value){
        $objet = executerSQL("SELECT * FROM objets WHERE id = '$value'");
        $objet = $objet[0];

        if(strtolower($conteneurEnvoyeur) != strtolower($objet['localisation'])){
            $validator = false;
        }
        else if(strtolower($nom) != strtolower($objet['appartenance']) && $conteneurEnvoyeur != "Commun"){
            $validator = false;
        }
        else if($conteneurEnvoyeur == 'Commun'){
            if($objet['appartenance'] != 'Tous'){
                $validator = false;
            }
        }
        else{
            $validator = true;
        }


        if($validator){
            executerSQL("UPDATE objets SET localisation = '$conteneurReceveur' WHERE id = '".$objet['id']."'");

            if($conteneurReceveur == 'Commun'){
                executerSQL("UPDATE objets SET appartenance = 'Tous' WHERE id= '".$objet['id']."'");
            }
            else if($conteneurEnvoyeur == 'Commun'){
                executerSQL("UPDATE objets SET appartenance = '$nom' WHERE id= '".$objet['id']."'");
            }
        }
        else{
            echo "Erreur sur l'objet : ".$objet['nom'];
        }
    }
    echo $itemsID[0];
}

?>

<!-- FONCTION -->

<?php

function capitalizeFirstLetter($string) {
    if (is_string($string) && strlen($string) > 0) {
        return ucfirst($string);
    }
    return $string;
}

function validerTransaction($etat, $conteneurEnvoyeur, $conteneurReceveur){
    if($etat['Porte'] == false){
        if($conteneurEnvoyeur == 'Porté' || $conteneurReceveur == 'Porté'){
            return false;
        }
    }
    else if($etat['Sac'] == false){
        if($conteneurEnvoyeur == 'Sac' || $conteneurReceveur == 'Sac'){
            return false;
        }
    }
    else if($etat['Coffre'] == false){
        if($conteneurEnvoyeur == 'Coffre' || $conteneurReceveur == 'Coffre'){
            return false;
        }
    }
    else if($etat['Cheval'] == false){
        if($conteneurEnvoyeur == 'Cheval' || $conteneurReceveur == 'Cheval'){
            return false;
        }
    }
    else if($etat['Commun'] == false){
        if($conteneurEnvoyeur == 'Commun' || $conteneurReceveur == 'Commun'){
            return false;
        }
    }
    else{
        return true;
    }
}

?>