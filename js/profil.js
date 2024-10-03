console.log('Link !')

// fonction pour vérifier si l'élément est visible sur l'écran
function estVisible(element) {
    let position = element.getBoundingClientRect();
    let hauteur = window.innerHeight;
    return position.top < hauteur && position.bottom >= 0;
  }
  
  // fonction pour animer la barre de compétence

  
  let conteneur = document.querySelector('.fiche');
  let barreCompetence = document.querySelectorAll('.new-barre');

  barreCompetence.forEach(function (competence) {
    if (estVisible(competence.parentNode)) {
      competence.style.width = competence.dataset.progression;
    } else {
      conteneur.addEventListener('scroll', function() {
        if (estVisible(competence.parentNode)) {
          competence.style.width = competence.dataset.progression;
        }
      });
    }
  });

  function addScript(url){
    var script = document.createElement('script');
    script.src = url;
    document.body.appendChild(script);
  }

  arrowButton1();
  mobileArrowButton1();
  blackScreen();
  blackScreen2();
  bagBlackscreen();

  bagButton1();


function arrowButton1(){
  $('#arrow').on('click', function(){
    $('#Modifier_Armure').css('left', '2%');
    $('#arrow').css('left', '33%');
    $('#arrow').css('rotate', '180deg');
    $('#blackScreen').fadeIn(500);


    $('#arrow').off('click');
    arrowButton2();
  });
}
  
function arrowButton2(){
  $('#arrow').on('click', function(){
    $('#Modifier_Armure').css('left', '-50%');
    $('#arrow').css('left', '5%');
    $('#arrow').css('rotate', '0deg');
    $('#blackScreen').fadeOut(200);
    
    $('#arrow').off('click');
    arrowButton1();
  })
}

function mobileArrowButton1(){
  $('#arrow2').on('click', function(){
    $('#Modifier_Armure').css('left', '1.25%');
    $('#arrow2').css('rotate', '180deg');
    $('#blackScreen2').fadeIn(500);


    $('#arrow2').off('click');
    mobileArrowButton2();
  });
}

function mobileArrowButton2(){
  $('#arrow2').on('click', function(){
    $('#Modifier_Armure').css('left', '-150%');
    $('#arrow2').css('rotate', '0deg');
    $('#blackScreen2').fadeOut(200);
    
    $('#arrow2').off('click');
    mobileArrowButton1();
  })
}

function bagButton1(){

  if(estEcranTelephone()){
    var taille = '5%';
  }
  else{
    var taille = '10%'
  }

  $('#bag').on('click', function(){
    $('.bags').css('right', taille);
    $('#blackscreen3').fadeIn(500);


    $('#bag').off('click');
    bagButton2();
  });
}

function bagButton2(){

  if(estEcranTelephone()){
    var taille = '-100%';
  }
  else{
    var taille = '-50%'
  }

  $('#bag').on('click', function(){
    $('.bags').css('right', taille);
    $('#blackscreen3').fadeOut(200);
    
    $('#bag').off('click');
    bagButton1();
  })
}

function bagBlackscreen(){
  $('#blackscreen3').on('click', function(){
    $('.bags').css('right', '-50%');
    $('#blackscreen3').fadeOut(200);
    
    $('#bag').off('click');
    bagButton1();
  })
}


function blackScreen(){
  $('#blackScreen').on('click', function(){
    $('#Modifier_Armure').css('left', '-50%');
    $('#arrow').css('left', '5%');
    $('#arrow').css('rotate', '0deg');
    $('#blackScreen').fadeOut(200);
    
    $('#arrow').off('click');
    arrowButton1();
  })
}

function blackScreen2(){
  $('#blackScreen2').on('click', function(){
    $('#Modifier_Armure').css('left', '-150%');
    $('#arrow2').css('rotate', '0deg');
    $('#blackScreen2').fadeOut(200);
    
    $('#arrow2').off('click');
    mobileArrowButton1();
  })
}

