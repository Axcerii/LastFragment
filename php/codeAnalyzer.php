<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_POST['code'];

    // Replace this with your actual code verification logic

    $validCodes = [
        'AXEXQ824' => 'Liva.php',
        'EZAW247' => 'Rapport.php',
        'JGDB28W' =>  'Créativité.php',
        'towa' => 'towa.jpg',
        'drii' => 'drii_vitrail.png',
        'AZDWOuTJ_SQ' => 'Eadric.jpg',
        'HJGBFRT' => 'Nobody.php',
        'hjgbfrt' => 'Nobody.php'
    ];


    if(isset($validCodes[$code])) {
        echo json_encode(array(
            'isValid' => true,
            'redirectUrl' => 'php/PagesSecretes/'.$validCodes[$code]
        ));
    } else {
        echo json_encode(array('isValid' => false));
    }
}

?>