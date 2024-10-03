var obs_window_active = false;

$('#obs-window-button').on('click', ()=>{
    if(obs_window_active){
        $('#obs-window').css('display', 'none');
        obs_window_active = false;
    }
    else{
        $('#obs-window').css('display', 'flex');
        obs_window_active = true;
    }
}); 

$('#hide_stats').on('change', ()=>{
    if($('#hide_stats').is(':checked')){
        cacherInput();
    }
    else{
        afficherInput();
    }
})

function sendMessage(message, color = "var(--mywhite)"){
    const obs_window = $('#obs-window');
    
    var append = `<p style='color: ${color};'>${message}</p>`;
    
    
    obs_window.append(append);

    var scrollHeight = obs_window.prop("scrollHeight");
    obs_window.scrollTop(scrollHeight);
}

function cacherInput(){
    var input = $('.cartes_personnage-carte-stat').find('input');
    input.css('visibility', 'hidden');

    $('#attaquant-stat').css('visibility', 'hidden');
    $('#defenseur-stat').css('visibility', 'hidden');
    $('#degats_recus').css('visibility', 'hidden');
    $('#stats_consommée').css('visibility', 'hidden');

    $('#cible-stat').css('visibility', 'hidden');
    $('#exe-stat').css('visibility', 'hidden');
}

function afficherInput(){
    var input = $('.cartes_personnage-carte-stat').find('input');
    input.css('visibility', 'visible');

    $('#attaquant-stat').css('visibility', 'visible');
    $('#defenseur-stat').css('visibility', 'visible');
    $('#degats_recus').css('visibility', 'visible');
    $('#stats_consommée').css('visibility', 'visible');

    $('#cible-stat').css('visibility', 'visible');
    $('#exe-stat').css('visibility', 'visible');
}