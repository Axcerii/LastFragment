<?php

include_once '../bdd.php';

$nomTable = $_POST['nomTable'];

$table = fetchEverything("$nomTable");
$key_creator = $table[0];

/* On rédige les arguments de la fonction insert() */

$categorie ='';
$ajout = '';
foreach($key_creator as $key => $value){
    if ($key == 'id'){
    }
    else{
        $categorie .= $key.',';
        $ajout .= '"'.$_POST["$key"].'"'.",";
    }
}

/* On retire les virgules à la fin des chaines de caractères */

$categorie = rtrim($categorie, ',');
$ajout = rtrim($ajout, ',');



/* On insert dans le code via la fonction insert et on redirige vers le crud */

insert($nomTable, $categorie, $ajout);

header('Location: ../../Office.php');

?>

<!-- Session -->

<?php
/* session_start();
if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
    $_SESSION['connexion'] = true;

}
else{
    header('Location: admin.php');
} */
?>