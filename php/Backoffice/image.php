<?php
//On récupère la photo

$image = $_FILES['imgUpload'];

// On vérifie si l'image existe

if(isset($image)){
     //On indique le chemin où va devoir s'enregistrer l'image 
    $cheminImage = '../../Image/'.basename($image['name']);

    // On vérifie si la taille de l'image n'est pas trop grande (1 Mo)
    $telechargerImage = true;
    
    if($image['size'] > 10000000){
        $telechargerImage = false;
    }
}

if($telechargerImage){
    move_uploaded_file($image['tmp_name'], $cheminImage);
}
else{
    echo 'Votre image ne respecte pas les conditions et n\'a par conséquent pas été implémentée';
}

header('Location: ../../Office.php');
?>