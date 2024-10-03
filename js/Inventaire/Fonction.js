/* Fonction qui return quel bouton est checked, son paramètre et le côté des boutons (Droite ou Gauche) */

/*function getCheckedButton(side){
    let porte = document.getElementById(`Porte-${side}`),
    sac = document.getElementById(`Sac-${side}`),
    coffre = document.getElementById(`Coffre-${side}`),
    cheval = document.getElementById(`Cheval-${side}`),
    commun = document.getElementById(`Commun-${side}`);
    
    let boutons = [porte, sac, coffre, cheval, commun];

    for(let ii = 0; ii < boutons.length; ii++){
        if(boutons[ii].checked){
            switch(ii){
                case 0:
                    return 'porté';
                case 1:
                    return 'sac';
                case 2:
                    return 'coffre';
                case 3:
                    return 'cheval';
                case 4:
                    return 'commun';
                default:
                    return 'error';
            }
        }
    }

    return('Error');
} */

function getCheckedButton(side){

    var cote = side.toLowerCase();
    var boutons = document.querySelectorAll(`.${cote}>.boutons>label>input`);

    for(let ii = 0; ii < boutons.length; ii++){
        if(boutons[ii].checked){
            switch(boutons[ii].id){
                case `Porte-${side}`:
                    return 'porté';
                case `Sac-${side}`:
                    return 'sac';
                case `Coffre-${side}`:
                    return 'coffre';
                case `Cheval-${side}`:
                    return 'cheval';
                case `Commun-${side}`:
                    return 'commun';
                default:
                    return 'error';
            }
        }
    }
}


function afficherConteneurChecked(checked, side){

    boutonsNoms = ['porté', 'sac', 'coffre', 'cheval', 'commun'];

    if(side == 'Droite'){
        var Conteneur = Droite; 
    }
    else{
        var Conteneur = Gauche;
    }
    
    for(let ii = 0; ii < boutonsNoms.length; ii++){
        Conteneur[boutonsNoms[ii]].style.display = 'none';
    }

    Conteneur[checked].style.display = 'block';
};

/* Unchecked toutes les checkboxes d'un coté précisé ('gauche' ou 'droite') */

function uncheckedAll(side){
    var checkboxes = document.querySelectorAll(`.objet-${side}>.conteneur>.conteneur-objets>.conteneur-objet>input:checked`);

    for(let ii = 0; ii < checkboxes.length; ii++){
        checkboxes[ii].checked = false;
    }
}

/* Une fonction qui vérifie si les deux côtés sont similaires et qui
 inverse les deux côtés si l'on clique sur le même côté
 previous designe la variable contenant la valeur du bouton avant le changement
 */

function inverserCote(precedent, side){
    
    if(side == 'Gauche'){
        side = 'Droite';
    }
    else{
        side = 'Gauche';
    }

    if(getCheckedButton('Droite') == getCheckedButton('Gauche')){
        checkedBouton(side, transposition(precedent));
    }
}

/* Cette fonction va afficher en gris le bouton opposé en gris */

function griserOpposer(){
    var droite = transposition(getCheckedButton('Droite')),
    gauche = transposition(getCheckedButton('Gauche')),
    buttons = document.querySelectorAll('.boutons>label>img');

    for(let ii = 0; ii < buttons.length; ii++){
        buttons[ii].style.opacity = "1";
    }

    var opposeDroit = document.querySelector(`#${droite}-Gauche + img`);
    var opposeGauche = document.querySelector(`#${gauche}-Droite + img`);

    opposeDroit.style.opacity = "0.3";
    opposeGauche.style.opacity = "0.3";
}

/* checked le bouton selectionné*/

function checkedBouton(side, bouton){
    var e_bouton = document.getElementById(`${bouton}-${side}`);

    e_bouton.checked = true;

    afficherConteneurChecked(getCheckedButton(side), side);
}

/* Fonction qui transforme le texte envoyé par getCheckedButton avec celui utilisé pour les ID */

function transposition(string){
    switch(string){
        case 'porté':
            return "Porte";
        case 'sac':
            return "Sac";
        case 'coffre':
            return 'Coffre';
        case 'cheval':
            return "Cheval";
        case 'commun':
            return "Commun";
        default :
        return 'Error';
    }
}

