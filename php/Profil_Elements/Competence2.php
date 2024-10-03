<?php


include_once '../bdd.php';
include_once 'Profil-Function.php';
$character = $_POST['tableau'];
$competences = fetchEverything('competences');

$stats = $_POST['stats'];
$stats = explode('=', $stats);
$stats = $stats[1];

echo'<h1>'.convertStatsAffichage($stats).'</h1>';
printbar($stats, $character, $competences);


?>
<div class='comp-description'>
    <h2 id='comp-description-title'></h2>
    <p id='comp-description-paragraph'></p>
</div>
<script>
    function lockedDescription(){
        $('#comp-description-title').text('Verrouillé');
        $('#comp-description-paragraph').text("Vous n'avez pas encore débloquer cette compétence. Améliorez la statistique pour débloquer cette compétence.");
        $('.comp-description').attr('class', 'comp-description comp-locked-description');
    }
    function afficherCompDescription(val){
           id = '#comp-form-bar-'+val;

           
            $.ajax({
            type: 'POST',
            url: 'php/Profil_Elements/Comp-Title.php',
            data: $(id).serialize(),
            success: function(data) {
                $('#comp-description-title').html(data);
            }
            });

            $.ajax({
            type: 'POST',
            url: 'php/Profil_Elements/Comp-Description.php',
            data: $(id).serialize(),
            success: function(data) {
                $('#comp-description-paragraph').html(data);
            }
            });

            $('.comp-description').attr('class', 'comp-description comp-unlocked-description');
    }
</script>
