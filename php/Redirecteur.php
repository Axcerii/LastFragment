<?php
if(isset($_SESSION['connexion']) && $_SESSION['droit'] == 1){
    $_SESSION['connexion'] = true;
}
else{
    header('Location: ../Connexion.php');
}
?>
