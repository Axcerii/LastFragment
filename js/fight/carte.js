/* Vérifier que l'utilisateur ne quitte pas la page au risque de perdre sa progression : */

window.addEventListener('beforeunload', function (e) {
    // Cette fonction sera exécutée lorsque l'utilisateur essaiera de quitter la page
    e.preventDefault(); // Annule l'événement par défaut (affichage de la boîte de dialogue de confirmation)
  
    // Affiche une boîte de dialogue personnalisée pour demander à l'utilisateur de confirmer la fermeture
    e.returnValue = ''; // La chaîne vide signifie que l'utilisateur peut quitter sans confirmation, vous pouvez personnaliser le message ici
  });
  
  // Vous pouvez également afficher un message d'alerte lorsque l'utilisateur clique sur un lien ou ferme l'onglet
  window.addEventListener('unload', function () {
    alert("Vous quittez la page. Êtes-vous sûr ?");
  });

var cartePointer = 1;
const stats_nombre = ['QDF',
'HP',
'END',
'MDF',
'FOR',
'DEF',
'ACC',
'VIT',
'PER',
'FUR',
'CHA',
'ELO',
'INT'];

function créer_carte(){

    var selecteurTableau = $('#personnageAAjouter').val();

    var tableauNom = selecteurTableau.split('-')[0];
    var tableauId = selecteurTableau.split('-')[1];

    console.log('Tableau : '+tableauNom+ " ID : "+tableauId);


      $.ajax({
      type: 'POST',
      url: 'php/Fighting/carte_personnage.php',
      data: {
        'table':tableauNom,
        'id': tableauId,
        'pointer': cartePointer,
      },
      success: function(data) {
          $(`#carte-${cartePointer}`).html(data);
          $(`#carte-${cartePointer}`).removeClass('hidden-card').addClass('display-card');
          afficherImage(cartePointer, tableauNom, tableauId);
          cartePointer++;
          sendMessage('Il y a un nouvel arrivant sur le champ de bataille !', 'lightblue');
      }
      });
  }

function afficherImage(cartePointer ,tableauNom, tableauId){
  $.ajax({
    type: 'POST',
    url: 'php/Fighting/image.php',
    data: {
      'table':tableauNom,
      'id': tableauId,
    },
    success: function(data) {
        $(`#image-${cartePointer}`).html(data);
        $(`#image-${cartePointer}`).css('display', 'block');
    }
    });
}

function updateArmor(id){

  const carte = $(`#carte-${id}`);
  const armure = carte.find('.armure > select');

  var stats_modifiée = {'QDF': 0,
  'HP': 0,
  'END': 0,
  'MDF': 0,
  'FOR': 0,
  'DEF': 0,
  'ACC': 0,
  'VIT': 0,
  'PER': 0,
  'FUR': 0,
  'CHA': 0,
  'ELO': 0,
  'INT': 0};

  var casque = $(armure[0]).val().split('|');
  var torse = $(armure[1]).val().split('|');
  var gantelets = $(armure[2]).val().split('|');
  var jambieres = $(armure[3]).val().split('|');

  var armureValue = [casque, torse, gantelets, jambieres];

  for(ii = 0; ii < armureValue.length; ii++){
      let bonus_stats = armureValue[ii][0].split(',');
      let bonus_value = armureValue[ii][1].split(',');

      if(bonus_stats.length != bonus_value.length){
        console.error('Erreur de stats avec l\'armure');
      }
      else{
        for(jj = 0; jj < bonus_stats.length; jj++){
          stats_modifiée[bonus_stats[jj]] += parseInt(bonus_value[jj]);
        }
      }
  }

  
  for(ii = 0; ii < stats_nombre.length; ii++){
    const input_carte = carte.find('.cartes_personnage-carte-stat');
    var bonus = $(input_carte[ii]).find('.bonus-armure');

    $(bonus).val(stats_modifiée[stats_nombre[ii]]);
  }

}

function listenerArmor(id){
  const carte = $(`#carte-${id}`);
  const armure = carte.find('.armure > select');

  $(armure).change(function(){
    updateArmor(id);
  })
}

function loadArmor(id){
  updateArmor(id);
  listenerArmor(id);
  listenerStats(id);
}

