console.log(nombreQuestions);

var progress = 100/(nombreQuestions);
const progressBar = document.querySelector(".progress-bar");

$(`#question0`).css('display', 'block');

var currentQuestion = 0;


    // Sélectionner tous les labels à l'intérieur de div.choix
    var labels = document.querySelectorAll("div.choix label");

    // Parcourir tous les labels et ajouter un écouteur d'événements pour le double clic
    labels.forEach(function(label) {
        label.addEventListener("dblclick", function() {
            nextQuestion(currentQuestion);
        });
    });



function nextQuestion(number){

    if ($(`#question${number} input[type="radio"]:checked`).length > 0) {
        $(`#question${number}`).css('display','none');
        $(`#question${number+1}`).css('display', 'block');
        currentQuestion++;
        setProgress(currentQuestion*progress);
    } else {
        $(`#choississez`).fadeIn(300);
        $(`#blackscreen`).fadeIn(300);

        setTimeout(()=>{
            $(`#choississez`).fadeOut(300);
            $(`#blackscreen`).fadeOut(300);
        }, 800);
    }

    if(currentQuestion == nombreQuestions){
        $(".next").css('display', 'none');
        $("#envoyer").css('display', 'flex');
    }
}

function setProgress(percent) {
    progressBar.style.width = percent + "%";
}

