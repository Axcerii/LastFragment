<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../Favicon/favicon.ico" type="image/x-icon">
    <title>Le Requin</title>
</head>
<body>
    <div class="background-pattern"></div>
    <div class="background-pattern-radial"></div>

    <div class='card'>
        <h1>Vous m'avez trouvé ?</h1>
        <p>Je suppose que si vous m'avez cherché c'est pour obtenir la clé que l'on ne se partage qu'entre maître flux... <br><br>
        J'espère que vous m'avez trouvé avant d'avoir atteint les 60 points en maîtrise de flux. La clé de déchiffrement est : <br><br>
        "Le dragon de la vie et de la mort sont des imposteurs" <br> <br>
        Voici un texte crypté pour vous préparez au jour J : <br> <br>
        Nspdeth yd gwea a iwm uieraimx s Ahwdr
    
    <br><br>

Rien d'autre ne vous attend, j'espère que votre éveil vous satisfera.</p>
    </div>

    <p class='indice'>
        Vigenère
    </p>

    <style>
        .card{
            display: flex;
            flex-direction : column;
            color: var(--mywhite);
            width: 30%;
            background: rgba(0,0,0,0.4);
            border : var(--mypurple) 4px solid;
            margin: auto auto;
            padding: 2em;
            font-size: 21px
        }

        .indice{
            color: #1b1b1b;
            position: absolute;
            bottom : 100px
        }

        @media screen and (max-width: 700px) {
            .card{
                width: 80%
            }
        }
    </style>
</body>
</html>