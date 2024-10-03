
var difficulty = Math.floor(vitesse*0.65);

$('.Click-Count').text(' ' + difficulty);



function Stop_game(){
    clearInterval(window.i_second);
    clearInterval(window.i_dixieme);
    clearInterval(window.i_centieme);
    clearInterval(window.countdown);
    $('.Zone').off('click');

    if(window.win == 1){
        alert("Vous avez gagné !");
    }
    else{
        alert('Vous avez perdu...');
    }
}

function Timer(time){

    var countdown = time*1000;

 
    window.countdown = setTimeout(() => {
        Stop_game();
        $('.second').text(' 0.');
        $('.dixieme').text('0');
        $('.centieme').text('0');
    }, countdown);
 

    time--;
    $('.second').text(' ' + time + '.')

    var dixieme = 9;

    window.i_dixieme = setInterval(() => {
        $('.dixieme').text(dixieme)
        if(dixieme != 0){
            dixieme--;
        }
        else{
            dixieme = 9;
        }
    },100)

    var centieme = 9;

    window.i_centieme = setInterval(() => {
        $('.centieme').text(centieme)
        if(centieme != 0){
            centieme--;
        }
        else{
            centieme = 9;
        }
    },10)

    window.i_second = setInterval(() => {
        time--;
        $('.second').text(' ' + time +'.')

        if(time == 0){
            clearInterval(window.i_second);
        }
    },1000)
}

function clicker(){
    var click = difficulty;
    click--;
    $('.Click-Count').text(' ' + click);

    $('.Zone').on('click', () => {
        click --;
        $('.Click-Count').text(' ' + click);
        if(click <= 0){
            window.win = 1;
            Stop_game();
        }
    })
}


$('.Zone').on('click', () => {
    Timer(5);
    $('.Zone').off('click');
    clicker()
})
