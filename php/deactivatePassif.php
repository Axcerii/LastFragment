<?php
include_once 'bdd.php';

$id = $_POST['id'];

    $sql = "UPDATE passif SET Activation = 0 WHERE id = ".$id;

    update($sql);
    header('Location: ../Profil.php');
?>