/* Obtenir les objets qui sont checké, prend "gauche" ou "droite" */

function getCheckedItems(side){
    var checkedItems = document.querySelectorAll(`.objet-${side}>.conteneur>.conteneur-objets>.conteneur-objet>input:checked`);

    return checkedItems;
}

/* Déplacer les objets checks d'un côté pour les mettre de l'autre */

function deplacerChecked(side){
        /* Un peu bordélique */

        if(side == 'gauche'){
            var coteInverse = 'Droite';
            var cote = 'Gauche';
        }
        else if(side == 'droite'){
            var coteInverse = 'Gauche';
            var cote = 'Droite';
        }
        else{
            var coteInverse = 'error';
            var cote = 'error';
        }

        var objetChecked = getCheckedItems(side);
        uncheckedAll('gauche');
        uncheckedAll('droite');
        
        var envoyeur = getCheckedButton(cote);
        var receveur = getCheckedButton(coteInverse);

        console.log(receveur);

        var EnvoyeurId = "";
        var ReceveurId = "";

        switch(envoyeur){
            case 'porté':
                EnvoyeurId = 'Conteneur-Porté-'+cote;
                break;
            case 'sac':
                EnvoyeurId = 'Conteneur-Sac-'+cote;
                break;
            case 'coffre':
                EnvoyeurId = 'Conteneur-Coffre-'+cote;
                break;
            case 'cheval':
                EnvoyeurId = 'Conteneur-Monture-'+cote;
                break;
            case 'commun':
                EnvoyeurId = 'Conteneur-Commun-'+cote;
                break;
        }

        switch(receveur){
            case 'porté':
                ReceveurId = 'Conteneur-Porté-'+coteInverse;
                break;
            case 'sac':
                ReceveurId = 'Conteneur-Sac-'+coteInverse;
                break;
            case 'coffre':
                ReceveurId = 'Conteneur-Coffre-'+coteInverse;
                break;
            case 'cheval':
                ReceveurId = 'Conteneur-Monture-'+coteInverse;
                break;
            case 'commun':
                ReceveurId = 'Conteneur-Commun-'+coteInverse;
                break;
        }

        conteneurEnvoyeur = document.querySelector(`#${EnvoyeurId}>.conteneur-objets`);
        conteneurReceveur = document.querySelector(`#${ReceveurId}>.conteneur-objets`);
        
        for(let ii = 0; ii < objetChecked.length ; ii++){
            let divObjetChecked = objetChecked[ii].closest('div');

            console.log(divObjetChecked);

            conteneurReceveur.appendChild(divObjetChecked);
        }
}

/* prends 'droite' ou 'gauche' */

function envoyerInformations(side){

    var loadingScreen = document.getElementsByClassName('loading-screen')[0];

    loadingScreen.style.display = 'block';

    /* Un peu bordélique */

    if(side == 'gauche'){
        var coteInverse = 'Droite';
        var cote = 'Gauche';
    }
    else if(side == 'droite'){
        var coteInverse = 'Gauche';
        var cote = 'Droite';
    }
    else{
        var coteInverse = 'error';
        var cote = 'error';
    }

    var conteneurEnvoyeur = getCheckedButton(cote);
    var conteneurReceveur = getCheckedButton(coteInverse);

    var items = getCheckedItems(side);

    var idItems = "";

    for(let ii = 0; ii < items.length ; ii++){
        idItems += items[ii].id.replace(`${cote}-`, '');
        idItems += "-";
    }

    /* On gère désormais l'envoi via AJAX */

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'php/gestionInventaire.php', true);

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
           /*  document.getElementById('resultat-ajax').innerHTML = xhr.responseText; */

            deplacerChecked(side);

            loadingScreen.style.display = 'none';

        }
    }

    var data = 'Envoyeur=' + encodeURIComponent(conteneurEnvoyeur) + '&Receveur=' + encodeURIComponent(conteneurReceveur) + '&Items=' + encodeURIComponent(idItems);

    xhr.send(data);

}

