<?php
include_once '../bdd.php';

$saison = $_POST['Saison'];

$sql = "UPDATE etat SET Saison = '".$saison."' WHERE id = 1";

update($sql);

$viande = issetCheckbox('Viande');
$poisson = issetCheckbox('Poisson');
$ouverture = issetCheckbox('Etat');
$porte = issetCheckbox('Porté');
$sac = issetCheckbox('Sac');
$coffre = issetCheckbox('Coffre');
$cheval = issetCheckbox('Cheval');
$commun = issetCheckbox('Commun');


$sql = "UPDATE etat SET Viande = $viande, Poisson = $poisson, Etat = $ouverture, Porte = $porte, Sac = $sac, Coffre = $coffre, Cheval = $cheval, Commun = $commun WHERE id = 1";

update($sql);




function issetCheckbox($str){
    if(isset($_POST[$str])){
        return 1;
    }
    else{
        return 0;
    }
}

header('Location: ../../Office.php');
?>