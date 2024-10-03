<?php
include_once 'bdd.php';

    $id = $_POST['joueur'];
    $slot = $_POST['slot'];

    $sql = "UPDATE joueurs SET ".$slot." = '' WHERE id = ".$id;

    update($sql);

    header('Location: ../Profil.php');
?>