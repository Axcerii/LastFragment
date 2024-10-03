<?php

include_once '../bdd.php';


/* Suppression dans la base de donnée a l'aide de la fonction delete() */

$tableNom = $_POST['table'];
$id = $_POST['id'];

delete($tableNom, $id);

/* Redirection */

header('Location: ../../Office.php');

?>

<!-- Session -->

<?php
session_start();
if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
    $_SESSION['connexion'] = true;

}
else{
    header('Location: admin.php');
}
?>