function afficherWindowComp(){
  $('.comp-arrow-container').on('click', ()=>{
    $("#Competences").toggleClass("comp-afficher");
    $('.comp-arrow').toggleClass('comp-arrow-rotate');
  })
}

function estEcranTelephone() {
  // Vérifie si la largeur de l'écran est inférieure à un certain seuil
  return window.innerWidth <= 500; // Vous pouvez ajuster la valeur 768 selon vos besoins
}



afficherWindowComp();


const helpElems = document.querySelectorAll('.help');
helpElems.forEach(elem => {
  elem.addEventListener('mouseover', () => {
    elem.setAttribute('data-hover', 'true');
  });
  elem.addEventListener('mouseout', () => {
    elem.removeAttribute('data-hover');
  });
});




//Revenir sur la page

// Sélectionnez l'élément avec l'ID "fiche"
var ficheElement = document.getElementById('fiche');

// Vérifiez si l'élément existe
if(ficheElement) {
    // Quand l'utilisateur fait défiler l'élément, enregistrez la position de défilement et l'heure actuelle dans localStorage
    ficheElement.addEventListener('scroll', function() {
        localStorage.setItem('scrollPosition', ficheElement.scrollTop);
        localStorage.setItem('scrollTime', new Date().getTime());
    });

    // Quand la page est chargée, vérifiez si moins d'une heure s'est écoulée depuis l'enregistrement de la position de défilement
    // Si c'est le cas, faites défiler l'élément à cette position de manière progressive
    window.addEventListener('load', function() {
        var scrollTime = localStorage.getItem('scrollTime');
        if(scrollTime !== null && new Date().getTime() - scrollTime < 60 * 60 * 1000) {
            var targetScrollPosition = localStorage.getItem('scrollPosition');
            if(targetScrollPosition !== null) {
                targetScrollPosition = parseInt(targetScrollPosition);
                var startScrollPosition = ficheElement.scrollTop;
                var distance = targetScrollPosition - startScrollPosition;
                var duration = 300; // Durée de l'animation en millisecondes
                var startTime = null;
                
                function animateScroll(currentTime) {
                    if(startTime === null) startTime = currentTime;
                    var elapsedTime = currentTime - startTime;
                    var progress = Math.min(elapsedTime / duration, 1);
                    ficheElement.scrollTop = startScrollPosition + (distance * progress);
                    if(progress < 1) {
                        window.requestAnimationFrame(animateScroll);
                    }
                }
                
                window.requestAnimationFrame(animateScroll);
            }
        } else {
            // Si plus d'une heure s'est écoulée, vous pouvez choisir de supprimer les données de localStorage
            localStorage.removeItem('scrollPosition');
            localStorage.removeItem('scrollTime');
        }
    });
}

document.getElementById('toggleButton').addEventListener('click', function() {
  var textContainer = document.getElementById('textContainer');
  if (textContainer.classList.contains('hidden')) {
      // Définissez la max-height en fonction de la hauteur du contenu
      textContainer.style.maxHeight = textContainer.scrollHeight + 'px';
  } else {
      // Réinitialisez la max-height
      textContainer.style.maxHeight = '0';
  }
  textContainer.classList.toggle('hidden');
});

function calculerPoidsTotal() {

  const plastron = $('.select-armor').eq(1).val();
  
  console.log(plastron);



  if(plastron == "Sac à Dos"){
    capacitePort *= 2;
  }


  let somme = 0;
  $(".poids").each(function() {
      let valeur = parseFloat($(this).text());
      if (!isNaN(valeur)) {
          somme += valeur;
      }
  });

  $("#Emplacement_totaux").text(somme+`/${capacitePort}`);

  if (somme > capacitePort) {
      $("#Emplacement_totaux").css("color", "red");
  } else {
      $("#Emplacement_totaux").css("color", ""); // Reset la couleur au cas où elle a été mise à "red" auparavant
  }
}

// Appeler la fonction
calculerPoidsTotal();