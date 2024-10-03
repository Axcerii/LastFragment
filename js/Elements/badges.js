
gestionnaireRadio();

function gestionnaireRadio() {
    // Récupérer les éléments radios "badge-50" et "badge-70"
    var radioBadge50 = document.getElementById("badge-50");
    var radioBadge70 = document.getElementById("badge-70");
    var radioBadgeComp = document.getElementById("badge-comp");

    // Récupérer les divs "table-50" et "table-70"
    var divTable50 = document.getElementById("table-50");
    var divTable70 = document.getElementById("table-70");
    var divTableComp = document.getElementById("table-comp");

    // Vérifier si l'input radio "badge-50" est coché
    if (radioBadge50.checked) {
        // Afficher la div "table-50" et masquer la div "table-70"
        divTable50.style.display = "block";
        divTable70.style.display = "none";
        divTableComp.style.display = "none";
    } else if (radioBadge70.checked) {
        // Afficher la div "table-70" et masquer la div "table-50"
        divTable50.style.display = "none";
        divTable70.style.display = "block";
        divTableComp.style.display = "none";
    }
    else if(radioBadgeComp.checked){
        divTable50.style.display = "none";
        divTable70.style.display = "none";
        divTableComp.style.display = "block";
    }
}