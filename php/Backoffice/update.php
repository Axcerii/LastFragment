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
    <title>Mettre à jour un élément</title>
</head>
<body>
    


<?php

include_once '../bdd.php';
mb_internal_encoding("UTF-8");

/* Récupération de l'ID et du nom de la table */

$nameID = explode('-', $_POST['update']);

$nomTable = $nameID[0];
$id = $nameID[1];

unset($nameID);

/* Récupération des données et créations des formulaires */

$row = executerSQL("SELECT * FROM $nomTable WHERE id = $id");
$row = $row[0];

$table = fetchEverything("$nomTable");



$key_creator = $table[0];

echo("<form class='formulaire' method='POST' action='update2.php'>");

foreach($key_creator as $key => $value){
    echo "<script>console.log(\"".$row[$key]."\")</script>";

    echo "<label for='$key'>$key</label>
    <input type ='text' name ='$key' id='$key' value =\"".$row[$key]."\">";
}

/* Bouton */
echo('<button type ="submit" class="update" value="'.$nomTable.'-'.$id.'" name="nomTable" style="width: 10%; margin-top : 5%">Envoyer</button></form>');
?>
<form action='../../Office.php' method='POST'><button class='delete' style='width: 10%; margin-top : 2%'>Annuler</button></form>

</body>
</html>

<!-- Session -->


<?php
if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
    $_SESSION['connexion'] = true;

}
else{
    header('Location: admin.php');
}
?>