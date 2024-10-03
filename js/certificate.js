
// Initialiser : masquer tous les li
    $('.names li').css('opacity', '0').addClass('not-shown');
  
/* Citation animation */

animationCitation();

/* Tirage des stats */

roulette();

animationLogo();

trivia();

potentiel();

flux();

header();


function roulette(){
    var time = setInterval(changezToutesStats, 50);

    setTimeout(()=>{
        clearInterval(time);
        remettreStats(stats);

    }, 8000)
}

function changezToutesStats(){
    var statsName = ['Maîtrise', 'Force', 'Défense', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence', 'QdF', 'Santé', 'Endurance'];

    for(ii = 0; ii < statsName.length ; ii++){
        var random = getRandomInt(100);
        
        changezStatsValue(random, statsName[ii]);
        changezBarWidth(random, statsName[ii]);
    }
}

function changezStatsValue(nombre, id){
    $(`#${id}`).text(nombre);
}

function changezBarWidth(nombre, id){
    $(`#${id}-bar`).css('width', `${nombre}%`);
}

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}

function remettreStats(stats){
    var statsName = ['Maîtrise', 'Force', 'Défense', 'Vitesse', 'Précision', 'Perception', 'Furtivité', 'Charisme', 'Éloquence', 'Intelligence', 'QdF', 'Santé', 'Endurance'];

    for(ii = 0; ii < statsName.length; ii++){
        changezStatsValue(stats[statsName[ii]], statsName[ii]);
        changezBarWidth(stats[statsName[ii]], statsName[ii]);
    }

    var QDF = (parseFloat(stats['QdF'])*30);
    var Santé = (parseFloat(stats['Santé'])*30);
    var Endurance = (parseFloat(stats['Endurance'])*20);

    console.log(QDF);
    console.log(stats['QdF']);

    changezStatsValue(QDF, 'QdF');
    changezStatsValue(Santé, 'Santé');
    changezStatsValue(Endurance, 'Endurance');
}

function animationCitation(){
    if(isScreenBelow500px()){
        var multiplicateur = 0.5;
    }
    else{
        var multiplicateur = 2.13;
    }

    var taille = 0;
    var opacity = 0;
    var interval = setInterval(()=>{
        changementTaille(0.5*Math.sqrt(0.5*taille));
        changementOpacite(opacity);

        taille += multiplicateur;
        opacity += (100/60)/100;
    },25);

    setTimeout(()=>{
        clearInterval(interval);
        $('#blackscreen').fadeOut(1500);
        $('.citation').fadeOut(2500);
    }, 1500);
}
function changementTaille(nombre){
    $('#citation-p').css('font-size', `${nombre}em`);
}
function changementOpacite(nombre){
    $('#citation-p').css('opacity', `${nombre}`);
}

function animationLogo(){
    setTimeout(()=>{
        $('.flux_logo_certificate').fadeIn(5000);
        setTimeout(()=>{
            $('.flux_logo_certificate').css('transition', 'ease-out all 1000ms');
            setTimeout(()=>{
                $('.flux_logo_certificate').css('opacity','0.2');
            }, 1000);
        },5000);
    },2000)
}
function isScreenBelow500px() {
    return window.innerWidth < 500;
}

function trivia(){
    setTimeout(()=>{
        $('.trivia').css('opacity', '1');

        setTimeout(()=>{
            $('.prenoms_possibles').css('opacity', '1');
            setTimeout(()=>{
                animateLis();
            }, 1000)

            setTimeout(()=>{
                $('.descendance').css('opacity', '1');

                setTimeout(()=>{
                $('.dragon').css('opacity', '1');
                    
                }, 2000)
            },3000)
        
            // Commencer l'animation
        },500)

    },2000)
}

function animateLis() {
    $('.names li:not(.shown)').eq(0).animate({opacity: 1}, 500, function() {
        $(this).addClass('shown');
        setTimeout(animateLis, 500);
    });

}

function potentiel(){
    setTimeout(()=>{
        $('.potentiel').css('opacity', '1');

        setTimeout(()=>{
            $('.potentiel_background').css('opacity', '1');

            setTimeout(()=>{
                polygon();
            },3000)
        },1000)
    },2000)

}

function polygon(){
    $('.pentagone').fadeIn(500);

    var points = $('#points').attr('points');

    anime({
        targets: '#points',
        points: [
        { value: [
            '50,50 50,50 50,50 50,50 50,50',
            points]
        }
        ],
        easing: 'easeOutQuad',
        duration: 2000
    });
}

function animateText($element) {
    $element.css('visibility', 'visible');

    const text = $element.text();
    let index = 0;
    
    $element.text('');  // Clear text initially

    function showChar() {
        if (index < text.length) {
            $element.append(text[index]);
            index++;
            setTimeout(showChar, 50);  // 50ms delay between characters
        }
    }

    showChar();
}

function flux(){
    setTimeout(()=>{
        animateText($('.flux'));
        animateText($('.flux_description'));
    }, 9000)
}

function header(){
    setTimeout(()=>{
        $('header').fadeIn(1000);
    }, 15000)
}