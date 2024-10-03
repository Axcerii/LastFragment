<?php
include_once "php/bdd.php";
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="shortcut icon" href="Favicon/favicon.ico" type="image/x-icon">
    <title>Connexion</title>

</head>
<header>
    <?php
    include_once "php/header.php";
    ?>
</header>


<?php
  if(isset($_SESSION['connexion'])){
    header('Location: Profil');
  }
?>
<body>
    <form action="Connexion.php" method="POST">
        <div class='label_input'>
            <label for="username">Nom d'utilisateur :</label>
            <input type="username" name="username" class="inputText" id="username" placeholder="Robert Dupond">
        </div>
        <div class="label_input">
        <label for="password">Mot de passe :</label>
        <input type="password" name ="password"class="inputText" id="password" placeholder="9mai2014">
      </div>
      <button type="submit">Se Connecter</button>
    </form> 
    <p class="invitation">
      Pour les invités : 
      <br>
      Nom d'utilisateur : Invité
      <br>
      Mot de Passe : Invitation
    </p>
</body>
</html>

<?php
$usernames = fetchcolonne('Identifiant', 'joueurs');
$passwords = fetchcolonne('MotDePasse', 'joueurs');
$droits = fetchcolonne('Droit', 'joueurs');
$ids = fetchcolonne('id', 'joueurs');
$prenom = fetchcolonne('Nom', 'joueurs');

$for = count($usernames);

if(isset($_POST['username']) && isset($_POST["password"])){
    for($ii = 0; $ii < $for; $ii++){
      if($_POST['username'] == $usernames[$ii] && $_POST["password"] == $passwords[$ii]){
        $_SESSION['connexion'] = true;
        $_SESSION['droit'] = $droits[$ii];
        $_SESSION['qui'] = $ids[$ii];
        $_SESSION['name'] = $prenom[$ii];
      }
      else{
        $error = true;
      }
    }
  }

  if(isset($_SESSION['connexion'])){
    header('Location: Profil');
  }


?>