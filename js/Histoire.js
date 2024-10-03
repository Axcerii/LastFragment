function show_column(cat_nom){
    let categorie = document.getElementById('cat_'+cat_nom);
    let colonne = document.getElementById(cat_nom);

    categorie.addEventListener("mouseenter", function(){

        document.getElementById('dragons').style.display = 'none';
        document.getElementById('legendes').style.display = 'none';
        document.getElementById('lieux').style.display = 'none';
        document.getElementById('races').style.display = 'none';

        colonne.style.display = 'flex';
    })
}


show_column('dragons');
show_column('legendes');
show_column('lieux');
show_column('races');

var pages = ['Artrish', 'Aqua', 'Chronos', 'Drii', 'Goliath', 'Guizamark', 'Lada', 'Pestia', 'Pura', 'Shizari', 'Yinva', 'David', 'Diablesse', 'Armes', 'Amari', 'Augeaime', 'Berceau des lucioles', 'Edenia', 'Irysia', 'Mudan', 'Saxifra', 'Vulcain', 'Dragons', 'Eternelles', 'Geants', 'Humains'];

function preview(){
    for(let ii = 0; ii < pages.length; ii++){
        let categorie = document.getElementsByClassName('categorie');
        var plus = ii+4;

        categorie[plus].addEventListener("mouseenter", function(){
            /* $('#preview').load('Lores/'+pages[ii]+'.php'); */
            $("#preview")
            .html('<embed type = text/html  src="Lores/'+pages[ii]+'.php" width="100%" height="100%">');
        })
    }
}

preview();

if (window.location.href.indexOf("Histoire.php") > -1) {
    console.log('Ping');
    document.getElementById("#preview").contentWindow.document.body.classList.add("preview");
  }
