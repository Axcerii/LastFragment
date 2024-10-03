var conteneurs = document.getElementsByClassName('conteneur');

var Gauche = {
"porté" : conteneurs[0], 
"sac" : conteneurs[1], 
"coffre" : conteneurs[2],
"cheval" : conteneurs[3],
"commun" : conteneurs[4]};

var Droite = {
"porté" : conteneurs[5], 
"sac" : conteneurs[6], 
"coffre" : conteneurs[7],
"cheval" : conteneurs[8],
"commun" : conteneurs[9]};

var precedentGauche = getCheckedButton('Gauche');
var precedentDroite = getCheckedButton('Droite');


afficherConteneurChecked(getCheckedButton('Gauche'), 'Gauche');
afficherConteneurChecked(getCheckedButton('Droite'), 'Droite');

griserOpposer();


var boutonsSwitch = document.querySelectorAll('.boutons>label>input');

for(let ii = 0; ii < boutonsSwitch.length; ii++){
    if(ii < 5){
        boutonsSwitch[ii].addEventListener('change', function(){
            inverserCote(precedentGauche, 'Gauche');
            uncheckedAll('gauche');
            afficherConteneurChecked(getCheckedButton('Gauche'), 'Gauche');
            griserOpposer();

            precedentGauche = getCheckedButton('Gauche');
            precedentDroite = getCheckedButton('Droite');
        })
    }
    else{
        boutonsSwitch[ii].addEventListener('change', function(){
            inverserCote(precedentDroite, 'Droite');
            uncheckedAll('droite');
            afficherConteneurChecked(getCheckedButton('Droite'), 'Droite');
            griserOpposer();

            precedentDroite = getCheckedButton('Droite');
            precedentGauche = getCheckedButton('Gauche');
        })
    }
}