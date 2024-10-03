const ouvrirModalBtn_2 = document.getElementById("dice");
const modal_2 = document.getElementById("modal-2");
const fermerModalBtn_2 = document.getElementById("fermerModal-2");

oppositeValue();

ouvrirModalBtn_2.addEventListener("click", () => {
  modal_2.style.display = "flex";
  ajouterToutesOptionsDice();
  updateStatsDice();
});

fermerModalBtn_2.addEventListener("click", () => {
  modal_2.style.display = "none";
});

window.addEventListener("click", (e) => {
  if (e.target === modal_2) {
    modal_2.style.display = "none";
  }
});

var listener_dice = $('#modal-contenu-dice').find('select');
$(listener_dice).on('change', ()=>{
    updateStatsDice();
})



function ajouterToutesOptionsDice(){
    var allID = obtenirToutesLesID();
    const attaquant = $('#dice-select-1');
    const defenseur = $('#dice-select-2');

    attaquant.empty();
    defenseur.empty();

    for(let ii = 0; ii < allID.length; ii++){
        var info = obtenirSelectInfo(allID[ii]);
        ajouterOption(info['ID'], info['Nom'],'dice-select-1');
        ajouterOption(info['ID'], info['Nom'],'dice-select-2');
    }
}

function updateStatsDice(){
    var idExe = $('#dice-select-1').val();
    var idCible = $('#dice-select-2').val();

    var stats1 = $('#dice-exe-select').val();
    var stats2 = $('#dice-cible-select').val();

    var infoAtt = obtenirToutesLesInfosCarte(idExe, 0);
    var infoDef = obtenirToutesLesInfosCarte(idCible, 0);

    $('#exe-stat').val(infoAtt[stats1]);
    $('#cible-stat').val(infoDef[stats2]);
}

function roll100(){
    $('#exe-roll').val(Math.floor(Math.random()*100)+1);
}

function validerDice(){
        var stats_exe = parseInt($('#exe-stat').val());
        var bonus_exe = parseInt($('#exe-bonus').val());
        var stats_cible = parseInt($('#cible-stat').val());
        var bonus_cible = parseInt($('#cible-bonus').val());

        var roll = parseInt($('#exe-roll').val());

        var stats_exe_final = stats_exe + bonus_exe;
        var stats_cible_final = stats_cible + bonus_cible;

        var ecart = stats_exe_final - stats_cible_final;

        var cap = 50 - ecart;

        var nom_exe = $('#dice-select-1').find('option:selected').text();
        var nom_cible = $('#dice-select-2').find('option:selected').text();
        var nom_stats_exe = $('#dice-exe-select').find('option:selected').text();
        var nom_stats_cible = $('#dice-cible-select').find('option:selected').text();

        if(nom_cible != nom_exe){
          var message = `Le jet de <span style='color :lightblue'>${nom_stats_exe}</span> de <span style='color: var(--mywhite)'>${nom_exe}</span> contre la <span style='color: lightblue'>${nom_stats_cible}</span> de <span style='color: var(--mywhite)'>${nom_cible}</span> est de <span style='color: var(--smoothflux)'>${roll}</span>.`;
        }
        else{
          var message = `Le jet de <span style='color:lightblue'>${nom_stats_exe}</span> de <span style='color:var(--mywhite)'>${nom_exe}</span> est de <span style='color:var(--smoothflux)'>${roll}</span>.`;
        }
        sendMessage(message, 'Grey');

        if(nom_cible != nom_exe){
          if(roll >= cap && roll <= cap+10){
              var message2 = 'Le jet est réussi de <span style="color: #fdff99;">justesse</span> !';
          }
          else if (roll == 1 || roll == 2){
            var message2 = 'Le jet est un <span style="color: red;">échec critique</span>...';
          }
          else if(roll == 100 || roll == 99){
            var message2 = 'Le jet est une <span style="color: var(--smoothflux);">réussite critique</span> !';
          }
          else if(roll <= cap && roll >= cap-10){
            var message2 = 'Le jet ne passe pas <span style="color:#aa0077;">de peu !</span>';
          }
          else if(roll >= cap){
            var message2 = 'Le jet est <span style="color:var(--smoothflux);">réussi</span> !';
          }
          else if(roll < cap){
            var message2 = 'Le jet est <span style="color:red">raté</span> !';
          }
        }
        else{
          if(roll >= 100-stats_exe){
            var message2 = 'Le jet est <span style="color:var(--smoothflux);">réussi</span> !';
          }
          else{
            var message2 = 'Le jet est <span style="color:red">raté</span> !';
          }
        }

      sendMessage(message2, 'grey');

      modal_2.style.display = "none";
}

function  oppositeValue(){
  $('#dice-exe-select').on('change', ()=>{
    var value = $('#dice-exe-select').val();

    var Tableau = {
      "QDF": "QDF",
      "HP": "HP",
      "END": "END",
      "MDF": "FOR",
      "FOR": "FOR",
      "DEF": "FOR",
      "ACC": "VIT",
      "VIT": "ACC",
      "PER": "FUR",
      "FUR": "PER",
      "CHA": "PER",
      "ELO": "ELO",
      "INT": "INT"
    };

    $('#dice-cible-select').val(Tableau[value]);
    $('#dice-cible-select').trigger('change');
  })
}