const ouvrirModalBtn = document.getElementById("ouvrirModal");
const modal = document.getElementById("modal");
const fermerModalBtn = document.getElementById("fermerModal");

ouvrirModalBtn.addEventListener("click", () => {
  modal.style.display = "flex";
  ajouterToutesOptions();
  updateStats();
});

fermerModalBtn.addEventListener("click", () => {
  modal.style.display = "none";
});

window.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.style.display = "none";
  }
});

$('#attaquant-select').on('change', ()=>{
    updateStats();
});

$('#defenseur-select').on('change', ()=>{
    updateStats();
});
/*
$('.radio-select').on('change',()=>{
    updateStats();
});

$('#attaquant-puissance').on('change',()=>{
    updateStats();
}); */

var listener = $('.modal-contenu').find('input');
$(listener).on('change', ()=>{
    updateStats();
});

function obtenirToutesLesInfosCarte(id, armor = 1){

    var image = $(`#image-${id}`).find('img');
    image = $(image).attr('src');

    var carte = $(`#carte-${id}`).find('.cartes_personnage-legend');
    var nom = $(carte).val();

    var retour = {
        'ID': id,
        'Image': image,
        'Nom': nom,
        'QDF': obtenirInfosStats(0, id, armor),
        'HP' : obtenirInfosStats(1, id, armor),
        'END': obtenirInfosStats(2, id, armor),
        'MDF': obtenirInfosStats(3, id, armor),
        'FOR': obtenirInfosStats(4, id, armor),
        'DEF': obtenirInfosStats(5, id, armor),
        'ACC': obtenirInfosStats(6, id, armor),
        'VIT': obtenirInfosStats(7, id, armor),
        'PER': obtenirInfosStats(8, id, armor),
        'FUR': obtenirInfosStats(9, id, armor),
        'CHA': obtenirInfosStats(10, id, armor),
        'ELO': obtenirInfosStats(11, id, armor),
        'INT': obtenirInfosStats(12, id, armor),
    };

    return retour;
}

/* 0 = QDF
1 = HP
2 = END
3 = MDF
4 = FOR
5 = DEF
6 = ACC
7 = VIT
8 = PER
9 = FUR
10 = CHA
11 = ELO
12 = INT */

function obtenirInfosStats(number, id, armor = 1){

    var carte = $(`#carte-${id}`);
    var div = carte.find('.cartes_personnage-carte-stat');
    var inputs = $(div[number]).find('input');

    if(armor){
        var retour = parseInt($(inputs[0]).val())+parseInt($(inputs[1]).val())+parseInt($(inputs[2]).val());
    }
    else{
        var retour = parseInt($(inputs[0]).val())+parseInt($(inputs[1]).val());
    }

    return retour;
}

function ajouterOption(value, content, idBalise){
    var append = `<option value='${value}'>${content}</option>`;
    $(`#${idBalise}`).append(append);
}

function obtenirSelectInfo(id){
    var carte = $(`#carte-${id}`).find('.cartes_personnage-legend');
    var nom = $(carte).val();

    var retour = {
        'ID': id,
        'Nom': nom
    };

    return retour;
}

function ajouterToutesOptions(){
    var allID = obtenirToutesLesID();
    const attaquant = $('#attaquant-select');
    const defenseur = $('#defenseur-select');

    attaquant.empty();
    defenseur.empty();

    for(let ii = 0; ii < allID.length; ii++){
        var info = obtenirSelectInfo(allID[ii]);
        ajouterOption(info['ID'], info['Nom'],'attaquant-select');
        ajouterOption(info['ID'], info['Nom'],'defenseur-select');
    }
}

function obtenirToutesLesID(){
    var card = $('.display-card');
    var retour = [];

    for(let ii = 0; ii < card.length; ii++){
        var id = $(card[ii]).attr('id').split('-')[1];

        retour.push(id);
    }
    return retour;
}

function updateStats(){
    var idAtt = $('#attaquant-select').val();
    var idDef = $('#defenseur-select').val();

    if($('#attaque-force').prop('checked')){
        var stats = 'FOR';
    }
    else if($('#attaque-maitrise').prop('checked')){
        var stats = 'MDF';
    }

    var infoAtt = obtenirToutesLesInfosCarte(idAtt);
    var infoDef = obtenirToutesLesInfosCarte(idDef);

    $('#attaquant-stat').val(infoAtt[stats]);
    $('#defenseur-stat').val(infoDef['DEF']);

    calculerStatsConsommées(stats);
    calculerDégats();
}

function calculerStatsConsommées(stats){
    switch(stats){
        case "MDF":
            var statsConsommee = parseInt($('#attaquant-puissance').val())*100;
            break
        case "FOR":
            var statsConsommee = parseInt($('#attaquant-puissance').val()-1)*100+50;
    }

    $('#stats_consommée').text(statsConsommee);
}

function calculerDégats(){
    var attaque = parseInt($("#attaquant-stat").val())+parseInt($('#attaquant-bonus').val());
    var defense = parseInt($("#defenseur-stat").val())+parseInt($('#defenseur-bonus').val());
    var roll = parseInt($('#attaquant-roll').val());
    var puissance = parseInt($('#attaquant-puissance').val());
    var multiplicateur = parseFloat($('#multiplier').val());

    console.log(attaque);

    if(puissance == 2){
        roll += 5;
    }
    else if(puissance == 1){
        roll = roll;
    }
    else{
        roll += 10*(puissance-2);
    }

    var dégats = (((attaque+(roll-10))*10)-(defense*5))*multiplicateur;

    if(dégats <= 10){
        dégats = 10;
    }

    $('#degats_recus').text(dégats);
}

function validerAttaque(){
    if(confirm('Êtes-vous sûr ?')){

        var idAtt = $('#attaquant-select').val();
        var idDef = $('#defenseur-select').val();
        var nameAtt = $('#attaquant-select').find('option:selected').text();
        var nameDef = $('#defenseur-select').find('option:selected').text();
        var degatsInfliges = parseInt($('#degats_recus').text());
        var statsConsommée = parseInt($('#stats_consommée').text());
        var roll = $('#attaquant-roll').val();

        if($('#attaque-force').prop('checked')){
            var stats = 2;
            var message = `<span style="color: var(--mywhite)">${nameAtt}</span> attaque <span style="color: var(--mywhite)">${nameDef}</span> avec un jet de <span style="color: var(--smoothflux)">${roll}</span>.`;
            sendMessage(message,'#bc8787');
        }
        else if($('#attaque-maitrise').prop('checked')){
            var stats = 0;
            var message = `<span style="color: var(--mywhite)">${nameAtt}</span> lance un sort sur <span style="color: var(--mywhite)">${nameDef}</span> avec un jet de <span style="color: var(--smoothflux)">${roll}</span>.`;
            sendMessage(message,'#86ba8f');
        }


        degatsInfliges *= (-1);
        statsConsommée *= (-1);


        /* Réduction d'HP de la cible */
        reduceStats(1, degatsInfliges, idDef);
        /* Réduction d'Endurance ou de QDF de l'attaquant */
        reduceStats(stats, statsConsommée, idAtt);

        modal.style.display = "none";

    }
}

function roll20(){
    $('#attaquant-roll').val(Math.floor(Math.random()*20)+1);
}