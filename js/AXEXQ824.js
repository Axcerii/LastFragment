function typeWriter(element, text, speed) {
    let i = 0;
    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    type();
}

function simulateCmd(element, lines, speed) {
    var enterACode = document.getElementsByClassName('enter-a-code')[0];
    let currentLine = 0;

    function typeLine() {
        if (currentLine < lines.length) {
            let line = lines[currentLine];
            let charIndex = 0;
            
            function typeChar() {
                if (charIndex < line.length) {
                    element.innerHTML += line.charAt(charIndex);
                    charIndex++;
                    setTimeout(typeChar, speed);
                } else {
                    element.innerHTML += '\n';
                    currentLine++;
                    setTimeout(typeLine, speed);
                }
            }
            typeChar();
        } else {
            // Une fois que toutes les lignes ont été affichées, masquer l'élément après un délai
            setTimeout(() => {
                element.style.display = 'none';
                enterACode.style.opacity = '1';
            }, 1000); // 2000 millisecondes = 2 secondes
        }
    }
    typeLine();
}

document.addEventListener("DOMContentLoaded", function() {
    const element = document.getElementById("cmd");
    const lines = [
        "Initializing system...",
        "Loading modules...",
        "Downloading packages ARTRISH I",
        "Downloading packages ARTRISH II",
        "Downloading packages ARTRISH III",
        "Downloading packages ARTRISH IV",
        "Module Artrish: OK",
        "Module Yinva: OK",
        "Module Shizari: OK",
        "Module Guizamark: OK",
        "Module Pestia: OK",
        "Module Chronos: OK",
        "Module Aqua: OK",
        "Module Goliath: ERROR",
        "Module Drii: OK",
        "Module Lada: OK",
        "Module Pura: OK",
        "Starting services.................................................................................",
        "Service Artrish: OK",
        "Service Yinva: OK",
        "Service Shizari: failed",
        "GENERATING ERROR DUMP........................................................................................",
        "ERROR: SHIZARI.pos != SHIZARI.towa",
        "Service Guizamark: failed",
        "GENERATING ERROR DUMP..............................................",
        "ERROR: GUIZAMARK.pos != GUIZAMARK.towa",
        "Service Pestia: OK",
        "Service Chronos: OK",
        "Service Aqua: OK",
        "Service Goliath: failed",
        "GENERATING ERROR DUMP....................................................................................",
        "ERROR: GOLIATH.life = false",
        "Service Drii: ...........OK",
        "Service Lada: OK",
        "Service Pura: OK",
        "System startup complete.",
        "Welcome to the system "+username+"!"
    ];
    const speed = 1; // Vitesse de frappe en millisecondes

    simulateCmd(element, lines, speed);
});

function checkCode(){
    var secretCode = $('#secret-code').val()
    console.log(secretCode);

    $.ajax({
        url: 'php/codeAnalyzer.php',
        type: 'POST',
        data: { code: secretCode },
        success: function(response) {
            console.log(response);
            data = JSON.parse(response);

            if (data.isValid) {
                window.location.href = data.redirectUrl;
                console.log(data);
            } else {
                $('#error').css('display', 'block');
                console.log(data);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}