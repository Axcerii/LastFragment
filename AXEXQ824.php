<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/AXEXQ824.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <!-- Ajout de la font Yarndings 12 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yarndings+12&display=swap" rel="stylesheet">
    <!-- Fin -->
    <!-- Ajout de la font Rubik Mono One -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Yarndings+12&display=swap" rel="stylesheet">
    <!-- Fin -->
    <title>SECRET</title>
</head>
<body>
    <div id='cmd'></div>
    <div class='enter-a-code'>
        <p>Enter a code</p>
        <input type="text" id ='secret-code'>
        <button onclick='checkCode()'>Send</button>
        <div id='error'>
            Invalid Code.
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const username = "<?php 
        if($_SESSION['connexion']){
            echo $_SESSION['name'];
        }
        else{
            echo 'anonymous';
        }?>";
    </script>
    <script src='js/AXEXQ824.js'></script>
</body>
</html>