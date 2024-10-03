
<form action='flux-resultat.php' method='POST'>



<?php

include_once 'bdd.php';

$table = fetchEverything('quizz');
/* $table = [$table[0], $table[1]]; */



function question($quizz, $numero){
    echo '<div id = question'.$numero.' class="questions"><p class="question">'.$quizz['intitule'].'</p>
    <div class="choix">';
    
    for($ii = 1; $ii <= $quizz['nombreReponses'] ; $ii++){
        $string = 'reponse'.$ii;
        $string2 = 'reponse'.$ii.'pts';

        echo '
        <label class="answers" for="question-'.$quizz['id'].'-answer-'.$ii.'">
            <input class="input-reponse"';
            
        echo 'type="radio" name="question-'.$quizz['id'].'" id="question-'.$quizz['id'].'-answer-'.$ii.'" value="'.$quizz[$string2].'">
            <div class="green-checked"></div>
            <p class="reponse">'.$quizz[$string].'</p>
        </label>';
    }

    echo '</div></div>';
}


for($ii = 0; $ii < count($table); $ii++){
    question($table[$ii], $ii);
}

/* echo '
<p>Quel activité préférez-vous réaliser durant votre temps libre ?</p>
<div class="choix">
    <button>Faire du Sport</button>
    <button>Lire</button>
    <button>Être avec des amis</button>
    <button>Me Balader</button>
</div>'; */

?>
<button type='submit' id="envoyer" class="envoyer"><img src="Image/Objets/Flux.png" alt="" class="logo_flux1" style="width: 70%;"><img src="Image/Objets/Flux2.png" class="logo_flux2 logo_flux3"></button>
</form>

<button class="next" onclick='nextQuestion(currentQuestion)'>Suivant ></button>
<div id='choississez'>CHOISIT UNE RÉPONSE</div>
<div id='blackscreen'></div>

<div class="progress-container">
    <div class="progress-bar"></div>
</div>

<script>const nombreQuestions = <?php echo count($table) ?>;</script>
<script src='js/quizz2.js'></script>