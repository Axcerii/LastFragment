<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/office.css">
    <title>Ajouter un élément</title>
</head>
<body>
    
</body>
</html>

<?php

include_once '../bdd.php';

/* On récupère l'ID et le nom de la table */

$nameID = explode('-', $_POST['add']);

$nomTable = $nameID[0];
$id = $nameID[1];

unset($nameID);


/* On récupère notre table */

$table = fetchEverything("$nomTable");
$key_creator = $table[0];

/* On créé la partie HTML en fonction de notre table */

echo("<form class='formulaire' method='POST' action='add2.php'>");

foreach($key_creator as $key => $value){

    if($key == 'id'){

    }

    else if($key == 'Image'){
        echo "<label for='$key'>$key</label>
        <input type ='text' name ='$key' id='$key' value='Image/'>";
    }

    else if($key == 'Link' || $key == strtolower('description')){
        echo "<label for='$key'>$key</label>
        <input type ='text' name ='$key' id='$key' value='description/'>";
    }

    else{
        echo "<label for='$key'>$key</label>
        <input type ='text' name ='$key' id='$key'>";
    }

}




echo('<button type ="submit" class="envoyer" value="'.$nomTable.'" name="nomTable">Envoyer</button></form>');



?>
<!-- Session -->
<?php
if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
    $_SESSION['connexion'] = true;

}
else{
    header('Location: ../../admin.php');
}
?>