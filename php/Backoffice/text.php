<?php

$name = "../../description/";

$name .= $_POST['txtname'];
$text = $_POST['text'];

$name .= '.txt';

$myfile = fopen($name, 'w');

fwrite($myfile, $text);
fclose($myfile);

header('Location : ../../Office.php');
?>