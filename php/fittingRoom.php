<?php

    include_once 'bdd.php';


    $joueur = $_POST['joueur'];
    $casque = $_POST['Casque'];
    $plastron = $_POST['Plastron'];
    $gantelets = $_POST['Gantelets'];
    $jambieres = $_POST['Jambières'];

    
    $sql1 = "UPDATE joueurs SET Casque = '".$casque."', Plastron = '".$plastron."', Gantelets = '".$gantelets."', Jambieres = '".$jambieres."' WHERE Nom = '".$joueur."'";
    
    update($sql1);

    $count = $_POST['count'];

    for($ii = 0; $ii < $count; $ii++){
        $stringName = 'passif_'.$ii;
        $stringId = 'id_'.$ii;

        if(isset($_POST[$stringName])){
            $checkbox = 1;
        }
        else {
            $checkbox = 0;
        }

        $id = $_POST[$stringId];

        $sql2 = "UPDATE passif SET Activation = ".$checkbox." WHERE id = ".$id; 
        
        update($sql2);
    }
    
    header('Location: ../Profil.php');

?>