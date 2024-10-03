function RetirerFirstPage(){
    $('#First-Page').fadeOut(400);
}

function vitesse(){
    setTimeout(()=>{
        $('#game').load('php/training/vitesse.php');
        $('#game').fadeIn(400);
    }, 400)
}