function reduceStats(stats, valeur, id){

  const carte = $(`#carte-${id}`);
  const div_carte = carte.find('.cartes_personnage-carte-stat')[stats];
  const input_carte = $(div_carte).find('div > input')[0];

  var valeur_finale = parseInt($(input_carte).val());

  valeur_finale += valeur;

  $(input_carte).val(valeur_finale);

  updateCSSConsommable(id);
}

function reduceHP(id){
  const carte =$(`#carte-${id}`);
  const div_carte = carte.find('.cartes_personnage-carte-stat-buttons')[1];
  var input_val = parseInt($(div_carte).find('input').val());

  reduceStats(1, input_val, id);

  updateCSSConsommable(id);
}

function listenerStats(id){
  
  var carte = $("#carte-"+id);

  var end = carte.find('.endurance');
  var qdf = carte.find('.quantité');
  var hp = carte.find('.santé');


  $(end).on('change', ()=>{
    updateCSSConsommable(id);
  })

  $(qdf).on('change', ()=>{
    updateCSSConsommable(id);
  })

  $(hp).on('change', ()=>{
    updateCSSConsommable(id);
  })
}

function updateCSSConsommable(id){

  var carte = $("#carte-"+id);

  var nom = carte.find('.cartes_personnage-legend').val();

  var end = carte.find('.endurance');
  var qdf = carte.find('.quantité');
  var hp = carte.find('.santé');

  var selecteurEnd = carte.find('.state-end');
  var selecteurQdf = carte.find('.state-qdf');
  var selecteurHp = carte.find('.state-hp')

  var endState = parseInt($(carte.find('.state-end')).val());
  var qdfState = parseInt($(carte.find('.state-qdf')).val());
  var hpState = parseInt($(carte.find('.state-hp')).val());

  var maxEnd = parseInt($(carte.find('.max-end')).val());
  var maxQdf = parseInt($(carte.find('.max-qdf')).val());

  var labelEnd = carte.find('.label-end');
  var labelHp = carte.find('.label-hp');
  var labelQdf = carte.find('.label-qdf');

  var currentEnd = parseInt($(end).val());
  var currentQdf = parseInt($(qdf).val());


  console.log(currentEnd);
  console.log(maxEnd);
  console.log(endState);
  /* Endurance */

  if(currentEnd < maxEnd/2 && endState == 0){
    $(labelEnd).css('color', '#f98bbf');
    $(selecteurEnd).val(1);
    endState = 1;
    sendMessage(nom+' commence à fatiguer !', "#fbff93");
  }

  if(currentEnd < maxEnd/5 && endState == 1){
    $(labelEnd).css('color', 'red');
    $(selecteurEnd).val(2);
    endState = 2;
    sendMessage(nom+' va s\'effondrer !!!', "#fbff93");
  }

  if(currentEnd <= 0 && endState == 2){
    $(labelEnd).css('color', 'black');
    $(selecteurEnd).val(3);
    endState = 3;
    sendMessage(nom+' s\'est effondré de fatigue...', "#fbff93");
  }

  /* QDF */

  if(currentQdf < maxQdf/2 && qdfState == 0){
    $(labelQdf).css('color', '#f98bbf');
    $(selecteurQdf).val(1);
    qdfState = 1;
    sendMessage('Le flux de '+nom+' commence à s\'estomper !', "var(--smoothflux)");
  }

  if(currentQdf < maxQdf/5 && qdfState == 1){
    $(labelQdf).css('color', 'red');
    $(selecteurQdf).val(2);
    qdfState = 2;
    sendMessage('La quantité de flux de '+nom+' est critique !!!', "var(--smoothflux)");
  }

  if(currentQdf <= 0 && qdfState == 2){
    $(labelQdf).css('color', 'black');
    $(selecteurQdf).val(3);
    console.log('Cheddar');
    qdfState = 3;
    sendMessage(nom+' s\'est évanouit !', "var(--smoothflux)");
  }


  /* HP */

  if($(hp).val() <= 0 && hpState == 0){
    $(labelHp).text('MORT :');
    hpState = 1;
    $(selecteurHp).val(1);
    sendMessage(nom+' est K.O', "#ba0000");
  }
  else if($(hp).val() > 0 && hpState == 1){
    $(labelHp).text('HP :')
    sendMessage(nom+' vient de renaître !', "pink");
    $(selecteurHp).val(0);
    hpState = 0;
  }
}