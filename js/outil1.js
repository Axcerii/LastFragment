

var checkbox =  $('#statsCheckbox')

  // Attache un gestionnaire d'événement au changement de la checkbox
  checkbox.change(function() {
    if (checkbox.is(":checked")) {
        hideSpanShowInputStats();
    } else {
        showSpanHideInputStats();
    }
  });

  const nomsStats = ['Maîtrise', 'Force', 'Défense', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence', 'QdF', 'Santé', 'Endurance'];


  for(let ii = 0; ii < 11 ; ii++){
    updateStatsInput(nomsStats[ii], 1, ii);
  }

  updateStatsInput('QdF', 30, 10);
  updateStatsInput('Santé', 30, 11);
  updateStatsInput('Endurance', 30, 12);



function randomizer(statMin, statMax){
    var stat = getRandomInt(statMax);
    while(stat < statMin){
        stat = getRandomInt(statMax);
    }
    return stat;
}

function afficherStat(stat, selecteur){
    $(selecteur).text(stat);
}

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}

function allStat(){

    var min = parseFloat($('#min').val());
    var max = parseFloat($('#max').val());

    const s_min = parseFloat($('#min-stats').val());
    const s_max = parseFloat($('#max-stats').val());


    const min_theorique = puissanceConverter(s_min)*13;
    const max_theorique = puissanceConverter(s_max)*13;



    /* Vérification que les valeurs entrées soient juste */
        
        if(isNaN(min) || isNaN(max) || isNaN(s_min) || isNaN(s_max)){
            alert('Les valeurs minimales et maximales doivent être des nombres');
            return;
        }
        
        if(min < min_theorique){
            alert('La valeur globale minimale doit être supérieur à '+min_theorique);
            return;
        }

        /*             if(max > max_theorique){
            alert('La valeur globale maximale doit être inférieur à '+max_theorique);
            return;
        } */

        if(max-min < 50){
            alert('L\'écart entre le minimum et le maximum global doit être de 50 minimum');
            return;
        }

        if(s_min < 5){
            alert('La valeur minimale par statistique doit être supérieure ou égale à 5');
            return;
        }

        if(s_max > 100){
            alert('La valeur maximale par statistique doit être inférieure ou égale à 100');
            return;
        }

        if(s_min > s_max){
            alert('La valeur minimale par statistique doit être inférieure ou égale à la valeur maximale par statistique');
            return;
        }

        if(min > max_theorique){
            alert('La valeur est impossible à trouver');
            return;
        }


        /* Optimisation */

        if(max > max_theorique){
            max = max_theorique;
        }
        
        var sum = 0;


        while(sum < min || sum > max){

                var allStatsConverted = [];
                var allStats = [];
                sum = 0;

                for(ii = 0; ii < 13; ii++){
                    var stat = randomizer(s_min, s_max);
                    allStats.push(stat);
                    allStatsConverted.push(puissanceConverter(stat));
                }
                
                for(ii = 0; ii < allStatsConverted.length; ii++){
                    sum += allStatsConverted[ii];
                }
            }

        const statsName = ['Maîtrise', 'Force', 'Défense', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence'];
        
        for(ii = 0; ii < 10 ; ii++){
            $(`#${statsName[ii]}`).val(allStats[ii]);
            $(`#${statsName[ii]}-p`).text(allStats[ii]);
            updateStatsInput(statsName[ii], 1, ii);
        }

        $('#QdF').val(allStats[10]*30);
        $('#Santé').val(allStats[11]*30);
        $('#Endurance').val(allStats[12]*20);
        

        $(`#QdF-p`).text(allStats[10]*30);
        $(`#Santé-p`).text(allStats[11]*30);
        $(`#Endurance-p`).text(allStats[12]*20);

        updateStatsInput('QdF', 30, 10);
        updateStatsInput('Santé', 30, 11);
        updateStatsInput('Endurance', 20, 12);


        console.log(allStats[12]);

        for(ii = 0; ii < 13; ii++){
            createBar(ii, allStats[ii]);
        }

        sum = Math.floor(sum);
        $('#pt').text(sum);
}

function min(value){
    $('#min').val(value);
}

function max(value){
    $('#max').val(value);
}

function puissanceConverter(nombre){
    var result = 0;

    if(nombre <= 25 /* 0-25 */){
        return nombre/2;
    }
    else if (nombre > 25){
        nombre -= 25;
        result += 12.5;
    }

    if(nombre > 25 /* 25-50 */){
        nombre -= 25;
        result += 25;
    }    
    else{
        result += nombre;
        return result;
    }

    if(nombre > 20 /* 50-70 */){
        nombre -= 20;
        result += 40;
    }
    else{
        result += nombre*2;
        return result;
    }

    if(nombre > 10 /* 70-80 */){
        nombre -= 10;
        result += 40;
    }
    else{
        result += nombre*4;
        return result;
    }

    /* 80+ */

    result += nombre*8;
    return result;
}

function createBar(nombre, stats){
    const statsName = ['Maîtrise', 'Force', 'Défense', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence', 'QdF', 'Santé', 'Endurance'];
        $(`#${statsName[nombre]}-bar`).css('width', `${stats}%`);
}

function updateMax() {
    var maxInput = document.getElementById("max-stats");
    var spanElement = document.getElementById("max-theorique");
    
    spanElement.textContent = puissanceConverter(parseFloat(maxInput.value))*13;
}

function updateMin() {
    var maxInput = document.getElementById("min-stats");
    var spanElement = document.getElementById("min-theorique");
    
    spanElement.textContent = puissanceConverter(parseFloat(maxInput.value))*13;
}

function hideSpanShowInputStats(){
    $('.input-stat').css('display','block');
    $('.input-stat-p').css('display','none');
}

function showSpanHideInputStats(){
    $('.input-stat').css('display','none');
    $('.input-stat-p').css('display','block');
}

function updateStatsInput(id, multiplicateur, stats){

    const statsName = ['Maîtrise', 'Force', 'Défense', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence', 'QdF', 'Santé', 'Endurance'];
    
    var inputText = $(`#${id}`); 
  // Attache un gestionnaire d'événement au champ de texte
  inputText.on("input", function() {
    var valeur = $(this).val(); // Récupère la valeur du champ de texte modifié
    $(`#${statsName[stats]}-p`).text(valeur);


    if(valeur/multiplicateur > 100){
        valeurFinale = 100;
    }
    else{
        var valeurFinale = valeur/multiplicateur;
    }
    createBar(stats, valeurFinale);

    updatePuissanceGlobale();
    checkEasterEgg();
  });
}

function updatePuissanceGlobale(){
    const statsName = ['Maîtrise', 'Force', 'Défense', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence', 'QdF', 'Santé', 'Endurance'];

    var somme = 0;

    for(let ii = 0; ii < 10; ii++){
        let valeur = $(`#${statsName[ii]}`).val();
        valeur = puissanceConverter(valeur);
        somme += valeur; 
    }

    let valeur = $('#QdF').val();
    valeur /= 30;
    somme += puissanceConverter(valeur);
    
    valeur = $('#Santé').val();
    valeur /= 30;
    somme += puissanceConverter(valeur);

    valeur = $('#Endurance').val();
    valeur /= 20;
    somme += puissanceConverter(valeur);


    $('#pt').text(Math.floor(somme));
}

function generateRandomNames(){
    const syllabes = ['va', 'yin', 'gi', 'ji', 'za', 'ma', 'shi', 'ri', 'se', 'pe', 'tia', 'ti', 'kro', 'no', 'so', 'ro', 'a', 'ku', 'go', 'li', 'lia', 'du', 'ry', 'la', 'da', 'pu', 'ra', 'se', 're', 'na', 'to', 'wa', 'sel','lu', 'ci', 'fer', 'po'];
    const nombreSyllabes = [1, 2, 2, 2, 2, 2, 2, 3, 3, 3];

    
    for(let ii = 1; ii <= 10; ii++){
        let random = getRandomInt(10);
        var motNombreSyllabes = nombreSyllabes[random];
        var name = '';

        for(let ii = 0; ii < motNombreSyllabes; ii++){
            let random2 = getRandomInt(syllabes.length);
            name += syllabes[random2];
        }

        $(`#name${ii}`).text(premiereLettreEnMajuscule(name));
    }
}

function premiereLettreEnMajuscule(str) {
    // Vérifie si la chaîne n'est pas vide
    if (str.length === 0) {
      return str; // Retourne la chaîne vide telle quelle
    }
  
    // Met en majuscule le premier caractère et concatène le reste de la chaîne
    return str.charAt(0).toUpperCase() + str.slice(1);
}

function checkEasterEgg(){
    if($('#Maîtrise').val() == 78 && $('#Force').val() == 194 && $('#Défense').val() == 176){
        if($('#Vitesse').val() == 52 && $('#Précision').val() == 97 && $('#Perception').val() == 114){
            if($('#Furtivité').val() == 114 && $('#Charisme').val() == 105 && $('#Éloquence').val() == 118){
                if($('#Intelligence').val() == 101 && $('#QdF').val() == 226 && $('#Santé').val() == 128 && $('#Endurance').val() == 166){
                    alert('Je suis crypté en ASCII');
                }
            }
        }
    }

    else if($('#Maîtrise').val() == 17 && $('#Force').val() == 44 && $('#Défense').val() == 60){
        if($('#Vitesse').val() == 75 && $('#Précision').val() == 74 && $('#Perception').val() == 72){
            if($('#Furtivité').val() == 31 && $('#Charisme').val() == 83 && $('#Éloquence').val() == 70){
                if($('#Intelligence').val() == 72 && $('#QdF').val() == 3500 && $('#Santé').val() == 2280 && $('#Endurance').val() == 1160){
                    alert('Fausse Piste...');
                }
            }
        }
    }
}

// Attacher un écouteur d'événement à l'input
document.getElementById("max-stats").addEventListener("input", updateMax);
document.getElementById("min-stats").addEventListener("input", updateMin);



$('#boss').click(()=>{min(700); max(1000);});
$('#hard').click(()=>{min(450); max(700);});
$('#normal').click(()=>{min(300); max(450);});
$('#easy').click(()=>{min(150); max(300)});
$('#test').click(()=>{alert(inversePuissanceConverter(100))});



