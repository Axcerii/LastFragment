<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const container = document.getElementById('text-container');
        const paragraphs = container.getElementsByTagName('p');
        const typingSpeed = 25; // Milliseconds per character

        let currentParagraph = 0;
        let currentChar = 0;
        let texts = [];

        // Store the original texts and hide the paragraphs initially
        for (let i = 0; i < paragraphs.length; i++) {
            texts.push(paragraphs[i].innerHTML); // Using innerHTML to preserve spaces
            paragraphs[i].innerHTML = ''; // Clear the text
        }

        function typeWriter() {
            if (currentParagraph < paragraphs.length) {
                const paragraph = paragraphs[currentParagraph];
                const text = texts[currentParagraph];

                if (currentChar < text.length) {
                    paragraph.innerHTML += text.charAt(currentChar);
                    currentChar++;
                    setTimeout(typeWriter, typingSpeed);
                } else {
                    currentChar = 0;
                    currentParagraph++;
                    setTimeout(typeWriter, typingSpeed);
                }
            }
        }

        // Start the typewriter effect
        typeWriter();

        setTimeout(()=>{
            document.getElementsByClassName('negate')[0].style.display = 'block';
        }, 80000);
    });

    var color = 0;

    function negate(boolean){
        const p = document.querySelectorAll('div > p');
        const button = document.getElementsByClassName('negate')[0];
        const html = document.querySelector('html');
        const why = document.getElementsByClassName('why')[0];
        
        if(boolean){
            html.style.background = 'var(--myblue)';
            button.style.background = 'blue';
            button.style.color = 'white';
            why.style.color = '#1a1a1a';
            p.forEach(function(element){
                element.style.color = 'white';
            });

            boolean = 0;
        }
        else{
            html.style.background = 'white';
            button.style.background = 'red';
            button.style.color = 'black';
            why.style.color = '#fafafa';
            p.forEach(function(element){
                element.style.color = 'black';
            });

            boolean = 1;
        }

        color = boolean;
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../Favicon/favicon.ico" type="image/x-icon">
    <title>Liva</title>
</head>
<body>
    <div id='text-container'>
        <p>M. Destra</p>
        <p>Liva était faible. Elle le savait. Ses vœux étaient pitoyables, sans détermination ni ambition, juste des phrases bateau, copiées sur les autres vœux. "Protéger le peuple", "Servir le roi"... Elle ne se croyait pas capable d’accomplir autre chose, et même cela était sans doute trop.</p>
        <p>Ensuite vient l’examen, qu’elle passe de justesse. Heureusement, son adversaire était le pire du groupe, sacrée chance. Elle obtient le grade de rang 8, le plus faible. La voici officiellement une soldate, mais elle pense ne rien mériter. La guerre lui a épargné les examens théoriques ; sur le terrain, Xianos lui a sauvé la mise. Son syndrome de l’imposteur était plus grand que jamais, du moins c’est ce qu’elle imaginait. Très vite, ses camarades ont commencé à bouger.</p>
        <p>Dans sa promotion, tout le monde a formé des groupes, mais vous le savez déjà. Entre les prodiges de l’arène, ceux du combat, les indépendants et les amis de toujours, Liva s’est retrouvée seule, mais ce n’était pas son choix.</p>
        <p>À cela s’ajoute le fait qu’une fois son diplôme en poche, ses amis des autres filières finissaient par l’ignorer. Elle avait beau théoriquement faire partie de la même caste qu’eux, un enfant adopté par obligation par ordre du roi ne possède aucune légitimité. Peu importe qui elle est, son sang est impur. Nous étions du même avis, alors nous lui avons donné un peu d’argent, juste assez pour survivre quelques semaines.</p>
        <p>Dans sa misère, elle décide de partir en mission seule pour renflouer les caisses. Elle se disait, sans réellement y croire, que si Phillia ou Adam en étaient capables, elle le serait aussi. Elle entreprend une simple mission d’escorte pour un marchand sur une route relativement courte, rien de bien sorcier. Le début de la mission s’est bien déroulé — si je précise le début, c’est qu’évidemment, ils sont tombés dans une embuscade de l'ATEL et très vite tout a basculé. La marchandise ? Volée. Les marchands qu’elle devait protéger ? Morts. Elle ? Vivante, sans blessure grave. Comment a-t-elle survécu ? Nous n’avons aucune information à ce sujet, mais nous n’écrivons pas un roman de fantaisie. Évidemment, elle a sans doute fui, comme pour chacun des problèmes qui ont surgi dans sa vie.</p>
        <p>À ce moment-là, nous avons décidé qu’une fuyarde ne ferait qu’entacher notre réputation et avons décidé de nous séparer d’elle. À partir de ce moment-là, tout ce qu’elle a décidé de faire n’était plus sous notre contrôle. Si dans son élan elle est partie seule en chasse d’une prime contre un adversaire plus fort qu’elle, nous supposons que ce n’était ni de la folie ni du désespoir, mais simplement un élan d’impulsivité pour mettre fin à ses jours. Nous ne sauverons pas une folle qui suit les préceptes de Yinva. Ainsi, jeune homme, avant de vous plaindre à nous pour ne pas avoir défendu le mouton noir de votre promotion, j’aimerais que vous vous remettiez en question. Où étiez-vous quand elle avait besoin d’aide ? Pour conclure, nous ne paierons en aucun cas pour ses obsèques, et nous refusons catégoriquement qu’elle soit inhumée dans notre tombeau.</p>
    </div>

    <button class='negate' onclick='negate(color)'>Negate</button>

    <div class='why'>
        POURQUOI GORA ?
    </div>
</body>
</html>

<style>
    body{
        width: 40%;
        margin: auto;
    }

    p{
        font-family: monospace;
        color: white;
        font-size: 1.5em;
        text-align: justify;
    }

    p:not(:first-child){
        margin-top: 1em;
        text-indent: 3em;
    }

    .why{
        position: absolute;
        top: 0;
        left: 0;

        color: #1a1a1a;
        font-family: monospace;
        font-size: 30em;
        cursor: default;
        text-align: center;
        
        z-index: -1;
    }

    .hidden-text{
        visibility: hidden;
    }

    .negate{
        display: none;
        padding: 1em;
        background: blue;
        color: white;
        border: var(--mypurple);
        font-family: monospace;
        cursor: pointer;
    }

    @media screen and (max-width: 500px){
    body{
        width: 90%;
    }
}
</style>