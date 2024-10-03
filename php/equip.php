<?php
include_once 'bdd.php';

    $id = $_POST['joueur'];
    $slot = $_POST['slot'];
    $nom = $_POST['nom'];

    $sql = "UPDATE joueurs SET ".$slot." = '".$nom."' WHERE id = ".$id;

    update($sql);

    header('Location: ../Profil.php');
?>