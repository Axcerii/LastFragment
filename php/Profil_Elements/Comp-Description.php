<?php



include_once '../bdd.php';
include_once 'Profil-Function.php';


$competences = fetchEverything('competences');

$stats = $_POST['stats'];
$stats = explode('-', $stats);


$statsInfo = getCompOf($stats[0], $competences);
$statsInfo = trier_tableau_assoc($statsInfo, 'Level');

echo $statsInfo[$stats[1]]['Description'];
?>