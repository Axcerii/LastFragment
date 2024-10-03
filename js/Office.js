
tableau ("Personnages", "Personnages.php", "fiche");
tableau ("Joueurs", "Joueurs.php", "joueurs");
tableau ("Objets", "Objets.php", "objets");
tableau ("Argent", "Argent.php", "argent");
tableau ("Quizz", "Quizz.php", "quizz");
tableau ("Armure", "Armure.php", "armure");
tableau ("Passif", "Passif.php", "passif");
tableau ("Competences", 'Competences.php', 'competences');
tableau ("Sac_nourriture", 'Sac_nourriture.php', 'sac_nourriture');
tableau ("Aliments", 'Aliments.php', 'aliments');
tableau ("Badges", 'Badges.php', 'badges');
tableau("Bestiaire", "Bestiaire.php", 'bestiaire');

loadObjet();




//----------------------------
//----------------------------
//----------FUNCTION----------
//----------------------------
//----------------------------


function tableau(page, pageURL, table){
    $(`#${page}`).on('click', function(){
        $('#tableau').remove('table');
        $('#tableau').load(`php/Backoffice/${pageURL}`);
        setTimeout(function(){
            deleteButton(table);
            addButton();
        },50)

    setTimeout(()=>{
        var searchInput = document.getElementById('searchInput');
var dataTable = document.getElementById('dataTable');

searchInput.addEventListener('input', function() {
var searchValue = this.value.toLowerCase();
var rows = dataTable.getElementsByTagName('tr');

for (let i = 1; i < rows.length; i++) {
    const rowData = rows[i].textContent.toLowerCase();
    if (rowData.includes(searchValue)) {
    rows[i].style.display = '';
    } else {
    rows[i].style.display = 'none';
    }
}})
    },100);
    })

}


function deleteButton(table){
    $('.delete').on('click', function(){
        id = $(this).attr('id');
        id = id.split('-');
        id = id[1];
        $.post("php/Backoffice/delete.php",
        {
            id: id,
            table: table
        }
        ,
        function(data){
           var $sql = data
    });

    })

}
function addButton(){
    $('#add').on('click', function(){
        $.get("php/Backoffice/add.php");
        $.load("php/Backoffice/add.php");
    })
}


function loadObjet(){
    $('#submit_objets').on('click', ()=>{
        var nom = $('#nom_objets').val();
        $("#tableau_objets").empty();
        $("#tableau_objets").load("php/Backoffice/afficherObjets.php", {data: nom});
    })
}

function afficherDescription(){
    const nomInput = $('#nom-description');
    const textInput = $('#full-description');
    const searchInput = $('#search-nom');

    nomInput.val(searchInput.val());

    textInput.load(`description/${searchInput.val()}.txt`);
}