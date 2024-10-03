const burger = document.getElementsByClassName('burger');
const header = document.getElementsByClassName('header');

function burgerMenu(){    
    header[0].style.display = 'block';
    burger[0].style.display = 'none';
}

function closeMenu(){
    header[0].style.display = 'none';
    burger[0].style.display = 'block';
}



/* let prevScrollpos = window.pageYOffset;
var mobile = '-25%'

if (/Android|iPhone/i.test(navigator.userAgent)) {
  mobile = '-46vw';
}

window.onscroll = function() {
  let currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("header").style.top = "0vw";
  } else {
    document.getElementById("header").style.top = mobile;
  }
  prevScrollpos = currentScrollPos;
} */


const deconnexion = document.getElementById('disconnected');

deconnexion.addEventListener('click', ()=>{
  if(confirm('Voulez-vous vraiment vous déconnecter ?')){
    window.location.href = "php/Deconnexion.php";
  }
});



