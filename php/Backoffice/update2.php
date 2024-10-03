<?php
session_start();
include_once '../bdd.php';



$nameID = explode('-', $_POST['nomTable']);

$nomTable = $nameID[0];
$id = $nameID[1];


$table = fetchEverything("$nomTable");
$key_creator = $table[0];


$sql = '';

$set = 'SET ';
foreach($key_creator as $key => $value){

    $enterValue = $_POST[$key];
    $returnValue = "";
    

    for ($i = 0; $i < mb_strlen($enterValue); $i++) {
        $caractere = mb_substr($enterValue, $i, 1);
        // Vérifie si le caractère est un caractère spécial
        if (!ctype_alnum($caractere) && $caractere != ' ') {
            $returnValue .= '\\'; // Ajoute un contre-slash devant le caractère spécial
        }
        $returnValue .= $caractere;
    } 

    $set .= $key.'='."'".$returnValue."',";

}

$set = rtrim($set, ',');
$update = "UPDATE $nomTable ";
$where = "WHERE `id`=$id";

$sql = $update.$set.$where;



update($sql);

header('Location: ../../Office.php');

?>

<?php
if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
    $_SESSION['connexion'] = true;

}
else{
    header('Location: ../../index.php');
}
?>