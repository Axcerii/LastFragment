<?php
include_once '../bdd.php'; 

$player = fetchEverything('joueurs');
$argent = fetchEverything('argent');


for($ii = 0; $ii < count($player); $ii++){


    for($jj = 0; $jj < count($player); $jj++){
        if($argent[$ii]['qui'] == $player[$jj]['Nom']){
            $banque = $argent[$ii]['argent'];
        }
    }

    if($_POST['minus'] == 'true'){
        $money = $banque + $_POST[$argent[$ii]['qui']];
    }
    else{
        $money = $banque - $_POST[$argent[$ii]['qui']];
    }

    $qui = $argent[$ii]['qui'];

    $update = "UPDATE argent ";
    $set = "SET argent = '".$money."' ";
    $where = "WHERE qui = '".$qui."'";

    $sql = $update.$set.$where;

    update($sql);
}
?>






<?php
header('Location: ../../Office.php');
?>