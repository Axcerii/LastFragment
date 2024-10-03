   let trainee = document.querySelector('.trainee');

    document.addEventListener('mousemove', function(e) {
    let x = e.clientX;
    let y = e.clientY;

    x -=20;
    y -=20;
    

    trainee.style.left = x + 'px';
    trainee.style.top = y + 'px';
    });





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