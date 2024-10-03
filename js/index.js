const menu = document.getElementById("menu");
const carreImg = document.getElementById('fill-img');
const paragraph = document.getElementById('paragraph');
const names = ['Phillia', 'Xianos', 'Shuri', 'Gora', 'Gira', 'Zayath', 'Nimha', 'Dhali', 'Lyra', 'Adam', 'Kanna', 'Hada', 'Lato', 'Liva', 'Axra', 'Esra', 'Fahe'];

const descriptionPersonnage = 'Histoires et personnages en lien avec Last Fragment.';
const descriptionOutils = 'Outils simplifiant le jeu.';
const descriptionProfil = 'Permet l\'accès à votre profil, vos statistiques, objets et pièces d\'or.';

const descriptions = [descriptionPersonnage, descriptionOutils, descriptionProfil];

var random = Math.floor(Math.random()*(names.length-1));

const randomName = 'Image/' + names[random] + '.jpg';

var link = [randomName, 'Tool.png', 'Image/Objets/Profil.svg'];

Array.from(document.getElementsByClassName('menu-links')).forEach((item, index) => {
    item.onmouseover = () => {
        
        if(typeof window.timer != 'undefined'){
            clearInterval(window.timer);
        }

        var string = descriptions[index];
        speed = 20;


        menu.dataset.activeIndex = index;
        carreImg.src = link[index];
       /*  paragraph.textContent = descriptions[index]; */
       /* typeWrite(descriptions[index], 20); */

       if(typeof timer != 'undefined'){
           clearInterval(timer);    
       }

       paragraph.textContent = '';
       string.split('');
       var ii = 0;
   
   
       window.timer = setInterval(()=>{
           if(ii < string.length){
               paragraph.textContent += string[ii];
               ii++
           }
           else{
               clearInterval(window.timer);
           }
       }, speed);
    }
});


function typeWrite(string, speed){



}

