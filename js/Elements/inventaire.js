gestionnaireInventaire();

function gestionnaireInventaire() {
    var radioSac = document.getElementById("Sac");
    var radioCoffre = document.getElementById("Coffre");
    var radioCheval = document.getElementById("Cheval-radio");
    var radioSacados = document.getElementById("Sacados");

    var divPortee = document.getElementById("portée");
    var divStockage = document.getElementById("Stockage");
    var divCheval = document.getElementById("Cheval");
    var divSac = document.getElementById("Sacados-conteneur");

    if (radioSac.checked) {
        divPortee.style.display = "block";
        divStockage.style.display = "none";
        divCheval.style.display = "none";
        divSac.style.display = "none";
    } 
    else if (radioCoffre.checked) {
        divPortee.style.display = "none";
        divStockage.style.display = "block";
        divCheval.style.display = "none";
        divSac.style.display = "none";
    }
    else if(radioCheval.checked){
        divPortee.style.display = "none";
        divStockage.style.display = "none";
        divCheval.style.display = "block";
        divSac.style.display = "none";
    }
    else if(radioSacados.checked){
        divPortee.style.display = "none";
        divStockage.style.display = "none";
        divCheval.style.display = "none";
        divSac.style.display = "block";
    }
}