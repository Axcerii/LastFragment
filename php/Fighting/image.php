<?php

$vierge = ['Nom' => 'Nouveau',
'Image' => 'Image/Serena.jpg',
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
'SexAbility' => 0];


include_once '../bdd.php';

$table = $_POST['table'];
$id = $_POST['id'];

if($table == 'new'){
    $informations_card = $vierge;
}
else{
    $informations_card = fetchRow($table, $id);
    $informations_card = $informations_card[0];
}
?>

<img src="<?php echo $informations_card['Image']?>" alt="Image_personnage">
