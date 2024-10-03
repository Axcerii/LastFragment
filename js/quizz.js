$('#start_button').on('click', ()=>{
    $('.content').fadeOut(200);
    $('#quizz').load('php/questions.php');
});

