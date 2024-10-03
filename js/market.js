var searchInput = document.getElementById('aliments-search');
var dataTable = document.getElementById('aliments-table');

searchInput.addEventListener('input', function() {
var searchValue = this.value.toLowerCase();
var rows = dataTable.getElementsByTagName('div');

for (let i = 0; i < rows.length; i++) {
    const rowData = rows[i].textContent.toLowerCase();
    if (rowData.includes(searchValue)) {
    rows[i].style.display = '';
    } else {
    rows[i].style.display = 'none';
    }
}})


document.getElementById("valid-form").addEventListener("submit", function(event){
    event.preventDefault();

    if(validateBasket()){
        localStorage.setItem('panier', '');
        this.submit();
    }
    else{
        console.log('Une erreur dans le formulaire a été détectée.');
    }
})

loadLocalStorage();



function addBasket(id){
    var row = document.getElementsByClassName('aliments-id');
    
    for(let ii = 0 ; ii < row.length ; ii++){
        if(id == row[ii].children[3].textContent){
            var elements = row[ii].children;
        }
    }
    
    var name = elements[0].textContent;
    var price = elements[1].textContent;
    var quantity = elements[2].children[0].value;

    if(isNaN(quantity) || quantity <= 0){
        alert("La quantité indiqué n'est pas valable");
    }
    else if(isItAlreadyInTheBasket(name)){
        addQuantityToBasket(quantity, price, name);
    }
    else{
        printBasketLine(quantity, price, name, id);
    }
    updateBasket();
}

function printBasketLine(quantity, price, name, id){
    var container = $('#panier-scroll');

    var append = $('<div>').attr('class', 'aliments-ligne');

    price = quantity*price;

    append = append.append(
        $("<p>").text(name),
        $("<p>").text(price),
        $('<input>').attr({
            'type': 'number',
            'value': quantity,
            'class': 'quantite-input',
            'id': 'panier-basket-'+id 
        }),
        $('<button>').attr({
            'type': 'submit',
            'class': 'aliments-button',
            'onclick': 'deleteBasketLine("'+name+'")'
        }).text('Supprimer')
    )
    container.append(append);
    
    checkInputNumber(id, name);
}

function updateBasketPrice(){
    var elements = $('#panier-scroll').children("div");

    var price = 0;

    for(let ii = 0; ii < elements.length ; ii++){
        price += parseInt(elements[ii].children[1].textContent);
    }

    $('#panier-total-price').text(price);
}

function updateLocalStorage(){
    if(typeof(Storage)!== 'undefined'){
        const panierScroll = $('#panier-scroll').children('div');
        
                var panier = [];
            
            for(ii = 0; ii < panierScroll.length; ii++){

                var name = panierScroll[ii].children[0].textContent;
                var price = panierScroll[ii].children[1].textContent;
                var quantity = panierScroll[ii].children[2].value;
                price = parseInt(price)/parseInt(quantity);
                var id = $(panierScroll[ii]).children().eq(2).attr('id').split('-')[2];
                var newRow = {'name': name, 'price': price, 'quantity': quantity, 'id': id};
                
                panier.push(newRow);                                   
            }

            localStorage.setItem('panier', JSON.stringify(panier));
        }
}

function deleteBasketLine(name){
    var elements = $('#panier-scroll').children('div');

    for(let ii = 0; ii < elements.length; ii++){
        if(elements[ii].children[0].textContent == name){
            elements[ii].remove();
        }
    }

    
    updateBasket();
}

function isItAlreadyInTheBasket(name){
    var elements = $('#panier-scroll').children('div');

    for(let ii = 0; ii < elements.length; ii++){
        if(elements[ii].children[0].textContent == name){
            return true;
        }
    }

    return false;
}

function addQuantityToBasket(quantity, price, name){
    var elements = $('#panier-scroll').children('div');

    price = parseInt(price)*parseInt(quantity);

    for(let ii = 0; ii < elements.length; ii++){
        if(elements[ii].children[0].textContent == name){
            
            var row = $(elements[ii]).children();
            
            let newPrice = parseInt(row[1].textContent) + parseInt(price);
            $(row[1]).text(newPrice);

            let newQuantity = parseInt(quantity) + parseInt($(row[2]).val());
            $(row[2]).val(newQuantity);
        }
    }
    updateBasket();
}

function checkInputNumber(id, name){
    // Sélection de l'élément input
    const input = document.getElementById('panier-basket-'+id);
    var elements = $('#panier-scroll').children("div");
    
    for(ii = 0; ii < elements.length ; ii++){
        if($(elements[ii]).children('p')[0].textContent == name){
            var e_price = $(elements[ii]).children('p')[1];
            var price = $(elements[ii]).children('p')[1].textContent;
        }
    }

    price = parseInt(price) / parseInt(input.value);


// Ajout d'un écouteur d'événements "change"


input.addEventListener('change', () => {
  // Code à exécuter lorsque la valeur de l'input change
  const value = input.value;
    if(isNaN(value) || value <= 0 || value == null){
        if(confirm('Voulez-vous supprimer la ligne ?')){
            deleteBasketLine(name);
            updateBasket();
        }
        else{
            $(input).val('1');
            $(e_price).text(price);
            updateBasket();
        }
    }
    else{
        $(e_price).text(price*value);
        updateBasket();
    }
});

}

function updateBasket(){
    generateBasketString();
    updateBasketPrice();
    updatePlaces();
    updateLocalStorage();
}

function loadLocalStorage(){
    if(typeof(Storage)!== 'undefined'){

    const basketLoad = JSON.parse(localStorage.getItem('panier'));

        if(basketLoad[0]['name']){
            for(let ii = 0; ii < basketLoad.length; ii++){
                printBasketLine(basketLoad[ii]['quantity'], basketLoad[ii]['price'], basketLoad[ii]['name'], basketLoad[ii]['id']);
            }
        }
    updateBasket();
    }
}

function updatePlaces(){
    var elements = $('#panier-scroll').children("div");


    var places = 0;

    for(let ii = 0; ii < elements.length ; ii++){
        places += parseInt(elements[ii].children[2].value);
    }
    var total = parseInt(places) + parseInt(currentPlaces);

    $('#current-places').text(total);
    $('#panier-place').text(places);

    if(total <= totalPlaces){
        $('#current-places').css('color', 'var(--mypurple)');
    }
    else{
        $('#current-places').css('color', '#aa220a');
    }

}

function generateBasketString(){
    const elements = $('#panier-scroll').children("div");
    var $return = '';

    for(ii = 0 ; ii < elements.length; ii++){
        var id = $(elements[ii]).children().eq(2).attr('id').split('-')[2];
        var quantity = elements[ii].children[2].value;
        for(jj = 0; jj < parseInt(quantity); jj++){
            $return += id+'-';
        }
    }
    $('#post-string').val($return);
}

function validateBasket(){
    const elements = $('#panier-scroll').children("div");
    const totalprice = parseInt($('#panier-total-price').text());
    const totalplaces = parseInt($('#current-places').text());
    
    console.log(elements);

    var validation = true;

    if(totalprice > money){
        validation = false;
        alert("Vous n'avez pas assez d'or pour effectuer cet achat !");
    }
    else if(totalplaces > totalPlaces){
        validation = false;
        alert("Vous n'avez pas assez de place dans l'inventaire pour effectuer cet achat !");
    }
    else if(isNaN(totalprice) || isNaN(totalplaces)){
        validation = false;
        alert("Le panier est vide.");
    }
    else if(elements.length == 0){
        validation = false;
        alert('Le panier est vide.');
    }

    return validation;
}