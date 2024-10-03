/* setTimeout(()=>{
    const logo = document.getElementsByClassName('logo');


    logo[0].src="Image/Objets/Logo_Gira.svg";
}, 50) */


setTimeout(()=>{
  const image = document.getElementsByClassName('personnage_img');





  image[0].src="Image/Gora.png";
}, 100)

window.addEventListener('load', function (){

  addScript('js/Elements/dragAndScroll.js');
  addScript('js/Elements/trails.js');
});