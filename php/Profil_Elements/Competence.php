<?php
$character = $_POST['tableau'];
?>

<div class='comp-button-row' style='width: 66%'>
    <form action="Competence2.php" method='post' id='comp-form-0'><button type="button" onclick="afficherComp(0)" class="comp-button"><span class='comp-pc-button'>Maîtrise</span><span class="comp-mobile-button">MDF</span></button><input type="hidden" name="stats" value="MDF" ></form>
    <form action="Competence2.php" method='post' id='comp-form-1'><button type="button" onclick="afficherComp(1)" class="comp-button"><span class='comp-pc-button'>Force</span><span class="comp-mobile-button">FOR</span></button><input type="hidden" name="stats" value="FOR" ></form>
    <form action="Competence2.php" method='post' id='comp-form-2'><button type="button" onclick="afficherComp(2)" class="comp-button"><span class='comp-pc-button'>Défense</span><span class="comp-mobile-button">DEF</span></button><input type="hidden" name="stats" value="DEF" ></form>
    <form action="Competence2.php" method='post' id='comp-form-3'><button type="button" onclick="afficherComp(3)" class="comp-button"><span class='comp-pc-button'>Endurance</span><span class="comp-mobile-button">END</span></button><input type="hidden" name="stats" value="END" ></form>
    <form action="Competence2.php" method='post' id='comp-form-4'><button type="button" onclick="afficherComp(4)" class="comp-button"><span class='comp-pc-button'>Vitesse</span><span class="comp-mobile-button">VIT</span></button><input type="hidden" name="stats" value="VIT" ></form>
    <form action="Competence2.php" method='post' id='comp-form-5'><button type="button" onclick="afficherComp(5)" class="comp-button"><span class='comp-pc-button'>Précision</span><span class="comp-mobile-button">ACC</span></button><input type="hidden" name="stats" value="ACC" ></form>
</div>

<div class='comp-button-row' style='width: 60%'>
    <form action="Competence2.php" method='post' id='comp-form-6'><button type="button" onclick="afficherComp(6)" class="comp-button"><span class='comp-pc-button'>Perception</span><span class="comp-mobile-button">PER</span></button><input type="hidden" name="stats" value="PER" ></form>
    <form action="Competence2.php" method='post' id='comp-form-7'><button type="button" onclick="afficherComp(7)" class="comp-button"><span class='comp-pc-button'>Furtivité</span><span class="comp-mobile-button">FUR</span></button><input type="hidden" name="stats" value="FUR" ></form>
    <form action="Competence2.php" method='post' id='comp-form-8'><button type="button" onclick="afficherComp(8)" class="comp-button"><span class='comp-pc-button'>Charisme</span><span class="comp-mobile-button">CHA</span></button><input type="hidden" name="stats" value="CHA" ></form>
    <form action="Competence2.php" method='post' id='comp-form-9'><button type="button" onclick="afficherComp(9)" class="comp-button"><span class='comp-pc-button'>Éloquence</span><span class="comp-mobile-button">ELO</span></button><input type="hidden" name="stats" value="ELO" ></form>
    <form action="Competence2.php" method='post' id='comp-form-10'><button type="button" onclick="afficherComp(10)" class="comp-button"><span class='comp-pc-button'>Intelligence</span> <span class="comp-mobile-button">INT</span></button><input type="hidden" name="stats" value="INT" ></form>
</div>

<div id='comp-affichage'>

</div>


