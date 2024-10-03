setTimeout(()=>{
    const logo = document.getElementsByClassName('logo');
    const image = document.getElementsByClassName('personnage_img');





    logo[0].src="Image/Objets/Logo_Shuri.svg";
    image[0].src="Image/Zayath.png";
}, 100)


let trainee = document.querySelector('.trainee');



const ball = document.querySelector(".circle");

let mouseX = 0;
let mouseY = 0;

let ballX = 0;
let ballY = 0;

let speed = 0.04;


function animate(){
  
  let distX = mouseX - ballX;
  let distY = mouseY - ballY;
  
  
  ballX = ballX + (distX * speed);
  ballY = ballY + (distY * speed);
  
  ball.style.left = ballX + "px";
  ball.style.top = ballY + "px";
  
  requestAnimationFrame(animate);
}
animate();

document.addEventListener("mousemove", function(event){
  mouseX = event.pageX;
  mouseY = event.pageY;
})





document.addEventListener('mousemove', function(e) {
  let x = e.clientX;
  let y = e.clientY;

  x -=20;
  y -=20;
  

  trainee.style.left = x + 'px';
  trainee.style.top = y + 'px';

/*   setTimeout(() =>{

      x -= 200;
      y -= 200;
      
      circle.style.left = x +'px';
      circle.style.top = y + 'px';
    }, 100); */
})






let trail = [];
let trailMaxLength = 10;

document.addEventListener('mousemove', function(e) {
  let x = e.clientX;
  let y = e.clientY;
  let elem = document.createElement('div');
  elem.classList.add('trail');
  elem.style.left = x + 'px';
  elem.style.top = y + 'px';
  document.body.appendChild(elem);
  trail.push(elem);
  if (trail.length > trailMaxLength) {
    let removed = trail.shift();
    removed.parentNode.removeChild(removed);
  }
  setTimeout(function() {
    if (elem.parentNode) {
      elem.parentNode.removeChild(elem);
      trail.splice(trail.indexOf(elem), 1);
    }
  }, 100);
});


window.addEventListener('load', function (){
  addScript('js/Elements/dragAndScroll.js');
});